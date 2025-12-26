<?php

// Importar conexion
require 'includes/config/database.php';
$db = conectarDB();

// Crear email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);


// query para crear usuario
$query = "INSERT INTO usuarios (email, password) VALUES('${email}', '${passwordHash}');";



// agragarlo a la BD
mysqli_query($db, $query);