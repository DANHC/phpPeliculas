<?php 
session_start();
require_once '../models/db.php';
$db = new Database();


if(isset($_POST['verificaUser'])) {
	$user = $_POST['verificaUser'];
	$pass = $_POST['pass'];

	$res = $db->select("SELECT Usuario FROM usuario WHERE Usuario = '$user' AND Contrasena = '$pass' AND Eliminado = 0 AND tipoUsuario = 'admin'");

	
	if(count($res) != 0) {
		$_SESSION['admin'] = $res['Usuario'];
		echo "1";
	} else {
		echo "0";
	}

}


if( isset($_POST['compraId']) ) {
	$idCompra = $_POST['compraId'];

	$sql = "UPDATE Compra SET Pendiente = 0 WHERE id = $idCompra";

	$confirm = $db->insertUpdate($sql);

	if($confirm) {
		echo "Pedido Realizado";
	}

}


if( isset($_POST['cargarDataPeli']) ) {
	$peliId = $_POST['cargarDataPeli'];

	$sql = "SELECT * FROM Pelicula WHERE id = $peliId";

	$pelicula = $db->selectQuery($sql);	

	echo json_encode($pelicula);


}