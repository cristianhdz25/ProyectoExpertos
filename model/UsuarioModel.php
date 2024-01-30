<?php


class UsuarioModel
{

    private $db;

    public function __construct()
    {
        require_once 'libs/SPDO.php';
        $this->db = SPDO::getInstance();
    } //construct

    public function iniciarSesion($nombreusuario, $contrasenia)
    {
        $consult = $this->db->prepare("CALL sp_buscar_usuario(?,?)");
        $consult->bindParam(1, $nombreusuario);
        $consult->bindParam(2, $contrasenia);
        $consult->execute();
        $resultado = $consult->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return 1;
        } else {
            return 0; // Contraseña incorrecta o usuario no encontrado
        }
    }

    public function obtenerPreferencia($nombreusuario)
    {
        $consult = $this->db->prepare("CALL sp_obtener_preferencia(?)");
        $consult->bindParam(1, $nombreusuario);
        $consult->execute();
        $resultado = $consult->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerTipos()
    {
        $consult = $this->db->prepare("CALL sp_obtener_tipos()");
        $consult->execute();
        $resultado = $consult->fetchAll();
        return $resultado;
    }

    public function obtenerSubtipos()
    {
        $consult = $this->db->prepare("CALL sp_obtener_subtipos()");
        $consult->execute();
        $resultado = $consult->fetchAll();
        return $resultado;
    }

    public function obtenerUsuarioId($nombreusuario)
    {
        $consult = $this->db->prepare("CALL sp_obtener_id_usuario(?)");
        $consult->bindParam(1, $nombreusuario);
        $consult->execute();
        $resultado = $consult->fetch(PDO::FETCH_ASSOC);
        return $resultado;

    }

    public function actualizarPreferencias($nombreusuario, $categoria, $subcategoria)
    {
        $consult = $this->db->prepare("CALL sp_actualizar_preferencia(?,?,?)");
        $consult->bindParam(1, $nombreusuario);
        $consult->bindParam(2, $categoria);
        $consult->bindParam(3, $subcategoria);
        $consult->execute();
    }

    public function registrarUsuario($nombre, $apellido, $correo, $nombreusuario, $contrasenia, )
    {
        $consult = $this->db->prepare("CALL sp_registrar_usuario(?,?,?,?,?)");
        $consult->bindParam(1, $nombre);
        $consult->bindParam(2, $apellido);
        $consult->bindParam(3, $correo);
        $consult->bindParam(4, $nombreusuario);
        $consult->bindParam(5, $contrasenia);
        $consult->execute();
    }

    public function obtenerRecomendaciones($tipo, $subtipo, $tipoRecomendado)
    {
        if ($tipo == 0 && $subtipo == 0 && $tipoRecomendado != 0) {
            $consulta = $this->db->prepare("CALL sp_obtener_tours_preferencias_tipo(?)");
            $consulta->bindParam(1, $tipoRecomendado);
        } elseif ($subtipo == 0 && $tipo != 0) {
            $consulta = $this->db->prepare("CALL sp_obtener_tours_preferencias_tipo(?)");
            $consulta->bindParam(1, $tipo);
        } elseif ($tipo == 0 && $subtipo != 0) {
            $consulta = $this->db->prepare("CALL sp_obtener_preferencias_subtipo(?)");
            $consulta->bindParam(1, $subtipo);
        } elseif ($tipo != 0 && $subtipo != 0) {
            $consulta = $this->db->prepare("CALL sp_obtener_tours_preferencias(?,?)");
            $consulta->bindParam(1, $tipo);
            $consulta->bindParam(2, $subtipo);
        } else {
            return null;
        }
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
        
    }

    public function obtenerContadorRecomendaciones($nombreusuario)
    {
        $consult = $this->db->prepare("CALL sp_obtener_contadores_recomendaciones(?)");
        $consult->bindParam(1, $nombreusuario);
        $consult->execute();
        $resultado = $consult->fetchAll();
        return $resultado;
    }

    public function actualizarContadores($id_usuario, $montana, $ciudad, $playa)
    {
        $consult = $this->db->prepare("CALL sp_actualizar_contadores_recomendaciones(?,?,?,?)");
        $consult->bindParam(1, $id_usuario);
        $consult->bindParam(2, $montana);
        $consult->bindParam(3, $ciudad);
        $consult->bindParam(4, $playa);
        $consult->execute();

    }

    public function contadorMayor($montana, $ciudad, $playa)
    {
        if ($montana > $ciudad && $montana > $playa) {
            return 1;
        } else if ($ciudad > $montana && $ciudad > $playa) {
            return 2;
        } else if ($playa > $montana && $playa > $ciudad) {
            return 3;
        } else {
            return 0;
        }
    }
}


?>