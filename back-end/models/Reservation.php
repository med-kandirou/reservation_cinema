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
        $sql = "SELECT r.`id_res`, r.`date_res`, f.nom as 'nom_film',f.image ,s.nom as 'salle', r.`num_place` , r.`token` FROM `reservation` r inner join film f on f.id_f=r.id_f inner join salle s on s.id_s=f.id_s where r.token=:token";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':token',$token);
        if($stmt->execute()){
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    

    function delete_res($id_res)
    {
        $sql = "DELETE FROM `reservation` WHERE `id_res`=:id_res";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':id_res',$id_res);
        if($stmt->execute()){
            return true;
        }
    }
}