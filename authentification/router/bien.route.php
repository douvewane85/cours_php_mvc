<?php 
if(isset($_GET['page']) ){
      switch ($_GET['page']) { 
        case 'add.bien':
              require_once(ROOT."views/add.bien.html.php");  
        break;
        case 'catalogue.bien':
            require_once(ROOT."views/catalogue.bien.html.php");  
        break;
        case 'edit.bien':
            require_once(ROOT."views/edit.bien.html.php");  
        break;
       default :
        require_once(ROOT."views/login.html.php");
      }
  }else{
    require_once(ROOT."views/catalogue.bien.html.php");
}