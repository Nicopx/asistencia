<?php 
    $titulo ='Success'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

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

<?php require_once 'includes/footer.php';?>