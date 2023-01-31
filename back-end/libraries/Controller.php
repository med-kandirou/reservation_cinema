<?php

Class Controller {
    //load model 
    function model($model){
        require_once '../models/'.$model.'.php';
        return new $model;
    }
}

