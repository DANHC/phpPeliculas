<?php require_once 'templates/header.php'; ?>

<h4>Registro Nuevo Cliente</h4>
<hr />

<form data-abide novalidate action="?view=registro.php" method="POST">
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Llene todos los campos</p>
  </div>

<div class="row">
  	<div class="medium-6 small-12 columns">
      <label>Nombres:
        <input type="text" name="txtNombres" required>
        <span class="form-error">
          Nombre incorrecto
        </span>
      </label>
    </div>

    <div class="medium-6 small-12 columns">
    	<label>Apellidos:
        <input type="text" name="txtApellidos" required>
        <span class="form-error">
          Apellido incorrecto
        </span>
      </label>
	</div>
</div>

<div class="row">

	    <div class="medium-12 small-12 columns">
	    	<label>Dirección:
	        <input type="text" name="txtDireccion" required>
	        <span class="form-error">
	          Direccion incorrecta
	        </span>
	      </label>
	    </div>

</div>

<div class="row">
	
	<div class="medium-6 small-12 columns">
		<label>Teléfono:
			<input type="text" name="txtTelefono" required>
			<span class="form-error">
				Llene el campo
			</span>
		</label>
	</div>

	<div class="medium-6 small-12 columns">
	    <label>DUI:
	    	<input type="text" name="txtDui" required pattern="dui">
	    	<span class="form-error">
	    		Formato de DUI incorrecto
	    	</span>
	    </label>
	</div>

</div>

<div class="row">
	
	<div class="medium-6 small-12 columns">
		<label>Edad:
			<input type="number" name="txtEdad" required>
			<span class="form-error">
				Edad incorrecta
			</span>
		</label>
	</div>

	<div class="medium-6 small-12 columns">
		<label>Sexo: <br>
			<input type="radio" name="radSexo" value="M" id="masculino" required><label for="masculino">Masculino</label>
			<input type="radio" name="radSexo" value="F" id="femenino" required><label for="femenino">Femenino</label>
		</label>
	</div>

</div>

<hr />
<p class="text-center">Datos de usuario, los usará para iniciar Sesión</p>

<div class="row">

	<div class="medium-4 small-12 columns">
		<label>Nombre de usuario:
			<input type="text" name="txtUsuario" onblur="verificar()" required pattern="alpha_numeric">
			<span class="form-error">
				Nombre de usuario no permitido
			</span>
		</label>
	</div>

	<div class="medium-4 small-12 columns">
		<label>Contraseña:
			<input type="password" id="password" name="txtPassword" required pattern="alpha_numeric">
			<span class="form-error">
				Contraseña no permitida
			</span>
		</label>
	</div>

	<div class="medium-4 small-12 columns">
		<label>Contraseña:
			<input type="password" name="txtPassword" required pattern="alpha_numeric" data-equalto="password">
			<span class="form-error">
				La contraseña no coincide
			</span>
		</label>
	</div>

</div>

    
  <div class="row">
    
    <fieldset class="medium-12 columns">
    	<button class="button" type="submit" name="submit">Registrarse</button>
    </fieldset>
    
  </div>

</form>



<script type="text/javascript">
	

function verificar() {
	
	var ajax = new XMLHttpRequest();
	var resultCode;
	var user = document.querySelector("input[name='txtUsuario']").value;
	var button = document.querySelector("button[type='submit']");

	ajax.open("POST", "controllers/validarUser.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("checkUser="+user);

	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			resultCode = JSON.parse(ajax.responseText);
			if(resultCode['conteo'] == 0) {
				button.disabled = false;
			} else {
				alert("Nombre de usuario ya existente, escoja otro");
				button.disabled = true;
			}

		}
	}

}


</script>


<?php require_once 'templates/footer.php'; ?>