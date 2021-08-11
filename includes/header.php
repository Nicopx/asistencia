<?php 
//Esto incluye el archivo de sesion. Este archivo contiene codigo que inicializa la sesion
//Teniendo esto en el header, se incluirá en cada página, permitiendo la capacidad de que las sesiones sean usadas
//en cada a través del toda la página.
include_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css"/>
    <title>Asistencia - <?php echo $titulo?></title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Conferencia IT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <?php 
            //Si la sesion de usuario está existe se muestra el link para ver los asistentes
            if (isset($_SESSION['id'])) {
            ?>
              <a class="nav-link" href="ver_registrados.php">Ver Asistentes</a>
            <?php } ?>
          </div>
        </div>
        <div class="navbar-nav mr-auto">
          <?php 
            if (!isset($_SESSION['id'])) {
          ?>
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          <?php }else {?>
            <a class="nav-link active" aria-current="page" href="#"><span class="text-light bg-dark">Hola <?php echo $_SESSION['nombre_usuario']?>!</span></a>
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          <?php }?>
          </div>
        </div>
      </div>
    </nav>
<br>