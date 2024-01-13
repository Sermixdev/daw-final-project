<?php
$i = 1;
$total = 0;
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    if ($i == 1) {
        ?>
        <div id="divOrder">
            <h2 class="sectionTitle">Datos del pedido</h2>
            <div class="orderData">Identificador de pedido: <?php echo $ID_Pedido ?> </div>
            <div class="orderData">Estado del pago: <?php echo $EstadoPago ?> </div>
            <div class="orderData">Fecha del pedido: <?php echo $FechaPedido ?> </div>
            <div class="orderData">Dirección del pedido: <?php echo $DireccionEnvio ?> </div>
        </div>

        <h2 class="sectionTitle">Productos del pedido</h2>
        <?php
        $i++;
    }

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
        <div class="returned">
            Devuelto:<?php echo $Devuelto ?>
        </div>
        <div class="prizePerUnit">
            Precio Unitario:<?php echo $PrecioUnitario ?>
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
