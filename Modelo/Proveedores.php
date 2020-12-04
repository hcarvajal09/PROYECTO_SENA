<?php

Class Proveedor
{
    private $codigo;
    private $nombres;
    private $apellidos;
    private $documento;
    private $telefono;
    private $estado;

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

    //Get y Set de $nombres
    public function getnombres()
    {
        return $this->nombres;
    }

    public function setnombres($nom)
    {
        $this->nombres=$nom;
    }

    //Get y Set de $apellidos
    public function getapellidos()
    {
        return $this->apellidos;
    }

    public function setapellidos($ape)
    {
        $this->apellidos=$ape;
    }

    //Get y Set de $documento
    public function getdocumento()
    {
        return $this->documento;
    }

    public function setdocumento($doc)
    {
        $this->documento=$doc;
    }

    //Get y Set de $telefono
    public function gettelefono()
    {
        return $this->telefono;
    }

    public function settelefono($tel)
    {
        $this->telefono=$tel;
    }

    //Get y Set de $estado
    public function getestado()
    {
        return $this->estado;
    }

    public function setestado($est)
    {
        $this->estado=$est;
    }



    //Registrar
    public function RegistrarProveedor()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "CALL Registrar_Proveedor('$this->nombres','$this->apellidos','$this->documento',
		'$this->telefono','$this->estado')";

		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}

    //Modificar
    public function ModificarProvedor()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "CALL Modificar_Proveedor('$this->codigo','$this->nombres','$this->apellidos',
        '$this->documento','$this->telefono','$this->estado')";

		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}

    //Consultar
    public function ConsultarProveedor()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM proveedores";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar codigoDatos proveedor
    public function ConsultarDatosProveedor($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM proveedores WHERE prov_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }

    //Consultar Proveedores activos
	public function ConsultarProveedoresActivos()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();
		$consulta = "SELECT * FROM proveedores WHERE prov_estado='ACTIVO' ";
		$resultado = $mysqli->query($consulta);
		return $resultado;
	}


  //Consultar Proveedores inactivos
	public function ConsultarProveedoresInactivos()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();
		$consulta = "SELECT * FROM proveedores WHERE prov_estado='INACTIVO' ";
		$resultado = $mysqli->query($consulta);
		return $resultado;
	}


    //Eliminar
    public function EliminarProveedor($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM proveedores WHERE prov_id=".$codigo;
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

   //Activar Proveedor
    public function ActivarProveedor($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "UPDATE proveedores set prov_estado='ACTIVO' WHERE prov_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }
}
