<?php
//Chemin des Dossier 
  define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
  define("PATH_VIEWS",ROOT."views".DIRECTORY_SEPARATOR);
  define("PATH_VIEWS_INC",ROOT."views".DIRECTORY_SEPARATOR."inc".DIRECTORY_SEPARATOR);
  define("PATH_DATA",ROOT."data".DIRECTORY_SEPARATOR);
  define("PATH_ROUTE",ROOT."router".DIRECTORY_SEPARATOR);
  //Dossier Public
  define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
  //Dossier Controller
  define("PATH_CONTROLLERS",WEBROOT."controllers".DIRECTORY_SEPARATOR);