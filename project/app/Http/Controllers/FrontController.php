<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Services\FrontService;

class FrontController extends Controller
{
    public function __construct(Request $request,FrontService $homeService){
      $this->requestHandler = $request;
      $this->homeServiceHandler = $homeService;
    }
    //
    public function index(){
       return view('welcome');
    }

    public function create(){
       return view('index');
    }

    public function viewAll(){
        $results = $this->homeServiceHandler->IterateFileList();
        return view('uploaded',['images'=>$results['images'], 'errors'=>$results['errors'] ]);
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
