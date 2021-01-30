<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class UploaderController extends Controller
{
    //
    public function uploadViaDevice(Request $request)
    {
        if(!$request->hasFile('fileName')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $allowedExtension=['gif','jpg','png'];
        $files = $request->file('fileName');
        $errors = [];
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedExtension);
            if($check) {
                foreach($request->fileName as $Files) {
                    $path = $uploadFiles->store('public/uploads');
                    $name = $uploadFiles->getClientOriginalName();
                }
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
            return response()->json(['file_uploaded'], 200);
        }
    }
}
