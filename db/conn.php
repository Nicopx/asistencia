<?php 
    //conexion local con la base de datos usando PDO 
    /*$host = '127.0.0.1'; //localhost
    $db = 'asistencia_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';*/


    //Conexion remota 
    $host = 'remotemysql.com'; //localhost
    $db = 'Uit8L1iPnO';
    $user = 'Uit8L1iPnO';
    $pass = 'kTzU4yYSmo';
    $charset = 'utf8mb4';

    //dsn contiene los datos de conexión.
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;";

    //ejecutando la conexion
    try {
        //instancio la clase PDO
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //manejadores de excepciones de error.
        //echo 'CONEXIÓN EXITOSA!';
    } catch (PDOException $e) {
        //si hay un error con la conexión se lanza un mensaje de error.
        throw new PDOException($e -> getMessage());
    }

    //cuando la conexion es exitosa referecion crud e instancio la clase y
    require_once 'crud.php';
    $crud = new crud($pdo);
?>