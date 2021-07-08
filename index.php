<?php 
    $titulo ='Index'; //seteo el titulo para que sea dinamico en cada pagina
    require_once 'includes/header.php';
?>

    <h1 class="text-center">Registro para la conferencia</h1>

    <!-- 
        - Nombre
        - Apellido
        - Fecha de nacimiento (elegible)
        - Especialidad
        - Direccion de email
        - numero telefonico.

    -->

    <form method="post" action="success.php"> 
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="input_nombre" name="input_nombre">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="input_apellido" name="input_apellido">
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Área de Especialidad</label>
            <select class="form-select" id="especialidad" name="especialidad">
                <option selected>Seleccione una</option>
                <option value="Base de Datos">Base de Datos</option>
                <option value="Desarrollo Web">Desarrollo Web</option>
                <option value="Administración Web">Administración Web</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccón de Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <div id="emailHelp" class="form-text">Tu dirección de email no se compartira con nadie.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Número de contacto</label>
            <input type="text" class="form-control" id="numero_contacto" name="numero_contacto">
            <div id="numero_ayuda" class="form-text">Tu número de teléfono no se compartira con nadie.</div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once 'includes/footer.php';?>
  