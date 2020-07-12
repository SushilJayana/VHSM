<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    //
    protected $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");


    public function upload($request,$folder=null)
    {
      try{
        $file=$request->file('file');
        
        if(!$file) return false;

        $extension =$file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = (!\is_null($folder))?"storage/".preg_replace("/\s+/", "",$folder) : "storage/";
        $request->file->move($path,$filename);
        //$size = $file->getSize();
        $size = 111;
        return array("extension"=>$extension,"size"=>$size,"location"=>$path.'/'.$filename);

      }catch(Exception $exception){
        return false;
      }    
    }    
}