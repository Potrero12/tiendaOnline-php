<?php 

    class Producto {

        private $id;
        private $categoria_id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $fecha;	
        private $imagen;	

        
        // conexion a la base de datos
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }

        public function getId()
        {
            return $this->id;
        }

 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }


        public function getCategoria_id()
        {
            return $this->categoria_id;
        }


        public function setCategoria_id($categoria_id)
        {
            $this->categoria_id = $categoria_id;

            return $this;
        }


        public function getNombre()
        {
            return $this->nombre;
        }


        public function setNombre($nombre)
        {
            $this->nombre = $this->db->real_escape_string($nombre);

            return $this;
        }

 
        public function getDescripcion()
        {
            return $this->descripcion;
        }


        public function setDescripcion($descripcion)
        {
            $this->descripcion =$this->db->real_escape_string($descripcion);

            return $this;
        }


        public function getPrecio()
        {
            return $this->precio;
        }


        public function setPrecio($precio)
        {
            $this->precio = $this->db->real_escape_string($precio);

            return $this;
        }


        public function getStock()
        {
            return $this->stock;
        }


        public function setStock($stock)
        {
            $this->stock = $this->db->real_escape_string($stock);

            return $this;
        }


        public function getOferta()
        {
            return $this->oferta;
        }


        public function setOferta($oferta)
        {
            $this->oferta = $this->db->real_escape_string($oferta);

            return $this;
        }


        public function getFecha()
        {
            return $this->fecha;
        }


        public function setFecha($fecha)
        {
            $this->fecha = $fecha;

            return $this;
        }

        public function getImagen()
        {
            return $this->imagen;
        }

        public function setImagen($imagen)
        {
            $this->imagen = $imagen;

            return $this;
        }

        public function getAll(){

            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $productos = $this->db->query($sql);

            return $productos;

        }
        
        public function getAllCategory(){

            $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p
                    INNER JOIN categorias c ON c.id = p.categoria_id
                    WHERE p.categoria_id = {$this->getCategoria_id()}
                    ORDER BY p.id DESC";
            $productos = $this->db->query($sql);

            return $productos;

        }

        
        public function getOne(){

            $sql = "SELECT * FROM productos WHERE id = {$this->id}";
            $producto = $this->db->query($sql);

            return $producto->fetch_object();

        }

        public function getRandom($limit){

            $sql = "SELECT * FROM productos ORDER BY RAND() limit $limit";
            $productos = $this->db->query($sql);

            return $productos;


        }

        public function save(){

            $sql = "INSERT INTO productos values (NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}')";
            $save = $this->db->query($sql);

            $resultado = false;
            if($save){
                $resultado = true;
            }

            return $resultado;

        }

        public function edit(){

            $sql = "UPDATE productos SET categoria_id={$this->getCategoria_id()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()} ";
            if($this->getImagen() != null){
                $sql .= ", imagen='{$this->getImagen()}'";
            }

            $sql .= " WHERE id={$this->getId()}";

            $save = $this->db->query($sql);

            $resultado = false;
            if($save){
                $resultado = true;
            }

            return $resultado;

        }

        public function delete(){
            $sql = "DELETE FROM productos WHERE id = {$this->id}";
            $delete = $this->db->query($sql);

            $resultado = false;
            if($delete){
                $resultado = true;
            }

            return $resultado;
        }
    }

?>