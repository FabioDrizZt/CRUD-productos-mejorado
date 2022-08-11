<?php
/** @var $pdo \PDO */
require_once "../../database.php";

$buscar = $_GET['buscar'] ?? '';
if ($buscar) {
    $consulta = $PDO->prepare("SELECT * FROM productos WHERE nombre LIKE :nombre");
    $consulta->bindValue(':nombre', "%$buscar%");
} else {
    $consulta = $PDO->prepare("SELECT * FROM productos ORDER BY id DESC");
}
$consulta->execute();
$productos = $consulta->fetchAll(pdo::FETCH_ASSOC);
/* echo "<pre>";
var_dump($productos);
echo "</pre>"; */

?>

<?php include_once '../partials/header.php';?>

    <h1>CRUD Productos</h1>
    <a href="crear.php"><button type="button" class="btn btn-success btn-lg">Crear</button></a>
<form>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Nombre del producto" aria-label="Recipient's username" aria-describedby="button-addon2" name="buscar">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
</div>
</form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">fecha de creacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $i => $producto) {?>
        <tr>
        <th scope="row"><?=$i + 1?></th>
        <td>
          <img src="<?=$producto['imagen']?>" class="imagen" >
        </td>
        <td><?=$producto['nombre']?></td>
        <td><?=$producto['descripcion']?></td>
        <td><?=$producto['precio']?></td>
        <td><?=$producto['fecha_creacion']?></td>
        <td>
            <form method="GET" action="actualizar.php">
              <input type="hidden" name="id" value="<?=$producto['id']?>"/>
              <button type="submit" class="btn btn-info btn-sm">Actualizar</button>
            </form>
            <form method="POST" action="borrar.php">
              <input type="hidden" name="id" value="<?=$producto['id']?>"/>
              <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
            </form>
        </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<?php include_once '../partials/footer.php';?>
