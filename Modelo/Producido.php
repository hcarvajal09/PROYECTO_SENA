<?php

Class Producido{

    private $codigo;
    private $cantidad_producida;
    private $producto;
    private $produccion;

    //Conexion a la BD
    public function __construct()
    {
        include('../Controlador/conexion.php');
    }


    //Get y Set de $codigo;
    public function getcodigo()
    {
        return $this->codigo;
    }

    public function setcodigo($cod)
    {
        $this->codigo=$cod;
    }


    //Get y Set de $cantidad producida
    public function getcantidad_producida()
    {
        return $this->cantidad_producida;
    }

    public function setcantidad_producida($cant)
    {
        $this->cantidad_producida=$cant;
    }


    //Get y Set de $producto
    public function getproducto()
    {
        return $this->producto;
    }

    public function setproducto($pro)
    {
        $this->producto=$pro;
    }


    //Get y Set de $produccion
    public function getproduccion()
    {
        return $this->produccion;
    }

    public function setproduccion($prod)
    {
        $this->produccion=$prod;
    }



    //Registrar
    public function RegistrarProducido()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Registrar_Producido($this->cantidad_producida,
          (SELECT pro_id FROM productos WHERE pro_descripcion='$this->producto'),$this->produccion)";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if($resultado)
        {
            return "correcto";
        }
        else
        {
            return "incorrecto".$error;
        }
    }

    //Modificar
    public function ModificarProducido()

    {
    	$objetoBD= new Conexion();
        $objetoBD->conectar();
        $mysqli=$objetoBD->cadenaconexion();

        $consulta="CALL Modificar_Producido($this->codigo,'$this->cantidad_producida',(SELECT pro_id FROM productos WHERE pro_descripcion='$this->producto'),$this->produccion)";
        $resultado=$mysqli->query($consulta);
        $error= mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if($resultado)
        {
            return "correcto";
        }else
        {
            return"incorrecto".$error;
        }


    }



    //Consultar
    public function ConsultarProducido()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT produ_id , produ_cantidad_producida, pro_descripcion FROM productos, producido
        WHERE productos.pro_id=producido.pro_id";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar codigo producido
    public function ConsultarDatosProducido($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM producido WHERE produ_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }


    //Consultar productos
    public function ConsultarProductos()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT pro_descripcion FROM productos";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Codigo Detalle Producido
    public function CodigoProducido()

  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli=$objetoBD->cadenaConexion();

      $consulta="SELECT max(produ_id) as maximo FROM producido ";
      $resultado=$mysqli->query($consulta);

      $maximo="";
      while($fila=mysqli_fetch_object($resultado)){

          $maximo=$fila->maximo;


          }
      return $maximo+1;

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


    //Eliminar
    public function EliminarProducido($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM producido WHERE produ_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if($resultado)
        {
            return "correcto";
        }
        else
        {
            return "incorrecto".$error;
        }
    }
}


?>
