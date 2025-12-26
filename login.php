<?php

// conexion a base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Autenticar el usuario

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password =mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El e-mail es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "El PASSWORD es obligatorio o no es valido";
    } 
    
    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        

        if ($resultado -> num_rows) {
            // Revisar si password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar
            $auth = password_verify($password, $usuario["password"]);

            if ($auth) {
                // elusuario esta autenticado
                session_start();

                // Llenar arreglo sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
                
            }else{
                $errores[] = "El password es incorrecto";
            }
            
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}

// incluye el header
require 'includes/funciones.php';

incluirTemplate('header');

?> 
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>

        <form class="formulario" method='POST' novalidate>
             <fieldset>
                <legend>E-mail y Password</legend>
                
                <label for="txtEmail">E-mail</label>
                <input type="email" id="txtEmail" placeholder="Tu E-mail" name="email" required>
                
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" placeholder="Tu password" name="password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

    
 <?php incluirTemplate('footer'); ?> 