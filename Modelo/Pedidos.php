<?php

Class Pedidos
{
    private $codigo;
    private $fechaentrega;
    private $horaentrega;
    private $direccion;
    private $total;
    private $estado;
    private $empleado;
    private $cliente;
    private $rep_id;
    private $rep_problema;
    private $rep_estado;
    private $rep_fecha;


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

    //Get y Set de $fechaentrega
    public function getfechaentrega()
    {
        return $this->fechaentrega;
    }

    public function setfechaentrega($fec)
    {
        $this->fechaentrega=$fec;
    }

    //Get y Set de $horaentrega
    public function gethoraentrega()
    {
        return $this->horaentrega;
    }

    public function sethoraentrega($hor)
    {
        $this->horaentrega=$hor;
    }

    //Get y Set de $direccion
    public function getdireccion()
    {
        return $this->direccion;
    }

    public function setdireccion($dir)
    {
        $this->direccion=$dir;
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

    //Get y Set de $estado
    public function getestado()
    {
        return $this->estado;
    }
    
     public function setestado($est)
    {
        $this->estado=$est;
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

    //Get y Set de $cliente
    public function getcliente()
    {
        return $this->cliente;
    }

    public function setcliente($cli)
    {
        $this->cliente=$cli;
    }

    // Get y Set de rep_id
    public function getrep_id()
    {
        return $this->rep_id;
    }

    public function setrep_id($id)
    {
        $this->rep_id=$id;
    }

    //Get y Set de rep_problema
    public function getrep_problema()
    {
        return $this->rep_problema;
    }

    public function setrep_problema($problema)
    {
        $this->rep_problema=$problema;
    }

    // Get y Set de rep_estado
    public function getrep_estado()
    {
        return $this->rep_estado;
    }

    public function setrep_estado($estado)
    {
        $this->rep_estado=$estado;
    }

    // Get y Set de rep_fecha
    public function getrep_fecha()
    {
        return $this->rep_fecha;
    }
    
    public function setrep_fecha($fecha)
    {
        $this->rep_fecha=$fecha;
    }

    //Registrar
    public function RegistrarPedido()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "CALL Registrar_Pedido($this->codigo,'$this->fechaentrega','$this->horaentrega','$this->direccion',
        $this->total,'$this->estado', $this->empleado,(SELECT clie_id FROM clientes WHERE clie_nombres='$this->cliente'))";
 
        $resultado = $mysqli->query($consulta);
        $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }


        //Registrar Reporte
        public function RegistrarReporte()
        {
            $objetoBD = new Conexion();
            $objetoBD->conectar();
            $mysqli = $objetoBD->cadenaconexion();
    
            $consulta = "CALL Registrar_Reporte('$this->rep_problema','$this->rep_estado','$this->rep_fecha',$this->codigo, $this->empleado)";
     
            $resultado = $mysqli->query($consulta);
            $error = mysqli_errno($mysqli)."-". mysqli_error($mysqli);
    
            if ($resultado) {
                return "correcto";
            } else {
                return "incorrecto".$error;
            }
        }
    

    //Modificar
    public function ModificarPedido()

    {
    	$objetoBD= new Conexion();
        $objetoBD->conectar();
        $mysqli=$objetoBD->cadenaconexion();

        $consulta="CALL Modificar_Pedido($this->codigo,'$this->fechaentrega','$this->horaentrega',
        '$this->direccion',$this->total,'$this->estado',(SELECT emp_id FROM empleados WHERE emp_nombres='$this->empleado'),
        (SELECT clie_id FROM clientes WHERE clie_nombres='$this->cliente'))";
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


        //Entregar el pedido
        public function EntregarPedido($codigo)
        {
            $objetoBD = new Conexion();
            $objetoBD->conectar();
            $mysqli = $objetoBD->cadenaconexion();
    
            $consulta = "UPDATE pedidos set ped_estado='ENTREGADO' WHERE ped_id=".$codigo;
            $resultado = $mysqli->query($consulta);
            $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);
    
            if ($resultado) {
                return "correcto";
            } else {
                return "incorrecto".$error;
            }
        }


    //Consultar
    public function ConsultarPedidos()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT ped_id,ped_fecha_entrega,ped_hora_entrega,ped_direccion,ped_total,ped_estado, E.emp_nombres Nombre_Empleado, E.emp_apellidos Apellido_Empleado, C.clie_nombres Nombre_Cliente, C.clie_apellidos Apellido_Cliente FROM 
        pedidos P 
        JOIN empleados E
        ON E.emp_id=P.emp_id
        JOIN clientes C
        ON C.clie_id=P.clie_id";
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }

        //Consultar Pedidos del dia Domiciliario
        public function PedidosDelDia()
        {
            $objetoBD = new Conexion();
            $objetoBD->conectar();
            $mysqli = $objetoBD->cadenaconexion();
    
            $consulta = "SELECT ped_id, clie_nombres, clie_apellidos, ped_hora_entrega, ped_direccion, ped_estado
            FROM pedidos, clientes WHERE clientes.clie_id=pedidos.clie_id AND ped_estado='PENDIENTE' AND ped_fecha_entrega=CURDATE() GROUP BY ped_id";
            $resultado = $mysqli->query($consulta);
            return $resultado;
        }

        //Consultar Pedidos del dia (Administrador)
        public function PedidosDelDia2()
        {
         $objetoBD = new Conexion();
         $objetoBD->conectar();
         $mysqli = $objetoBD->cadenaconexion();
            
         $consulta = "SELECT ped_id, clie_nombres, clie_apellidos, ped_hora_entrega, ped_direccion, ped_estado
         FROM pedidos, clientes WHERE clientes.clie_id=pedidos.clie_id AND ped_fecha_entrega=CURDATE() GROUP BY ped_id";
         $resultado = $mysqli->query($consulta);
         return $resultado;
        }
            
    

    //Consultar Clientes
    public function ConsultarClientes()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT clie_nombres FROM clientes WHERE clie_estado='ACTIVO' ";
        $resultado = $mysqli->query($consulta);
        return $resultado;
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

    //Consultar codigo maximo de los pedidos
    public function CodigoPedido()

  {
      $objetoBD = new Conexion();
      $objetoBD->conectar();
      $mysqli=$objetoBD->cadenaConexion();

      $consulta="SELECT max(ped_id) as maximo FROM pedidos ";
      $resultado=$mysqli->query($consulta);

      $maximo="";
      while($fila=mysqli_fetch_object($resultado)){

          $maximo=$fila->maximo;


          }
      return $maximo+1;

  }


    //Consultar codigo pedido
    public function ConsultarDatosPedidos($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT ped_id, ped_fecha_entrega, ped_hora_entrega, ped_direccion, ped_total,
         emp_nombres FROM pedidos, empleados WHERE empleados.emp_id=pedidos.emp_id AND ped_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $tabla = mysqli_fetch_object($resultado);
        return $tabla;
    }

    public function VerProductos($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT productos.pro_id, pro_descripcion, dep_cantidad FROM productos, detalle_pedido WHERE 
        productos.pro_id=detalle_pedido.pro_id AND ped_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        return $resultado;
    }



    //Consultar detalles de un pedido
    public function ConsultarDetallePedidos($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT productos.pro_id, pro_descripcion, pro_precio, dep_cantidad, dep_subtotal FROM productos, detalle_pedido WHERE
        productos.pro_id=detalle_pedido.pro_id AND ped_id=".$codigo;
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


    //Eliminar
    public function EliminarPedido($codigo)
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "DELETE FROM pedidos WHERE ped_id=".$codigo;
        $resultado = $mysqli->query($consulta);
        $error = mysqli_error($mysqli)."-". mysqli_errno($mysqli);

        if ($resultado) {
            return "correcto";
        } else {
            return "incorrecto".$error;
        }
    }

}
