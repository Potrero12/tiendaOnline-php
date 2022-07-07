<?php 
    // el modelo tiene las propiedades y las consultas a la base de datos
    class Usuario {

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;

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

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setApellidos($apellidos) {
            $this->apellidos = $this->db->real_escape_string($apellidos);

            return $this;
        }
 
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $this->db->real_escape_string($email);

            return $this;
        }

        public function getPassword() {
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        }

        public function setPassword($password) {
            $this->password = $password;

            return $this;
        }

        public function getRol() {
            return $this->rol;
        }

        public function setRol($rol) {
            $this->rol = $rol;

            return $this;
        }

        
        public function getImagen() {
            return $this->imagen;
        }

        public function setImagen($imagen) {
            $this->imagen = $imagen;

            return $this;
        }

        // metodo para guardar el usuario 
        public function save(){
            // guardar el usuario en la base de datos
            $sql  = "INSERT INTO usuarios VALUES (null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";
            $save = $this->db->query($sql);

            $resultado = false;
            if($save) {
                $resultado = true;
            }

            return $resultado;

        }

        // metodo para el login
        public function login(){
            $resultado = false;

            // obtenemos los valores del login
            $email = $this->email;
            $password = $this->password;

            // consultar si existe un usuario por id
            $sql  = "SELECT * FROM usuarios WHERE email = '$email'";
            $login = $this->db->query($sql);

            if($login && $login->num_rows == 1) {
                $usuario = $login->fetch_object();

                // verificar password
                $verify = password_verify($password, $usuario->password);
                if($verify) {
                    $resultado = $usuario;
                }
            }

            return $resultado;
        }
    }

?>