<?php
class movie extends database{

    function getmovies()
    {
        $sql = "SELECT `id_f`, f.`nom`, `image`, `date_f`, s.nom FROM `film` f inner join salle s on f.id_s=s.id_s";
        $stmt=$this->openConnection()->query($sql);
        $data=$stmt->fetchAll();
        return $data;  
    }
    
}