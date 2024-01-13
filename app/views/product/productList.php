<div id="plp" class="productsList">
    <h2 id="lastFiveTitle" class="h2ProductsListTitle">Novedades</h2>
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
        <div class="productOf">
            <div class="divImage">
                <a href="<?= base_url ?>Product/productDetail&id=<?php echo $ID_Producto ?>">
                    <img src="<?= base_url ?>public/images/pdp/<?php echo $RutaImagen ?>" class="imageOf">
                </a>
            </div>
            <div class="detailOf">
                <div class="titleOfFive titleOf"><?php echo $NombreProducto ?></div>
                <div class="brandOfFive brandOf"><?php echo $Editorial ?></div>
                <div class="stockOfFive stockOf"><?php if ($Stock == 0) {
                        echo "Stock: no";
                    } else {
                        echo "Stock: sí";
                    } ?>
                </div>
                <div class="prizeOf"><?php echo $Precio ?></div>
            </div>
        </div>
        <?php
    }
    ?>
    <div id="pages">
        <?php
        if ($page > 1) {
            echo "<div id='back'><a href=" . base_url . "Product/productlist" . "&page=" . ($page - 1) . "> < </a></div>";
        } else {
            echo "<div id=back><span> < </span></div>";
        }
        $i = 1;
        ?>
        <div id="pageNumbers">
            <?php
            while ($i <= $totalPages) {
                if ($i==$page){
                    echo $i;
                }else{
                ?>
                <a href="<?= base_url ?>Product/productlist&page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php
                }
                $i++;
            }?>
        </div>
            <?php
            if ($page < $totalPages) {
                echo "<div id='next'><a href=" . base_url . "Product/productlist" . "&page=" . ($page + 1) . "> > </a></div>";
            } else {
                echo "<div id=next><span> > </span></div>";
            }

            ?>

    </div>
</div>
