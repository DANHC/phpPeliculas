<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PeliculasSV</title>
  <link rel="stylesheet" type="text/css" href="views/assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="views/assets/css/foundation.min.css">
  <link rel="stylesheet" type="text/css" href="views/assets/css/foundation-controls.css">
  <link rel="stylesheet" type="text/css" href="views/assets/css/estilo.css">
  <script src="views/assets/js/simpleslider.min.js"></script>
</head>

<body>

<!-- HEADER -->

<div class="expanded row">
  
  <div id="header">
    <div id="headerContent">
      <img id="logo" src="views/images/logo.png" />
    </div>
  </div>

</div>

<div class="expanded row">
  
  <div class="top-bar">
    <div class="top-bar-title">
      <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
      </span>
      
    </div>
  <div id="responsive-menu">
    <div class="top-bar-left">
      <ul class="dropdown menu" data-dropdown-menu>
        <li><a href="?view=inicio.php">Inicio</a></li>
        <li><a href="?view=catalogo.php">Catálogo de Películas</a></li>
        <!--<li>
          <a href="">One</a>
            <ul class="menu vertical">
              <li><a href="#">One</a></li>
              <li><a href="#">Two</a></li>
              <li><a href="#">Three</a></li>
            </ul>
          </li>-->
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <?php if(isset($_SESSION['usuario'])) { ?>
            <li><a href="#"><?php echo $_SESSION['usuario'] ?></a></li>
            <li><a href="?view=carrito.php">Ver mi carrito</a></li>
            <li><a href="?view=detalleCompra.php">Ver mis pedidos pendientes</li></a>
            <li><a href="?view=logOut.php">Cerrar Sesión</a></li>
          <?php } else { ?>
            <li><a href="?view=inicioSesion.php">Iniciar Sesión</a></li>
            <li><a href="?view=registro.php">Registrarse</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</div>


<div class="row">
  <div class="small-12 medium-11 small-centered columns">
    <div class="container">

