
  <?php
   use bbw_mvc\lib\Session;
   use bbw_mvc\lib\Role;
   
 ?>
<nav class="navbar navbar-expand-sm navbar-light bg-info mt-1">
    <a class="navbar-brand text-white" href="<?= WEBROOT.'bien/catalogue'?>">Gestion des Biens</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php WEBROOT.'bien/catalogue'?>">Accueil<span class="sr-only">(current)</span></a>
            </li>
          
           
            <?php if(Role::isAdmin()):?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?=WEBROOT.'security/showUser'?>">Utilisateurs</a>
                </li>
            <?php endif?>
            <?php if(Role::isAdmin()):?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bien</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item " href="<?=WEBROOT.'bien/addBien'?>"> Add</a>        
                        <a class="dropdown-item" href="<?=WEBROOT.'bien/listeBien'?>">Liste</a>
                </div>
            </li>
            <?php endif?>
            <?php if(Role::isAdmin()):?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?=WEBROOT.'reservation/reservation'?>">Reservations</a>
                </li>
            <?php endif?>
            <?php if(Role::isVisiteur()):?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= WEBROOT."reservation/showReservationClient/".Session::getSession("user_connect")["id"]?>">Mes Reservations</a>
                </li>
            <?php endif?>
           
        </ul>

        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?=WEBROOT.'security/register'?>">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parametrage</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                     <?php if(!Session::isConnect()):?>
                       <a class="dropdown-item " href="<?=WEBROOT.'security/login'?>">Connexion</a>
                     <?php endif?>
                     <?php
                  
                     if(Session::isConnect()):?>
                        <a class="dropdown-item" href="<?=WEBROOT.'security/logout'?>">Deconnexion</a>
                     <?php endif?>
                </div>
            </li>
            
        </ul>
        
    </div>
</nav>