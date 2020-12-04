<?php

Class Detalle_Pedido{

  private $codigo;
  private $subtotal;
  private $cantidad;
  private $producto;
  private $pedido;

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

  //Get y Set de $subtotal
  public function getsubtotal()
  {
    return $this->subtotal;
  }

  public function setsubtotal($sub)
  {
    $this->subtotal=$sub;
  }

  //Get y Set de $cantidad
  public function getcantidad()
  {
    return $this->cantidad;
  }

  public function setcantidad($cant)
  {
    $this->cantidad=$cant;
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

  //Get y Set $pedido
  public function getpedido()
  {
    return $this->pedido;
  }

  public function setpedido($ped)
  {
    $this->pedido=$ped;
  }


  //Registrar
  public function RegistrarDetalle_Pedido()
  {

  $objetoBD = new Conexion();
  $objetoBD->conectar();
  $mysqli = $objetoBD->cadenaconexion();

  $consulta = "CALL RegistrarDetalle_Pedido($this->subtotal,$this->cantidad,$this->producto,$this->pedido)";

  $resultado = $mysqli->query($consulta);
  $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

  if($resultado)
  {
    return "correcto";
  }
  else {
    return "incorrecto".$error;
  }

}

  //Consultar
  public function ConsultarDetalle_Pedido()
  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli = $objetoBD->cadenaconexion();

      $consulta = "SELECT dep_id, ped_id, dep_subtotal, dep_cantidad, pro_nombre FROM detalle_pedido, productos WHERE
      productos.pro_id=detalle_pedido.pro_id and ped_id=$this->pedido";
      $resultado = $mysqli->query($consulta);
      return $resultado;
  }

//Consultar productos
public function ConsultarProductos()
{
$objetoBD = new Conexion();
$objetoBD->conectar();
$mysqli = $objetoBD->cadenaconexion();

$consulta = "SELECT * FROM productos";
$resultado = $mysqli->query($consulta);
return $resultado;
}


//Eliminar
public function EliminarDetallePedido($codigo)
{
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "DELETE FROM detalle_pedido WHERE dep_id=".$codigo;
    $resultado = $mysqli->query($consulta);
    $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

    if ($resultado) {
        return "correcto";
    } else {
        return "incorrecto".$error;
    }
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

}

?>
