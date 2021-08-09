<?php
    $titulo ='Login '; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = strtolower(trim($_POST['nombre_user']));
        $password = $_POST['password'];
        $new_pass = password_hash($password.$username, PASSWORD_DEFAULT);
        $resultado = $user->getUser($username, $new_pass);

    
        if (!$resultado) {
            echo '<div class="alert alert-danger">Usuario o Contraseña incorectas! Intente nuevamente</div>';
            var_dump($resultado);
        }else {
            $_SESSION['nombre_usuario'] = $username;
            $_SESSION['id'] = $resultado['id'];
            header("Location: ver_registrados.php");
        }
    }

    //$password_error="Inserte la contraseña para logear";
?>    

<h1 class="text-center"><?php echo $titulo ?></h1>
<div class="container">
    <!--
        $_SERVER['PHP_SELF'] va rederijir la accion hacia esta misma pagina
        la funcion htmlentities() previene de injecciones sql
    -->
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post">
            <div class="form-floating mb-3">
                <input type="text" name="nombre_user" class="form-control" id="nombre_user" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['nombre_user'];?>" placeholder="Usuario">
                <label for="nombre_user">Usuario: </label>
            </div>
                <?php if(empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>";?>
   
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <?php if(empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>"; ?>
                <label for="password">Contraseña: </label>
            </div>
            <br>
        <input type="submit" value="Login" class="btn btn-primary btn-block"><br>
        <a href="#">Olvido su contraseña</a>
    </form> 
</div>
    <br><br>
<?php require_once 'includes/footer.php';?>