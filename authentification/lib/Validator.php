<?php
namespace bbw_mvc\lib;

class Validator{
    private  array $arr_error=[];
    public function estVide(string $field,string $key,string $sms="Champ Obligatoire"):void{
        $field=strip_tags(stripslashes($field));
        if(empty($field)){
            $this->arr_error[$key]=$sms;
        }
    }
  
 public function getErrors():array{
     return $this->arr_error;
 }
  public function setErrors($key,$sms):void{
      $this->arr_error[$key]=$sms;
  }
   public function formValide():bool{
         return count( $this->arr_error)==0;
    }
  
   public  function getErrorsVide(array $data):void{
      foreach ($data as $key => $value) {
        if($key!="bien_id"){
            $this->estVide($value,$key);
        }
        
      }
    }
}
