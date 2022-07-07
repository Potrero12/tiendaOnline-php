<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Tienda Online</title>
</head>
<body>
    <div id="container">
        <!-- cabecera -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta logo" />
                <a href="index.php">
                    <h1>Tienda Online</h1>
                </a>
            </div>
        </header>
    
        <!-- menu -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">
                        Inicio
                    </a>
                </li>
    
                <li>
                    <a href="index.php">
                        Categoria 1
                    </a>
                </li>
    
                <li>
                    <a href="index.php">
                        Categoria 2
                    </a>
                </li>
    
                <li>
                    <a href="index.php">
                        Categoria 3
                    </a>
                </li>
    
                <li>
                    <a href="index.php">
                        Categoria 4
                    </a>
                </li>
            </ul>
        </nav>
    
        <div class="content">
            <!-- bara lateral -->
            <aside id="lateral">
                <div id="login "class="block_aside">
                    <h3>Entrar a la Web</h3>
                    <form action="#" method="POST">
    
                        <label for="email">Email</label>
                        <input type="email" name="email" />
    
                        <label for="password">Password</label>
                        <input type="password" name="password" />
    
                        <input type="submit" value="Enviar">
    
                    </form>

                    <ul>                        
                        <li><a href="#">Mis Pedidos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>
                        <li><a href="#">Gestionar Categorias</a></li>
                    </ul>
    
                </div>
            </aside>
    
    
            <!-- contenido central -->
    
            <div id="central">
                <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta" />
                    <h2>Camiseta Azul</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>
    
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta" />
                    <h2>Camiseta Azul</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>
    
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta" />
                    <h2>Camiseta Azul</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>
    
            </div>
        </div>
        
        <!-- pie de pagina -->
        <footer id="footer">
            <p>Desarrollado por Julian Perdomo &copy; <?=date('Y')?></p>
        </footer>
    </div>
</body>
</html>