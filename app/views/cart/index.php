<?php
$i = 1;
$total = 0;
echo "<h2 class='sectionTitle'>Productos del carrito</h2>";
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    $Cantidad=$arraydeDetails[$i-1]->getAmount();
    $i++;
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
            Subtotal: <?php echo ($Subtotal=($Precio*$Cantidad)) ?>
        </div>
    </div>
    <?php
    $total+=$Subtotal;

}
echo "<div id='total'>Total: $total </div>"
?>
