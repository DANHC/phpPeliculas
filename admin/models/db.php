<?php 


class Database {
	private $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=localhost;dbname=sistemapelicula;", "root", "root");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "Error conectando a la BD: ".$e->getMessage();
		}
	}

	public function select($sql) {
		try {
			$res = $this->db->query($sql);
			$res = $res->fetchAll(PDO::FETCH_ASSOC);
			
			if(count($res) == 1) {
				$res = $res[0];
			}

			return $res;

		} catch(PDOException $e) {
			return false;
		}
	}


	public function selectQuery($sql) {
		try {
			$res = $this->db->query($sql);
			$res = $res->fetchAll(PDO::FETCH_ASSOC);

			return $res;

		} catch(PDOException $e) {
			return false;
		}
	}

	public function insertUpdate($sql) {
		try {
			$sentencia = $this->db->prepare($sql);
			$sentencia->execute();
			return true;
		} catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	public function getInstance() {
		return $this->db;
	}


}