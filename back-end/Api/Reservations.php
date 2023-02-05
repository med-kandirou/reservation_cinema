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


    function mesreservations()
    {
        $token=$_POST['token'];
        $data=$this->Reservation->mesreservations($token);
        echo json_encode($data);
    }


    function delete_res()
    {
        if($_SERVER["REQUEST_METHOD"] =="POST"){
            // $data=json_decode(file_get_contents("php://input"));
            // var_dump($data);

            if($this->Reservation->delete_res($_POST['id_res'])){
                echo json_encode(['etat'=>'deleted']);
            }
        }
    }
    

} 