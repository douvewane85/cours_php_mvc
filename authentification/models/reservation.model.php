<?php 

  function get_reservation():array{
         $data=execute_select("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and r.etat='Encours' order by create_at desc");
         return $data;
  }

  function get_reservation_bien(int $bien_id):array{
     return execute_select("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and bien_id=? ",[$bien_id]);
 }
   function get_reservation_client(int $client_id):array{
    return execute_select("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and client_id=? ",[$client_id]);
   }
 function insert_reservation(int $user_id,int $bien_id):int{
     $result= execute_update("INSERT INTO `reservation` (`id`, `bien_id`, `client_id`, `create_at`, `etat`) VALUES (NULL, ?, ?, ?, ?)",
     [$bien_id,$user_id, date_format(date_create(), 'Y-m-d'),"Encours"]);
     return $result;
}
function get_reservation_id(int $reservation_id){
  return execute_select("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and r.reservation_id=? ",[$reservation_id],true);
}
