<?php 
  function est_vide(string $field,string $key,array &$arr_error,string $sms="Champ Obligatoire"):void{
      $field=strip_tags(stripslashes($field));
      if(empty($field)){
          $arr_error[$key]=$sms;
      }
  }

  function form_valide(array &$arr_error):bool{
       return count($arr_error)==0;
  }

  function get_errors_vide(array $data,&$arr_error):void{
    foreach ($data as $key => $value) {
      if($key!="bien_id"){
        est_vide($value,$key,$arr_error);
      }
      
    }
  }