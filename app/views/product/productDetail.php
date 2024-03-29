<div id="divProductPage">
    <h2 id="productPageTitle">Ficha del producto</h2>
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row);?>
    <div id="divProductImg">
        <img id="productImg" title="<?php $NombreProducto?>" alt="<?php $NombreProducto?>" src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>">
    </div>
    <div id="productDetails">
        <div id="productTitle">
            <h1 id="productH1Title"><?php echo $NombreProducto?></h1>
        </div>
        <div id="productBrand">
            Editorial:<?php echo $Editorial?>
        </div>
        <div id="productEAN">
            EAN: <?php echo $Ean?>
        </div>
        <div id="productRelease">
            Año Publicación: <?php echo $AnoPublicacion?>
        </div>
        <div id="productMinAge">
            Edad Mínima Recomendada: <?php echo $EdadMinima?>
        </div>
        <div id="productMinPlayers">
            Número Mínimo de Jugadores: <?php echo $JugadoresMinimos?>
        </div>
        <div id="productMaxPlayers">
            Número Máximo de Jugadores: <?php echo $JugadoresMaximos?>
        </div>
    </div>
    <div id="productConversionZone">
        <div id="productPrize">
            Precio: <?php echo $Precio?>
        </div>
        <div id="productStock">
            <?php if ($Stock==0){
                echo "Stock: no";
            }else{
                echo "Stock: sí";
            } ?>
        </div>
        <div id="divBuyButton">
            <a href="<?=base_url?>Product/buy&id=<?php echo $ID_Producto?>">
                Añadir al carrito
            </a>
        </div>
    </div>
    <div id="productDescription">
        <div id="productDescriptionTitle">
            Descripcion:
        </div>
        <div id="productDescriptionText">
            <?php echo $Descripcion?>
        </div>
    </div>
</div>
        <?php
    }
    ?>
