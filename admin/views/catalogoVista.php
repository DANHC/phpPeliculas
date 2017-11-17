<?php require_once 'templates/header.php'; ?>



<h4>Gestionar Peliculas</h4>
<hr />

<form data-abide novalidate action="?view=catalogo.php" method="POST" enctype="multipart/form-data">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Llene todos los campos</p>
  </div>

<div class="row">
  	<div class="medium-6 small-12 columns">
      <label>Nombre de la película:
        <input type="text" name="txtNombre" required>
        <span class="form-error">
          Nombre incorrecto
        </span>
      </label>
    </div>

    <div class="medium-6 small-12 columns">

    	<label>Categoría:</label>
        
        <select id="select" name="selCategoria" required>

        	<option value=""></option>

        	<?php foreach($categorias as $categoria) { ?>
        		<option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
        	<?php } ?>

        </select>

	</div>

</div>

<div class="row">

	    <div class="medium-6 small-12 columns">
	    	<label>Año:
	        <input type="number" name="txtAnio" required pattern="number">
	        <span class="form-error">
	          Año incorrecto
	        </span>
	      </label>
	    </div>

	    <div class="medium-6 small-12 columns">
			<label>Protagonista:
				<input type="text" name="txtProtagonista" required>
				<span class="form-error">
					Llene el campo
				</span>
			</label>
		</div>

</div>

<div class="row">
	
	<div class="medium-6 small-12 columns">
		<label>Duración:
			<input type="text" name="txtDuracion" required>
			<span class="form-error">
				Llene el campo
			</span>
		</label>
	</div>

	<div class="medium-6 small-12 columns">
	    <label>Director:
	    	<input type="text" name="txtDirector" required>
	    	<span class="form-error">
	    		Llene el campo
	    	</span>
	    </label>
	</div>

</div>

<div class="row">
	
	<div class="medium-4 small-12 columns">
		<label>Carátula:
			<input type="file" name="caratulaImg" required>
			<span class="form-error">
				Seleccione el archivo
			</span>
		</label>
	</div>

	<div class="medium-2 small-12 columns">
		<label>Precio: $
			<input type="number" name="txtPrecio" required pattern="number">
	    	<span class="form-error">
	    		Llene el campo
	    	</span>
		</label>
	</div>

	<div class="medium-6 small-12 columns">
		<label>Palabras clave (separadas por coma):
			<input type="text" name="txtPalabrasClave" required>
	    	<span class="form-error">
	    		Llene el campo
	    	</span>
		</label>
	</div>

</div>


<div class="row">
	
	<div class="medium-6 small-12 columns">
		<label>Estado:</label>
		<select id="estado" disabled name="estado">
			<option value="1">Disponible</option>
			<option value="0">No disponible</option>
		</select>
	</div>

</div>

<div class="row">
	
	<div class="medium-12 small-12 columns">
		<label>Plot (sinópsis):
			<input type="text" name="txtPlot" required>
	    	<span class="form-error">
	    		Llene el campo
	    	</span>
		</label>
	</div>

</div>



  <div class="row">
    
    <fieldset class="medium-12 columns">
    	<button class="button" type="submit" name="submit">Agregar Película</button>
    	<button class="button" type="submit" name="btnActualizar"  disabled>Actualizar Película</button>
    </fieldset>
    
  </div>

</form>

<div class="table-scroll">


  <table class="tablePeliculas">
  	<thead>
  		<tr>
  			<th width="100" class="text-center">Imagen</th>
  			<th width="200" class="text-center">Nombre</th>
  			<th class="text-center">Categoria</th>
  			<th width="150" class="text-center">Protagonista</th>
  			<th class="text-center">Duración</th>
  			<th width="150" class="text-center">Director</th>
  			<th width="100" class="text-center">Precio</th>
  			<th class="text-center">Acción</th>
  		</tr>
  	</thead>
  	<tbody>
  		
  		<?php foreach($peliculas as $pelicula) { ?>
  		<tr>
  			<td> <img width="50" height="50" src="<?= $pelicula['imgPath'] ?>"> </td>
  			<td> <?= $pelicula['Nombre'] ?> </td>
  			<td><?= $pelicula['Categoria'] ?></td>
  			<td> <?= $pelicula['Protagonista'] ?> </td>
  			<td> <?= $pelicula['Duracion'] ?> </td>
  			<td> <?= $pelicula['Director'] ?> </td>
  			<td>$<?= $pelicula['Precio'] ?> </td>
  			<td> <button type="button" class="button primary" id="<?= $pelicula['id']?>" onclick="cargarDatos(this.id)">Editar</button> </td>
  		</tr>
  		<?php } ?>

  	</tbody>
  </table>

</div>


<script type="text/javascript">
	
	function cargarDatos(idPeli) {
		var ajax = new XMLHttpRequest();

		var nombrePeli = document.querySelector("input[name='txtNombre']");
		var categoria = document.querySelector("select[name='selCategoria']");
		var anio = document.querySelector("input[name='txtAnio']");
		var protagonista = document.querySelector("input[name='txtProtagonista']");
		var duracion = document.querySelector("input[name='txtDuracion']");
		var director = document.querySelector("input[name='txtDirector']");
		var precio = document.querySelector("input[name='txtPrecio']");
		var palabrasClave = document.querySelector("input[name='txtPalabrasClave']");
		var plot = document.querySelector("input[name='txtPlot']");

		var buttonReg = document.querySelector("button[name='submit']");
		var buttonActu = document.querySelector("button[name='btnActualizar']");
		var estado = document.getElementById("estado");
		var caratula = document.querySelector("input[type='file']");

		buttonReg.disabled = true;
		buttonActu.disabled = false;

		ajax.open("POST", "controllers/validarUser.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("cargarDataPeli="+idPeli);

		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				var peli = JSON.parse(ajax.responseText);
				nombrePeli.value = peli[0]["Nombre"];
				categoria.value = peli[0]["idCategoria"];
				anio.value = peli[0]["Anio"];
				protagonista.value = peli[0]["Protagonista"];
				duracion.value = peli[0]["Duracion"];
				director.value = peli[0]["Director"];
				precio.value = parseFloat(peli[0]["Precio"]);
				palabrasClave.value = peli[0]["KeyWords"];
				plot.value = peli[0]["Plot"];
				buttonActu.value = peli[0]["id"];
				estado.value = peli[0]["Disponible"];
				estado.disabled = false;
				caratula.disabled = true;
				caratula.removeAttribute("required");
			}
		}



	}




</script>






<?php require_once 'templates/footer.php'; ?>