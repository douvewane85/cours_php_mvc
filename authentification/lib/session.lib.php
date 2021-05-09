<?php 
    function is_admin():bool{
          return is_connect() && $_SESSION['user_connect']['role']=="Admin";
    }
    function is_connect():bool{
        return isset($_SESSION['user_connect']);
    }

    function is_visiteur():bool{
        return is_connect() && $_SESSION['user_connect']['role']=="Visiteur";
    }
    function logout(){
        if(is_connect()){
            unset($_SESSION['user_connect']);
            session_destroy();
        }
    }