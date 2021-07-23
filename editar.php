<?php 
    $titulo ='Editar '; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $resultado = $crud->verEspecialidades();

    if (!isset($_GET['id'])) {
        echo 'error';
    }else {
        $id = $_GET['id'];
        $asistentes = $crud->verDetallesAsistentes($id); //guardo los detalles del asistente seleccionado por id
    
    
?>

    <h1 class="text-center">Editar Registro</h1>

    <form method="post" action="editpost.php"> 
        <input type="hidden" name="asistente_id" value="<?php echo $asistentes['id'] ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="input_nombre" name="input_nombre" value="<?php echo $asistentes['nombres'] ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="input_apellido" name="input_apellido"  value="<?php echo $asistentes['apellido'] ?>">
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  value="<?php echo $asistentes['fecha_nacimiento'] ?>">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Área de Especialidad</label>
            <select class="form-select" id="especialidad" name="especialidad">
                <!-- Creo las opciones de forma variable-->
               <?php while ($res = $resultado->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $res['especialidad_id']?>" <?php if ($res['especialidad_id'] == 
                $asistentes['especialidad_id']) echo 'selected' /*Si la condicion se cumple y el id de la especialidad es igual al id del asistente 
                se imprime la opcion seleccionada*/?>>
                   <?php echo $res['nombre'] ?>
                </option>
               <?php } ?> 
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccón de Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $asistentes['email'] ?>">
            <div id="emailHelp" class="form-text">Tu dirección de email no se compartira con nadie.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Número de contacto</label>
            <input type="text" class="form-control" id="numero_contacto" name="numero_contacto" value="<?php echo $asistentes['celular'] ?>">
            <div id="numero_ayuda" class="form-text">Tu número de teléfono no se compartira con nadie.</div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
<?php } ?>

<br>
<br>
<?php require_once 'includes/footer.php';?>
  