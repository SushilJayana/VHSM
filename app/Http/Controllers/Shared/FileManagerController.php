<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    //
    protected $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");


    public function uploadFile($files){

        $extension = pathinfo($files['file']['name'], PATHINFO_EXTENSION);

        if ((($files["file"]["type"] == "video/mp4")
        || ($files["file"]["type"] == "audio/mp3")
        || ($files["file"]["type"] == "audio/wma")
        || ($files["file"]["type"] == "image/pjpeg")
        || ($files["file"]["type"] == "image/gif")
        || ($files["file"]["type"] == "image/jpeg"))
        
        // && ($files["file"]["size"] < 20000)
        && in_array($extension, $allowedExts))
        
          {
          if ($files["file"]["error"] > 0)
            {
              echo  $files["file"]["error"];
              return;
            }
          else
            {
        
            $filename = preg_replace("/\s+/", "", $_POST['subject']."_".date("Y_m_d_H_m_s")).".".$extension;
        
            if (file_exists("../../uploads/" . $filename))
              {
              echo $filename . " already exists. ";
              return;
              }
            else
              {
              move_uploaded_file($files["file"]["tmp_name"],"../../uploads/" .$filename);
        
              $_POST["location"] = "/uploads/" . $filename;
              $_POST["size"] = ($files["file"]["size"] / 1024) ;
        
              //db save
               $repo= new Database\Repo();       
               $repo->save();
        
              echo "success";
              }
            }
          }
        else
          {
          echo "Invalid file";
          }
        
    }
}
