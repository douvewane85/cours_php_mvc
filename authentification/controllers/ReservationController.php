<?php
namespace bbw_mvc\controllers;

use bbw_mvc\lib\AbstractController;
use bbw_mvc\lib\Helpers;
use bbw_mvc\lib\Request;
use bbw_mvc\lib\Role;
use bbw_mvc\lib\Session;
use bbw_mvc\models\ReservationModel;

class ReservationController extends AbstractController{

    private ReservationModel $model;
    function __construct()
    {
          parent::__construct();
          $this->model=new ReservationModel;
    }

    public function reservation(){
        if(!Role::isAdmin())  $this->render("erreur/_403");
        $data= $this->model->findAll();
        $this->render("reservation/show.reservation",[
            "reservations"=>$data
        ]);
    }
    //

    public function showReservationClient(Request $request){
        if(!Role::isAdmin())  $this->render("erreur/_403");
        $data= $request->getQueryParam(); 
        if(!isset($data[0]) || !is_numeric($data[0]))  $this->redirectUrl("reservation/reservation");
        $data= $this->model->findReservationsUnClient((int)$data[0]);
          $this->render("reservation/show.reservation.client",[
            "reservations"=>$data
        ]);
    }

    public function showReservationBien(Request $request){
        if(!Role::isAdmin())  $this->render("erreur/_403");
        $data= $request->getQueryParam(); 
        if(!isset($data[0]) || !is_numeric($data[0]))  $this->redirectUrl("reservation/reservation");
        $data= $this->model->findReservationsUnBien((int)$data[0]);
          $this->render("reservation/show.reservation.bien",[
            "reservations"=>$data
        ]);
    }

    public function editReservation(Request $request){
        if(!Role::isAdmin())  $this->render("erreur/_403");
        $data= $request->getQueryParam(); 
        if(!isset($data[0]) || !is_numeric($data[0]))  $this->redirectUrl("reservation/reservation");
        $data= $this->model->findById((int)$data[0]);
          $this->render("reservation/edit.reservation",[
            "reservation"=>$data
        ]);
    }

    public function showReservationByFiltre(Request $request){
        if(!Role::isAdmin())  $this->render("erreur/_403");
        if($request->isPost()){
            $data= $request->getBody();
            $data= $this->model->findReservationsByFiltre($data);
            $this->render("reservation/show.reservation",[
                "reservations"=>$data
            ]);
            exit();
        }
        $this->redirectUrl("reservation/reservation");
        
    }

}