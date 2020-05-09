<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index()
    {
        $user=Auth::user();
        return view('home',compact ('user'));
    }
}
