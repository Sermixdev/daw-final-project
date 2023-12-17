<?php

include(__DIR__ . '/../models/UserModel.php');

function login($username,$password){
    //inside userModel.php there is a $con outside the functions that is a function to connect with mysql.
    global $con;
    $userExist = checkCombinationUserPass($username,$password);
    if ($userExist===false){
        echo "DatabaseKO";
    }else{
        if (mysqli_num_rows($userExist)==0){
            mysqli_close($con);
            echo "noUserPassFound";
        }else{
            while($row=mysqli_fetch_array($userExist)){
                extract($row);
            }
            mysqli_close($con);
            echo "userFound";
            $_SESSION ['userLogged'] = "$Usuario";
        }
    }
}