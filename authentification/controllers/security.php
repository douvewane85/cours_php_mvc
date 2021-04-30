<?php
  //Inclusion du validator
  require_once(ROOT."lib/validator.lib.php");
  require_once(ROOT."lib/request.lib.php");
  //Inclusion du model
  require_once(ROOT."models/user.model.php");
 
    
    switch ($_POST['btn_submit']) {
        case 'btn_login': 
           se_connecter($_POST);
             break;
        case 'btn_register':
            register($_POST);
             break;
        default:
            # code...
            break;
    }


    function se_connecter($data):void {
        $arr_error=[] ;
         unset($data['btn_submit']);
         get_errors_vide($data,$arr_error);
        if(form_valide($arr_error)){
           $user=get_user_by_login_password($data['login'],$data['password']);
             if(is_null($user)){
                $arr_error['err_login']="Login ou Mot de passe Incorrect";
                $_SESSION["arr_error"]=$arr_error;
                 redirect_url('login'); 
             }else{
                $_SESSION['user_connect']=$user;
                 if($user['role']=="Admin"){
                    redirect_url('accueil.admin');
                    exit();
                 }elseif($user['role']=="Visiteur"){
                    redirect_url('accueil.visiteur');
                    
                 }
             } 
        }else{
            //Stocker les erreurs dans la session
             $_SESSION["arr_error"]=$arr_error;
               redirect_url('login');
        }
    }
    function register($data):void {
        $arr_error=[] ;
        unset($data['btn_submit']);
        get_errors_vide($data,$arr_error);
        if(form_valide($arr_error)){
            if(login_exist($data['login'])){
                $arr_error['login']="Login existe déja";
                $_SESSION["arr_error"]=$arr_error;
                redirect_url('register'); 
            }else{
                insert_user($data);
                 redirect_url('login');
            }
                  
        }else{
            //Stocker les erreurs dans la session
             $_SESSION["arr_error"]=$arr_error;
               redirect_url('register');
        }
    }