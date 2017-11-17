<?php 
require_once 'models/db.php';

$db = new Database();

$compras = $db->selectQuery("SELECT * FROM vComprasCliente");


require_once 'views/pedidosClienteVista.php';