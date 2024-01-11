<div id="lastFive" class="divProductsInIndex productsList">
    <h2 id="lastFiveTitle" class="h2ProductsInIndex h2ProductsListTitle">Novedades</h2>
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row);?>
        <div class="productOfFive productOf">
            <div class="divImageOfFive divImage">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" class="imageOfFive imageOf">
                </a>
            </div>
            <div class="detailOfFive detailOf">
                <div class="titleOfFive titleOf"><?php echo $NombreProducto?></div>
                <div class="brandOfFive brandOf"><?php echo $Editorial?></div>
                <div class="stockOfFive stockOf"><?php if ($Stock==0){
                    echo "Stock: no";
                    }else{
                    echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOfFive prizeOf"><?php echo $Precio?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<div id="childFive" class="divProductsInIndex productsList">
    <h2 id="childFiveTitle" class="h2ProductsInIndex h2ProductsListTitle">Para los más peques</h2>
    <?php while ($row = mysqli_fetch_array($childResult)) {
        extract($row);?>
        <div class="productOfFive productOf">
            <div class="divImageOfFive divImageOf">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" class="imageOfFive imageOf">
                </a>
            </div>
            <div class="detailOfFive detailOf">
                <div class="titleOfFive titleOf"><?php echo $NombreProducto?></div>
                <div class="brandOfFive brandOf"><?php echo $Editorial?></div>
                <div class="ageOfFive ageOf">Edad mínima:<?php echo $EdadMinima?></div>
                <div class="stockOfFive stockOf"><?php if ($Stock==0){
                    echo "Stock: no";
                    }else{
                    echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOfFive prizeOf"><?php echo $Precio?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php