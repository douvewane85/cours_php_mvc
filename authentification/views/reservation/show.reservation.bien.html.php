
       <div class="container mt-3 ">
         

         <div class="row">
            <?php  foreach ( $reservations['data'] as $key => $bien):?>
              <div class="col-sm-3">
                    <div class="card text-center" >
                          <img style="width: 8em; height:8em;" class="card-img-top rounded-circle align-self-center" src="https://api.randomuser.me/portraits/men/30.jpg" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title"><?=$bien['nom_complet']?></h5>
                                <p class="card-text">
                                   <button class="btn">
                                            <span class="badge badge-primary display-4">  <?=$bien['login']?></span>
                                   </button>
                                   
                                </p>
                                <a href="<?="index.php?controler=reservation&page=confirm.annulation&bien_id=".$bien['id'] ?>" class="btn btn-sm btn-outline-success  float-right "
                                >Valider</a
                               >
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action bg-primary text-white"><i class="fas fa-mobile-alt mr-2"></i>77181 88 77</a>
                                <span class="list-group-item list-group-item-action">
                                    <a href="#"><i class="fab fa-facebook-square fa-2x text-primary mr-1"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp fa-2x text-success mr-1"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-2x text-primary mr-1"></i></a>
                                    <a href="#"><i class="fab fa-instagram fa-2x text-warning mr-1"></i></a>
                                    <a href="#"><i class="fab fa-youtube fa-2x text-danger"></i></a>
                                </span>
                            </div>
                    </div>
               </div>     
            <?php endforeach ?>
      </div>
         
       </div>
    
