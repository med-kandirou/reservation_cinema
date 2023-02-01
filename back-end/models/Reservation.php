<?php
class Reservation extends database{

    function placeReservedByFilm($id_f)
    {
        $sql = "SELECT `num_place`,`token` FROM `reservation` where id_f=:id_f";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':id_f',$id_f);
        if($stmt->execute()){
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
         
    }
}