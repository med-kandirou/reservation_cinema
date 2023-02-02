<?php

class Reservations extends Controller{
    private $Reservation;

    function __construct()
    {
        $this->Reservation=$this->model('Reservation');
    }

    function placeReservedByFilm()
    {
        $id_f=$_POST['id_f'];
        $data=$this->Reservation->placeReservedByFilm($id_f);
        echo json_encode($data);
    }

    function reserver()
    {
        $token=$_POST['token'];
        $id_f=$_POST['id_f'];
        $num_place=$_POST['num_place'];
        if($this->Reservation->reserver($token,$id_f,$num_place)){
            echo json_encode(["etat"=>"reserver"]);
        }
    }


    function getplacesVides()
    {
        $id_f=$_POST['id_f'];
        $nombre=$this->Reservation->getplacesVides($id_f);
        echo json_encode($nombre);
    }

    

} 