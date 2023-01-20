<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Página principal - E Code";
        $viewData["subtitle"] = "Productos";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData["title"] = "Página principal - E Code";
        $viewData["subtitle"] = "Producto - {$id}";
        $viewData["product"] = Product::find($id);
        return view('product.show')->with("viewData", $viewData);
    }
}
