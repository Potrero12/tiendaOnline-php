<h1>Gestionar las Categorias</h1>
<?php if(isset($_SESSION['categoria_creada']) && $_SESSION['categoria_creada'] == 'complete') : ?>
        <strong class="alert_green">Categoria Creada Correctamente</strong>
    <?php elseif (isset($_SESSION['categoria_creada']) && $_SESSION['categoria_creada'] == 'failed'): ?>
        <strong class="alert_red">Error al crear la categoria </strong>
    <?php endif; ?>

<?php  Utils::deleteSesion('categoria_creada'); ?>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>

<table>
        <tr>
            <th>Nombre</th>
        </tr>
    <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?=$cat->nombre?></td>
        </tr>
    <?php endwhile;?>
</table>