<div class="productsList">
    <h2 class="productsListTitle">Novedades</h2>
    <div class="productsGrid">
    <?php while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
        <div class="productCard">
            <div class="productImage">
                <a href="<?= base_url ?>Product/productDetail&id=<?php echo $ID_Producto ?>">
                        <img src="<?= base_url ?>public/images/pdp/<?php echo $RutaImagen ?>" alt="<?php echo $NombreProducto ?>">
                </a>
            </div>
            <div class="productDetails">
                <div class="productName"><?php echo $NombreProducto ?></div>
                <div class="productBrand"><?php echo $Editorial ?></div>
                <div class="productStock"><?php echo $Stock == 0 ? "Stock: no" : "Stock: sí" ?></div>
                <div class="productPrice"><?php echo $Precio ?></div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div id="pagination">
        <div class="paginationControl">
            <?php
            if ($page > 1) {
                echo "<a href='" . base_url . "Product/productlist&page=" . ($page - 1) . "' aria-label='Previous page'> < </a>";
            } else {
                echo "<span class='disabled'> < </span>";
            }
            ?>
        </div>
        <div class="pageNumbers">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo "<span class='currentPage'>$i</span>";
                } else {
                    echo "<a href='" . base_url . "Product/productlist&page=$i'>$i</a>";
                }
            }
            ?>
        </div>
        <div class="paginationControl">
            <?php
            if ($page < $totalPages) {
                echo "<a href='" . base_url . "Product/productlist&page=" . ($page + 1) . "' aria-label='Next page'> > </a>";
            } else {
                echo "<span class='disabled'> > </span>";
            }
            ?>
        </div>
    </div>
</div>
