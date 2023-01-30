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
            "image" => "required"
        ]);

        $lastID = DB::select("SHOW TABLE STATUS LIKE 'products'")[0]->Auto_increment;
        $extension = $request->file('image')->extension();
        Storage::disk('public')->put(
            $lastID.".".$extension,
            file_get_contents($request->file('image')->getRealPath())
        );

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $lastID.".".$extension;
        $product->save();
        return redirect()->route('admin.product.index');
    }
}
