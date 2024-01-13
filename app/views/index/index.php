<div id="productSectionLastFive" class="productContainer">
    <h2 class="sectionTitle">Novedades</h2>
    <div class="productList">
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
        <div class="card">
            <div class="card-image">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" alt="Product Image">
                </a>
            </div>
            <div class="card-details">
                <div class="card-title"><?php echo $NombreProducto?></div>
                <div class="card-brand"><?php echo $Editorial?></div>
                <div class="card-stock"><?php echo $Stock==0 ? "Stock: no" : "Stock: sí"; ?></div>
                <div class="card-price"><?php echo $Precio?> &euro;</div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div id="productSectionChildFive" class="productContainer">
    <h2 class="sectionTitle">Para los más peques</h2>
    <div class="productList">
    <?php while ($row = mysqli_fetch_array($childResult)) {
        extract($row); ?>
        <div class="card">
            <div class="card-image">
                <a href="<?=base_url?>Product/productDetail&id=<?php echo $ID_Producto?>">
                    <img src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>" alt="Product Image">
                </a>
            </div>
            <div class="card-details">
                <div class="card-title"><?php echo $NombreProducto?></div>
                <div class="card-brand"><?php echo $Editorial?></div>
                <div class="card-stock"><?php echo $Stock==0 ? "Stock: no" : "Stock: sí"; ?></div>
                <div class="card-price"><?php echo $Precio?> &euro;</div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
