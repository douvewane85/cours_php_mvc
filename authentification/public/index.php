<?php
//Demarrage de la sesion 
if(session_status()==PHP_SESSION_NONE){
  session_start();
}
//inclusion de page
require_once dirname(dirname(__FILE__))."/config/parametre.php";
require_once dirname(dirname(__FILE__))."/config/require.php";
//Traitement des requetes de type GET
if($_SERVER['REQUEST_METHOD']=="GET"){
      if(isset($_GET['controler'])){
        if($_GET['controler']=="security"){
          require_once PATH_ROUTE."security.route.php";
        }elseif($_GET['controler']=="bien"){
          require_once PATH_ROUTE."bien.route.php";
        }elseif($_GET['controler']=="reservation"){
          require_once PATH_ROUTE."reservation.route.php";
        }
      }else{
        require_once(ROOT."views/catalogue.bien.html.php");
      }
    
} elseif($_SERVER['REQUEST_METHOD']=="POST"){
  //Traitement des requetes de type POST
    if(isset($_POST['btn_submit'])){
           require_once(ROOT."controllers/".$_POST['controller'].".php");
    }
}
 
