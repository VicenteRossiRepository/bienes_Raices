<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
}


//Conexion a BD
require '../../includes/config/database.php';
$db = conectarDB();

//Consultar para obtener a los vendedores
$consultaVendedores = "SELECT * FROM vendedores";
$resultadoVendedores = mysqli_query($db, $consultaVendedores);

//arreglo mensajes de errores
$errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';

//Ejecutar codigo despues de enviar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar files a una variable
    $imagen=$_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$descripcion) {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes añadir un wc";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir un estacionamiento";
    }
    if (!$vendedores_id) {
        $errores[] = "Debes añadir un vendedor";
    }
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "Debes añadir una imagen";
    }


    //revisar que arreglo de errores este vacio 

    if(empty($errores)){

        // Subir archivos
        // Crear carpeta

        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar nombre unico a archivo
        $nombreImagen = md5(uniqid(rand(), true)). ".jpg";

        var_dump($nombreImagen);

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
        
        //insertar a base de datos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id, creado, imagen) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id', '$creado', '$nombreImagen')";

        $resultado = mysqli_query($db, $query);
            if ($resultado) {
                //redireccionar al usuario
                header("Location:/admin?resultado=1");
            }
    }

}

incluirTemplate('header');

?> 
    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
<?php echo $error;?>
            </div>
            
        <?php endforeach;?>    

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"> <?php echo $descripcion;?> </textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones;?>" placeholder="Ej: 3" min="1" max="9">
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" value="<?php echo $wc;?>" placeholder="Ej: 3" min="1" max="9">
                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento;?>" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="" >
                    <option value="">Elije un vendedor</option>
                    <?php while ($row = mysqli_fetch_assoc($resultadoVendedores)) : ?>
                        <option <?php echo $vendedores_id === $row['id'] ? 'selected' : '';?> value= "<?php echo $row['id']?>"> <?php echo $row['nombre'] . " " . $row['apellido'];?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>
    </main>

    
 <?php incluirTemplate('footer'); ?> 