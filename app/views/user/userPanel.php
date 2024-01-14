<?php
if (!isset($_SESSION['userLogged'])) {
    header('Location:' . base_url);
}
$username = $_SESSION['userLogged'];
?>
<p>Hola <?php echo $username; ?>.<br> Este es tu panel de usuarix para revisar tus pedidos.</p>
<div class="orderDetailsContainer">
    <?php
    while ($row = mysqli_fetch_array($result)) {
        extract($row); ?>
        <div class="divOrderDetails">
            <a href="<?= base_url ?>orderdetail/index&order=<?php echo $ID_Pedido ?>">
                <div class="orderID">
                    ID de Pedido: <?php echo $ID_Pedido ?>
                </div>
                <div class="orderDate">Fecha de pedido: <?php echo $FechaPedido ?> </div>
                <div class="deliveryAddress">Dirección de envío: <?php echo $DireccionEnvio ?></div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
<form action="<?= base_url ?>User/logout" method="post">
    <button type="submit" name="logout_button">Desconectar</button>
</form>
