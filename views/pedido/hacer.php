<?php if(isset($_SESSION['identity'])):?>
    <h1>Hacer Pedido</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Ver Carrito</a>
    </p>
    <br />
    <!-- mostrar el mensaje de exito o falla por medio de sesiones -->
    <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
        <strong class="alert_green">Pedido Completado Correctamente</strong>
    <?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
        <strong class="alert_red">Pedido Fallido, Ingresa correctamente los datos </strong>
    <<?php endif; ?>
    
    <?php  Utils::deleteSesion('pedido'); ?>
    <h3>Domicilio Para el Envío</h3>

    <form action="<?=base_url?>pedido/add" method="POST">

        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required/>

        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" required/>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required/>

        <input type="submit" value="Confirmar" />
        
    </form>

<?php else:?>
    <h1>Necesitas estar indentificado</h1>
    <p>Logueate en la web para poder realizar tu pedido</p>
<?php endif; ?>