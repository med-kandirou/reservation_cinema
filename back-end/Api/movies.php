<?php

class Movies extends Controller{
    private $movie;

    function __construct()
    {
        $this->movie=$this->model('Movie');
    }

    function getmovies()
    {
        $data=$this->movie->getmovies();
        echo json_encode($data);
    }

    function getfilmsbyid()
    {
        $id=$_POST['id_f'];
        $data=$this->movie->getfilmsbyid($id);
        echo json_encode($data);
    }

} 