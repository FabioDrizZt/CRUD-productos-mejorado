<?php

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

if (!is_dir('img')) { // Si no existe la carpeta img se la crea
    mkdir('img');
}
$rutaImagen = '';
$imagen = $_FILES['imagen'] ?? null;

if ($imagen && $imagen['tmp_name']) {
    $rutaImagen = 'img/' . randomString(8) . '/' . $imagen["name"]; #ruta aleatoria de la imagen
    mkdir(dirname($rutaImagen));
    move_uploaded_file($imagen['tmp_name'], $rutaImagen);
}

if (!$_POST['nombre']) {
    $errores[] = "El nombre del producto es obligatorio";
}

if (!$_POST['precio'] or $_POST['precio'] < 0) {
    $errores[] = "El precio del producto es obligatorio y debe ser positivo";
}
