<?php require_once 'templates/header.php'; ?>

 
<div class="row">
<div class="column small-12 medium-12">
	<div data-simple-slider id="banner" class="float-center">
	  <img class="float-center" src="views/images/banner1.jpg">
	  <img class="float-center" src="views/images/banner2.jpg">
	  <img class="float-center" src="views/images/banner3.jpg">
	</div>
	<script>
	  simpleslider.getSlider();
	</script>
</div>
</div>


<h2 class="text-center">Bienvenido</h2>

<div class="row">
	<div class="column small-12 medium-8">
		<div class="callout">
		  <h5>Los Mejores Precios de Películas</h5>
		  <p>Checa el catálogo de películas. ¡Los precios te gustarán!</p>
		  <a href="?view=catalogo.php">Catálogo</a>
		</div>
	</div>
	<div class="column small-12 medium-4">
		<div class="callout">
		  <h5>Links:</h5>
		  <a href="https://www.netflix.com/sv-en/">Netflix</a> <br>
		  <a href="https://www.youtube.com/">Youtube</a>
		</div>
	</div>
</div>

<?php require_once 'templates/footer.php'; ?>