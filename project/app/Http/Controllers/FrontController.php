<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    function index(){
       return view('welcome');
    }

    function create(){
       return view('index');
    }
}
