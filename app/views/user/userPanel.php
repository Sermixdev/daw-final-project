<?php
if (!isset($_SESSION['userLogged'])){
    header('Location:'.base_url);
}
$username = $_SESSION['userLogged'];
?>
Hola <?php $username?>
<form action="<?=base_url?>User/logout" method="post">
    <button type="submit" name="logout_button">Desconectar</button>
</form>>