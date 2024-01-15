<?php
if (!isset($_SESSION['userLogged'])) {
    header('Location:' . base_url);
}
$username = $_SESSION['userLogged'];
?>
<div class="body-content">
    <p>Hola <span class="username-highlight"><?= $username; ?></span>.<br> Este es tu panel de usuarix para revisar tus pedidos.</p>
    <div class="orderDetailsContainer">
        <?php
        if ($result == false){
            echo '<div class="no-orders">No has hecho ningún pedido aún.</div>';
        }else{
            while ($row = mysqli_fetch_array($result)) {
                extract($row); ?>
                <div class="divOrderDetails">
                    <a href="<?= base_url ?>orderdetail/index&order=<?php echo $ID_Pedido ?>" class="order-link">
                        <div class="orderID">ID de Pedido: <?php echo $ID_Pedido ?></div>
                        <div class="orderDate">Fecha de pedido: <?php echo $FechaPedido ?> </div>
                        <div class="deliveryAddress">Dirección de envío: <?php echo $DireccionEnvio ?></div>
                    </a>
                </div>
                <?php
            }  
        }
        ?>
    </div>
    <form action="<?= base_url ?>User/logout" method="post" class="logout-form">
        <button type="submit" name="logout_button" class="button">Desconectar</button>
    </form>
</div>
