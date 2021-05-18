
 
 <div class="container mt-3 ">
 <form class ="" method="post" action="<?=WEBROOT.'reservation/showReservationByFiltre'?>">
             <div class="row">
                 <div class="col-sm-3 offset-sm-1">
                     <div class="form-group form-inline">
                        <label for="" class="mr-4">Type :</label>
                        <select class="form-control" name="etat" id="">
                           <option>Encours</option>
                           <option>Annuler</option>
                           <option>Valider</option>
                        </select>
                     </div>
                 </div>
                 <div class="col-sm-3 ">
                  <div class="form-group form-inline">
                           <label for="" class="mr-4">Client :</label>
                           <select class="form-control" name="client_id" id="">
                           <option value=""></option>
                           <?php foreach( $reservations['data'] as $reservation): ?>
                              <option value="<?=$reservation['client_id']?>"><?=$reservation['nom_complet']?></option>
                            <?php endforeach ?> 
                           </select>
                        </div>
                  </div>
                 <div class="col-sm-3 ">
                    <div class="form-group form-inline">
                        <label for="" class="mr-4">Bien :</label>
                        <select class="form-control" name="bien_id" id="">
                        <option value=""></option>
                          <?php foreach( $reservations['data'] as $bien): ?>
                           <option value="<?=$reservation['bien_id']?>"><?=sprintf("%s %s ",$reservation['ref'],$reservation['type'])?></option>
                            <?php endforeach ?>
                        </select>
                     </div>
                 </div>

                 <div class="col-sm-2 ">  
                     <button type="submit" class="btn btn-primary">Rechercher</button>
                 </div>
             </div>
              
          </form>
          <h3 class="my-4">Liste des Reservations</h3>
         <table class="table table-bordered   w-100">
             <thead class="thead-inverse">
                 <tr>
                     <th class="w-15">Client</th>
                     <th class="w-25">Bien </th>
                     <th class="w-25">Date Reservation</th>
                     <th class="w-10">Etat</th>
                     <th class="w-25">Actions</th>
                 </tr>
                 </thead>
                 
                 <tbody>
                 <?php foreach( $reservations['data'] as $bien): ?>
                     <tr>
                         <td class="w-15"><a href="<?= WEBROOT."reservation/showReservationClient/".$bien['client_id']?>" class="nav-link text-dark text-capitalize font-weight-bold"><?=$bien['nom_complet']?></a></td>
                         <td class="w-25"><a href="<?= WEBROOT."reservation/showReservationBien/".$bien['bien_id']?>" class="nav-link text-dark text-capitalize font-weight-bold"><?=sprintf("%s %s ",$bien['ref'],$bien['type'])?></a></td>
                         <td class="w-25"><?=date_format(date_create($bien['create_at']),"d-m-Y")?></td>
                         <td class="w-10"><a href="#" class="badge badge-warning"><?=$bien['etat']?></a></td>
                         <td>
                             <a  href="<?= WEBROOT."reservation/editReservation/".$bien['reservation_id']?>" class="btn btn-success  mr-2" ><i class="fa fa-list">  </i></a>
                             <button class="btn btn-warning  mr-2" ><i class="fa fa-edit">  </i></button>
                             <button class="btn btn-danger mr-2" > <i class="fa fa-trash"></i></button>
                         </td>
                     </tr>
                <?php endforeach ?> 
                 </tbody>
         </table>
         
       </div>
   
 