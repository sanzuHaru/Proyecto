<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function acerca(){
        return View('landing.pages.acerca');
    }
    public function contacto(){
        return View('landing.pages.contacto');
    }
    public function index(){
        return View('landing.pages.index');
    }
    public function mision(){
        return View('landing.pages.mision');
    }

    public function catalago(){
        $data = Product::all();
        return View('landing.pages.catalogo', ['catalogo'=>$data]);
    }
}
