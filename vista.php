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

 
    <div class="card-vista">
        <div class="card" style="width: 18rem;">
                                        <?php #si no hay imagen dentro de ulploads se muestra una blanck por default?>
        <img class="card-img-top" src="<?php echo  empty($resultado['avatar_path']) ? "uploads/blank.jpg" : $resultado['avatar_path']; ?>"/> 
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
                <br>
                <a href="ver_registrados.php" class="btn btn-info">Volver</a> 
                <!--- le paso el id del la persona registrada para ver sus detalles-->
                <a href="editar.php?id=<?php echo $resultado['id']?>" class="btn btn-warning">Editar</a>
                <a onclick="return confirm('¿Seguro que desea eliminar este registro?');" href="eliminar.php?id=<?php echo $resultado['id']?>" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
<?php } ?>

<?php require_once 'includes/footer.php';?>