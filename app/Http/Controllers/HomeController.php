<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        // retorna al index de la carpeta home
        return view('home.index');
    }
}
