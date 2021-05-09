<?php 
    ob_start();
       require_once(PATH_VIEWS_INC."header.php"); 
       require_once(PATH_VIEWS_INC."menu.inc.php");
       $users=get_users();
 ?>
  
    <h3>Liste des Utilisateurs</h3>
    
       <div class="container mt-3">
         <table class="table table-bordered table-inverse table-responsive">
             <thead class="thead-inverse">
                 <tr>
                     <th>Nom et Prenom</th>
                     <th>Login</th>
                     <th>Role</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php foreach($users as $user): ?>
                     <tr>
                         <td scope="row"><?=$user['nom_complet']?></td>
                         <td><?=$user['login']?></td>
                         <td><?=$user['role']?></td>
                     </tr>
                <?php endforeach ?> 
                 </tbody>
         </table>
         
       </div>
    
<?php 
      $content_for_layout=ob_get_clean() ;
      require_once(PATH_VIEWS."layout.front.html.php"); 
 ?>
 