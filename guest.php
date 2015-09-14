<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Тесты от императора юмора</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/scripts.js"></script>
</head>
<body onload="startClockAndShowHistory('tests')" onbeforeunload="saveToCookies('tests')">
<div >
    <div>
        <div class="currentDate" id="currentDate"></div>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
        }
        include_once('php/dedugan.php');
        $visit = new VisitRecord("guest");

        $pd = connectDB();
        $visit->save($pd);
        ?>
    </div>
</div>
<br>
<div class="navigation">
    <ul>
        <li> <a href="index.php" id = "ind" onmouseover="setBackground('ind')" onmouseout="restore('ind')"> Главная страница </a>
        <li> <a href="about.php" id = "about" onmouseover="setBackground('about')" onmouseout="restore('about')"> Обо мне </a>
        <li> <a href="#" onclick = "showList()" id = "int" onmouseover="setBackground('int')" onmouseout="restore('int')"> Мои интересы </a>
        <li> <a href="study.php" onmouseover="setBackground('study')" onmouseout="restore('study')"> Учеба </a>
        <li> <a href="contacts.php" onmouseover="setBackground('contacts')" onmouseout="restore('contacts')"> Контакты </a>
        <li> <a href="tests.php" onmouseover="setBackground('tests')" onmouseout="restore('tests')"> Тесты </a>
        <li> <a href="guest.php" > Гостевая книга </a>
        <li> <a href="blog.php"> Мой блог </a>
    </ul>
</div>
<div class="navigation" id = "inter">
    <script src = "scripts/lists.js"></script>
</div>
<div class="bodyc">
    <?php

    $comment = new DataBase("comments");
    if (isset($_POST['submit'])) {
        $val = new FormValidation();
        $val->setRule('email', "/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/");
        $val->setRule('fio', "/^[А-Яа-яA-Za-z]+ [А-Яа-яA-Za-z]+ [А-Яа-яA-Za-z]+$/");
        $val->setRule('mes', "/\w+/");
        $val->validate($_POST);
        $er = $val->showErrors();
        if (strripos($er, "Error") == false) {
            $fio = $_POST['fio'];
            $email = $_POST['email'];
            $mes = $_POST['mes'];
            $date = date('Y-m-d');
            $comment = new CommentRecord("comments", $fio, $email, $mes, $date);
            $comment->save($pd);
        } else
            echo $er . "<br>";
    };
    ?>
    <form method = post action="guest.php">
       <a href = "openComment.php" id = "history">Открыть файл с записями </a>
        <br>
        <br>
        <br>
        <br>
        ФИО: <input name = "fio" >
        <br>
        <br>
        E-mail:<input name = "email">
        <br>
        <br>
        Текст сообщения
        <br>
        <br>
        <textarea name = "mes" id = "mes" rows = 10 cols = 60  ></textarea>
        <br>
        <br>
        <button type = "submit" id = "submit"  name = "submit">Отправить</button>
        <button type = "reset"> Очистить </button>
    </form>
    <br>
    <br>
    <div id = "commnets">
        <?php

            $result = $comment->getAll($pd);
            foreach ($result as $row) {
                echo "<br><b>".$row['name']." пишет: </b>
                ".$row['comment'];
            }
        ?>

    </div>
</div>
</body>
</html>