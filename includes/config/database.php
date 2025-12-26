<?php

function conectarDB(){
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

    if (!$db) {
        echo mysqli_connect_error();
        exit;
    }

    return $db;
}