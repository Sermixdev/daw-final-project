<?php
if (!isset($_SESSION['userLogged'])){
    header('Location:'.base_url);
}
$username = $_SESSION['userLogged'];
?>
<p>Hola <?php echo $username;?>.<br> Este es tu panel de usuarix para revisar tus pedidos.</p>
<form action="<?=base_url?>User/logout" method="post">
    <button type="submit" name="logout_button">Desconectar</button>
</form>