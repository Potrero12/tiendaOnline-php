<h1>Productos Destacados</h1>
<?php while ($pro = $productos->fetch_object()):?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
            <?php if($pro->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="camiseta" />
            <?php else:?>
                <img src="<?=base_url?>assets/img/camiseta.png" alt="default">
            <?php endif;?>
            
            <h2><?=$pro->nombre?></h2>
        </a>
        <p><?=$pro->precio?> €</p>
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>
