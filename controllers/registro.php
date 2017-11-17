<?php 
require_once 'models/cliente.php';

$cliente  = new Cliente();
$clienteDao = new ClienteDAO();

if(isset($_POST['submit'])) {

	$cliente->setNombres($_POST['txtNombres']);
	$cliente->setApellidos($_POST['txtApellidos']);
	$cliente->setEdad($_POST['txtEdad']);
	$cliente->setDireccion($_POST['txtDireccion']);
	$cliente->setDui($_POST['txtDui']);
	$cliente->setTelefono($_POST['txtTelefono']);
	$cliente->setSexo($_POST['radSexo']);
	$cliente->setNombreUsuario($_POST['txtUsuario']);
	$cliente->setContrasena(md5($_POST['txtPassword']));

	
	$resp = $clienteDao->insertarCliente($cliente);

	if($resp) {
		$_SESSION['usuario'] = $_POST['txtUsuario'];
		$_SESSION['usuarioId'] = $clienteDao->getClienteId();
		header("Location:index.php");
	}


}


require_once 'views/registroVista.php';