<?php
class Compras
{
    private $codigo;
    private $nombre;
    private $cantidad;
    private $precio;
    private $empleado;
    private $proveedor;


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

    //Get y Set de $nombre-materia-prima
    public function getnombre()
    {
        return $this->nombre;
    }

    public function setnombre($nom)
    {
        $this->nombre=$nom;
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

    //Get y Set de $precio
    public function getprecio()
    {
        return $this->precio;
    }

    public function setprecio($prec)
    {
        $this->precio=$prec;
    }

    //Get y Set de $total
    public function gettotal()
    {
        return $this->total;
    }

    public function settotal($tot)
    {
        $this->total=$tot;
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

    //Get y Set $proveedor
    public function getproveedor()
    {
        return $this->proveedor;
    }

    public function setproveedor($prov)
    {
        $this->proveedor=$prov;
    }




    //Registrar
    public function RegistrarCompras()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "CALL Registrar_Compras('$this->nombre','$this->cantidad','$this->precio',
		'$this->empleado',(SELECT prov_id FROM proveedores WHERE prov_nombres='$this->proveedor'))";

		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}

    //Modificar
    public function ModificarCompras()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "CALL Modificar_Compras($this->codigo,'$this->nombre','$this->cantidad','$this->precio',
		'$this->empleado',(SELECT prov_id FROM proveedores WHERE prov_nombres='$this->proveedor'))";

		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}


    //Consultar
    public function ConsultarCompras()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT comp_id , comp_nombre_materia_prima ,comp_cantidad_materia_prima ,comp_precio, E.emp_nombres Nombre_Empleado, E.emp_apellidos Apellido_Empleado, P.prov_nombres Nombre_Proveedor, P.prov_apellidos Apellido_Proveedor FROM 
        compras C
        JOIN empleados E
        ON E.emp_id=C.emp_id
        JOIN proveedores P
        ON P.prov_id=C.prov_id";
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



    //Consultar Datos compra
    public function ConsultarDatosCompra($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM compras WHERE comp_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
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




    //Eliminar
    public function Eliminarcompra($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM compras WHERE comp_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }

      //Consultar Empleados
      public function ConsultarEmpleados()
      {
          $objetoBD = new Conexion();
          $objetoBD->conectar();
          $mysqli = $objetoBD->cadenaconexion();

          $consulta = "SELECT emp_nombres, emp_apellidos FROM empleados WHERE emp_estado='ACTIVO' ";
          $resultado = $mysqli->query($consulta);
          return $resultado;
      }


        //Consultar Proveedores
        public function ConsultarProveedores()
        {
            $objetoBD = new Conexion();
            $objetoBD->conectar();
            $mysqli = $objetoBD->cadenaconexion();

            $consulta = "SELECT prov_nombres, prov_apellidos FROM proveedores WHERE prov_estado='ACTIVO' ";
            $resultado = $mysqli->query($consulta);
            return $resultado;
        }

        
}

 ?>
