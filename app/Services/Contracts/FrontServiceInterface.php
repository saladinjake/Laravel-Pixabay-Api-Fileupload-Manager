<?php

namespace App\Services\Contracts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Interface FrontServiceInterface
{
    public function IterateFileList();
    public function deleteRequest(Request $request);
}
