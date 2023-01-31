<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Panel de control - E Code";
        $viewData["products"] = Product::all();
        return view('admin.products.index')->with("viewData", $viewData);
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1",
            "image" => "image|mimes:jpeg,jpg,png,gif,svg"
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = 'image.';
        $product->save();

        if($request -> hasFile("image")){
            $imageName =  $product->id.".".$request->image->extension();
            $product->setImage($imageName);
            $product->save();
        };

        Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
        );

        return redirect()->route('admin.product.index');
    }

    public function delete(int $id) {
        Storage::disk('public')->delete(Product::find($id)->image);
        Product::destroy($id);
        return redirect()->route('admin.product.index');
    }

    public function edit(int $id) {
        $viewData = [];
        $viewData["title"] = "Panel de control - E Code";
        $viewData["product"] = Product::find($id);
        return view('admin.products.edit')->with("viewData", $viewData);
    }

    public function update(int $id, Request $request) {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if($request -> hasFile("image")){
            Storage::disk('public')->delete(Product::find($id)->image);
            $imageName =  $product->id.".".$request->image->extension();
            $product -> setImage($imageName);
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
        }

        $product->save();
        return redirect()->route('admin.product.index');
    }
}
