<?php 

    class Utils {

        // funcion para elimnar una sesion
        public static function deleteSesion($name) {
            if(isset($_SESSION[$name])){
                $_SESSION[$name] = null;
                // unset($_SERVER[$name]);
            }

            return $name;
        }

        public static function isAdmin(){
            if(!isset($_SESSION['admin'])) {
                header('location:'.base_url);
            } else {
                return true;
            }
        }

        public static function showCategorias(){
            require_once 'models/categoria.php';

            $categoria = new Categoria();
            $categorias = $categoria->getAll();

            return $categorias;

        }

    }

?>