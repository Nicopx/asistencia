<?php 
    $titulo ='Vista de Detalles'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //traigo los asistentes por id
    //si el id no existe se muestra el mensaje de error.
    if (!isset($_GET['id'])) {
        echo '<h1 class="text-center text-danger">Por favor ver detalles e intentar de nuevo</h1>';
    }else {
        //si no, se renderiza la card.
        $id = $_GET['id'];
        $resultado = $crud->verDetallesAsistentes($id);
    
?>

    <?php ?>
        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $resultado['nombres']. ' ' . $resultado['apellido'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Email: <?php echo $resultado['email'] ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                Especialidad: <?php echo $resultado['nombre'] ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                Fecha de Nacimiento: <?php echo $resultado['fecha_nacimiento'] ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                Contacto: <?php echo $resultado['celular'] ?>
            </h6>
            <a href="#" class="card-link">GitHub</a>
        </div>
    </div>
<?php } ?>

<?php require_once 'includes/footer.php';?>