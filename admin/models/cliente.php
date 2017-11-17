<?php 
require_once 'db.php';

class Cliente {
    private $nombres;
    private $apellidos;
    private $edad;
    private $direccion;
    private $dui;
    private $telefono;
    private $sexo;
    private $nombreUsuario;
    private $contrasena;
    
    function __construct() {
        
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEdad() {
        return $this->edad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDui() {
        return $this->dui;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setDui($dui) {
        $this->dui = $dui;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }


    
    
}


class ClienteDAO {
	private $db;
    
    
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function insertarCliente(Cliente $cliente) {
        $response;

        $db = $this->db->getInstance();
        $sql = "CALL uspRegistrarCliente(:nombres, :apellidos, :edad, :direccion, :dui, :telefono, :sexo, :usuario, :pass)";
        
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nombres', $cliente->getNombres());
        $stmt->bindValue(':apellidos', $cliente->getApellidos());
        $stmt->bindValue(':edad', $cliente->getEdad());
        $stmt->bindValue(':direccion', $cliente->getDireccion());
        $stmt->bindValue(':dui', $cliente->getDui());
        $stmt->bindValue(':telefono', $cliente->getTelefono());
        $stmt->bindValue(':sexo', $cliente->getSexo());
        $stmt->bindValue(':usuario', $cliente->getNombreUsuario());
        $stmt->bindValue(':pass', $cliente->getContrasena());
        
        try {
            $response = $stmt->execute();
        } catch(PDOException $ex) {
            echo "Error al insertar: ".$ex->getMessage();
            return $response;
        }

        return $response;
    }

    public function getClienteId() {
        $id = $this->db->select("SELECT max(id) AS id FROM usuario");
        return $id['id'];
    }


}