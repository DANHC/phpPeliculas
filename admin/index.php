<?php
session_start();


$view = isset($_GET['view']) ? $_GET['view'] : 'inicioSesion.php';

if (file_exists('controllers/'.$view)) {

	require_once ('controllers/'.$view);

} else {

	require_once ('views/404.html');
}