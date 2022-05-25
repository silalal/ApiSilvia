<?php
 
namespace App\Http\Controllers;

use App\Models\Post;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Models\Test;
use Faker\Core\File;
use Illuminate\Support\Facades\File as FacadesFile;

class JsonController extends Controller
{
   public function index()
   {
      return view('json_form');
   }  
 
  public function download($id)
  {
      $data = Post::findorfail($id);
      $test['token'] = time();
      $test['data'] = json_encode($data);
      Test::insert($test);
      $fileName = $test['token']. '_datafile.json';
      FacadesFile::put(public_path('/upload/json/'.$fileName),$test);
      return(public_path('/upload/jsonfile/'.$fileName));
  }
 
}