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

    function procesarPedido($restaurante, $carrito)
    {
        //Insertar datos en la tabla pedido
        $fecha = date("Y-m-d");
        $consulta = "INSERT INTO pedido(fecha, cod_restaurante) VALUES (:fecha, :restaurante)";
        $stmt = $this->prepare($consulta);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":restaurante", $restaurante);
        $stmt->execute();

        //Obtener el id del pedido para insertar datos en la tabla producto_pedido
        $idPedido = $this->lastInsertId();
        $consulta2 = "INSERT INTO producto_pedido(cod_pedido, cod_producto, cantidad) VALUES (:pedido, :producto, :cantidad)";
        $stmt2 = $this->prepare($consulta2);
        foreach ($carrito as $cod_producto => $unidades) {
            $stmt2->bindParam(":pedido",$idPedido);
            $stmt2->bindParam(":producto",$cod_producto);
            $stmt2->bindParam(":cantidad", $unidades);
            $stmt2->execute();
        }
    }
}