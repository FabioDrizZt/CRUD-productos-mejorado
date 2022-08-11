<?php foreach ($errores as $error) {?>
      <div class="alert alert-danger" role="alert">
        <?=$error?>
      </div>
    <?php }?>

    <form method="post" enctype="multipart/form-data">

  <div class="mb-3">
    <img src="<?=$producto['imagen'] ?? null?>" class="imagen editar" >
    <label>Imagen</label>
    <input type="file" class="form-control" id="imagen" name="imagen" >
  </div>
  <div class="mb-3">
    <label>Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>">
  </div>
  <div class="mb-3">
    <label>Descripcion</label>
    <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
  </div>
  <div class="mb-3">
    <label>Precio</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $precio ?>">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>