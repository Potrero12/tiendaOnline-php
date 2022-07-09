<?php 

    require_once 'models/categoria.php';
    require_once 'models/producto.php';

    class CategoriaController {

        public function index() {
            Utils::isAdmin();
            $categoria = new Categoria();
            $categorias = $categoria->getAll();

            require_once 'views/categoria/index.php';

        }

        public function ver(){

            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                // conseguir categoria
                $categoria = new Categoria();
                $categoria->setId($id);
                $categoria = $categoria->getOne();

                // conseguir producto
                $productos = new Producto();
                $productos->setCategoria_id($id);
                $productos = $productos->getAllCategory();
            }

            require_once 'views/categoria/ver.php';

        }

        public function crear() {
            Utils::isAdmin();
            require_once 'views/categoria/crear.php';

        }

        public function save(){

            Utils::isAdmin();
            
            if(isset($_POST)){

                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

                if($nombre) {                
                    // guardar en la db
                    $categoria = new Categoria();
                    $categoria->setNombre($nombre);
    
                    $save = $categoria->save();
                    if($save){
                        $_SESSION['categoria_creada'] = "complete";
                    } else {
                        $_SESSION['categoria_creada'] = "failed";
                    }
    
                } else {
                    $_SESSION['categoria_creada'] = "failed";
                }
                
            } else {
                $_SESSION['categoria_creada'] = "failed";
            }
            


            header('location:'.base_url."categoria/index");

        }

    }

?>