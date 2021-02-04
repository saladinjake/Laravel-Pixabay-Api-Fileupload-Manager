<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Interface UploadServiceInterface
{
    public function uploadViaDevice(Request $request);
    public function uploadViaApi(Request $request);
}
