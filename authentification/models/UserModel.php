<?php
namespace bbw_mvc\models;
use  bbw_mvc\lib\AbstractModel;

class UserModel extends AbstractModel {
 
   
    function __construct()
    {
       parent::__construct() ;
       $this->tableName="users";
    }

    public function findUserByLoginAndassword(string $login,string $password){   
        $data=$this->findBy("select * from users where login=? and password=?  ",[$login,$password],true);
        return  $data['data']==false?null:$data['data'];
     }
  
     function loginExist(string $login):bool{
        $data=$this->findBy("select * from users where login=? ",[$login],true);
        return  $data['row_count']!=0;
     }

     function insert(array $user):int{
        return $this->persist("INSERT INTO users VALUES (NULL,?,?,?,?)",$user);
     }
}