<?php require_once 'templates/header.php'; ?>


<div class="row">

<h4>Iniciar Sesión</h4>

  	<div class="medium-6 small-12 columns">
      <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="txtUsuario">
    </div>

    <div class="medium-6 small-12 columns">
    	<label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="txtPass">
	</div>

</div>

<div class="row">
	
	<div class="medium-2 small-12 medium-centered columns">
		<button type="button" onclick="verificar()" class="button primary">Iniciar Sesión</button>
	</div>

</div>



<script type="text/javascript">
	
	function verificar() {
	
		var ajax = new XMLHttpRequest();
		var result;
		var user = document.querySelector("input[name='txtUsuario']").value;
		var pass = document.querySelector("input[name='txtPass']").value;

		ajax.open("POST", "controllers/validarUser.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("verificaUser="+user+"&pass="+pass);

		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				result = ajax.responseText;
				if(result != "0") {
					window.location = "?view=inicio.php";
				} else {
					alert("Credenciales incorrectas");
				}
			}
		}

}

</script>

<?php require_once 'templates/footer.php'; ?>