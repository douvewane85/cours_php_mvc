
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
                 <?php
                 foreach($users['data'] as $user): ?>
                     <tr>
                         <td scope="row"><?=$user['nom_complet']?></td>
                         <td><?=$user['login']?></td>
                         <td><?=$user['role']?></td>
                     </tr>
                <?php endforeach ?> 
                 </tbody>
         </table>
         
       </div>
    

 