<?php 
function redirect_url($controller="security",$page="login",$action=""){
    header("location:".WEBROOT."index.php?controler=$controller&page=$page&action=$action");
    exit();
}