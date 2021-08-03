<?php 
    require_once 'db/conn.php';

    //guardo los valores del metodo post
    if (isset($_POST['submit'])) {
        
        $id = $_POST['asistente_id'];
        $nombre = $_POST['input_nombre'];
        $apellido = $_POST['input_apellido'];
        $fecha_n = $_POST['fecha_nacimiento'];
        $email = $_POST['email'];
        $celular = $_POST['numero_contacto'];
        $especialidad = $_POST['especialidad'];

    //llamo a la funcion del crud
    $resultado = $crud->editarAsistente($id, $nombre, $apellido, $fecha_n, $email, $celular, $especialidad);

    //redirijo a index.php
    if($resultado){
            header("Location: ver_registrados.php");
    }

    }else {
        echo 'error';
    }


?>