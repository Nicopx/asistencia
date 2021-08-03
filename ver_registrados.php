<?php 
    $titulo ='Asistentes'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //traigo los asistentes
    $resultado = $crud->verAsistentes();
?>
<div class="container">
<table class="table">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Especialidad</th>
        <th>Acciones</th>
    </tr>
    <?php while ($res = $resultado->fetch(PDO::FETCH_ASSOC)) {# convierte resultado en un array asociativo?>
        <tr>
            <!-- acceso a traves de cada key al valor.-->
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['nombres'] ?></td>
            <td><?php echo $res['apellido'] ?></td>
            <td><?php echo $res['nombre']?></td><!--Especialidad -->
            <td>
                <a href="vista.php?id=<?php echo $res['id']?>" class="btn btn-primary">Ver</a> <!--- le paso el id del la persona registrada para ver sus detalles-->
                <a href="editar.php?id=<?php echo $res['id']?>" class="btn btn-warning">Editar</a>
                <a onclick="return confirm('¿Seguro que desea eliminar este registro?');" href="eliminar.php?id=<?php echo $res['id']?>" class="btn btn-danger">Eliminar</a>
            </td> 
        </tr>
    <?php } ?>
</table>
</div>


<br>
<br>
<br>

<?php require_once 'includes/footer.php';?>