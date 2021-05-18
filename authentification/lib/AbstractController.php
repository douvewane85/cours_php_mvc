<?php
namespace bbw_mvc\lib;

abstract class AbstractController{
    protected Validator $validator;
    protected string  $layout="layout.front";
    public function __construct()
    {
        Session::start();
        $this->validator= new Validator();
    }

    public function render(string $file,$data=[]):void{
        ob_start();
           extract($data);
           require_once(PATH_VIEWS."$file.html.php");
          $content_for_layout=ob_get_clean() ;
        require_once(PATH_VIEWS."$this->layout.html.php"); 
    }

    public function redirectUrl($url){
        header("location:".WEBROOT.$url);
        exit();
    }
}