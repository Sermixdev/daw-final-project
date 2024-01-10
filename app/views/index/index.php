<div id="lastFive" class="divProductsInIndex">
    <h2 id="lastFiveTitle" class="h2ProductsInIndex">Novedades</h2>
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row);?>
        <div class="productOfFive">
            <div class="divImageOfFive">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" class="imageOfFive">
                </a>
            </div>
            <div class="detailOfFive">
                <div class="titleOfFive"><?php echo $NombreProducto?></div>
                <div class="brandOfFive"><?php echo $Editorial?></div>
                <div class="stockOfFive"><?php if ($Stock==0){
                    echo "Stock: no";
                    }else{
                    echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOfFive"><?php echo $Precio?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<div id="childFive" class="divProductsInIndex">
    <h2 id="childFiveTitle" class="h2ProductsInIndex">Para los más peques</h2>
    <?php while ($row = mysqli_fetch_array($childResult)) {
        extract($row);?>
        <div class="productOfFive">
            <div class="divImageOfFive">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" class="imageOfFive">
                </a>
            </div>
            <div class="detailOfFive">
                <div class="titleOfFive"><?php echo $NombreProducto?></div>
                <div class="brandOfFive"><?php echo $Editorial?></div>
                <div class="ageOfFive">Edad mínima:<?php echo $EdadMinima?></div>
                <div class="stockOfFive"><?php if ($Stock==0){
                    echo "Stock: no";
                    }else{
                    echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOfFive"><?php echo $Precio?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php