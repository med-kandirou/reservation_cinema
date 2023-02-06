<?php



use Firebase\JWT\JWT;

class Users extends Controller implements helpers {
    private $user;

    function __construct()
    {
        $this->user=$this->model('User');
    }

    public function getToken($data)
    {
        $key='vDoWNVvoLBuil_L6v3vWDm4AwQz86v1vdU9wukQanGT8yYudqDPPeKJwFaXL-Nie';
        $jwt=JWT::encode($data,$key,'HS256');
        return $jwt;
    }

    function login()
    {
        $token=$_POST['token'];
        $feedback=$this->user->login($token);
        echo json_encode($feedback);
    }

    function register(){
        $data=[
            'nom'=>$_POST['nom'],
            'email'=>$_POST['email']
        ];
        $token=$this->getToken($data);
        $data=$this->user->register($token,$data['nom'],$data['email']);
        echo json_encode($data);
    }
} 