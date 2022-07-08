<h1>Gestion Producto</h1>

<!-- mensaje de crear un producto -->
<?php if(isset($_SESSION['producto_creado']) && $_SESSION['producto_creado'] == 'complete') : ?>
        <strong class="alert_green">Producto Creado Correctamente</strong>
    <?php elseif (isset($_SESSION['producto_creado']) && $_SESSION['producto_creado'] == 'failed'): ?>
        <strong class="alert_red">Error al crear el producto</strong>
    <?php endif; ?>

<?php  Utils::deleteSesion('producto_creado'); ?>

<!-- mensaje de eliminar un producto -->
<?php if(isset($_SESSION['producto_eliminado']) && $_SESSION['producto_eliminado'] == 'complete') : ?>
        <strong class="alert_green">Producto Eliminado Correctamente</strong>
    <?php elseif (isset($_SESSION['producto_eliminado']) && $_SESSION['producto_eliminado'] == 'failed'): ?>
        <strong class="alert_red">Error al eliminar el producto</strong>
    <?php endif; ?>

<?php  Utils::deleteSesion('producto_eliminado'); ?>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->nombre?></td>
            <td><?=$pro->precio?></td>
            <td><?=$pro->stock?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>