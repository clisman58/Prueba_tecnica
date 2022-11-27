<?php

include_once "Conexion_db.php";
class paciente{
    private $id;
    private $Nombres;
    private $Apellidos;
    private $Temperatura;
    private $Frecuencia_cardiaca;
    private $Peso;
    private $Talla;
    private $IMC;
    private $Fecha;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    
    public function mostrarUsuariosPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM datos_paciente WHERE id=$this->id";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function mostrar()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT dp.id, dp.Nombres, dp.Apellidos, dp.Temperatura, dp.Frecuencia_cardiaca, dp.Peso, dp.Talla, dp.IMC, dp.Fecha
                    FROM datos_paciente as dp";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function ActualizarDatos(int $id, String $Nombres, String $Apellidos, String $Temperatura, String $Frecuencia_cardiaca, String $Peso, int $Talla, int $IMC, String $Fecha): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE datos_paciente
                  SET Nombres='$Nombres', Apellidos='$Apellidos', Temperatura='$Temperatura', Frecuencia_cardiaca='$Frecuencia_cardiaca', Peso='$Peso', Talla='$Talla', IMC='$IMC', Fecha='$Fecha'
                  WHERE id=$id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }
    public function ActualizarUsuario(int $id, String $Nombres, String $Apellidos, String $Temperatura, String $Frecuencia_cardiaca, String $Peso, int $Talla, int $IMC, String $Fecha): bool
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "UPDATE datos_paciente
                  SET Nombres='$Nombres', Apellidos='$Apellidos', Temperatura='$Temperatura', Frecuencia_cardiaca='$Frecuencia_cardiaca', Peso='$Peso', Talla='$Talla', IMC='$IMC', Fecha='$Fecha'
                  WHERE id=$id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }

    public function EliminarUsuario()
    {
      try {
          $conexionDB = new ConexionBD();
          $conn = $conexionDB->abrirConexion();

          $sql = "DELETE FROM datos_paciente WHERE id=$this->id";
          $filasAfectadas = $conn->exec($sql);

          if($filasAfectadas != 0){
              $resultado = true;
          }else{
              $resultado = false;
          }

          return $resultado;
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }
}

?>