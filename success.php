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
     

        $imagen_orig = $_FILES['avatar']['tmp_name']; //imagen original
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION); //guardo el tipo de extension
        $imagenes_dir = 'uploads/';
        $destinacion = "$imagenes_dir$celular.$extension";
        move_uploaded_file($imagen_orig, $destinacion);

        //exit();//pauso la ejecucion

        //llamo a la funcion insert 
        $isSuccess = $crud->insert($nombre, $apellido, $fecha_n, $email, $celular, $especialidad, $destinacion);
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

    <img src="<?php echo  $destinacion; ?> " style="width: 18rem; hight: 18rem;" />
    <div class="card" style="width: 18rem; center">
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

<?php require_once 'includes/footer.php';?>