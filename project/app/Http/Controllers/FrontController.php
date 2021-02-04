<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Services\Contracts\FrontServiceInterface;

/**
 * The path to the "home" controller for your application.
 *
 * This is the home front for search and display entity .
 *
 * @description : FrontController
 */

class FrontController extends Controller
{
  /**
   * @var : Request $request
   *@var : FrontService $homeService
   *@return : null
   */
    public function __construct(Request $request,FrontServiceInterface $homeService){
      $this->requestHandler = $request;
      $this->homeServiceHandler = $homeService;
    }
    /**
     *@var : null
     *@return : View Object
     */
    public function index(){
       return view('welcome');
    }
    /**
     *@var : null
     *@return : View Object
     */
    public function create(){
       return view('index');
    }
    /**
     *@var : null
     *@return : View Object
     */
    public function viewAll(){
        $results = $this->homeServiceHandler->IterateFileList();
        return view('uploaded',['images'=>$results['images'], 'errors'=>$results['errors'] ]);
    }

    /**
     *@var : Request $request
     *@return : View Object
     */
    function delete(Request $request){
      $path = public_path('uploads');
      $file_pointer = $request->get('_file');
      $files = scandir($path);
      $errors = [];
      $images = [];
      foreach ($files as $key => $file) {
          $file =  $file;
          if (in_array( $file_pointer,$files))
          {
              if (!unlink(public_path() .'/uploads/'.$file_pointer)) {
                return view('error',['message'=>'error in deleting image']);
              }
              else {
                return view('success',['message'=>"$file_pointer has been deleted"]);
              }
          }
        }
    }

}
