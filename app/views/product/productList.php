<div id="plp" class="productsList">
    <h2 id="lastFiveTitle" class="h2ProductsListTitle">Novedades</h2>
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row);?>
        <div class="productOf">
            <div class="divImage">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" class="imageOf">
                </a>
            </div>
            <div class="detailOf">
                <div class="titleOfFive titleOf"><?php echo $NombreProducto?></div>
                <div class="brandOfFive brandOf"><?php echo $Editorial?></div>
                <div class="stockOfFive stockOf"><?php if ($Stock==0){
                    echo "Stock: no";
                    }else{
                    echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOf"><?php echo $Precio?></div>
            </div>
        </div>
    <?php
    }
    ?>
    <div id="pages">
    <?php

    ?>
    </div>
</div>
