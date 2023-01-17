<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $products = array(
        array(
            'id' => 1,
            'name' => 'Product 1',
            'description' => 'Description of product 1',
            'image' => 'image1.png',
            'price' => 10.99
        ),
        array(
            'id' => 2,
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'image' => 'image2.png',
            'price' => 15.99
        ),
        array(
            'id' => 3,
            'name' => 'Product 3',
            'description' => 'Description of product 3',
            'image' => 'image3.png',
            'price' => 20.99
        ),
        array(
            'id' => 4,
            'name' => 'Product 4',
            'description' => 'Description of product 4',
            'image' => 'image4.png',
            'price' => 25.99
        )
    );

    public function index() {
        $viewData = [];
        $viewData["title"] = "Página principal - E Code";
        $viewData["subtitle"] = "Productos";
        $viewData["products"] = self::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData["title"] = "Página principal - E Code";
        $viewData["subtitle"] = "Producto - {$id}";
        $viewData["product"] = self::$products[$id-1];
        return view('product.show')->with("viewData", $viewData);
    }
}
