<?php 
require_once 'models/pelicula.php';

$pelicula = new Pelicula();
$peliculaDao = new PeliculaDAO();

$categorias = $peliculaDao->getCategorias();
$peliculas = $peliculaDao->getPeliculas();

if(isset($_POST['submit'])) {

	$dir = "../models/caratulas/";
	move_uploaded_file($_FILES['caratulaImg']['tmp_name'], $dir.$_FILES['caratulaImg']['name']);
	$pathImage = $dir.$_FILES['caratulaImg']['name'];

	$pelicula->setNombre($_POST['txtNombre']);
	$pelicula->setIdCat($_POST['selCategoria']);
	$pelicula->setAnio($_POST['txtAnio']);
	$pelicula->setProtagonista($_POST['txtProtagonista']);
	$pelicula->setDuracion($_POST['txtDuracion']);
	$pelicula->setDirector($_POST['txtDirector']);
	$pelicula->setPlot($_POST['txtPlot']);
	$pelicula->setKeywords($_POST['txtPalabrasClave']);
	$pelicula->setPrecio($_POST['txtPrecio']);
	$pelicula->setImgPath($pathImage);

	$resp = $peliculaDao->insertarPelicula($pelicula);

	if($resp) {
		echo "<script>alert('Pelicula Insertada');</script>";
		header("Location:?view=catalogo.php");
	}

}

if( isset($_POST['btnActualizar']) ) {

	$peliculaId = $_POST['btnActualizar'];
	$estado = $_POST['estado'];

	$pelicula->setNombre($_POST['txtNombre']);
	$pelicula->setIdCat($_POST['selCategoria']);
	$pelicula->setAnio($_POST['txtAnio']);
	$pelicula->setProtagonista($_POST['txtProtagonista']);
	$pelicula->setDuracion($_POST['txtDuracion']);
	$pelicula->setDirector($_POST['txtDirector']);
	$pelicula->setPlot($_POST['txtPlot']);
	$pelicula->setKeywords($_POST['txtPalabrasClave']);
	$pelicula->setPrecio($_POST['txtPrecio']);

	$resp = $peliculaDao->actualizarPelicula($pelicula, $estado, $peliculaId);

	if($resp) {
		echo "<script>alert('Pelicula Actualizada');</script>";
		header("Location:?view=catalogo.php");
	}

}


require_once 'views/catalogoVista.php';