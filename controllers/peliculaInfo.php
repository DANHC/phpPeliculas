<?php 
require_once 'models/pelicula.php';

$peliculaObj = new PeliculaCat();


$peliculaId = $_GET['id'];

$pelicula = $peliculaObj->getPeliculaById($peliculaId);







require_once 'views/peliculaInfoVista.php';