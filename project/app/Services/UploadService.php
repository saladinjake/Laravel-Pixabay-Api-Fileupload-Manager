<?php
namespace App\Services;
use Illuminate\Http\Request;
use Validator;

class UploadService
{
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
          if($check ) {
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

    public function uploadViaApi(Request $request)
    {
      $bodyContent = $request->getContent();
      $result =$bodyContent = $request->all();

      if($request->has("image_url"))
      {
          $message = '';
          $image = '';
          if(filter_var($request->get("image_url"), FILTER_VALIDATE_URL))
          {
              $allowed_extension = array("jpg", "png", "jpeg", "gif");
              $url_array = explode("/", $request->get("image_url"));
              $image_name = end($url_array);
              $image_array = explode(".", $image_name);
              $extension = end($image_array);
               if(in_array($extension, $allowed_extension))
               {
                    $image_data = file_get_contents($request->get("image_url"));
                    $new_image_path = public_path(). "/uploads/" . rand() . "." . $extension;
                    file_put_contents($new_image_path, $image_data);
                    $message = 'Image Uploaded';
                    $image = '<img src="'.$new_image_path.'" class="img-responsive img-thumbnail"  />';
               }
               else
               {
                   $message = "Image not found";
               }
          }
          else
          {
           $message = 'Invalid image url';
          }
          $output = array(
           'message' => $message,
           'image'  => $image
          );
           return response()->json([ $output], 200);
         }
         return response()->json(['error'], 200);
    }
}
