<?php

Class Reportes

{
    private $codigo;
    private $problema;
    private $estado;
    private $fecha;
    private $pedido;
    private $empleado;

    //Conexion a la BD
    public function __construct()
    {
        include('../Controlador/conexion.php');
    }

     // Get y Set de codigo
     public function getcodigo()
     {
         return $this->codigo;
     }
 
     public function setcodigo($cod)
     {
         $this->codigo=$cod;
     }
 
     //Get y Set de problema
     public function getproblema()
     {
         return $this->problema;
     }
 
     public function setproblema($pr)
     {
         $this->problema=$pro;
     }
 
     // Get y Set de rep_estado
     public function getestado()
     {
         return $this->estado;
     }
 
     public function setestado($est)
     {
         $this->estado=$est;
     }
 
     // Get y Set de rep_fecha
     public function getfecha()
     {
         return $this->fecha;
     }
     
     public function setfecha($fec)
     {
         $this->fecha=$fec;
     }

     //Get y Set de $pedido
     public function getpedido()
     {
         return $this->pedido;
     }

     public function setpedido($ped)
     {
         $this->pedido=$ped;
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


    //Consultar Reportes
    public function ConsultarReportes()
    {
        $objetoBD = new Conexion();
        $objetoBD->conectar();
        $mysqli = $objetoBD->cadenaconexion();

        $consulta = "SELECT rep_id, rep_problema, rep_estado, rep_fecha, ped_id, emp_nombres, emp_apellidos FROM reporte, empleados WHERE empleados.emp_id=reporte.emp_id 
        AND rep_fecha=CURDATE() ";
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

}


?>