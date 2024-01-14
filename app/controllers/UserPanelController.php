<?php
require_once 'app/models/UserPanel.php';
class UserPanelController
{
    // Sends the user to the userPanel view
    public function index()
    {
        //if is not already logged in, the user is going to the login view.
        if (!isset($_SESSION['userLogged'])){
            header("Location:".base_url."user/login");
        }else{
            $userPanel = new UserPanel();
            $result = $userPanel->getAllOrders();
            //we are going to show the userPanel view
            require_once 'app/views/user/userPanel.php';
        }

    }
}