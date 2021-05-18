<?php
    use bbw_mvc\lib\Session;   
 ?>
     <!-- -----------------------------------------------------------CONTAINER -->
 <div class="container mt-2">
      <div class="row">
      <?php  foreach ($biens['data'] as $key => $bien):?>
            <div class="col-sm-4 mb-4">
                <div class="card" style="width: 22rem">
                    <img
                    class="card-img-top"
                    src="<?=!empty($bien['photo'])? WEBROOT."images/uploads/".$bien['photo']:'https://source.unsplash.com/1080x720/?product'?>"
                    alt="Annonce 1"
                    />
                    <div class="card-body">
                    <h5 class="card-title"> 
                    <?php 
                     if(!is_null($bien['tags'])):
                      $tags=json_decode($bien['tags'],true);
                      foreach ($tags as $key => $tag):?>
                        <a href="#" class="badge badge-success"> <?php echo $tag?></a>
                    <?php 
                      endforeach;
                      endif 
                    ?>
                    </h5>
                     <p class="card-text"><?=substr($bien['description'],0,150) ."...."?></p>
                    <hr />
                    <span class="float-left btn btn-sm btn-outline-danger disabled ml-2">4.000.000FCFA</span>
                    <a href="<?= $_SERVER["DOCUMENT_ROOT"].'index.php?controler=bien&page=edit.bien&id='.$bien['id']?>" class="btn btn-sm btn-outline-info ml-2 "><i class="fas fa-ellipsis-h">Detail</i></a>
                    <a href="<?=!Session::isConnect()?"index.php?controler=security&page=login&action=reservation.visiteur&bien_id=".$bien['id']:"index.php?controler=reservation&page=reservation.visiteur&action=reservation.visiteur&bien_id=".$bien['id'] ?>" class="btn btn-sm btn-outline-warning "
                        >Reserver</a
                    >
                   
                    </div>
                </div>
            </div>
      <?php endforeach ?>
      </div>

      <div class="row text-center">
        <div class="col-sm-4 offset-sm-4">
          <ul class="pagination pl-4">
              <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
              </li>
            </ul>
        </div>
      </div> 
    </div>

 