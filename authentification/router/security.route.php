<?php 
if(isset($_GET['page']) && $_GET['page']!="login"){
      switch ($_GET['page']) {
        case 'accueil.visiteur' :
             require_once(ROOT."views/accueil.visiteur.html.php");
          break;
        case 'accueil.admin':
             require_once(ROOT."views/accueil.admin.html.php");
            break;
        case 'show.user' :
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