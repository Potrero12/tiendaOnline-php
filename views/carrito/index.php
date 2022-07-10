<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Accion</th>
        </tr>
        <?php foreach($carrito as $index => $elemento) :
                $producto = $elemento['producto'];
                
        ?>
            <tr>
                <td>
                    <?php if($producto->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" alt="camiseta" />
                    <?php else:?>
                        <img src="<?=base_url?>assets/img/camiseta.png" alt="default" class="img_carrito"/>
                    <?php endif;?>
                </td>
                <td>
                    <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
                </td>
                <td>
                    <?=$producto->precio?>
                </td>
                <td>
                    <?=$elemento['unidades']?>
                    <div class="updown-unidades">
                        <a href="<?=base_url?>carrito/up&index=<?=$index?>" class="button">+</a>
                        <a href="<?=base_url?>carrito/down&index=<?=$index?>" class="button">-</a>
                    </div>
                </td>
                <td>
                <a href="<?=base_url?>carrito/delete&index=<?=$index?>" class="button button-carrito button-red">Quitar</a>
                </td>
            </tr>

        <?php endforeach;?>
    </table>

    <br />

    <div class="delete-carrito">
        <a href="<?=base_url?>carrito/deleteAll" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito()?>
        <h3>Precio Total: <?=$stats['total']?> €</h3>
        <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
    </div>
<?php else: ?>
    <p>El carrito esta vacio, añade productos</p>
<?php endif; ?>