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
      $results = $this->homeServiceHandler->deleteRequest($this->requestHandler);
      switch(count($results['errors'])){
          case 0:
           return view('success',['message'=>$results['success']]);

          default:
           return view('error',['message'=>$results['errors']]);
      }
    }

}
