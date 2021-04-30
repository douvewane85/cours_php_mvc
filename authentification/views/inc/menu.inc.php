
<nav class="navbar navbar-expand-sm navbar-light bg-info mt-1">
    <a class="navbar-brand text-white" href="<?=WEBROOT.'index.php?page=accueil.visiteur'?>">Athentification</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php if(is_connect()):?>
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo is_admin()? WEBROOT.'index.php?page=accueil.admin': WEBROOT.'index.php?page=accueil.visiteur'?>">Accueil<span class="sr-only">(current)</span></a>
            </li>
          <?php endif?>
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?=WEBROOT.'index.php?page=register'?>">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <?php if(is_admin()):?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?=WEBROOT.'index.php?page=show.user'?>">Utilisateurs</a>
                </li>
            <?php endif?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parametrage</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                     <?php if(!is_connect()):?>
                       <a class="dropdown-item " href="<?=WEBROOT.'index.php?page=login'?>">Connexion</a>
                     <?php endif?>
                     <?php if(is_connect()):?>
                        <a class="dropdown-item" href="<?=WEBROOT.'index.php?page=logout'?>">Deconnexion</a>
                     <?php endif?>
                </div>
            </li>
        </ul>
        
    </div>
</nav>