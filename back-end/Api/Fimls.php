<?php

class Films extends Controller{
    private $film;

    function __construct()
    {
        $this->film=$this->model('film');
    }

    function getFilms()
    {
        $data=$this->film->getFilms();
        echo json_encode($data);
    }

    function getfilmsbyid()
    {
        $id=$_POST['id_f'];
        $data=$this->film->getfilmsbyid($id);
        echo json_encode($data);
    }

} 