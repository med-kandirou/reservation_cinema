<?php
    
class Users extends Controller implements helpers {
    private $user;

    function __construct()
    {
        $this->user=$this->model('User');
    }

    public function getRandomToken($nom,$email)
    {
        $characters = $nom.'23431428745'.$email;
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function login()
    {
        $token=$_POST['token'];
        $feedback=$this->user->login($token);
        echo json_encode($feedback);
    }

    function register(){
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $token=$this->getRandomToken($nom,$email);
        $data=$this->user->register($token,$nom,$email);
        echo json_encode($data);
    }
} 