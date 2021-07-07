<?php 
    $titulo ='Index';
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

    <form>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="input_nombre">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="input_apellido">
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Área de Especialidad</label>
            <select class="form-select" id="especialidad">
                <option selected>Seleccione una</option>
                <option value="1">Base de Datos</option>
                <option value="2">Desarrollo Web</option>
                <option value="3">Administración Web</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccón de Email</label>
            <input type="email" class="form-control" id="email">
            <div id="emailHelp" class="form-text">Tu dirección de email no se compartira con nadie.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Número de contacto</label>
            <input type="text" class="form-control" id="numero_contacto">
            <div id="numero_ayuda" class="form-text">Tu número de teléfono no se compartira con nadie.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once 'includes/footer.php';?>
  