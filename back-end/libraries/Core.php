<?php

Class core {
    protected $currentApi="";
    protected $currentMethode="";
    protected $params=[];

    function __construct()
    {
        //get url 
        $url=$this->getUrl();
        if(isset($url)){
            //get controller
            if(file_exists('../Api/'.ucwords($url[0]).'.php')){
                $this->currentApi=ucwords($url[0]);
                unset($url[0]);
            }
        }
        
        //require and initialize object

        require_once '../Api/'.$this->currentApi.'.php';
        $this->currentApi = new $this->currentApi;

        //check if url has a method
        if(isset($url[1])){
            if(method_exists($this->currentApi,$url[1])){
                $this->currentMethode=$url[1];
                unset($url[1]);
            }
        }

        $this->params=$url ? array_values($url) : [];
        call_user_func_array([$this->currentApi,$this->currentMethode],$this->params);
    }   
    function getUrl(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode('/',$url);
            return $url;
        }
    }

    
}
require_once '../includes.php';
new core();
