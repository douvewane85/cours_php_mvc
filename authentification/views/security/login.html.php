 <?php

use bbw_mvc\lib\Session;

$arr_error=[]; 
      if(Session::keyExist("arr_error")){
            $arr_error=Session::getSession("arr_error");
            Session::removeKey("arr_error");
      }
       
 ?>
 
      <div class="container mt-5">
         <?php if(isset($arr_error['err_login'])):?>
           <div class="alert alert-danger mb-1 col-6 ml-5" role="alert">
               <strong><?=$arr_error['err_login']?></strong>
           </div>
        <?php endif ?>
          <form class ="ml-5" method="post" action="<?=WEBROOT.'security/login'?>">
            <input type="hidden" name="controller" value="security">
            <input type="hidden" name="action" value="reservation.visiteur">
            <input type="hidden" name="bien_id" value="<?= isset($_GET['bien_id'])?$_GET['bien_id']:""?>">

             <div class="form-group col-8">
                <label >Email </label>
                <input type="text" class="form-control"  placeholder="Enter email" name="login">
                   <?php if(isset($arr_error['login'])):?>
                      <small id="emailHelp" class="form-text text-danger"><?=$arr_error['login']?></small>
                   <?php endif  ?>
            </div>
            <div class="form-group col-8">
                <label >Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?php if(isset($arr_error['password'])):?>
                      <small id="emailHelp" class="form-text text-danger"><?=$arr_error['password']?></small>
                <?php endif  ?>
            </div>
            <div class="col-6 float-right">
                 <button type="submit" class="btn btn-primary " >Connexion</button>
            </div>
            
         </form>
      </div>
  
 