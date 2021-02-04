<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Services\Contracts\FrontServiceInterface;


/**
 * The path to the "home" service provider for your application.
 *
 * This is the home front service provider for search and display entity .
 *
 * @description : FrontService iterates through upload folder and presets for display and handles delete request
 */
class FrontService  implements FrontServiceInterface
{
  /**
   *@return : Array of images
   */
    public function IterateFileList(){
       $path =  public_path() .'/uploads/'; //public_path('uploads');
       $files = scandir($path);
       $allowedExtension=['gif','jpg','jpeg','png'];
       $errors = [];
       $images = [];
       foreach ($files as $key => $file) {
           $file =  $file;
           $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
           if (in_array($ext, $allowedExtension) && ($ext!=".." || $ext!="." ))
           {
             array_push($images,$file);
           }
       }
       if(count($images) <=0){
          array_push($errors,'No image found');
       }
       $results = array(
        'errors' => $errors,
        'images'  => $images
       );
      return $results;
    }

    /**
     * @var : Request $request
     *@return : Array
     */

    public function deleteRequest(Request $request){
      $path =  public_path() .'/uploads/'; //public_path('uploads');
        $file_pointer = $request->get('_file');
        $files = scandir($path);
        $errors = [];
        $images = [];
        foreach ($files as $key => $file) {
            $file =  $file;
            if (in_array( $file_pointer,$files))
            {
              if (!unlink(public_path() .'/uploads/'.$file_pointer)) {
                  array_push($errors,'error in deleting image');
                  // return view('error',['message'=>'']);
              }
              else {
                   array_push($images,"$file_pointer has been deleted");
                  // return view('success',['message'=>"$file_pointer has been deleted"]);
              }
            }
        }

        $results = array(
         'errors' => $errors,
         'success'  => $images
        );
       return $results;


    }

}
