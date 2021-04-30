 <?php
      $arr_error=[]; 
      if(isset($_SESSION['arr_error'])){
            $arr_error=$_SESSION['arr_error'];
            unset($_SESSION['arr_error']);
      }
       require_once(PATH_VIEWS_INC."header.php"); 
       require_once(PATH_VIEWS_INC."menu.inc.php"); 
 ?>
 
      <div class="container mt-5">
         <?php if(isset($arr_error['err_login'])):?>
           <div class="alert alert-danger mb-1 col-6 ml-5" role="alert">
               <strong><?=$arr_error['err_login']?></strong>
           </div>
        <?php endif ?>
          <form class ="ml-5" method="post" action="<?=WEBROOT.'index.php'?>">
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
                 <button type="submit" class="btn btn-primary " name="btn_submit" value="btn_login">Connexion</button>
            </div>
            
         </form>
      </div>
 <?php 
          require_once(PATH_VIEWS_INC."footer.php"); 
 ?>