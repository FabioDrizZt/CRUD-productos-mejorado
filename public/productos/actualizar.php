<?php

require_once "../../funciones.php";
/** @var $pdo \PDO */
require_once "../../database.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    //Si no existe el id que se quiere eliminar volvemos al home
    header('Location: index.php');
    exit;
}

$consulta = $PDO->prepare("SELECT * FROM productos WHERE id = :id");
$consulta->bindValue(':id', $id);
$consulta->execute();
$producto = $consulta->fetch(pdo::FETCH_ASSOC);

/* echo "<pre>";
var_dump($producto);
echo "</pre>"; */

$errores = [];
$nombre = $producto['nombre'];
$descripcion = $producto['descripcion'];
$precio = $producto['precio'];

if (count($_POST) > 0) { // Si se cargo la pagina mediante el boton de crear producto

    require_once "validacion.php";

    if (count($errores) == 0) { // si no hay errores inserto el producto en la tabla
        $consulta = $PDO->prepare("UPDATE productos
                        SET nombre=:nombre,
                        imagen=:imagen,
                        precio=:precio,
                        descripcion = :descripcion
                        WHERE id=:id");
        $consulta->bindValue(":nombre", $nombre);
        $consulta->bindValue(":imagen", $rutaImagen);
        $consulta->bindValue(":precio", $precio);
        $consulta->bindValue(":descripcion", $descripcion);
        $consulta->bindValue(":id", $id);

        $consulta->execute();
        //Si se carga la consulta me debería enviar al home
        header('Location: index.php');
    }
}
?>

<?php include_once '../partials/header.php';?>
  <h1>Edición de <?=$producto['nombre']?></h1>
  <a href="index.php"><button type="button" class="btn btn-success btn-lg">Volver</button></a>

  <?php include_once "../productos/form.php"?>
<?php include_once '../partials/footer.php';?>
