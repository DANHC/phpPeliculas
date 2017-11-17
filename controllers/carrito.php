<?php 
date_default_timezone_set('America/El_Salvador');

require_once 'models/pelicula.php';
require_once 'models/db.php';

$db = new Database();
$pelicula = new PeliculaCat();


if( !empty($_SESSION['peliculaId']) && isset($_SESSION['peliculaId']) ) {

	foreach($_SESSION['peliculaId'] as $idPeli) {
		$peliculas[] = $pelicula->getPeliculaById($idPeli);
	}

} else {
	$msj = "No hay ninguna pelicula en su carrito";
}


if( isset($_POST['carritoSubmit']) ) {
	$clienteId = (int) $_SESSION['usuarioId'];
	$fechaCompra = date('Y-m-d');
	$total = $_POST['txtTotalGlobal'];

	$peliculasId = $_POST['idPeliculas'];
	$precios = $_POST['precios'];
	$cantidades = $_POST['cantidades'];
	$subtotales = $_POST['subTotales'];

	$sql1 = "INSERT INTO Compra(idCliente, FechaCompra, Total) VALUES($clienteId, '$fechaCompra', $total)";

	$res = $db->insertUpdate($sql1);

	if($res) {
		$compraId = $db->select("SELECT MAX(id) AS ID FROM Compra");

		for($i = 0; $i < count($peliculasId); $i++) {
			$sql2 = "INSERT INTO DetalleCompra(idCompra, idPelicula, Precio, Cantidad, Total) VALUES(".$compraId['ID'].", $peliculasId[$i], $precios[$i], $cantidades[$i], $subtotales[$i])";

			$db->insertUpdate($sql2);
		}

		echo "<script>alert('Compra Registrada')</script>";
		unset($_SESSION['peliculaId']);
		header("Location:index.php");

	}

	
}





require_once 'views/carritoVista.php';