<?php
    switch ($_POST['btn_submit']) {
        case 'btn_login': 
            unset($_POST['controller']);
           se_connecter($_POST);
             break;
        case 'btn_register':
             unset($_POST['controller']);
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
                //var_dump($user); die;
                $_SESSION['user_connect']=$user;
                 if($user['role']=="Admin"){
                    
                    redirect_url("reservation",'show.reservation');
                    exit();
                 }elseif($user['role']=="Visiteur"){
                    if(!empty($data['bien_id'])){
                        redirect_url("reservation",'reservation.visiteur',$data['action']."&bien_id=".$data['bien_id']);
                    }
                    redirect_url("bien",'catalogue.bien');
                    
                 }
             } 
        }else{
            //Stocker les erreurs dans la session
            var_dump($arr_error); die;
             $_SESSION["arr_error"]=$arr_error;
               redirect_url("security",'login');
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