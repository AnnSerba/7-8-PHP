<?php
include_once("/php/dedugan.php");
$pd = connectDB();

$slut = new DataBase("blog");
$articles = $slut->getWithLimit($pd, 0, 10);
?>
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
            var inProgress = false;
            var startFrom = 10;
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
                    $.ajax({
                        url: 'obrabotchik.php',
                        method: 'POST',
                        data: {"startFrom" : startFrom},
                        beforeSend: function() {
                            inProgress = true;}
                    }).done(function(data){
                        data = jQuery.parseJSON(data);
                        if (data.length > 0) {
                            $.each(data, function(index, data){
                                $("#articles").append("<div class = \"row\"><img class= \"img-circle\" src = \"" + data.imagePath + "\" width = 300px height = 300px> <h3>"
                                    +data.topic + "</h3><br>" + data.mes+"</div> <br>");
                            });
                            inProgress = false;
                            startFrom += 10;
                        }});
                }
            });
        });
    </script>
</head>
<body onload="startClockAndShowHistory('contacts')" onbeforeunload="saveToCookies('contacts')">
<div  >
    <div>
        <div class="currentDate" id="currentDate"></div>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
        }
        include_once('php/dedugan.php');
        $visit = new VisitRecord("blog");

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
        <li> <a href="guest.php"> Гостевая книга </a>
        <li> <a href="blog.php"> Мой блог </a>
    </ul>
</div>
<div class = "navigation" id = "inter">
    <script src = "scripts/lists.js"></script>
</div>
<div class = "body">
    <div class = "blog">
        <link rel="stylesheet" href="css/bootstrap.css">

        <div id = "articles" name = "articles">

        <?php
        foreach ($articles as $article) {
            $string = substr($article['imagePath'], 1);
            echo "<div class = \"row\"><img class= \"img-circle\" src = \"" . $article['imagePath'] . "\" width = 300px height = 300px>
               <h3>".$article['topic'] . "</h3><br>" . $article['mes']."</div> <br>";
        }
        ?>

        </div>
    </div>
</div>
</body>
</html>