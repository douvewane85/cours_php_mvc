
<?php

use bbw_mvc\lib\Application;
//Inclusion du Autoload
require_once dirname((__DIR__))."/vendor/autoload.php";
require_once dirname(dirname(__FILE__))."/config/parametre.php";
 $app=new Application();
 
 $app->run();
//Demarrage de la sesion 





 
