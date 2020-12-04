<?php

class Materia_Prima
{
	private $codigo;
	private $nombre;
	private $cantidad;

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

    //Get y Set de $cantidad-materia_prima
	public function getcantidad()
	{
		return $this->cantidad;
	}

	public function setcantidad($cant)
	{
		$this->cantidad=$cant;
	}


    //Registrar
	public function RegistrarMateriaPrima()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();
		$consulta = "CALL Registrar_MateriaPrima('$this->nombre','$this->cantidad')";
		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}


    //Modificar
	public function ModificarMateriaPrima()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "CALL Modificar_MateriaPrima('$this->codigo','$this->nombre','$this->cantidad')";
		$resultado = $mysqli->query($consulta);
		$error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

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


    //Consultar
	public function ConsultarMateriaPrima()
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "SELECT * FROM materia_prima";
		$resultado = $mysqli->query($consulta);
		return $resultado;
	}



    //Consultar codigo Materia-Prima
	public function ConsultarCodigoMateriaPrima($codigo)
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "SELECT * FROM materia_prima WHERE mp_id=".$codigo;
		$resultado = $mysqli->query($consulta);
		$tabla = mysqli_fetch_object($resultado);
		return $tabla;
	}



    //Eliminar
	public function EliminarMateriaPrima($codigo)
	{
		$objetoBD = new Conexion();
		$objetoBD->conectar();
		$mysqli = $objetoBD->cadenaconexion();

		$consulta = "DELETE FROM materia_prima WHERE mp_id=".$codigo;
		$resultado = $mysqli->query($consulta);
		$error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

		if ($resultado) {
			return "correcto";
		} else {
			return "incorrecto".$error;
		}
	}
}
