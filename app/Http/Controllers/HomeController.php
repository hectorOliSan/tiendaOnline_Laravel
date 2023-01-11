<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        $title = "Acerca de nosotros - E Code";
        $subtitle = "Acerca de nosotros";
        $description = "Contenido de la página acerca de...";
        $author = "Héctor Olivares Sánchez";

        return view("home.about")->with("title", $title)
            ->with("subtitle", $subtitle)
            ->with("description", $description)
            ->with("author", $author);
    }
}
