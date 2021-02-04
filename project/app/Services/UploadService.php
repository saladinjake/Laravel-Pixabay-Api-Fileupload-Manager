<?php
namespace App\Services;
use Illuminate\Http\Request;
use Validator;

class UploadService
{
    public function uploadViaDevice(Request $request)
    {
      return 'Output from upload via device';
    }

    public function uploadViaApi(Request $request)
    {
      return 'Output from upload via api';
    }
}
