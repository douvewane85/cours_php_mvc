<?php

function open_connexion(){
    $dsn="mysql:dbname=php_glrs_2021;host=127.0.0.1";
    $user="root";
    $password="";
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute (PDO::ATTR_CASE ,PDO::CASE_LOWER) ;
        $pdo->setAttribute (PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION) ;
        $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");  
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
/**
 * 
 */
function closeConnexion(\PDO $pdo):void{
      $pdo=null;
}
function execute_select(string $sql,array $data=null,$sigle=false):array{
    $pdo= open_connexion();
    $stm= $pdo->prepare($sql);
      if(is_null($data)){
        $stm->execute();
      }else{
        $stm->execute($data);
      }
   
    return [
        'data'=> $sigle?$stm->fetch(PDO::FETCH_ASSOC):$stm->fetchAll(PDO::FETCH_ASSOC),
        "row_count"=> $stm->rowCount()
    ];
}

function execute_update(string $sql,array $data=null):int{
    $pdo= open_connexion();
    $stm= $pdo->prepare($sql);
      if(is_null($data)){
        $stm->execute();
      }else{
        $stm->execute(array_values($data));
      }
        if(!strpos(strtolower($sql),strtolower("insert"))){
            return  $pdo->lastInsertId();
        }
        return  $stm->rowCount();
    
}





