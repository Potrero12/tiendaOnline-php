<h1>Registrarse</h1>

    <!-- mostrar el mensaje de exito o falla por medio de sesiones -->
    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <strong class="alert_green">Registro Completado Correctamente</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
        <strong class="alert_red">Registro Fallido, Ingresa correctamente los datos </strong>
    <<?php endif; ?>
    
    <?php  Utils::deleteSesion('register'); ?>

<form action="<?=base_url?>/usuario/save" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" required/>

    <label for="email">Email</label>
    <input type="email" name="email" required/>

    <label for="password">Password</label>
    <input type="password" name="password" required/>

    <input type="submit" value="Registrarse" />

</form>