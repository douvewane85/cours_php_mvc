
       <div class="container mt-3 ">
         

         <div class="row">
            <?php  foreach ( $reservations['data'] as $key => $bien):?>
                    <div class="col-sm-4 mb-4">
                        <div class="card" style="width: 22rem">
                            <img
                            class="card-img-top"
                            src="https://source.unsplash.com/1080x720/?product"
                            alt="Annonce 1"
                            />
                            <div class="card-body">
                            <h5 class="card-title"> 
                            <?php 
                            
                            $tags=json_decode($bien['tags'],true);
                            foreach ($tags as $key => $tag):?>
                                <a href="#" class="badge badge-success"> <?php echo $tag?></a>
                            <?php endforeach ?>
                            </h5>
                            <p class="card-text"><?=substr($bien['description'],0,150) ."...."?></p>
                            <hr />
                              <div class="row">
                                 <span class="float-left btn btn-sm btn-outline-danger disabled ml-2">Reservé depuis <?= date_diff(date_create(),date_create($bien['create_at']))->format('%a Days') ?> </span>
                              </div>
                           
                            <a href="<?= WEBROOT.'index.php?controler=bien&page=edit.bien&id='.$bien['id']?>" class="btn btn-sm btn-outline-info ml-2 float-right "><i class="fas fa-ellipsis-h">Detail</i></a>
                            <a href="<?="index.php?controler=reservation&page=confirm.annulation&bien_id=".$bien['id'] ?>" class="btn btn-sm btn-outline-danger  float-right "
                                >Annuler</a
                            >
                        
                            </div>
                        </div>
                    </div>
            <?php endforeach ?>
      </div>
         
       </div>
    

 