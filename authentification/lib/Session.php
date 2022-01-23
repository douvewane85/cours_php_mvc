<?php 
namespace bbw_mvc\lib;
class Session{

  public static function  start()
  {
     if(session_status()==PHP_SESSION_NONE){
         session_start();
      }
  }
  public static function keyExist($key):bool{
        return isset($_SESSION[$key]);
  }

  public static function removeKey($key):void{
        unset($_SESSION[$key]);
  }
   public static function setSession($key,$data){
       $_SESSION[$key]=$data;
   }
   public static function getSession($key){
       return  $_SESSION[$key];
   }
 
   
  public static function  isConnect():bool{
        return isset($_SESSION['user_connect']);
  }
  
  public static function logout(){
    
      if( self::isConnect()){
          unset($_SESSION['user_connect']);
          session_destroy();
      }
  }
}
    