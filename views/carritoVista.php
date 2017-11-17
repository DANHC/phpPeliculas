<?php require_once 'templates/header.php'; ?>


<h4>Carrito de compras</h4>
<hr />

<?php if( !empty($_SESSION['peliculaId']) && isset($_SESSION['peliculaId']) ) { ?>

<form action="?view=carrito.php" method="POST">
<div class="table-scroll">

  <table class="tablePeliculas" id="tablaP">
  	<thead>
  		<tr>
  			<th width="100" class="text-center">Imagen</th>
  			<th width="200" class="text-center">Nombre</th>
  			<th width="100" class="text-center">Precio</th>
  			<th width="30" class="text-center">Cantidad</th>
  			<th width="140" class="text-center">SubTotal</th>
  			<th width="100" class="text-center">Acción</th>
  		</tr>
  	</thead>
  	<tbody>
  		
  		<?php foreach($peliculas as $pelicula) { ?>
	  		<tr id="<?= $pelicula['id'] ?>">
	  			<input type="hidden" name="idPeliculas[]" value="<?= $pelicula['id'] ?>">
	  			<td> <img width="50" height="100" src="<?= $pelicula['imgPath'] ?>"> </td>
	  			<td> <?= $pelicula['Nombre'] ?> </td>
	  			<td> <input type="hidden" name="precios[]" value="<?= $pelicula['Precio']?>"> $<?= $pelicula['Precio'] ?></td>
	  			<td> <input type="number" name="cantidades[]" value="1" min="1" onkeyup="calcularTotal(this)" onclick="calcularTotal(this)"> </td>
	  			<td> <input type="hidden" name="subTotales[]" value="<?= $pelicula['Precio'] ?>"> <span>$<?= $pelicula['Precio'] ?></span></td>
	  			<td> <button type="button" class="button alert" id="<?= $pelicula['id']?>" onclick="eliminar(this)">Eliminar</button> </td>
	  		</tr>
  		<?php } ?>

  	</tbody>
  </table>
</div>

<hr>

<div class="row">

<div class="medium-11 small-12 medium-centered columns" >
	<div class="callout small">
		<div class="row">
			<div class="medium-1 small-6 columns">
				<label class="text-right middle float-left"><strong>Total $</strong></label>
			</div>
			<div class="medium-3 small-6 columns">
				<input type="number" class="float-left" id="total" name="txtTotalGlobal" readonly />
  			</div>
  			<div class="medium-8 small-12 columns">
  				<button class="button primary float-right" type="submit" name="carritoSubmit">Confirmar Pedido</button>
			</div>
		</div>
	</div>
</div>

</div>
</form>

<?php } else { ?>

	<h5 class="text-center"> <?= $msj ?> </h5>

<?php } ?>

<script type="text/javascript">
	
	window.onload = function() {
		var totalG = document.getElementById("total");
		var totales = document.querySelectorAll("input[name='subTotales[]']");

		var totalesT = 0;

		for(var i = 0; i < totales.length; i++) {
			 totalesT += parseFloat(totales[i].value);
		}

		totalG.value = totalesT;

	}




	function calcularTotal(element) {
		
		var tr = element.parentNode.parentNode;
		var cells = tr.cells;
		
		var precio = cells[2].querySelector("input").value;
		var cantidad = cells[3].querySelector("input").value;
		var total = cells[4].querySelector("input");
		var totalText = cells[4].querySelector("span");
		var subtotal = (precio * cantidad).toFixed(2);

		total.value = subtotal;

		totalText.textContent = "$" + (subtotal);
		

		var totales = document.querySelectorAll("input[name='subTotales[]']");
		var totalG = document.getElementById("total");

		var totalesT = 0;

		for(var i = 0; i < totales.length; i++) {
			 totalesT += parseFloat(totales[i].value);
		}


		totalG.value = totalesT.toFixed(2);
		

	}


	function eliminar(buttonPeli) {
		var trIndex = buttonPeli.parentNode.parentNode.rowIndex;
		var tabla = document.getElementById("tablaP");
		var idPeli = buttonPeli.id;
		var ajax = new XMLHttpRequest();

		
		ajax.open("POST", "controllers/ajaxController.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("eliminarPeli="+idPeli);

		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				resp = ajax.responseText;
				if(resp == "true") {
					tabla.deleteRow(trIndex);
				}
			}
		}

	}

</script>



















<?php require_once 'templates/footer.php'; ?>