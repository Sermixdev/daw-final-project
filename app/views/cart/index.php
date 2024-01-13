<?php
$i = 1;
$total = 0;
echo "<h2 class='sectionTitle'>Productos del carrito</h2>";
while ($row = mysqli_fetch_array($result)) {
    extract($row);

    ?>
    <div class="divOrderDetails">
        <div class="divProductImg">
            <img class="productImg" title="<?php $NombreProducto?>" alt="<?php $NombreProducto?>" src="<?=base_url?>public/images/pdp/<?php echo $RutaImagen?>">
        </div>
        <div class="divProductTitle">
            Título:<?php echo $NombreProducto ?>
        </div>
        <div class="amount">
            Cantidad:<?php echo $Cantidad ?>
        </div>
        <div class="prizePerUnit">
            Precio Unitario:<?php echo $Precio ?>
        </div>
        <div class="subTotal">
            Subtotal: <?php echo $Subtotal ?>
        </div>
    </div>
    <?php
    if ($Devuelto=="no"){
        $total+=$Subtotal;
    }
}
echo "<div id='total'>Total: $total </div>"
?>
