<h2 id="productPageTitle" class="productsListTitle">Ficha del producto</h2>
<div class="product-detail">
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
    <div id="divProductImg">
        <img id="productImg" title="<?php echo $NombreProducto ?>" alt="<?php echo $NombreProducto ?>" src="<?= base_url ?>public/images/pdp/<?php echo $RutaImagen ?>">
    </div>
    <div id="productInfo">
        <div id="productDetails">
            <h1 id="productH1Title"><?php echo $NombreProducto ?></h1>
            <div id="productBrand">Editorial: <?php echo $Editorial ?></div>
            <div id="productEAN">EAN: <?php echo $Ean ?></div>
            <div id="productRelease">Año Publicación: <?php echo $AnoPublicacion ?></div>
            <div id="productMinAge">Edad Mínima Recomendada: <?php echo $EdadMinima ?></div>
            <div id="productMinPlayers">Número Mínimo de Jugadores: <?php echo $JugadoresMinimos ?></div>
            <div id="productMaxPlayers">Número Máximo de Jugadores: <?php echo $JugadoresMaximos ?></div>
        </div>
        <div id="productConversionZone">
            <div id="productPrize">Precio: <?php echo $Precio ?> &euro;</div>
            <div id="productStock">
                <?php echo ($Stock == 0) ? "Stock: no" : "Stock: sí"; ?>
            </div>
            <div id="divBuyButton">Añadir al carrito</div>
        </div>
    </div>
    <div id="productDescription">
        <div id="productDescriptionTitle">Descripción:</div>
        <div id="productDescriptionText"><?php echo $Descripcion ?></div>
    </div>
    <?php } ?>
</div>
