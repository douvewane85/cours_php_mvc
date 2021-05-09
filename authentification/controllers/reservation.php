<?php
    switch ($_REQUEST['action']) {
        case 'reservation.visiteur': 
          
            reservation_visiteur();
             break;
      
        default:
            # code...
            break;
    }

    function reservation_visiteur():void{
        
        $bien_id= $_SESSION['bien_id'];
        $user_id=$_SESSION['user_connect']['id'];
        unset( $_SESSION['bien_id']);
        insert_reservation($user_id, $bien_id);
        redirect_url("bien",'catalogue.bien');
    }

