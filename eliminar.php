<?php 
    require_once 'db/conn.php';

    if (!$_GET['id']) {
        include 'includes/errormsj.php';
        //redirecion para prevenir la navegacion desde la ruta hacia esta pagina
        header("Location: ver_registrados.php");
    }else {
        //traigo id
        $id = $_GET['id'];

        //llamo a la funcion eliminar
        $resultado = $crud->eliminarAsistentes($id);

        //redirijo hacia la lista
        if ($resultado) {
            header("Location: ver_registrados.php");
        }else {
            include 'includes/errormsj.php';
        }
    }


?>