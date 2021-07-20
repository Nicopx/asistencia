<?php 
    $titulo ='Asistentes'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //traigo los asistentes 
    $resultado = $crud->verAsistentes();
?>

<table class="table">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha de Nacimiento</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Especialidad</th>
    </tr>
    <?php while ($res = $resultado->fetch(PDO::FETCH_ASSOC)) {# convierte resultado en un array asociativo?>
        <tr>
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['nombres'] ?></td>
            <td><?php echo $res['apellido'] ?></td>
            <td><?php echo $res['fecha_nacimiento'] ?></td>
            <td><?php echo $res['email'] ?></td>
            <td><?php echo $res['celular'] ?></td>
            <td><?php echo $res['nombre']?></td>
        </tr>
    <?php } ?>
</table>





<br>
<br>
<br>

<?php require_once 'includes/footer.php';?>