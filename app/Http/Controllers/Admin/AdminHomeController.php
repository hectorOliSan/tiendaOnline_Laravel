<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Panel de control - E Code";
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
