<?php 

require_once 'db.php';

class Pelicula {
	private $nombre;
	private $idCat;
	private $anio;
	private $protagonista;
	private $duracion;
	private $director;
	private $imgPath;
	private $plot;
	private $keywords;
    private $precio;

	function getNombre() {
        return $this->nombre;
    }

    function getIdCat() {
        return $this->idCat;
    }

    function getAnio() {
        return $this->anio;
    }

    function getProtagonista() {
        return $this->protagonista;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getDirector() {
        return $this->director;
    }

    function getImgPath() {
        return $this->imgPath;
    }

    function getPlot() {
        return $this->plot;
    }

    function getKeywords() {
        return $this->keywords;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIdCat($idCat) {
        $this->idCat = $idCat;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setProtagonista($protagonista) {
        $this->protagonista = $protagonista;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function setImgPath($imgPath) {
        $this->imgPath = $imgPath;
    }

    function setPlot($plot) {
        $this->plot = $plot;
    }

    function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }


}


class PeliculaDAO {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertarPelicula(Pelicula $pelicula) {

        $db = $this->db->getInstance();

        $sql = "CALL uspRegistrarPelicula(:nombre, :idCat, :anio, :protagonista, :duracion, :director, :img, :plot, :keywords, :precio)";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nombre', $pelicula->getNombre());
        $stmt->bindValue(':idCat', $pelicula->getIdCat());
        $stmt->bindValue(':anio', $pelicula->getAnio());
        $stmt->bindValue(':protagonista', $pelicula->getProtagonista());
        $stmt->bindValue(':duracion', $pelicula->getDuracion());
        $stmt->bindValue(':director', $pelicula->getDirector());
        $stmt->bindValue(':img', $pelicula->getImgPath());
        $stmt->bindValue(':plot', $pelicula->getPlot());
        $stmt->bindValue(':keywords', $pelicula->getKeywords());
        $stmt->bindValue(':precio', $pelicula->getPrecio());

        try {
            $resp = $stmt->execute();
        } catch(PDOException $ex) {
            echo "Error al insertar pelicula: ".$ex->getMessage();
            return $resp;
        }

        return $resp;

    }


    public function actualizarPelicula(Pelicula $pelicula, $estado, $id) {
        $db = $this->db->getInstance();

        $sql = "CALL uspActualizarPelicula(:nombre, :idCat, :anio, :protagonista, :duracion, :director, :plot, :keywords, :precio, :idPeli, :estado)";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nombre', $pelicula->getNombre());
        $stmt->bindValue(':idCat', $pelicula->getIdCat());
        $stmt->bindValue(':anio', $pelicula->getAnio());
        $stmt->bindValue(':protagonista', $pelicula->getProtagonista());
        $stmt->bindValue(':duracion', $pelicula->getDuracion());
        $stmt->bindValue(':director', $pelicula->getDirector());
        $stmt->bindValue(':plot', $pelicula->getPlot());
        $stmt->bindValue(':keywords', $pelicula->getKeywords());
        $stmt->bindValue(':precio', $pelicula->getPrecio());
        $stmt->bindValue(':idPeli', $id);
        $stmt->bindValue(':estado', $estado);

        try {
            $resp = $stmt->execute();
        } catch(PDOException $ex) {
            echo "Error al actualizar pelicula: ".$ex->getMessage();
            return false;
        }

        return $resp;
    }



    public function getPeliculas() {
        $sql = "SELECT P.id, P.imgPath, P.Precio, P.nombre AS Nombre, C.nombre AS Categoria, P.Protagonista, P.Duracion, P.Director, P.Plot FROM pelicula P JOIN categoria C  ON P.idCategoria = C.id";

        try {
            $peliculas = $this->db->select($sql);
        } catch(Exception $ex) {
            return null;
        }

        return $peliculas;
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

}