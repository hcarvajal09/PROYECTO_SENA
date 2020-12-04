<?php

class Conexion
{
    private $conexion;
    private $servidor="localhost";
    private $usuario="root";
    private $password="";
    private $BD="aquitoy";

    public function conectar()
    {
        $this->conexion=mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->BD
        );

        if (mysqli_connect_error()) {
            echo "No se pudo conectar a la Base de Datos";
        } else {
            echo"";
        }
    }

    public function cadenaconexion()
    {
        $mysqli = new mysqli(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->BD
        );

        return $mysqli;
    }
}

?>
