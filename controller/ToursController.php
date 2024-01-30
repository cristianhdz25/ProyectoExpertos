<?php
session_start();
class ToursController
{

    public function __construct()
    {
        $this->view = new View();
        require_once './model/ToursModel.php';
        $this->model = new ToursModel();
    } //construct

    public function mostrarTours()
    {
       
        $data['tours'] = $this->model->obtenerTours($_POST['nombre']);
        if ($data['tours'] != null) {
            $data['imgs'] = $this->model->obtenerImgTour($data['tours'][0]['id']);
            $this->model->incrementarContador($data['tours'][0]['id_tipo']);
        }
        $data['busqueda'] = $_POST['nombre'];
        $this->view->show("toursView.php", $data);
    }

    public function mostrarTour()
    {

        $tour = $this->model->obtenerTour($_POST['id']);
        $data =
            [
                'tour' => $tour,
                'imgs' => $this->model->obtenerImgsTours($tour[0]['id']),
                'busqueda' => $_POST['nombre']
            ];
    
        $this->model->incrementarContador($data['tour'][0]['id_tipo']);
        $this->view->show("tourInfoView.php", $data);
    }

    public function mostrarTourIndex()
    {

        $tour = $this->model->obtenerTour($_POST['id']);
        $data =
            [
                'tour' => $tour,
                'imgs' => $this->model->obtenerImgsTours($tour[0]['id'])
            ];
    
        $this->model->incrementarContador($data['tour'][0]['id_tipo']);
        $this->view->show("tourInfoIndexView.php", $data);
    }


}


?>