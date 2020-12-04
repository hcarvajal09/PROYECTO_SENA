<?php

Class Productos
{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad_existente;

    //Conexion a la BD
    public function __construct()
    {
        include('../Controlador/conexion.php');
    }


    //Get y Set de $codigo
    public function getcodigo()
    {
        return $this->codigo;
    }

    public function setcodigo($cod)
    {
        $this->codigo=$cod;
    }

    //Get y Set de $nombre
    public function getnombre()
    {
        return $this->nombre;
    }

    public function setnombre($nom)
    {
        $this->nombre=$nom;
    }

    //Get y Set de $descripcion
    public function getdescripcion()
    {
        return $this->descripcion;
    }

    public function setdescripcion($des)
    {
        $this->descripcion=$des;
    }

    //Get y Set de $precio
    public function getprecio()
    {
        return $this->precio;
    }

    public function setprecio($pre)
    {
        $this->precio=$pre;
    }

    //Get y Set de $cantidad existente
    public function getcantidad_existente()
    {
        return $this->cantidad_existente;
    }

    public function setcantidad_existente($cant)
    {
        $this->cantidad_existente=$cant;
    }



    //Registrar
    public function RegistrarProducto()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Registrar_Productos('$this->nombre','$this->descripcion',
        $this->precio,$this->cantidad_existente)";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }



    //Modificar
    public function ModificarProducto()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Modificar_Productos('$this->codigo','$this->nombre','$this->descripcion',
        '$this->precio','$this->cantidad_existente')";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }



    //Consultar
    public function ConsultarProductos()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM productos";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }

    //Consultar Pedidos de hoy
    public function ReportesHoy()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();
        $consulta = "SELECT COUNT(rep_id) AS Reportes from reporte where rep_fecha=CURDATE()";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }



    //Consultar codigo Producto
    public function ConsultarCodigoProducto($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM productos WHERE pro_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }



    //Eliminar
    public function EliminarProducto($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM productos WHERE pro_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }
}

?>
