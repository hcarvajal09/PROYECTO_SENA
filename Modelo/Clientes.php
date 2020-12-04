<?php

class Clientes
{
    private $codigo;
    private $nombres;
    private $apellidos;
    private $documento;
    private $telefono;
    private $direccion;
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

    //Get y Set de $direccion
    public function getdireccion()
    {
        return $this->direccion;
    }

    public function setdireccion($dire)
    {
        $this->direccion=$dire;
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


    //Validar Duplicidad de nombre
    public function ValidarNombre()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();
        $consulta = "SELECT clie_nombres FROM clientes ";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }
    


    //Registrar
    public function RegistrarCliente()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Registrar_Cliente('$this->nombres','$this->apellidos','$this->documento',
		'$this->telefono','$this->direccion','$this->estado')";

        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }

    


    //Modificar
    public function ModificarCliente()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Modificar_Cliente($this->codigo,'$this->nombres','$this->apellidos',
        '$this->documento','$this->telefono','$this->direccion','$this->estado')";

        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


    //Consultar clientes activos
    public function ConsultarClientesActivos()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();
        $consulta = "SELECT * FROM clientes WHERE clie_estado='ACTIVO' ";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar clientes inactivos
    public function ConsultarClientesInactivos()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();
        $consulta = "SELECT * FROM clientes WHERE clie_estado='INACTIVO' ";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar datos del clientes
    public function ConsultarDatosCliente($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM clientes WHERE clie_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }



    //Eliminar
    public function EliminarCliente($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM clientes WHERE clie_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }

    //Activar Cliente
    public function ActivarCliente($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "UPDATE clientes set clie_estado='ACTIVO' WHERE clie_id=".$codigo;
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
