<?php
namespace bbw_mvc\lib;

class Database{
    private  $pdo=null;

    function __construct()
    {
          $this-> openConnexion();
    }
  
function openConnexion(){
    $dsn="mysql:dbname=php_glrs_2021;host=127.0.0.1";
    $user="root";
    $password="";
    try {
        if( $this->pdo==null){
            $this->pdo = new \PDO($dsn, $user, $password);
        }
        $this->pdo->setAttribute (\PDO::ATTR_CASE ,\PDO::CASE_LOWER) ;
        $this->pdo->setAttribute (\PDO::ATTR_ERRMODE ,\PDO::ERRMODE_EXCEPTION) ;
        $this->pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");  
      
    } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
    }
}

function executeSelect(string $sql,array $data=null,$sigle=false):array{
    $stm=$this->pdo->prepare($sql);
      if(is_null($data)){
        $stm->execute();
      }else{
        $stm->execute($data);
      }
    return [
        'data'=> $sigle?$stm->fetch(\PDO::FETCH_ASSOC):$stm->fetchAll(\PDO::FETCH_ASSOC),
        "row_count"=> $stm->rowCount()
    ];
}

function executeUpdate(string $sql,array $data=null):int{
    $stm=$this->pdo->prepare($sql);
      if(is_null($data)){
        $stm->execute();
      }else{
        $stm->execute(array_values($data));
      }
        if(!strpos(strtolower($sql),strtolower("insert"))){
            return  $this->pdo->lastInsertId();
        }
        return  $stm->rowCount();
    
 }
}