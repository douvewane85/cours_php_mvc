<?php 
if(isset($_GET['page']) ){
      switch ($_GET['page']) { 
        case 'reservation.visiteur':
          $_SESSION['bien_id']=$_GET['bien_id'];
          require_once(ROOT."controllers/reservation.php");
        break;
        case 'show.reservation.client':
          require_once(ROOT."views/show.reservation.client.html.php");
        break;
        case 'show.reservation.bien':
          require_once(ROOT."views/show.reservation.bien.html.php");
        break;
        case 'edit.reservation':
          require_once(ROOT."views/edit.reservation.html.php");
        break;
        case 'show.reservation':
          require_once(ROOT."views/show.reservation.html.php");
        break;
        
        
  }
}

