<?php


class Empleados
{
  private $codigo;
  private $nombres;
  private $apellidos;
  private $documento;
  private $telefono;
  private $cargo;
  private $estado;
  private $usu_id;
  private $usu_correo;
  private $usu_clave;


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
    $this->codigo = $cod;
  }

  //Get y Set de $nombres
  public function getnombres()
  {
    return $this->nombres;
  }

  public function setnombres($nom)
  {
    $this->nombres = $nom;
  }

  //Get y Set de $apellidos
  public function getapellidos()
  {
    return $this->apellidos;
  }

  public function setapellidos($ape)
  {
    $this->apellidos = $ape;
  }

  //Get y Set de $documento
  public function getdocumento()
  {
    return $this->documento;
  }

  public function setdocumento($doc)
  {
    $this->documento = $doc;
  }

  //Get y Set de $telefono
  public function gettelefono()
  {
    return $this->telefono;
  }

  public function settelefono($tel)
  {
    $this->telefono = $tel;
  }

  //Get y Set de $cargo
  public function getcargo()
  {
    return $this->cargo;
  }

  public function setcargo($carg)
  {
    $this->cargo = $carg;
  }

  //Get y Set de $estado
  public function getestado()
  {
    return $this->estado;
  }

  public function setestado($est)
  {
    $this->estado = $est;
  }

  //Get y Set de $usuario
  public function getusu_id()
  {
    return $this->usu_id;
  }

  public function setusu_id($usu)
  {
    $this->usu_id = $usu;
  }

  //Get y Set de $nombre usuario
  public function getusu_correo()
  {
    return $this->usu_correo;
  }

  public function setusu_correo($cor)
  {
    $this->usu_correo=$cor;
  }


  //Get y Set de $clave
  public function getusu_clave()
  {
    return $this->usu_clave;
  }

  public function setusu_clave($cla)
  {
    $this->usu_clave = $cla;
  }



  //Registrar Usuario
  public function RegistrarUsuario()
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "INSERT INTO usuarios VALUES ($this->usu_id, '$this->usu_correo', '$this->usu_clave')";

    $resultado = $mysqli->query($consulta);
    $error = mysqli_errno($mysqli) . "-" . mysqli_error($mysqli);

    if ($resultado) {
      return "correcto";
    } else {
      return "incorrecto" . $error;
    }
  }


  //Registrar Empleado
  public function RegistrarEmpleado()
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "INSERT INTO empleados VALUES ($this->codigo, '$this->nombres', '$this->apellidos', '$this->documento',
      '$this->telefono','$this->cargo','$this->estado', $this->usu_id)";

    $resultado = $mysqli->query($consulta);
    $error = mysqli_errno($mysqli) . "-" . mysqli_error($mysqli);

    if ($resultado) {
      return "correcto";
    } else {
      return "incorrecto" . $error;
    }
  }


  //Modificar
  public function ModificarEmpleado()
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

      $consulta = "CALL Modificar_Empleado($this->codigo,'$this->nombres','$this->apellidos','$this->documento',
      '$this->telefono','$this->cargo', '$this->estado')";

    $resultado = $mysqli->query($consulta);
    $error = mysqli_errno($mysqli) . "-" . mysqli_error($mysqli);

    if ($resultado) {
      return "correcto";
    } else {
      return "incorrecto" . $error;
    }
  }

  //Consultar codigo Empledo
  public function ConsultarDatosEmpleado($codigo)
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "SELECT * FROM empleados WHERE emp_id=" . $codigo;
    $resultado = $mysqli->query($consulta);
    $tabla = mysqli_fetch_object($resultado);
    return $tabla;
  }



  //Eliminar
  public function EliminarEmpleado($codigo)
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "DELETE FROM empleados WHERE emp_id=" . $codigo;
    $resultado = $mysqli->query($consulta);
    $error = mysqli_error($mysqli) . "-" . mysqli_errno($mysqli);

    if ($resultado) {
      return "correcto";
    } else {
      return "incorrecto" . $error;
    }
  }

  public function ConsultarCodigoMaximoEmpleado()

  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->CadenaConexion();
    $sql = "SELECT max(emp_id) as maximo FROM empleados ";
    $res = $mysqli->query($sql);

    $maximo = "";
    while ($fila = mysqli_fetch_object($res)) {

      $maximo = $fila->maximo;
    }
    return $maximo + 1;
  }


  public function ConsultarCodigoMaximoUsuario()

  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->CadenaConexion();
    $sql = "SELECT max(usu_id) as maximo FROM usuarios ";
    $res = $mysqli->query($sql);

    $maximo = "";
    while ($fila = mysqli_fetch_object($res)) {

      $maximo = $fila->maximo;
    }
    return $maximo + 1;
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

  //Consultar empleados activos
  public function ConsultarEmpleadosActivos()
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();
    $consulta = "SELECT * FROM empleados WHERE emp_estado='ACTIVO' ";
    $resultado = $mysqli->query($consulta);
    return $resultado;
  }


  //Consultar empleados inactivos
  public function ConsultarEmpleadosInactivos()
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();
    $consulta = "SELECT * FROM empleados WHERE emp_estado='INACTIVO' ";
    $resultado = $mysqli->query($consulta);
    return $resultado;
  }

  //Activar Empleado
  public function ActivarEmpleado($codigo)
  {
    $objetoBD = new Conexion();
    $objetoBD->conectar();
    $mysqli = $objetoBD->cadenaconexion();

    $consulta = "UPDATE empleados set emp_estado='ACTIVO' WHERE emp_id=" . $codigo;
    $resultado = $mysqli->query($consulta);
    $error = mysqli_error($mysqli) . "-" . mysqli_errno($mysqli);

    if ($resultado) {
      return "correcto";
    } else {
      return "incorrecto" . $error;
    }
  }
}
