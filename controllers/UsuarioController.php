<?php 
    // el controlador trae las vistas y las funciones para guardar en la bd
    require_once 'models/usuario.php';

    class UsuarioController {

        public function index() {
            echo "Controlador usuarios, accion index";

        }

        // funcion apra cargar la vista de registro por la url
        public function registro() {
            
            require_once 'views/usuario/registro.php';

        }

        public function save(){

            // instanciamos la calse del modelo y por medio del set y get le pasamos los datos que capturamos del formulario
            if(isset($_POST)){

                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;

                if($nombre && $apellidos && $email  && $password) {

                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
    
                    // guardar en la bas de datos usando el metodo del modelo
                    $save = $usuario->save();
                    if($save) {
                        $_SESSION['register'] = "complete";
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                }  
                else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
            header('location:'.base_url.'usuario/registro');

        }

        public function login(){

            if(isset($_POST)){

                // IDENTIFICAR EL USUARIO
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;

                if($email  && $password) {
                    $usuario = new Usuario();
                    // le pasamos los valores por set
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);

                    // llamamos el metodo del modelo
                    $identity = $usuario->login();
                    // si el login es correcto creamos una sesion con todos los datos del usuario identificado
                    if($identity && is_object($identity)){
                        $_SESSION['identity'] = $identity;

                        if($identity->rol == 'admin'){
                            $_SESSION['admin'] = true;
                        }
                    } else {
                        $_SESSION['error_login'] = 'identificación fallida!!';
                    }
                }

            }

            header('location:'.base_url);

        }

        public function logout() {
            
            if(isset($_SESSION['identity'])) {
                unset($_SESSION['identity']);
            }

            if(isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
            }

            header('location:'.base_url);

        }

    } // fin clase

?>