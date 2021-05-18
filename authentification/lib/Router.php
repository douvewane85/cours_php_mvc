<?php 
namespace bbw_mvc\lib;

use bbw_mvc\controllers\ErreurController;
class Router{
    private Request $request;
    private Response $response;
    private ErreurController $erreurCtrl;
    public function __construct(Request $request, Response $response)
    {
        $this->request=$request;
        $this->response=$response;
        $this->erreurCtrl=new ErreurController();
    }
    public function resolve(){
        $url=$this->request->getUrl();
        if(!isset($url[0]) || !isset($url[1])){
             $this->erreurCtrl->redirectUrl("bien/catalogue");
             exit();
        }
       
        $controller=isset($url[0])?$url[0]:"Bien";
        
        if(file_exists(ROOT."controllers/".ucfirst($controller)."Controller.php")){
                 $controllerClass="bbw_mvc\\controllers\\".(ucfirst($controller)."Controller");
                 $controller=new $controllerClass;
                //Index represente la Methode par défaut dans un controller
                $action=isset($url[1])?$url[1]:"index";
                if(method_exists($controller, $action)){
                    call_user_func([$controller,$action],$this->request);
                    exit();
                }
        }else{
              $this->erreurCtrl->pageNotFound();
              exit();
        }
         
    }
}

