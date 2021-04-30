<?php 
     $arr_error=[]; 
     if(isset($_SESSION['arr_error'])){
           $arr_error=$_SESSION['arr_error'];
           unset($_SESSION['arr_error']);
     }
       require_once(PATH_VIEWS_INC."header.php"); 
       require_once(PATH_VIEWS_INC."menu.inc.php");; 
 ?>
 
      <div class="container mt-5">
          <form class ="ml-5" method="post" action="<?=WEBROOT.'index.php'?>">
          <div class="form-group col-8">
                <label >Email </label>
                <input type="text" class="form-control"  placeholder="Enter email" name="nom_complet">
                   <?php if(isset($arr_error['nom_complet'])):?>
                      <small id="emailHelp" class="form-text text-danger"><?=$arr_error['nom_complet']?></small>
                   <?php endif  ?>
            </div>
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

            <div class="form-group col-8">
            <label for="">Role</label>
                <select class="form-control" name="role" id="">
                    <option value=""></option>
                    <option value="Admin">Admin</option>
                    <option value="Visiteur">Visiteur</option>
                </select>
                <?php if(isset($arr_error['role'])):?>
                      <small id="emailHelp" class="form-text text-danger"><?=$arr_error['role']?></small>
                <?php endif  ?>
            </div>
            <div class="col-6 float-right">
                 <button type="submit" class="btn btn-primary " name="btn_submit" value="btn_register">Inscription</button>
            </div>
            
         </form>
      </div>
     
 <?php 
      require_once(PATH_VIEWS_INC."footer.php"); 
 ?>

<div class="form-group col-8">
              
           