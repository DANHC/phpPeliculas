<?php 
session_start();


require_once '../models/db.php';
$db = new Database();


if(isset($_POST['checkUser'])) {

	$user = $_POST['checkUser'];

	$sql = "SELECT count(*) AS conteo FROM usuario WHERE Usuario = '$user'";

	$result = $db->select($sql);

	echo json_encode($result);

}


if(isset($_POST['verificaUser'])) {
	$user = $_POST['verificaUser'];
	$pass = md5($_POST['pass']);

	$res = $db->select("SELECT U.Usuario, U.id, C.id AS idCliente FROM usuario U JOIN Cliente C  ON U.id = C.idUsuario WHERE U.Usuario = '$user' AND U.Contrasena = '$pass' AND U.Eliminado = 0 AND U.tipoUsuario='cliente'");

	
	if(count($res) != 0) {
		$_SESSION['usuario'] = $res['Usuario'];
		$_SESSION['usuarioId'] = $res['idCliente'];
		echo "1";
	} else {
		echo "0";
	}

}





if(isset($_POST['addMovie'])) {

	$peliculaId = (int) $_POST['addMovie'];

	if( isset($_SESSION['peliculaId']) ) {
		if(!empty($_SESSION['peliculaId'])) {
			if( !in_array($peliculaId, $_SESSION['peliculaId']) ) {
				$_SESSION['peliculaId'][] = (int) $peliculaId;
				echo "Pelicula añadida";
			}
		} else {
			$_SESSION['peliculaId'][] = (int) $peliculaId;
			echo "Pelicula añadida";
		}



	} else {
		$_SESSION['peliculaId'][] = (int) $peliculaId;
		echo "Pelicula añadida";
	}

}



if( isset($_POST['eliminarPeli']) ) {
	$idPeli = (int) $_POST['eliminarPeli'];

	if(in_array($idPeli, $_SESSION['peliculaId'])) {
		$index = array_search($idPeli, $_SESSION['peliculaId']);
		unset($_SESSION['peliculaId'][$index]);
		echo "true";
	}


}