<?php
class User extends database{

    function register($token,$nom,$email){
        $sql = "INSERT INTO `user`(`token`, `nom`, `email`, `role`) VALUES (:token,:nom,:email,:role)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $role=1;
        $stmt->bindParam(':role', $role);
        if($stmt->execute()){
            return $token;
        }
    }

    function login($token){
        $feedback=[
            'isTrue'=>false
        ];
        $sql = "SELECT token ,`nom`, `email`, `role` FROM `user` WHERE `token`=:token";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch();
            $feedback=[
                'isTrue'=>true,
                'token'=>$res['token'],
                'nom'=>$res['nom'],
                'email'=>$res['email'],
                'role'=>$res['role'],
            ];
            return $feedback;
        }
        else{
            return $feedback;
        }
    }
    
}