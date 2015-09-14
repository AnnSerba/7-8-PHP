<?php
/**
 * Created by PhpStorm.
 * User: andre_000
 * Date: 05.09.2015
 * Time: 21:01
 */
if (isset($_POST["login"])) {
    include("dedugan.php");
    $pd = connectDB();
    $user = new UserRecord();
    if ($user->isLoginFree($_POST["login"], $pd) != 0) {
        echo "Логин занят";
    }else{
        echo "Логин свободен";
    };
} else {
    echo "error!!!";
}

?>