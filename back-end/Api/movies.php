<?php

class Movies extends Controller{
    private $movie;

    function __construct()
    {
        $this->movie=$this->model('Movie');
    }

    function getmovies()
    {
        $date=$_POST['date'];
        $data=$this->movie->getmovies($date);
        echo json_encode($data);
    }

} 