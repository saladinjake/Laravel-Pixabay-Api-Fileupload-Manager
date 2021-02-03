<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    //
    function index(){
       return view('welcome');
    }

    function create(){
       return view('index');
    }

    function viewAll(){
       $files = Storage::disk('local')->allFiles('public/img');
       $allUploads = glob(public_path() . '/img')
       var_dump($allUploads);
       // return view('uploaded',['images'=>$allUploads]);
    }

}
