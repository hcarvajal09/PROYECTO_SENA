<?php

Class Produccion{

    private $codigo;
    private $fecha;
    private $empleado;


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


    //Get y Set de $fecha
    public function getfecha()
    {
        return $this->fecha;
    }

    public function setfecha($fec)
    {
        $this->fecha=$fec;
    }


    //Get y Set de $empleado
    public function getempleado()
    {
        return $this->empleado;
    }

    public function setempleado($emp)
    {
        $this->empleado=$emp;
    }


    //Registrar
    public function RegistrarProduccion()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Registrar_Produccion($this->codigo,'$this->fecha',$this->empleado)";
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
    public function ModificarProduccion()

    {
    	$objetoBD= new Conexion();
        $objetoBD->conectar();
        $mysqli=$objetoBD->cadenaconexion();

        $consulta="CALL Modificar_Produccion($this->codigo,'$this->fecha',(SELECT emp_id FROM empleados WHERE emp_nombres='$this->empleado'))";
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
    public function ConsultarProduccion()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT prod_id , prod_fecha, emp_nombres, emp_apellidos FROM produccion, empleados 
        WHERE empleados.emp_id=produccion.emp_id";
        $resultado = $mysqli->query($consulta);
        return $resultado;
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


    //Consultar datos de una produccion
    public function ConsultarDatosProduccion($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT prod_id , prod_fecha, emp_nombres, emp_apellidos FROM empleados, produccion WHERE
        empleados.emp_id=produccion.emp_id AND prod_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }



    //Consultar detalles de una produccion
    public function ConsultarDetalleProduccion($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT deta_cantidad_materia_prima, mp_nombre FROM detalle_produccion, materia_prima WHERE
        materia_prima.mp_id=detalle_produccion.mp_id AND prod_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }

    //Consultar codigo maximo de la produccion
    public function CodigoProduccion()

  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli=$objetoBD->cadenaConexion();

      $consulta="SELECT max(prod_id) as maximo FROM produccion ";
      $resultado=$mysqli->query($consulta);

      $maximo="";
      while($fila=mysqli_fetch_object($resultado)){

          $maximo=$fila->maximo;


          }
      return $maximo+1;

  }

  public function ConsultarCodigoEmpleado($nombre)

{
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli=$objetoBD->CadenaConexion();
    $sql="SELECT empleados.emp_id FROM empleados, usuarios WHERE empleados.usu_id=usuarios.usu_id and usu_correo='".$nombre."'";
    $res=$mysqli->query($sql);

    $codi="";
    while($fila=mysqli_fetch_object($res)){

        $codi=$fila->emp_id;


        }
    return $codi;

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
    public function EliminarProduccion($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM produccion WHERE prod_id=".$codigo;
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
