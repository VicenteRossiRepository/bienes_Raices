<?php
require '../../includes/funciones.php';

$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
}

// Verificar que tenga un id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//Conexion a BD
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar datos propiedad
$consultarProiedades = "SELECT * FROM propiedades WHERE id=${id}";
$resultadoPropiedades = mysqli_query($db, $consultarProiedades);
$propiedad = mysqli_fetch_assoc($resultadoPropiedades);

//Consultar para obtener a los vendedores
$consultaVendedores = "SELECT * FROM vendedores";
$resultadoVendedores = mysqli_query($db, $consultaVendedores);

//arreglo mensajes de errores
$errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

//Ejecutar codigo despues de enviar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

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
    
    //Validar tamaño maximo imagen (1mb maximo)
    $medida = 1000*1000;

    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
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
        
        //Actualizar a base de datos
        $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, habitaciones = ${habitaciones}, vendedores_id = ${vendedores_id} WHERE id=${id}";

        $resultado = mysqli_query($db, $query);
            if ($resultado) {
                //redireccionar al usuario
                header("Location:/admin?resultado=2");
            }
    }

}


incluirTemplate('header');

?> 
    <main class="contenedor seccion">
        <h1>Actualizar</h1>
        
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
<?php echo $error;?>
            </div>
            
        <?php endforeach;?>    

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad ; ?>" class="imagen-small">

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

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>
    </main>

    
 <?php incluirTemplate('footer'); ?> 