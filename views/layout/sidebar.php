
<!-- bara lateral -->
<aside id="lateral">
    <div id="login "class="block_aside">
        <?php if(!isset($_SESSION['identity'])): ?>
            <h3>Entrar a la Web</h3>
            <form action="<?=base_url?>usuario/login" method="POST">

                <label for="email">Email</label>
                <input type="email" name="email" />

                <label for="password">Password</label>
                <input type="password" name="password" />

                <input type="submit" value="Enviar" />

            </form>
        <?php else: ?>
            <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif; ?>

        <ul>                        
            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
            <li><a href="#">Gestionar Pedidos</a></li>
            <li><a href="#">Gestionar Productos</a></li>
            <?php endif; ?>

            <?php if(isset($_SESSION['identity'])):?>
                <li><a href="#">Mis Pedidos</a></li>
                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>usuario/registro">Registrate Aqui!!</a></li>
            <?php endif; ?>
        </ul>
            
    </div>
</aside>

<!-- contenido central -->

<div id="central">