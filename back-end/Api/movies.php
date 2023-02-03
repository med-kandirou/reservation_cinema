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

    function filtreMovies()
    {
        $date=$_POST['date'];
        $data=$this->movie->filtreMovies($date);
        echo json_encode($data);
    }


} 