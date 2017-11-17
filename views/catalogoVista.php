<?php require_once 'templates/header.php'; ?>

<div class="row">
<div class="column small-12 medium-12">
	<div data-simple-slider id="banner">
	  <img  src="views/images/banner1.jpg">
	  <img src="views/images/banner2.jpg">
	  <img src="views/images/banner3.jpg">
	</div>
	<script>
	  simpleslider.getSlider();
	</script>
</div>
</div>

<div class="row">
  <div class="column small-12 medium-2">
    <div class="button-group stacked">
    	<?php foreach ($categorias as $categoria) { ?>
    		<a class="button" href="?view=catalogo.php&cat=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
    	<?php } ?>
    </div>
  </div>

  <div class="column small-12 medium-10">
	<div class="row small-up-2 medium-up-4">
	<?php foreach($peliculas as $pelicula) { ?>
		<div class="column">
		  	<div class="card">
		  		<div class="card-divider">
		    		<p class="text-center"><strong><?= $pelicula['Nombre'] ?></strong></p>
		  		</div>
		  		<img class="imgPoster" src="<?= $pelicula['imgPath'] ?>">
		  		<div class="card-section">
		  		<p class="text-center">Precio: <strong>$<?= $pelicula['Precio'] ?></strong></p>
		  		<a class="small button float-center" href="?view=peliculaInfo.php&id=<?= $pelicula['id'] ?>" target="_blank">Ver Info</a>
		  		<?php if(isset($_SESSION['usuario'])) { ?>
		    		<button id="<?= $pelicula['id'] ?>" type="button" class="button primary float-center" onclick="addPeli(this.id)">Añadir al carro</button>
		    	<?php } ?>
		  		</div>
			</div>
		</div>
	<?php } ?>
	</div>
  </div>



</div>

<script type="text/javascript">
	
	function addPeli(id) {

		var ajax = new XMLHttpRequest();
		ajax.open("POST", "controllers/ajaxController.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("addMovie="+id);

		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				if(ajax.responseText != "") {
					alert(ajax.responseText);
				}
			}
		}


	}

</script>


<?php require_once 'templates/footer.php'; ?>