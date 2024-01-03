<?php
require_once 'app/models/user.php';

class userController
{
    public function index()
    {
        echo "controlador user, acción index";
    }

    public function login()
    {
        //we are going to show the login view
        require_once 'app/views/user/login.php';
    }

    public function register()
    {
        //we are going to show the register view
        require_once 'app/views/user/register.php';
    }

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
                    mysqli_close($this->db);
                    echo "noUserPassFound";
                } else {
                    while ($row = mysqli_fetch_array($userExist)) {
                        extract($row);
                    }
                    mysqli_close($this->db);
                    echo "userFound";
                    $_SESSION ['userLogged'] = "$Usuario";

                }

            }
        }

    }

}