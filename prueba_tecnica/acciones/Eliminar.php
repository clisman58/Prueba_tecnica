
<?php
include_once "../mostrar.php";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];

    $paciente = new paciente();
    $paciente->setId($id);
    $resultado = $paciente->EliminarUsuario();

    if ($resultado != 0) {
        header("location: ../index.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}
