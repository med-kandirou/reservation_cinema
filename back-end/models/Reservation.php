<?php
class Reservation extends database{

    function placeReservedByFilm($id_f)
    {
        $sql = "SELECT `num_place` FROM `reservation` where id_f=:id_f";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':id_f',$id_f);
        if($stmt->execute()){
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function reserver($token,$id_f,$num_place)
    {
        $sql = "INSERT INTO `reservation`(`id_f`, `num_place`, `token`) VALUES (:id_f,:num_place,:token)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id_f', $id_f);
        $stmt->bindParam(':num_place', $num_place);
        if($stmt->execute()){
            return true;
        }
    }

    function getplacesVides($id_f)
    {
        $sql = "SELECT count(`num_place`) as 'nbr_place' FROM `reservation` where id_f=:id_f";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':id_f',$id_f);
        if($stmt->execute()){
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function mesreservations($token)
    {
        $sql = "SELECT `id_res`, `date_res`, `id_f`, `num_place` FROM `reservation` where token=:token";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':token',$token);
        if($stmt->execute()){
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}