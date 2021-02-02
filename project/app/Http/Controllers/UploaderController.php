<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;


class UploaderController extends Controller
{
    // method dependency injection
    public function uploadViaDevice(Request $request)
    {
        if(!$request->hasFile('photos')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $allowedExtension=['gif','jpg','png'];
        $files = $request->file('photos');
        $errors = [];
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedExtension);
            if($check) {
                foreach($request->photos as $upFiles) {
                    $path = $upFiles->store('uploads');
                    $name = $upFiles->getClientOriginalName();
                }
            } else {
                return view("error"); 
                //response()->json(['invalid_file_format'], 422);
            }
            return view('success');
             //response()->json(['file_uploaded'], 200);
        }
    }
}
