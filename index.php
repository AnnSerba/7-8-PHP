<?php
session_start();
include_once('php/dedugan.php');
$visit = new VisitRecord("index");

$pd = connectDB();
$visit->save($pd);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $currentUser = new UserRecord();
    $currentUser->getUser($pd, $_POST['login'], $_POST['pass']);
    unset($_POST["login"]);
    unset($_POST["pass"]);
}
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["exit"])) {
    unset($_GET["exit"]);
    unset($_SESSION["user"]);
    unset($_SESSION["type"]);
    unset($_SESSION["fullName"]);
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ДС императора юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/scripts.js"></script>
		<link rel="stylesheet" href="scripts/jquery-ui-1.11.4.custom/jquery-ui.css">
		<script src="scripts/jquery-1.11.2.min.js"></script>
		<script src="scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script>
            $(function(){
                $("#login").click(function() {
                    $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
                        function(){ // после выполнения предыидущей анимации
                            $('#login_form')
                                .css('display', 'block') // убираем у модального окна display: none;
                                .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
                        });

                    $('#yep').click(function(){
                        $('#login_form')
                            .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                            function() { // после анимации
                                $(this).css('display', 'none'); // делаем ему display: none;
                                $('#overlay').fadeOut(400); // скрываем подложку
                            })
                    });
                });
            });
        </script>
	</head>
	<body onload="startClockAndShowHistory('index'); Slider(); "  onbeforeunload="saveToCookies('index')">
	<div>
        <div class="currentDate" id="currentDate"></div>
        <?php
        if (isset($_SESSION["user"])) {
            echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
        }
        ?>
	</div>
	<br>
	<div class="navigation"> 
		<ul>
            <li> <a href="index.php" id = "ind" > Главная страница </a>
            <li> <a href="about.php" id = "about" > Обо мне </a>
            <li> <a href="#" onclick = "showList()" id = "int" > Мои интересы </a>
            <li> <a href="study.php"> Учеба </a>
            <li> <a href="contacts.php" > Контакты </a>
            <li> <a href="tests.php"> Тесты </a>
            <li> <a href="guest.php" > Гостевая книга </a>
            <li> <a href="blog.php"> Мой блог </a>
		</ul>
	</div>
    <?php
    if (isset($_SESSION['user'])){
        echo "
        <div class=\"navigation\">
            <ul>
                <li> <a id = \"exit\" href = \"index.php?exit=true\"> Выход </a>
            </ul>
        </div>";
    } else {
        echo "<div class=\"navigation\">
        <ul>
            <li> <a id = \"login\"> Вход </a>
            <li> <a id = \"register\" href = \"register.php\"> Регистрация </a>
        </ul>
    </div>";
    }
    ?>
	<div class="navigation" id = "inter">
		<script src = "scripts/lists.js"></script>
	</div>
	<div class="body">
			<img name = "kindaSliderMaybe" id = "kindaSliderMaybe"  src="photos/1.jpg" alt="1" >
			<br>
		<div id = "SliderNav">
			<div id = "imLeft"> </div>
			 <span id="imgInfo"> Фото 1 из 15 </span>
			<div id = "imRight">  </div>
		</div>
	</div>
    <div id="login_form"><!-- Само окно -->
        <form action = "index.php" method = "post">
            Вводите логин и пароль:
            <br>
            Логин:  <input type="text" id="login" name = "login">
            <br>
            <br>
            Пароль:  <input type="text" id="pass" name = "pass">
            <br>
            <br>
            <center> <button id = "yep" type="submit" size = 60> Вход </button>
        </form>
    </div>
    <div id="overlay"></div><!-- Подложка -->
	</body>
</html>