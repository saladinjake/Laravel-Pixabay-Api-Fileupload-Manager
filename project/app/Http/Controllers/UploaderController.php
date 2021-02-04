<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use Validator;
use App\Services\UploadService;

class UploaderController extends Controller
{
    // method dependency injection
    public function uploadViaDevice(UploadService $uploader)
    {

    }

    public function uploadViaApi(Request $request){
       
    }
}
