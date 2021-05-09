<?php 
   define("DATA_FILE_USER",PATH_DATA."users.data.json")  ;
  function get_users():array{
   $content_json=file_get_contents(DATA_FILE_USER);
   $users=json_decode($content_json,true);
   return $users;
  }

  function get_user_by_login_password(string $login,string $password){
        $users=get_users();
         foreach ($users as $key => $user) {
              if($user['login']==$login && $user['password']==$password ){
                 return $user;
              }
         }
         return null;
   }

   function insert_user(array $user):void{
      $users=get_users();
      $users[]=$user;
      $content_json=json_encode( $users);
      file_put_contents(DATA_FILE_USER, $content_json);
   }

   function login_exist(string $login):bool{
    $users=get_users();
     foreach ($users as $key => $user) {
          if($user['login']==$login ){
             return true;
          }
     }
     return false;
}

  