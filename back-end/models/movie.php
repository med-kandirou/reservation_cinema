<?php
class movie extends database{

    function getmovies()
    {
        $sql = "SELECT film.`id_f`, film.`nom` as 'nom_film', film.`image`, film.`date_f`, salle.nom as 'nom_salle' FROM `film` inner join salle on film.id_s=salle.id_s;";
        $stmt=$this->openConnection()->query($sql);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;  
    }

    function filtreMovies($date)
    {
        $date=$_POST['date'];
        $sql = "SELECT f.`id_f`, f.`nom`, f.`image`, f.`date_f`, s.nom FROM `film` f inner join salle s on s.id_s=f.id_s and f.date_f=:date_f";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam('date_f',$date);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;  
    }
    
}