<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" href="scripts/jquery-ui-1.11.4.custom/jquery-ui.css">
    <script src="scripts/jquery-1.11.2.min.js"></script>
    <script src="scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("#Login").blur(function(){
               // window.alert("оооо");
                var login = $("#Login").val();
                $.post("php/checkLogin.php", {login: login}).done( function(data){
                        $("#info").text(data);
                    });
            });
        });
    </script>
</head>
<body>

<div class = "body">
    <form  method=post  action = "register.php">
        <br>
        <p class = "info" id = "info"></p>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Login"])) {
            include_once("/php/dedugan.php");
            $pd = connectDB();
            $user = new UserRecord();
            if ($user->isLoginFree($_POST["Login"], $pd) == 0){
                $user->fillGaps($_POST["Login"], $_POST["password"],$_POST["fullname"],$_POST["email"]);
                $user->save($pd);
                $_SESSION["error"] = "Вы зареганы. Сейчас веренесть на главную";
                echo "<script>location.href='./index.php'</script>";
            } else {
                $_SESSION["error"] = "Сорян, парни, логин занят";
            }
        }

        ?>
        <br>
        Полное имя: <input type="text" name = "fullname">
        <br>
        <br>
        Логин: <input type="text" name = "Login" id = "Login">
        <br>
        <br>
        Пароль:<input type="text" name = "password">
        <br>
        <br>
        E-mail: <input type="text" name = "email">
        <br>
        <br>
        <input type=submit value="Регистрация" name = "submit">

    </form>
</div>
</body>
</html>
