<?php
session_start();
class IndexController
{

    public function __construct()
    {
        $this->view = new View();
    } // constructor

    public function mostrar()
    {
        $this->view->show("loginView.php", null);
    } // mostrar

    public function iniciarSesion()
    {

        require_once 'model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $resultado = $usuarioModel->iniciarSesion($_POST['nombreusuario'], $_POST['contrasenia']);
        if ($resultado == 1) {
            $_SESSION['nombreusuario'] = $_POST['nombreusuario'];
            $preferencias = $usuarioModel->obtenerPreferencia($_POST['nombreusuario']);
            $_SESSION['categoria'] = $preferencias['id_tipo'];
            $_SESSION['subcategoria'] = $preferencias['id_subtipo'];
            $_SESSION['tipos'] = $usuarioModel->obtenerTipos();
            $_SESSION['subtipos'] = $usuarioModel->obtenerSubtipos();
            $contadores = $usuarioModel->obtenerContadorRecomendaciones($_SESSION['nombreusuario']);
            $_SESSION['montana'] = $contadores[0]['contador'];
            $_SESSION['ciudad'] = $contadores[1]['contador'];
            $_SESSION['playa'] = $contadores[2]['contador'];
            $_SESSION['tipoRecomendado'] = $usuarioModel->contadorMayor($_SESSION['montana'], $_SESSION['ciudad'], $_SESSION['playa']);
            $data['recomendaciones'] = $usuarioModel->obtenerRecomendaciones($preferencias['id_tipo'], $preferencias['id_subtipo'], $_SESSION['tipoRecomendado']);
            $this->view->show("indexView.php", $data);
        } else if ($resultado == null) {
            $data = [
                'mensaje' => "Usuario o contraseña incorrectos"
            ];
            $this->view->show("loginView.php", $data);
        }

    }

    public function actualizarPreferencias()
    {
        require_once 'model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $usuarioModel->actualizarPreferencias($_SESSION['nombreusuario'], $_POST['categoria'], $_POST['subcategoria']);
        $_SESSION['categoria'] = $_POST['categoria'];
        $_SESSION['subcategoria'] = $_POST['subcategoria'];
        echo json_encode("Preferencias actualizadas");
    }

    public function cerrarSesion()
    {
        require_once 'model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $id = $usuarioModel->obtenerUsuarioId($_SESSION['nombreusuario'])['id'];
        $usuarioModel->actualizarContadores($id, $_SESSION['montana'], $_SESSION['ciudad'], $_SESSION['playa']);
        session_destroy();
        $this->view->show("loginView.php", null);
    }

    public function mostrarIndex()
    {
        require_once 'model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $preferencias = $usuarioModel->obtenerPreferencia($_SESSION['nombreusuario']);
        $_SESSION['tipoRecomendado'] = $usuarioModel->contadorMayor($_SESSION['montana'], $_SESSION['ciudad'], $_SESSION['playa']);
        $data['recomendaciones'] = $usuarioModel->obtenerRecomendaciones($preferencias['id_tipo'], $preferencias['id_subtipo'], $_SESSION['tipoRecomendado'] );
        $this->view->show("indexView.php", $data);
    } // mostrar

    public function registrarse()
    {
        $this->view->show("registroView.php", null);
    }

    public function registrarUsuario()
    {
        require_once 'model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $usuarioModel->registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['nombreusuario'], $_POST['contrasenia']);
        $data = [
            'registro' => "Usuario registrado"
        ];
        $this->view->show("loginView.php", $data);
    }



} // fin clase

?>