<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'):?>
    <h1>Tu Pedido ha sido Confirmado</h1>
    <p>Tu pedido se guardo con exito, una vez que realices la transferencia bancaria a la cuenta 548364020566764 con el coste del pedido sera procesado y enviado</p>

    <br />
    <?php if(isset($pedido)):?>
        <h3>Datos del pedido</h3>
        Numero de Pedido: <?=$pedido->id?>
        <br />
        Total a pagar: <?=$pedido->coste?> €
        <br />
        Productos: 
        <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
            <?php while($producto = $productos->fetch_object()): ?>
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
                    <?=$producto->unidades?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        
    <?php endif;?>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido no se proceso, Error!!</h1>
<?php endif; ?>