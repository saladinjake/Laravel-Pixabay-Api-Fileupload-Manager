<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Services\Contracts\UploadServiceInterface;

/**
 * The path to the "upload" controller for your application.
 *
 * This handles upload via the api or via local drive .
 *
 * @description : FrontController
 */
class UploaderController extends Controller
{
  /**
   * @var : Request $request
   *@return : null
   */
    public function __construct(Request $request){
      $this->requestHandler = $request;
    }
    // method dependency injection
    /**
     * @var : UploadService $uploader
     *@return : ['errors'=>[],'images'=>'success']
     */
    public function uploadViaDevice(UploadService $uploader)
    {
       return $uploader->uploadViaDevice($this->requestHandler);
    }

    /**
     * @var : UploadService $uploader
     *@return : Array  ['errors'=>[],'images'=>'success']
     */

    public function uploadViaApi(UploadService $uploader){
        return $uploader->uploadViaApi($this->requestHandler);
    }
}
