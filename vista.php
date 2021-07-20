<?php 
    $titulo ='Vista de Detalles'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //traigo los asistentes 
    //$resultado = $crud->verAsistentes();
    if (isset($_POST['submit'])) {
        //guardos los valores del arrat $_POST
        $nombre = $_POST['input_nombre'];
        $apellido = $_POST['input_apellido'];
        $fecha_n = $_POST['fecha_nacimiento'];
        $email = $_POST['email'];
        $celular = $_POST['numero_contacto'];
        $especialidad = $_POST['especialidad'];
        //llamo a la funcion insert 
        $isSuccess = $crud->insert($nombre, $apellido, $fecha_n, $email, $celular, $especialidad);

        if ($isSuccess) {
           echo '<h1 class="text-center text-success">¡Registración Existosa!</h1>';
        }
        else {
            echo '<h1 class="text-center text-danger">Error procesando la solicitud!</h1>';
        }
    }
?>

<?php ?>
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['input_nombre']. ' ' . $_POST['input_apellido'];?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Email: <?php echo $_POST['email'] ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Especialidad: <?php echo $_POST['especialidad'] ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Fecha de Nacimiento: <?php echo $_POST['fecha_nacimiento'] ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Contacto: <?php echo $_POST['numero_contacto'] ?></h6>
        <a href="#" class="card-link">GitHub</a>
    </div>
    </div>


<?php require_once 'includes/footer.php';?>