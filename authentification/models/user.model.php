<?php 

  function get_users():array{
         $data=execute_select("select * from users");
         return $data['data'];
  }

  function get_user_by_login_password(string $login,string $password){   
      $data=execute_select("select * from users where login=? and password=?  ",[$login,$password],true);
      return  $data['data']==false?null:$data['data'];
   }

   function insert_user(array $user):void{
      $result= execute_update("INSERT INTO users VALUES (NULL,?,?,?,?)",$user);
   }

   function login_exist(string $login):bool{
      $data=execute_select("select * from users where login=? ",[$login],true);
      
      return  $data['row_count']!=0;
   }

  