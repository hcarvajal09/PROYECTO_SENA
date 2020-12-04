<?php

class Detalle_Produccion
{
    private $codigo;
    private $cantidad_mp;
    private $materia_prima;
    private $produccion;


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

    //Get y Set de $cantidad-materia-prima
    public function getcantidad_mp()
    {
        return $this->cantidad_mp;
    }

    public function setcantidad_mp($can_mp)
    {
        $this->cantidad_mp=$can_mp;
    }

    //Get y Set de $materia_prima
    public function getmateria_prima()
    {
        return $this->materia_prima;
    }

    public function setmateria_prima($mp)
    {
        $this->materia_prima=$mp;
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
    public function RegistrarDetalle_Produccion()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "INSERT INTO detalle_produccion VALUES ($this->codigo,'$this->cantidad_mp',
        '$this->materia_prima','$this->produccion')";

        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


    //Modificar
    public function ModificarDetalle_Produccion()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "UPDATE detalle_produccion SET deta_cantidad_materia_prima='".$this->cantidad_mp."',
        mp_id='".$this->materia_prima."',prod_id='".$this->produccion."' WHERE deta_id=".$this->codigo;

        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


    //Consultar
    public function ConsultarDetalle_Produccion()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT deta_id , deta_cantidad_materia_prima, mp_nombre, prod_id FROM detalle_produccion, materia_prima
         WHERE materia_prima.mp_id=detalle_produccion.mp_id and prod_id=$this->produccion";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }


    //Consultar Materia Prima
    public function ConsultarMateriaPrima()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM materia_prima";
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


        //Consultar Cada Materia
        public function ConsultarCadaMateria()
        {
            $objetoBD = new Conexion();
            $objetoBD->conectar();
            $mysqli = $objetoBD->cadenaconexion();
    
            $consulta = "SELECT mp_nombre FROM materia_prima";
            $resultado = $mysqli->query($consulta);
            return $resultado;
        }


    //Codigo Detalle Produccion
    public function CodigoDetalle()

  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli=$objetoBD->cadenaConexion();

      $consulta="SELECT max(deta_id) as maximo FROM detalle_produccion ";
      $resultado=$mysqli->query($consulta);

      $maximo="";
      while($fila=mysqli_fetch_object($resultado)){

          $maximo=$fila->maximo;


          }
      return $maximo+1;

  }



    //Consultar codigo detalle produccion
    public function ConsultarCodigoDetalle_Produccion($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT * FROM detalle_produccion WHERE deta_id=".$codigo;
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
    public function EliminarDetalle_Produccion($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM detalle_produccion WHERE deta_id=".$codigo;
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
