<?php
namespace bbw_mvc\lib;

abstract class AbstractModel implements IModel {
   
   protected Database $database;
   protected string $tableName;
   protected string $primaryKey;

    function __construct()
    {
          $this->database=new Database();
          $this->primaryKey="id";
        
    }

    public function findAll():array{
         return $this->database->executeSelect("select * from $this->tableName ");
    }
    public function findById(int $id){
      return $this->database->executeSelect("select * from $this->primaryKey='$id' ",[$id],true);
   }
   public function findBy(string $sql,array $data=null,$single=false){
      return $this->database->executeSelect($sql,$data,$single);
   }

   public function persist(string $sql,array $data):int{
      return $this->database->executeUpdate($sql,$data);
   }

   public function remove(string $sql,array $data):int{
      return $this->database->executeUpdate($sql,$data);
   }
    
    

    
} 

