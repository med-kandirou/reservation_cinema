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

} 