<?php

 //Chemin des Dossier 
  define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
  define("PATH_VIEWS",ROOT."views".DIRECTORY_SEPARATOR);
  define("PATH_VIEWS_INC",ROOT."views".DIRECTORY_SEPARATOR."inc".DIRECTORY_SEPARATOR);

  //Dossier Public
  define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
  //Dossier Controller
  define("PATH_CONTROLLERS",WEBROOT."controllers".DIRECTORY_SEPARATOR);


//Demarrage de la sesion 
if(session_status()==PHP_SESSION_NONE){
  session_start();
}

//inclusion de page
require_once(ROOT."lib/session.lib.php");

//Traitement des requetes de type GET
if($_SERVER['REQUEST_METHOD']=="GET"){
  if(isset($_GET['page']) && $_GET['page']!="login"){
      switch ($_GET['page']) {
        case 'accueil.visiteur' && is_visiteur():
             require_once(ROOT."views/accueil.visiteur.html.php");
          break;
        case 'accueil.admin' && is_admin():
             require_once(ROOT."views/accueil.admin.html.php");
            break;
        case 'show.user' && is_admin():
          if(is_connect())
             require_once(ROOT."views/show.user.html.php");
            break;
        case 'register':
              require_once(ROOT."views/register.html.php");
            break;
        case 'logout':
            logout();
            require_once(ROOT."views/login.html.php");  
            break;
       default :
        require_once(ROOT."views/login.html.php");
      }
  }else{
    require_once(ROOT."views/login.html.php");
  }
} elseif($_SERVER['REQUEST_METHOD']=="POST"){
  //Traitement des requetes de type POST
    if(isset($_POST['btn_submit'])){
        require_once(ROOT."controllers/security.php");
    }
}
 
