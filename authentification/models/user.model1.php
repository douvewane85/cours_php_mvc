<?php 
   
  function get_users():array{
      if(!isset($_SESSION['users'])) {
        $users=[
            [
              "nom_complet"=>"Birane Baila Wane",
               "login"=> "douvewane85@gmail.com",
               "password"=> "passer",
               "role"=> "Admin"
            ],
            [
              "nom_complet"=>"Birane Baila Wane",
               "login"=> "douvewane86@gmail.com",
               "password"=> "passer",
               "role"=> "Visiteur"
            ],
           ];
         $_SESSION['users']=$users;
      }
      return $_SESSION['users'];
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
      $_SESSION['users']=$users; 
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

  