<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Контакты императора юмора</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" href="scripts/jquery-ui-1.11.4.custom/jquery-ui.css">
    <script src="scripts/jquery-1.11.2.min.js"></script>
    <script src="scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
</head>
<body >
<div  >
    <div>
        <div class="currentDate" id="currentDate"></div>
        <?php
        if (isset($_SESSION["user"])) {
            echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
        }
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
<div class = "navigation" id = "inter">
    <script src = "scripts/lists.js"></script>
</div>
<div class = "bodyc">
    <?php
    include('/php/FormValidation.php');
    include("/php/dedugan.php");
    $error_div = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fio']))
    {
        $validator = new TestValidation();
        echo $validator->checkTests($_POST);
        $error_div = $validator->showErrors();
        $pd = connectDB();
        if ($_POST["quest1"] == "Leonard Nimoy")
            $first = 1;
        else
            $first = 0;
        if ($_POST['quest2'] == 1)
            $second = 1;
        else
            $second = 0;
        if (isset($_POST['checkboxone']) == true && isset($_POST['checkboxtwo']) == false && isset($_POST['checkboxthree']) == false)
            $third = 1;
        else
            $third = 0;
        $date = date('Y-m-d');
        $fio = $_POST['fio'];
        $test = new TestRecord("tests", $fio, $first, $second, $third, $date);
        $test->save($pd);
    }
    echo $error_div;
    echo "<script>setInterval(function(){
                history.go(-1);
                }, 5000);</script>
                <br><center>Вернетесь обратно через 5 секунд</center>" ;

    ?>
</div>
</body>
</html>