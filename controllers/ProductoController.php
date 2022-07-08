<?php 

    require_once 'models/producto.php';

    class ProductoController {

        public function index() {
            // renderizar vista
            require_once 'views/producto/destacados.php';
        }

        public function gestion(){
            Utils::isAdmin();

            $producto = new Producto();
            $productos = $producto->getAll();

            require_once 'views/producto/gestion.php';

        }

        public function crear(){
            Utils::isAdmin();

            require_once 'views/producto/crear.php';

        }

        public function save(){
            Utils::isAdmin();

            if(isset($_POST)){

                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;

                if($nombre && $categoria && $descripcion  && $precio && $stock) {

                    $producto = new Producto();

                    $producto->setNombre($nombre);
                    $producto->setCategoria_id($categoria);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    
                // Guardar la imagen
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $save = $producto->edit();
                    } else {
                        // guardar en la bas de datos usando el metodo del modelo
                        $save = $producto->save();
                    }

                    if($save) {
                        $_SESSION['producto_creado'] = "complete";
                    } else {
                        $_SESSION['producto_creado'] = "failed";
                    }
                }  
                else {
                    $_SESSION['producto_creado'] = "failed";
                }
            } else {
                $_SESSION['producto_creado'] = "failed";
            }

            header('location:'.base_url.'producto/gestion');

        }

        public function editar(){
            Utils::isAdmin();
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit = true;

                $producto = new Producto();
                $producto->setId($id);
                $pro = $producto->getOne();

                require_once 'views/producto/crear.php';

            } else {
                header('location:'.base_url.'producto/gestion');
            }


        }

        
        public function eliminar(){
            Utils::isAdmin();

            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $producto = new Producto();
                $producto->setId($id);

                $delete = $producto->delete();
                if($delete) {
                    $_SESSION['producto_eliminado'] = "complete";
                } else {
                    $_SESSION['producto_eliminado'] = "failed";
                }

            } else {
                $_SESSION['producto_eliminado'] = "failed";
            }
            header('location:'.base_url.'producto/gestion');
        }

    }

?>