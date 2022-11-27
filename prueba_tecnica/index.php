<?php

  session_start();

  require 'database.php';

  //require 'includes/header.php'

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, password, correo, nombres, apellidos, DNI, telefono, sexo FROM usuario WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if ($results > 0) {
      $user = $results;
    }
  }

  if(!empty($_POST['Nombres']) && !empty($_POST['Apellidos']) && !empty($_POST['Temperatura']) && !empty($_POST['Frecuencia_cardiaca']) && !empty($_POST['Peso']) && !empty($_POST['Talla']) && !empty($_POST['IMC']) && !empty($_POST['Fecha'])){

      if (!empty($_POST['Nombres']) && !empty($_POST['Apellidos']) && !empty($_POST['Temperatura']) && !empty($_POST['Frecuencia_cardiaca']) && !empty($_POST['Peso']) && !empty($_POST['Talla']) && !empty($_POST['IMC']) && !empty($_POST['Fecha'])) {
        $sql = "INSERT INTO datos_paciente (Nombres, Apellidos, Temperatura, Frecuencia_cardiaca, Peso, Talla, IMC, Fecha) VALUES (:Nombres, :Apellidos, :Temperatura, :Frecuencia_cardiaca, :Peso, :Talla, :IMC, :Fecha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Nombres', $_POST['Nombres']);
        $stmt->bindParam(':Apellidos', $_POST['Apellidos']);
        $stmt->bindParam(':Temperatura', $_POST['Temperatura']);
        $stmt->bindParam(':Frecuencia_cardiaca', $_POST['Frecuencia_cardiaca']);
        $stmt->bindParam(':Peso', $_POST['Peso']);
        $stmt->bindParam(':Talla', $_POST['Talla']);
        $stmt->bindParam(':IMC', $_POST['IMC']);
        $stmt->bindParam(':Fecha', $_POST['Fecha']);

        if ($stmt->execute()) {
          $message = 'se ha registrado con exito';
        } else {
          $message = 'lo sentimos, hay un problema';
        }
      }
  }
  else{
    $message = 'Complete todos los Campos';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mi pagina web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <link rel="stylesheet" href="css/style.css">
  	<title></title>
  	<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="includes/css/estilos2.css">

  	<script type="text/javascript" src="js/script.js"></script>
    <script src="includes/js/jquery-3.1.0.min.js"></script>
    <script src="includes/js/main.js"></script>
  </head>
  <body>

    <?php if(!empty($user)): ?>
      <a href="cerrar_session.php" style="float: right; padding: 10px; position: fixed;">
        salir</p>
      </a>
      <br><p align="center"> Bienvenido, <?= $user['nombres']." ". $user['apellidos']; ?>


      <div class="justify-content-center container row ">
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5 col-form-label text-center " >Nombres</label>
                    <input name="Nombres" id="text" type="text" class="form-control" placeholder="diganos sus nombres" aria-label="Recipient's username" aria-describedby="button-addon2" >
                    
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5 col-form-label text-center " >apellidos</label>
                    <input name="Apellidos" id="text1" type="text" class="form-control" placeholder="diganos sus Apellidos" aria-label="Recipient's username" aria-describedby="button-addon2" >
                    
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord1">borrar</button>
             </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2 " >
                    <label class="col-5  col-form-label text-center" >Temperatura</label>
                    <input name="Temperatura" id="text2" type="number" class="form-control " placeholder="diganos su Temperatura" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord2">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" > Frecuencia cardiaca</label>
                    <input name="Frecuencia cardiaca" id="text3" type="number" class="form-control" placeholder="diganos su Frecuencia cardiaca" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord3">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >Peso</label>
                    <input name="Peso" id="text4" type="number" class="form-control" placeholder="diganos su Peso" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord4">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >Talla </label>
                    <input name="Talla" id="text5" type="number" class="form-control" placeholder="diganos su Talla" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord5">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                    <label class="col-5  col-form-label text-center" >IMC </label>
                    <input name="IMC" id="text6" type="number" class="form-control" placeholder="diganos su IMC" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                    <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord6">borrar</button>
              </div>
              <div class=" input-group mb-3 mx-auto d-inline-flex p-2" >
                <label class="col-5  col-form-label text-center" >Fecha de atencion </label>
                <input name="Fecha" id="text7" type="date" class="form-control" placeholder="diganos su Fecha de atencion" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button  class="btn btn-outline-secondary" type="button" id="btnStartRecord">hable </button> 
                <button  class="btn btn-outline-secondary" type="button" id="btnCleanRecord7">borrar</button>
          </div>

              <div class="d-grid gap-2 col-2 d-md-block mx-auto">
                <input type="submit" value="Submit" style="padding:15px;">
              </div>
        </form>
    </div>
    <div class='mt-5'>
<?php
    include_once "mostrar.php";
    $paciente = new paciente();
    $resultado = $paciente->mostrar();
        echo "<table class='table'>
                <thead class='table-light'>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Nombres</th>
                        <th scope='col'>Apellidos</th>
                        <th scope='col'>Temperatura</th>
                        <th scope='col'>Frecuencia_cardiaca</th>
                        <th scope='col'>Peso</th>
                        <th scope='col'>Talla</th>
                        <th scope='col'>IMC</th>
                        <th scope='col'>Fecha</th>
                        <td scope='col'>Acciones</td>
                    </tr>
                </thead>
                <tbody>";
                
                foreach ($resultado->fetchAll() as $k => $item) {
              echo"<tr>
                        <th scope='row'>".($k + 1)."</th>
                        <td>".$item['Nombres']."</td>
                        <td>".$item['Apellidos']."</td>
                        <td>".$item['Temperatura']."</td>
                        <td>".$item['Frecuencia_cardiaca']."</td>
                        <td>".$item['Peso']."</td>
                        <td>".$item['Talla']."</td>
                        <td>".$item['IMC']."</td>
                        <td>".$item['Fecha']."</td>
                        <td class='tabla_celda'><form method='post' action='acciones/Eliminar.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit' value='Eliminar'>
                   </form>
                <form method='post' action='acciones/editar.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit2' value='Actualizar'>
                    </form>
                </td>
                    </tr>";
                
            
                }
                echo "</table>";
?>
 </div>

    <?php else: ?>

<div class="contenedor">
        <h1 class="titulo">Iniciar sesion</h1>
        <hr class="border">
            <span><a href="signup.php"></a></span>

            <form action="login.php" method="POST" class="formulario">
              <div class="form-group">
              <input type="text" name="usuario" class="usuario" placeholder="ingrese usuario">
            </div>
             <div class="form-group">
              <input type="password" name="password" class="password" placeholder="ingrese contraseña">
            </div>
              <input type="submit" value="Submit" style="padding:15px;">
            </form>

            <h3 class="titulo"> ¿No tienes una cuenta? <br><a href="registro.php">Registrate</a></h3>
            <?php endif; ?>

            

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="index.js"></script>
</body>
</html>
