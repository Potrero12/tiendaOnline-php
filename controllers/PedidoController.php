<?php 
    require_once 'models/pedido.php';

    class PedidoController {

        public function hacer() {
            
            require_once 'views/pedido/hacer.php';

        }

        public function add(){
            

            if(isset($_SESSION['identity'])) {
                // guardar en db
                $id = $_SESSION['identity']->id;

                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

                $stats = Utils::statsCarrito();
                $coste = $stats['total'];

                if($provincia && $localidad && $direccion) {

                    $pedido = new Pedido();
                    $pedido->setUsuario_id($id);
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);

                    $save = $pedido->save();

                    // guardar linea pedido
                    $save_linea =  $pedido->save_linea();

                    if($save  && $save_linea) {
                        $_SESSION['pedido'] = 'complete';
                    } else {
                        $_SESSION['pedido'] = 'failed';
                    }

                } else {
                    $_SESSION['pedido'] = 'failed';
                }

                header('location:'.base_url.'pedido/confirmado');
                ob_end_flush();

            } else {
                // redirigir al index
                header('location:'.base_url);
            }
        }

        public function confirmado() {
            if(isset($_SESSION['identity'])){
                $identity = $_SESSION['identity'];

                $pedido = new Pedido();
                $pedido->setUsuario_id($identity->id);
                $pedido = $pedido->getOneByUser();

                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($pedido->id);
            }

            require_once 'views/pedido/confirmado.php';
        }

        public function misPedidos(){
            Utils::isIdentity();
            $usuario_id = $_SESSION['identity']->id;

            // sacar los pedidos del usuario
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getAllByUser();

            require_once 'views/pedido/misPedidos.php';

        }

        public function detalle() {
            Utils::isIdentity();

            if(isset($_GET['id'])){

                $id = $_GET['id'];

                // sacar el pedido
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido = $pedido->getOne();

                // sacar los productos
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($id);

                require_once 'views/pedido/detalle.php';

            } else {
                header('location:'.base_url.'pedido/misPedidos');
            }
        }

        public function gestion(){
            Utils::isAdmin();

            $gestion = true;
            $pedido = new Pedido();
            $pedidos = $pedido->getAll();

            require_once 'views/pedido/misPedidos.php';
        }

        public function estado() {
            Utils::isAdmin();

            if(isset($_POST['pedido_id']) && isset($_POST['estado'])) {
                // recogemos los datos del estado
                $id = $_POST['pedido_id'];
                $estado = $_POST['estado'];

                // update del pedido
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido->setEstado($estado);
                $pedido->updateOne();

                header('location:'.base_url.'pedido/detalle&id='.$id);
            } else {
                header('location:'.base_url);
            }


        }
    }

?>