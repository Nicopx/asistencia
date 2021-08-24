<?php 
    $titulo ='Success'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

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
        $especialidadNombre= $crud->verEspecialidadesById($especialidad);

        if ($isSuccess) {
            SendEmail::SendMail($email, 'Bienvenido a la Conferencia 2021', 'Su registracion se complento exitosamente');
            include 'includes/successmsj.php';
        }
        else {
            include 'includes/errormsj.php';
        }
    }
?>

    <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $nombre. ' ' . $apellido;?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Email: <?php echo $email ?>
                    </h6>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Especialidad: <?php echo $especialidadNombre['nombre'] ?>
                    </h6>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Fecha de Nacimiento: <?php echo $fecha_n ?>
                    </h6>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Contacto: <?php echo $celular ?>
                    </h6>
                    <a href="#" class="card-link">GitHub</a>
    </div>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>