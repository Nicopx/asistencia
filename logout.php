<?php
    //traigo la sesion iniciada a esta pagina
    include_once 'includes/session.php';

    //cierro la sesion iniciada del usuario
    session_destroy();
    //redirijo al inicio
    header('Location: index.php');
?>    