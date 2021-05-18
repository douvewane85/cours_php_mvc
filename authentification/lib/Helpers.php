<?php
namespace bbw_mvc\lib;

class Helpers{
    public static function uploadFile(array $file):string{
        $filename = $file["photo"]["name"];
        $tempname = $file["photo"]["tmp_name"];    
        $folder = ROOT."public/images/uploads/".$filename;
        if (move_uploaded_file($tempname, $folder))  {
           return   $filename;
        }
           return "" ;
     
    }
    
}