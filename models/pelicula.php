<?php 

require_once 'db.php';


class PeliculaCat {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    public function getPeliculas() {
        $sql = "SELECT P.id, P.imgPath, P.Precio, P.Nombre AS Nombre, C.nombre AS Categoria, P.Protagonista, P.Duracion, P.Director, P.Plot FROM pelicula P JOIN categoria C  ON P.idCategoria = C.id WHERE P.Disponible = 1";

        try {
            $peliculas = $this->db->select($sql);
        } catch(Exception $ex) {
            return null;
        }

        return $peliculas;
    }

    public function getPeliculaById($id) {
        $sql = "SELECT * FROM Pelicula WHERE id = $id AND Disponible = 1";

        try {
            $pelicula = $this->db->select($sql);
        } catch(Exception $ex) {
            return null;
        }

        return $pelicula;
    }

    public function getCategorias() {
        $sql = "SELECT id, nombre from categoria";

        try {
            $categorias = $this->db->select($sql);
        } catch(Exception $ex) {
            return null;
        }

        return $categorias;
    }

    public function getPeliculasByCat($catId) {
        $sql = "SELECT id, imgPath, Precio, Nombre FROM Pelicula WHERE idCategoria = $catId AND Disponible = 1";

        try {
            $peliculasCat = $this->db->selectQuery($sql);
        } catch(Exception $ex) {
            return null;
        }

        return $peliculasCat;
    }
}