<?php require_once 'templates/header.php'; ?>


<h4>Pedidos de Clientes Pendientes</h4>
<hr />



<div class="table-scroll">

  <table class="tablePeliculas" id="tablaP">
  	<thead>
  		<tr>
  			<th width="200" class="text-center">Cliente</th>
  			<th width="200" class="text-center">Dirección</th>
  			<th width="100" class="text-center">Teléfono</th>
  			<th width="150" class="text-center">Fecha de Compra</th>
  			<th width="140" class="text-center">Total</th>
  			<th width="100" class="text-center">Acción</th>
  		</tr>
  	</thead>
  	<tbody>
  		
  		<?php foreach($compras as $compra) { ?>
	  		<tr>
	  			<td> <?= $compra['Cliente'] ?> </td>
	  			<td> <?= $compra['Direccion'] ?></td>
	  			<td> <?= $compra['Telefono'] ?> </td>
	  			<td> <?= $compra['FechaCompra'] ?></span></td>
	  			<td> $<?= $compra['Total'] ?></td>
	  			<td><button type="button" id="<?= $compra['id']?>" onclick="aprobar(this)" class="button primary">Realizado</button></td>
	  		</tr>
  		<?php } ?>

  	</tbody>
  </table>
</div>


<script type="text/javascript">
	
	function aprobar(button) {
		var ajax = new XMLHttpRequest();
		var idCompra = button.id;
		var trIndex = button.parentNode.parentNode.rowIndex;
		var tabla = document.getElementById("tablaP");

		ajax.open("POST", "controllers/validarUser.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("compraId="+idCompra);

		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				result = ajax.responseText;
				alert(result);
				tabla.deleteRow(trIndex);
			}

		}


	}


</script>




<?php require_once 'templates/footer.php'; ?>