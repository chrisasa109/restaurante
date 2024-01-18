<?php
class Conexion extends PDO
{
    private $SERVIDOR = 'localhost';
    private $USUARIO = 'root';
    private $PASSWORD = '';
    private $BD = 'restaurante';

    public function __construct()
    {
        $dsn = "mysql:host=$this->SERVIDOR;dbname=$this->BD;charset=utf8";
        parent::__construct($dsn, $this->USUARIO, $this->PASSWORD);
    }

    function inicioSesion($usuario, $password)
    {
        $usuario = strip_tags($usuario);
        $consulta = 'SELECT * FROM restaurante WHERE email=:usuario';
        $stmt = $this->prepare($consulta);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $datosUsuario = $stmt->fetch(PDO::FETCH_OBJ);
            if ($datosUsuario->clave == $password) {
                return $datosUsuario;
            }
        }
        //en caso de no dar solo un usuario devolver null el inicio de sesión
        return null;
    }

    function mostrarCategorias()
    {
        $consulta = "SELECT * FROM categoria";
        $stmt = $this->prepare($consulta);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
        return $resultado;
    }

    function mostrarProductos($categoria)
    {
        $consulta = "SELECT * FROM producto WHERE cod_categoria = :cod_categoria";
        $stmt = $this->prepare($consulta);
        $stmt->bindParam(':cod_categoria', $categoria);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
        return $resultado;
    }
    function obtenerProductosCarrito($arrayIdsProductos)
    {
        $stringId = implode(',', $arrayIdsProductos);
        $consulta = "SELECT * FROM producto WHERE cod_producto IN ($stringId)";
        $stmt = $this->prepare($consulta);
        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
        return $resultado;
    }
}