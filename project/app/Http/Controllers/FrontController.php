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
       $path = public_path('uploads');
       $files = scandir($path);
       $allowedExtension=['gif','jpg','jpeg','png'];
       $errors = [];
       $images = [];
       foreach ($files as $key => $file) {
           $file =  $file;
           $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
           if (in_array($ext, $allowedExtension) && ($ext!=".." || $ext!="." ))
           {
             array_push($images,$file);
           }
       }
       if(count($images) <=0){
          array_push($errors,'No image found');
       }
       // dd($files);
       return view('uploaded',['images'=>$images, 'errors'=>$errors]);
    }

    function delete(Request $request){
      $path = public_path('uploads');
        $file_pointer = $request->get('_file');
        $files = scandir($path);
        $errors = [];
        $images = [];
        foreach ($files as $key => $file) {
            $file =  $file;
            if (in_array( $file_pointer,$files))
            {
              if (!unlink(public_path() .'/uploads/'.$file_pointer)) {
                  return view('error',['message'=>'error in deleting image']);
              }
              else {
                  return view('success',['message'=>"$file_pointer has been deleted"]);
              }
            }
        }


    }

}
