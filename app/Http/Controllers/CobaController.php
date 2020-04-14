<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    //
    public function show(){
        $name='hariss';
        return view('coba',['name'=>$name]);
    }
}
