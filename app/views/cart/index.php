<?php
$a = 1;
$total = 0;
echo "<h2 class='sectionTitle'>Productos del carrito</h2>";
?>
<form id="cartForm" method="post" action="<?=base_url?>cart/index">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        extract($row);
        $Cantidad = $arraydeDetails[$a - 1]->getAmount();

        ?>
        <div class="divOrderDetails">
            <div class="divProductImg">
                <a href="<?= base_url ?>Product/productDetail&id=<?php echo $ID_Producto ?>">
                    <img class="productImg" title="<?php $NombreProducto ?>" alt="<?php $NombreProducto ?>"
                         src="<?= base_url ?>public/images/pdp/<?php echo $RutaImagen ?>">
                </a>
            </div>
            <div class="divProductTitle">
                Título:<?php echo $NombreProducto ?>
            </div>
            <div class="amount">
                <span>Cantidad:</span>
                <input type="number" id="amount<?php echo($a - 1) ?>" name="amount<?php echo($a - 1) ?>"
                       value="<?php echo $Cantidad ?>" min="0" max="<?php echo $Stock ?>" readonly>
            </div>
            <div class="prizePerUnit">
                Precio Unitario:<?php echo $Precio ?>
            </div>
            <div class="subTotal">
                Subtotal: <?php echo($Subtotal = ($Precio * $Cantidad)) ?>
            </div>
        </div>
        <?php
        $total += $Subtotal;
        $a++;
    }
    echo '
        <div id="divBuyButton">
            FINALIZAR COMPRA
            <span id="itemCount">+1</span>
        </div>';
    echo "</form>";
    echo "<div id='total'>Total: $total </div>";
    ?>
