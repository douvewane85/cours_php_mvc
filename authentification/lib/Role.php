<?php 
namespace bbw_mvc\lib;
class Role{

    public static function getRole():string{
        return  Session::getSession('user_connect')['role'];
    }
    public static function isAdmin():bool{
        return Session::isConnect() && Self::getRole()=="Admin";
   }
  
  public static function isVisiteur():bool{
      return Session::isConnect()  && Self::getRole()=="Visiteur";
  }
}