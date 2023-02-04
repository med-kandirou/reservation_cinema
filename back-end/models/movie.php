<?php
class movie extends database{

    function getmovies($date)
    {
        $sql = "SELECT f.`id_f`, f.`nom` as 'nom_film', f.`image`, f.`date_f`, s.nom as 'nom_salle' FROM `film` f inner join salle s on f.id_s=s.id_s and f.date_f=:date_f";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam('date_f',$date);
        if($stmt->execute()){
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data; 
        }        
    }

}