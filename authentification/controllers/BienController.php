<?php
namespace bbw_mvc\controllers;

use bbw_mvc\lib\AbstractController;
use bbw_mvc\lib\Helpers;
use bbw_mvc\lib\Request;
use bbw_mvc\lib\Role;
use bbw_mvc\lib\Session;
use bbw_mvc\models\BienModel;

class BienController extends AbstractController{

    private BienModel $model;
    function __construct()
    {
          parent::__construct();
          $this->model=new BienModel;
    }

    public function catalogue(){

        $data= $this->model->findAll();
        $this->render("bien/catalogue.bien",[
            "biens"=>$data
        ]);
    }


    public function addBien(Request $request){
        if(!Role::isAdmin())  $this->render("erreur/_403");
       if($request->isPost()){
                $data=$request->getBody();
                $data["photo"]=Helpers::uploadFile($_FILES);
                 $this->model->insert($data);
                $this->redirectUrl("reservation/reservation");
       }
        
       $this->render("bien/add.bien");
        
    }

}