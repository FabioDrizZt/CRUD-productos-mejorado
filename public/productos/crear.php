<?php

require_once "../../funciones.php";
/** @var $pdo \PDO */
require_once "../../database.php";

$errores = [];
$nombre = "";
$descripcion = "";
$precio = "";

if (count($_POST) > 0) { // Si se cargo la pagina mediante el boton de crear producto

    require_once "validacion.php";

    if (count($errores) == 0) { // si no hay errores inserto el producto en la tabla

        $consulta = $PDO->prepare("INSERT INTO productos(nombre, imagen, precio, descripcion)
                          VALUE(:nombre, :imagen, :precio, :descripcion)");
        $consulta->bindValue(":nombre", $nombre);
        $consulta->bindValue(":imagen", $rutaImagen);
        $consulta->bindValue(":precio", $precio);
        $consulta->bindValue(":descripcion", $descripcion);
        $consulta->execute();
        //Si se carga la consulta me debería enviar al home
        header('Location: index.php');

    }
}
?>

<?php include_once '../partials/header.php';?>
    <h1>Creación de Productos</h1>
    <a href="index.php"><button type="button" class="btn btn-success btn-lg">Volver</button></a>
    <?php include_once "../productos/form.php"?>
<?php include_once '../partials/footer.php';?>
