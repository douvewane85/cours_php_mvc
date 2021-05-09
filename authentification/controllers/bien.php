<?php
    switch ($_POST['btn_submit']) {
        case 'btn_add_bien': 
            unset($_POST['controller']);
            unset($_POST['btn_submit']);
             add_bien($_POST);
             break;
      
        default:
            # code...
            break;
    }

    function add_bien(array $data):void{
                 insert_bien($data,upload_file($_FILES));
                 redirect_url("reservation",'show.reservation');

    }

    function upload_file(array $file):string{
        $filename = $file["photo"]["name"];
        $tempname = $file["photo"]["tmp_name"];    
        $folder = ROOT."public/images/uploads/".$filename;
        if (move_uploaded_file($tempname, $folder))  {
           return   $filename;
        }else{
            return "" ;
      }
    }


    