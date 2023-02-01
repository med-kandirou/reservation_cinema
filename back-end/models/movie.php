<?php
class movie extends database{

    function getmovies()
    {
        $sql = "SELECT film.`id_f`, film.`nom` as 'nom_film', film.`image`, film.`date_f`, salle.nom as 'nom_salle' FROM `film` inner join salle on film.id_s=salle.id_s;";
        $stmt=$this->openConnection()->query($sql);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;  
    }
    
}