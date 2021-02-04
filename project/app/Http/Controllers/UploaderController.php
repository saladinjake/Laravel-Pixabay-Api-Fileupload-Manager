<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Services\UploadService;

class UploaderController extends Controller
{
    public function __construct(Request $request){
      $this->requestHandler = $request;
    }
    // method dependency injection
    public function uploadViaDevice(UploadService $uploader)
    {
       return $uploader->uploadViaDevice($this->requestHandler);
    }

    public function uploadViaApi(UploadService $uploader){
        return $uploader->uploadViaApi($this->requestHandler);
    }
}
