<?php require_once 'templates/header.php'; ?>



<div class="media-object stack-for-small">
  <div class="media-object-section">
    <div class="thumbnail">
      <img width="300" height="500" src="<?= $pelicula['imgPath'] ?>">
    </div>
  </div>
  <div class="media-object-section">
    <h3 class="text-center"><?= $pelicula['Nombre'] ?></h3>
    <hr />
    <p><span class="label"><strong>Año:</strong></span><?= $pelicula['Anio'] ?></p>
    <p><span class="label"><strong>Protagonista:</strong></span><?= $pelicula['Protagonista'] ?></p>
    <p><span class="label"><strong>Duración:</strong></span><?= $pelicula['Duracion'] ?></p>
    <p><span class="label"><strong>Director:</strong></span><?= $pelicula['Director'] ?></p>
    <p><span class="label"><strong>Precio:</strong></span>$<?= $pelicula['Precio'] ?></p>
    <p><span class="label"><strong>Plot:</strong></span><?= $pelicula['Plot'] ?></p>
  </div>
</div>


<?php require_once 'templates/footer.php'; ?>