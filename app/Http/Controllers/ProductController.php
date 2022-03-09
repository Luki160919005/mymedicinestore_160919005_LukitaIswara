<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view ('welcome',['name'=>'Luki']);
    }

    public function Update(){
        return view ('welcome',['name'=>'Luki']);
    }

}
