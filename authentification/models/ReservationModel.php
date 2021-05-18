<?php
namespace bbw_mvc\models;
use  bbw_mvc\lib\AbstractModel;

class ReservationModel extends AbstractModel{
 
    function __construct()
    {
       parent::__construct() ;
       $this->tableName="reservation";
       $this->primaryKey="reservation_id";
    }

        public function findAll(): array
        {
            return $this->database->executeSelect("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and r.etat='Encours' order by create_at desc");
        }
     function insert(array $reservation):int{
         extract($reservation);
         $result=  $this->persist("INSERT INTO `bien` (`id`,ref, `type`, `description`, tags ,`create_at_bien`, `publier` ,photo) VALUES (NULL, ?, ?, ?, ?,?,?,?)",   
           [
          "REF". uniqid(),
          $type,$description,
          isset($tags)?json_encode($tags):null ,
          date_format(date_create(), 'Y-m-d'),
          $publier,
          empty($photo)?"":$photo
      ]);
        return $result;

        $result= $this->persist("INSERT INTO `reservation` (`id`, `bien_id`, `client_id`, `create_at`, `etat`) VALUES (NULL, ?, ?, ?, ?)",
        [$bien_id,$user_id, date_format(date_create(), 'Y-m-d'),"Encours"]);
        return $result;
     }

     public function findById($id){
        return $this->database->executeSelect("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and  $this->primaryKey=?",[$id],true);
     }

     function findReservationsUnBien(int $bien_id):array{
        return $this->database->executeSelect("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and bien_id=? ",[$bien_id]);
     }
      function findReservationsUnClient(int $client_id):array{
       return $this->database->executeSelect("select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id and client_id=? ",[$client_id]);
      }
      function findReservationsByFiltre(array $data):array{
          extract($data);
          $sql="select * from reservation r,users cl, bien b where r.client_id=cl.id and b.id=r.bien_id ";
          $arr_data=[];
          if(!empty($etat)){
             $sql.=" and etat=? ";
             $arr_data[]=$etat;
          }
          if(!empty($client_id)){
             $sql.=" and client_id=? ";
             $arr_data[]=$client_id;
         }
         if(!empty($bien_id)){
            $sql.=" and bien_id=? ";
            $arr_data[]=$bien_id;
        }
          return $this->database->executeSelect($sql,$arr_data);
  }
       
}