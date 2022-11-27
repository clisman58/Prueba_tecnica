<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <link rel="stylesheet" href="/proyecto/css/style.css">
  </head>
  <body>
    <div class="contenedor">

<?php
include_once "../mostrar.php";

$id = $_POST["id"];
$paciente = new paciente();
$paciente->setId($id);
$resultado = $paciente->mostrarUsuariosPorId();

foreach ($resultado->fetchAll() as $item) {
    ?>
    <div class="justify-content-center container row ">
        <form action="../index.php" method="POST">
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5 col-form-label text-center " >Nombres</label>
                        <input name="Nombres" id="text" type="text" class="form-control" placeholder="diganos sus nombres" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Nombres"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5 col-form-label text-center " >apellidos</label>
                    <input name="Apellidos" id="text" type="text" class="form-control" placeholder="diganos sus Apellidos" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Apellidos"] ?>">
                    
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord">borrar</button>
             </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2 " >
                    <label class="col-5  col-form-label text-center" >Temperatura</label>
                    <input name="Temperatura" id="text1" type="number" class="form-control " placeholder="diganos su Temperatura" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Temperatura"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord1">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" > Frecuencia cardiaca</label>
                    <input name="Frecuencia_cardiaca" id="text2" type="number" class="form-control" placeholder="diganos su Frecuencia cardiaca" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Frecuencia_cardiaca"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord2">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >Peso</label>
                    <input name="Peso" id="text3" type="number" class="form-control" placeholder="diganos su Peso" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Peso"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord3">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >Talla </label>
                    <input name="Talla" id="text4" type="number" class="form-control" placeholder="diganos su Talla" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Talla"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord4">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >IMC </label>
                    <input name="IMC" id="text5" type="number" class="form-control" placeholder="diganos su IMC" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["IMC"] ?>">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord5">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                <label class="col-5  col-form-label text-center" >Fecha de atencion </label>
                <input name="Fecha" id="text5" type="date" class="form-control" placeholder="diganos su Fecha de atencion" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $item["Fecha"] ?>">
                <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord5">borrar</button>
          </div>

              <div class="d-grid gap-2 col-2 d-md-block mx-auto">
                <input type="submit" name="submit1" value="Editar" style="padding:15px;">
              </div>
        </form>
    </div>
    <?php
}

if (isset($_POST["submit1"])) {
    $Nombres = $_POST["Nombres"];
    $Apellidos = $_POST["Apellidos"];
    $Temperatura = $_POST["Temperatura"];
    $Frecuencia_cardiaca = $_POST["Frecuencia_cardiaca"];
    $Peso = $_POST["Peso"];
    $Talla = $_POST["Talla"];
    $IMC = $_POST["IMC"];
    $Fecha = $_POST["Fecha"];
    $id = $_POST["id"];

    $resultado = $paciente->ActualizarUsuario($id, $Nombres, $Apellidos, $Temperatura, $Frecuencia_cardiaca, $Peso, $Talla, $IMC, $Fecha);


    if ($resultado != 0) {
        header("location: index.php");
    } else {
        echo "Error: Informacion no actualizada";
    }

}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
 
</body>
</html>