<?php 

    class Categoria {

        private $id;
        private $nombre;
        // conexion a la base de datos
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }


        public function getId() {
            return $this->id;
        }


        public function setId($id) {
            $this->id = $id;

            return $this;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $this->db->real_escape_string($nombre);

            return $this;
        }

        public function getAll(){

            $sql = "SELECT * FROM categorias ORDER BY id DESC";
            $categorias = $this->db->query($sql);

            return $categorias;

        }

        public function save(){
            $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}')";
            $save = $this->db->query($sql);

            $result = false;
            if($save) {
                $result = true;
            }

            return $result;
        }
    }

?>