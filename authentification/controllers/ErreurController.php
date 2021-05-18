<?php
namespace bbw_mvc\controllers;

use bbw_mvc\lib\AbstractController;
use bbw_mvc\lib\Request;
use bbw_mvc\models\UserModel;

class ErreurController extends AbstractController{

    function __construct()
    {
          parent::__construct();
    }

    /**
     * Erreur Page Enexistante
     *
     * @return void
     */
    public function pageNotFound(){
        http_response_code(404);
        $this->render("erreur\_404");
    }

    public function pageForbidden(){
        http_response_code(403);
        $this->render("erreur\_403");
    }
}