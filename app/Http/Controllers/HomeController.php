<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Página principal - E Code";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Acerca de nosotros - E Code";
        $viewData["subtitle"] = "Acerca de nosotros";
        $viewData["description"] = "Contenido de la página acerca de...";
        $viewData["author"] = "Héctor Olivares Sánchez";
        return view("home.about")->with("viewData", $viewData);
    }
}
