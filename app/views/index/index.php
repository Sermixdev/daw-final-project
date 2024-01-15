<div class="productsList">
    <h2 class="productsListTitle">Novedades</h2>
    <div class="productsGrid">
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
        <div class="productCard">
            <div class="productImage">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" alt="Product Image">
                </a>
            </div>
            <div class="productDetails">
                <div class="productName"><?php echo $NombreProducto?></div>
                <div class="productBrand"><?php echo $Editorial?></div>
                <div class="productStock"><?php echo $Stock==0 ? "Stock: no" : "Stock: sí"; ?></div>
                <div class="productPrice"><?php echo $Precio?> &euro;</div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="productsList">
    <h2 class="sectionTitle">Para los más peques</h2>
    <div class="productsGrid">
    <?php while ($row = mysqli_fetch_array($childResult)) {
        extract($row); ?>
        <div class="productCard">
            <div class="productImage">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" alt="Product Image">
                </a>
            </div>
            <div class="productDetails">
                <div class="productName"><?php echo $NombreProducto?></div>
                <div class="productBrand"><?php echo $Editorial?></div>
                <div class="productStock"><?php echo $Stock==0 ? "Stock: no" : "Stock: sí"; ?></div>
                <div class="productPrice"><?php echo $Precio?> &euro;</div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
