<?php
namespace bbw_mvc\lib;

class Request{

    public function getUrl(){
        $url= explode("/",$_SERVER['REQUEST_URI']);
        unset($url[0]);
        unset($url[1]);
        return array_values($url);
    }
    public function isPost():bool{
        return $_SERVER['REQUEST_METHOD']=="POST";
    }
    public function isGet():bool{
        return $_SERVER['REQUEST_METHOD']=="GET";
    }
    public function getQueryParam():array{
          if($this->isGet()){
            $url=$this->getUrl();
            unset($url[0]);
            unset($url[1]);
            return array_values($url);
          }
    }
    public function getBody():array{
           $data=[];
            if($this->isPost()){
                foreach ($_POST as $key => $value) {
                   // $data[$key ]=filter_input(INPUT_POST, $key,FILTER_SANITIZE_SPECIAL_CHARS);
                   $data[$key]=$value;
                }
            }
            return  $data;
          }
   }
 