<?php 
    $titulo ='Success'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
?>
    <h1 class="text-center text-success">¡Registración Existosa!</h1>

    <?php 
        /*echo $_POST['input_nombre'];
        echo $_GET['input_apellido'];
        echo $_GET['fecha_nacimiento'];
        echo $_GET['especialidad'];
        echo $_GET['email'];*/
    
    ?>
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