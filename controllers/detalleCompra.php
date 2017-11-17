<?php 

require_once 'models/cliente.php';

$cliente = new ClienteDAO();

if( isset($_SESSION['usuarioId']) ) {
	$detalles = $cliente->getClienteDetalleCompra($_SESSION['usuarioId']);
}



require_once 'views/detalleCompraVista.php';

