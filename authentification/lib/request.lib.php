<?php 
function redirect_url($page="login"){
    header("location:".WEBROOT."index.php?page=$page");
    exit();
}