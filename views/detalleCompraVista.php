<?php require_once 'templates/header.php'; ?>




<?php if(isset($detalles)) { ?>
<div class="table-scroll">

  <table class="tablePeliculas" id="tablaP">
  	<thead>
  		<tr>
  			<th width="100" class="text-center">Imagen</th>
  			<th width="200" class="text-center">Nombre</th>
  			<th width="100" class="text-center">Precio</th>
  			<th width="30" class="text-center">Cantidad</th>
  			<th width="140" class="text-center">SubTotal</th>
  			<th width="200" class="text-center">Fecha de Compra</th>
  		</tr>
  	</thead>
  	<tbody>
  		
  		<?php foreach($detalles as $detalle) { ?>
	  		<tr>
	  			<td> <img width="50" height="100" src="<?= $detalle['imgPath'] ?>"> </td>
	  			<td> <?= $detalle['Nombre'] ?> </td>
	  			<td> $<?= $detalle['Precio'] ?></td>
	  			<td> <?= $detalle['Cantidad'] ?> </td>
	  			<td> $<?= $detalle['SubTotal'] ?></span></td>
	  			<td> <?= $detalle['FechaCompra'] ?></td>
	  		</tr>
  		<?php } ?>

  	</tbody>
  </table>
</div>

<!--
<div class="row">
<div class="medium-10 small-12 medium-centered columns" >
<hr>
	<div class="callout small">
		<span><strong>Total:</strong> $<?= $detalles[0]['Total']?></span>
		
	</div>
</div>
</div>-->
<?php } ?>

<?php require_once 'templates/footer.php'; ?>