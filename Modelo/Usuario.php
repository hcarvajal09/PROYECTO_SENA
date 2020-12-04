<?php

Class Usuario
{
    private $codigo;
    private $correo;
    private $clave;

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

    //Get y Set de $nombreusuario
    public function getcorreo()
    {
        return $this->correo;
    }

    public function setcorreo($cor)
    {
        $this->correo=$cor;
    }

    //Get y Set de $clave
    public function getclave()
    {
        return $this->clave;
    }

    public function setclave($cla)
    {
        $this->clave=$cla;
    }


    //Validar Clave
    public function ValidarClave()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();
        $clave="";

        $consulta = "SELECT usu_clave FROM usuarios WHERE usu_correo='".$this->correo."'";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)." // ". mysqli_error($mysqli);

        while ($fila=mysqli_fetch_object($resultado)) {
            $clave=$fila->usu_clave;
        }

        return $clave;
    }

    //Registrar
    public function RegistrarUsuario()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "INSERT INTO usuarios VALUES ($this->codigo,'$this->correo','$this->clave')";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


    //Modificar
    public function ModificarUsuario()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "UPDATE usuarios SET usu_correo='".$this->correo."',
        usu_clave='".$this->clave."' WHERE usu_id=".$this->codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }

    //Modificar
    public function GenerarClave()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Generar_Clave('$this->correo','$this->clave')";
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


    //Consultar
    public function ConsultarUsuarios()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM usuarios";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar cargo por el nombre usuario
    public function ConsultarCargo($nombredeusuario)

  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli=$objetoBD->CadenaConexion();
      $sql="SELECT emp_cargo from usuarios, empleados WHERE empleados.usu_id=usuarios.usu_id and usu_correo='".$nombredeusuario."' ";
      $res=$mysqli->query($sql);
      $CargoRecibido="";
      while($fila=mysqli_fetch_object($res))
        {
          $CargoRecibido=$fila->emp_cargo;

        }
        return $CargoRecibido;
  }

  //Consultar nombre de empleado por el correo
  public function ConsultarNombreEmpleado($nombredeusuario){
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli=$objetoBD->CadenaConexion();
    $sql="SELECT emp_nombres from usuarios, empleados WHERE empleados.usu_id=usuarios.usu_id and usu_correo='".$nombredeusuario."'";
    $res=$mysqli->query($sql);
    $NombreRecibido="";
      while($fila=mysqli_fetch_object($res))
        {
          $NombreRecibido=$fila->emp_nombres;

        }
        return $NombreRecibido;
  }


    //Consultar apeliido de empleado por el correo
    public function ConsultarApellidoEmpleado($nombredeusuario){
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli=$objetoBD->CadenaConexion();
        $sql="SELECT emp_apellidos from usuarios, empleados WHERE empleados.usu_id=usuarios.usu_id and usu_correo='".$nombredeusuario."'";
        $res=$mysqli->query($sql);
        $ApellidoRecibido="";
          while($fila=mysqli_fetch_object($res))
            {
              $ApellidoRecibido=$fila->emp_apellidos;
    
            }
            return $ApellidoRecibido;
      }
    


    //Consultar datos del Usuario
    public function ConsultarDatosUsuario($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM usuarios WHERE usu_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
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
    public function EliminarUsuario($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM usuarios WHERE usu_id=".$codigo;
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
