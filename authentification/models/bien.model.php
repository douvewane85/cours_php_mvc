<?php 

  function get_biens():array{
         $data=execute_select("select * from bien");
         return $data;
  }

  function get_bien_id(string $id):array{
    $data=execute_select("select * from bien  where id=? ",[$id],true);
    return  $data;
 }

 function insert_bien(array $bien,string $photo):int{
     extract($bien);
    $result= execute_update("INSERT INTO `bien` (`id`,ref, `type`, `description`, tags ,`create_at_bien`, `publier` ,photo) VALUES (NULL, ?, ?, ?, ?,?,?,?)",   
    [
        "REF". uniqid(),
        $type,$description,
        isset($tags)?json_encode($tags):null ,
        date_format(date_create(), 'Y-m-d'),
        $publier,
        empty($photo)?"":$photo
    ]);
    return $result; 
 }
