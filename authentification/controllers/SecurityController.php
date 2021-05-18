<?php
namespace bbw_mvc\controllers;

use bbw_mvc\lib\AbstractController;
use bbw_mvc\lib\Request;
use bbw_mvc\lib\Role;
use bbw_mvc\lib\Session;
use bbw_mvc\models\UserModel;

class SecurityController extends AbstractController{

    private UserModel $model;
    function __construct()
    {
          parent::__construct();
          $this->model=new UserModel;
    }
    /**
     * Connexion
     *
     * @param \bbw_mvc\lib\Request $request
     * @return void
     */
    public function login(Request $request){
       
          if($request->isPost()) {
             $this->validator->getErrorsVide($request->getBody());
             if( $this->validator->formValide()){
                 extract($request->getBody());
                $user= $this->model->findUserByLoginAndassword($login,$password);
                 if(is_null($user)){
                    $this->validator->setErrors('err_login',"Login ou Mot de passe Incorrect");
                    Session::setSession("arr_error",$this->validator->getErrors());
                    $this->render('security/login'); 
                 }else{
                     Session::setSession("user_connect",$user);
                     if(Role::isAdmin()){
                        $this->redirectUrl("reservation/reservation");
                     }elseif(Role::isVisiteur()){
                       /* if(!empty($data['bien_id'])){
                            redirect_url("reservation",'reservation.visiteur',$data['action']."&bien_id=".$data['bien_id']);
                        }*/
                        //var_dump("OK"); die;
                        $this->redirectUrl("bien/catalogue");
                     }
                 } 
            }else{
               
                  Session::setSession("arr_error",$this->validator->getErrors());
                  $this->render("security/login"); 
            }
        }
          $this->render("security/login");
    }
    /**
     * Inscription
     *
     * @param \bbw_mvc\lib\Request $request
     * @return void
     */
    public function register(Request $request){
        if($request->isPost()) {
            $this->validator->getErrorsVide($request->getBody());
            if( $this->validator->formValide()){
                extract($request->getBody());
                if($this->model->loginExist($login)){
                    $this->validator->setErrors('login',"ce login existe déja");
                    Session::setSession("arr_error",$this->validator->getErrors());
                    $this->render('security/register'); 
                }else{
                    $this->model->insert($request->getBody());
                    $this->login($request);
                } 
           }else{
                 Session::setSession("arr_error",$this->validator->getErrors());
                 $this->render("security/register"); 
           }
         }
              $this->render("security/register"); 
    }
    /**
    * Liste des utilisateurs
    *
    * @return void
    */
    public function showUser(){
         if(!Session::isConnect())  $this->render("bien/catalogue");
         $users= $this->model->findAll();
         $this->render("security/show.user",[
             "users"=>$users
         ]); 
    }

    public function logout(){
        Session::logout();
        $this->redirectUrl("bien/catalogue");
    }
}

