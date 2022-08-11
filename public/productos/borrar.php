<?php
/** @var $pdo \PDO */
require_once "../../database.php";

$id = $_POST['id'] ?? null;
if (!$id) {
    //Si no existe el id que se quiere eliminar volvemos al home
    header('Location: index.php');
    exit;
}

$consulta = $PDO->prepare("DELETE FROM productos WHERE id = :id");
$consulta->bindValue(':id', $id);
$consulta->execute();
//Una vez se borra el producto exitosamente se vuelve al home
header('Location: index.php');
