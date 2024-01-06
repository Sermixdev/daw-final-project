<?php
require_once 'app/models/user.php';

class userController
{
    public function index()
    {
        echo "controlador user, acción index";
    }
// Sends the user to the login view
    public function login()
    {
        //if is already logged in, the user is going to his/her panel.
        if (isset($_SESSION['userLogged'])){
            header("Location:".base_url."user/userPanel");
        }
        //we are going to show the login view
        require_once 'app/views/user/login.php';
    }
// Sends the user to the register view
    public function register()
    {
        //if is already logged in, the user is going to his/her panel.
        if (isset($_SESSION['userLogged'])){
            header("Location:".base_url."user/userPanel");
        }
        //we are going to show the register view
        require_once 'app/views/user/register.php';
    }

    // Sends the user to the userPanel view
    public function userPanel()
    {
        //if is already logged in, the user is going to his/her panel.
        if (!isset($_SESSION['userLogged'])){
            header("Location:".base_url);
        }
        //we are going to show the userPanel view
        require_once 'app/views/user/userPanel.php';
    }
// function executed when the user press login button
    public function checkLogin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $user = new user();
            $user->setUser($_POST['userName']);
            $user->setPassword($password = $_POST['password']);
            $userExist = $user->login();
            if ($userExist === false) {
                echo "DatabaseKO";
            } else {
                if (mysqli_num_rows($userExist) == 0) {
                    //mysqli_close($this->db);
                    echo "noUserPassFound";
                } else {
                    while ($row = mysqli_fetch_array($userExist)) {
                        extract($row);
                    }
                    //mysqli_close($this->db);
                    echo "userFound";
                    $_SESSION ['userLogged'] = "$Usuario";
                    header("Location:".base_url);
                }

            }
        }

    }

    public function newUser(){
        $user = new user();
        $user->setUser($_POST['userName']);
        $user->setNameSurname($_POST['nameSurname']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setAddress($_POST['address']);
        $result = $user->register();
        if ($result){
            echo "Registro exitoso";
            $_SESSION ['userLogged'] = $user->getUser();
            header('Location:'.base_url);
        }else{
            echo "Error en la inserción";

        }

    }
    public function logout(){
        if(isset($_POST['logout_button'])){
            session_destroy();
        }
        header('Location:'.base_url);
        exit();
    }
}