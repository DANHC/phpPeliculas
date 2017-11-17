<?php 

require_once 'models/pelicula.php';

$peliDao = new peliculaCat();

$categorias = $peliDao->getCategorias();

$peliculas = $peliDao->getPeliculasByCat(1);

if(isset($_GET['cat'])) {
	$categoriaId = $_GET['cat'];

	$peliculas = $peliDao->getPeliculasByCat($categoriaId);
}



require_once 'views/catalogoVista.php';