<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
      return view('admin');
    }
    function adminn()
    {
       return view('home.index');
    }
    function pengguna()
    {
        return view('home.index'); 
    }
}