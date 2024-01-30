<?php

class ToursModel
{

    private $db;
    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    } //construct

    public function obtenerTours($nombre)
    {
        $consult = $this->db->prepare("CALL sp_obtener_tours('" . $nombre . "')");
        $consult->execute();
        $result = $consult->fetchAll();
        $consult->closeCursor();
        return $result;
    }

    public function obtenerTour($id)
    {
        $consult = $this->db->prepare("CALL sp_obtener_tour('" . $id . "')");
        $consult->execute();
        $result = $consult->fetchAll();
        $consult->closeCursor();
        return $result;
    }

    public function incrementarContador($id_tipo)
    {
        switch ($id_tipo) {
            case 1:
                $_SESSION['montana']++;
                break;
            case 2:
                $_SESSION['ciudad']++;
                break;
            case 3:
                $_SESSION['playa']++;
                break;
        }
    }

    public function obtenerImgsTours($tour){
        $consult = $this->db->prepare("CALL sp_obtener_imgs_tours(?)");
        $consult->bindParam(1, $tour);
        $consult->execute();
        $result = $consult->fetchAll();
        $consult->closeCursor();
        return $result;
    }

    public function obtenerImgTour($tour){
        $consult = $this->db->prepare("CALL sp_obtener_img(?)");
        $consult->bindParam(1, $tour);
        $consult->execute();
        $result = $consult->fetchAll();
        $consult->closeCursor();
        return $result;
    }

    

}

?>