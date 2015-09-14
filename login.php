<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.05.2015
 * Time: 11:15
 */
include_once("php/dedugan.php");
if (isset($_POST['login']) && isset($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $db = connectDB();
    $ask = ("select * from `users` where login = '$login' and pass = '$pass'");
    $rez = mysqli_query($db, $ask);
    if ($rez->num_rows == 1) {
        session_start();
        $rez->data_seek(0);
        $row = $rez->fetch_assoc();
        echo $row['fullName'];
        $_SESSION['logAdm'] = $login;
        $_SESSION['passAdm'] = $pass;
        $_SESSION['name'] = $row['fullName'];
        header ('Location: admin.php');
    }
}

?>