<?php
namespace bbw_mvc\models;
use  bbw_mvc\lib\AbstractModel;
use bbw_mvc\lib\Role;
use bbw_mvc\lib\Session;

class BienModel extends AbstractModel{
 
    function __construct()
    {
       parent::__construct() ;
       $this->tableName="bien"; 
    }

    public function findAll(): array
    {
         return  $this->findBy("select * from bien where publier=0");
    }
    
   public function insert(array $bien):int{
        extract($bien);
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
     }
}