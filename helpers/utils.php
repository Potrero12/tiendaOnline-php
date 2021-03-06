<?php 

    class Utils {

        // funcion para elimnar una sesion
        public static function deleteSesion($name) {
            if(isset($_SESSION[$name])){
                $_SESSION[$name] = null;
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

        public static function isIdentity(){
            if(!isset($_SESSION['identity'])) {
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

        public static function statsCarrito(){
            $stats = array(
                'count' => 0,
                'total' => 0
            );

            if(isset($_SESSION['carrito'])) {
                $stats['count'] = count($_SESSION['carrito']);

                foreach($_SESSION['carrito'] as $producto) {
                    $stats['total'] += $producto['precio'] * $producto['unidades'];
                }   
            }

            return $stats;

        }

        public static function showEstatus($status){

            $value = 'pendiente';
            if($status == 'confirm'){
                $value = 'pendiente';
            } else if ($status == 'preparation') {
                $value = 'En preparacion';
            } else if ($status == 'ready') {
                $value = 'Preparado';
            } else if($status == 'sended') {
                $value = 'Enviado';
            }

            return $value;

        }

    }

?>