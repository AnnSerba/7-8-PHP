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
<body>
<div>
    <div class="currentDate" id="currentDate"></div>
    <div class="history" id="history" ></div>
</div>
<br>
<div class="navigation">
    <ul>
        <li> <a href="index.php" id = "ind"> Главная страница </a>
        <li> <a href="about.php" id = "about"> Обо мне </a>
        <li> <a href="#" onclick = "showList()"> Мои интересы </a>
        <li> <a href="study.php"> Учеба </a>
        <li> <a href="contacts.php"> Контакты </a>
        <li> <a href="tests.php"> Тесты </a>
        <li> <a href="guest.php"> Гостевая книга </a>
        <li> <a href="blog.php"> Мой блог </a>
    </ul>
</div>
<div class = "navigation" id = "inter">
    <script src = "scripts/lists.js"></script>
</div>
<div class = "bodyc">

</div>
</body>
</html>