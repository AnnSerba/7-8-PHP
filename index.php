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
		<script src="scripts/scripts.js"></script>
		<link rel="stylesheet" href="scripts/jquery-ui-1.11.4.custom/jquery-ui.css">
		<script src="scripts/jquery-1.11.2.min.js"></script>
		<script src="scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="scripts/datetime.js"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
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
	<body onload="startClockAndShowHistory('index'); Slider(); setInterval('getDateTime()',1000); setLocalStorangeTec('Учёба'); setCookieAll('Учёба');"  onbeforeunload="saveToCookies('index')">
	
	<nav> 
		<ul>
            <li> <a href="index.php" id = "ind" > Главная страница </a></li>
            <li> <a href="about.php" id = "about" > Обо мне </a></li>
            <li> <a href="interests.php" onclick = "showList()" id = "int" > Мои интересы </a>
            <ul>
                    <li><a href="interests.php#hobby">Моё хобби</a></li>
                    <li><a href="interests.php#books">Мои любимые книги</a></li>
                    <li><a href="interests.php#musics">Моя любимая музыка</a></li>
                    <li><a href="interests.php#films">Мои любимые фильмы</a></li>
                </ul>
            </li>
            <li> <a href="photoAlbum.php"> Фотоальбом </a></li>
            <li> <a href="study.php"> Учеба </a></li>
            <li> <a href="contacts.php" > Контакты </a></li>
            <li> <a href="tests.php"> Тесты </a></li>
            <li> <a href="guest.php" > Гостевая книга </a></li>
            <li> <a href="blog.php"> Мой блог </a></li>
		</ul>
        <?php
    if (isset($_SESSION['user'])){
        echo "
            <ul>
                <li> <a id = \"exit\" href = \"index.php?exit=true\"> Выход </a>
            </ul></li>";
    } else {
        echo "
        <ul>
            <li> <a id = \"login\"> Вход </a></li>
            <li> <a id = \"register\" href = \"register.php\"> Регистрация </a></li>
        </ul>";
    }
    ?>
	</nav>
   
    <aside>
      <h1>Серба Анна Владимировна</h1>
      <h2>И-32д</h2>
      <img src="images/mainImg.jpg" alt="Серба Анна Владимировна">
       <datetime id='datatime'>
    <script>getDateTime()</script>
    </datetime>
    </aside>
<div>
        <?php
        if (isset($_SESSION["user"])) {
            echo "<div class=\"history\" id=\"history\"> Привет, ".$_SESSION["fullName"]."</div>";
        }
        ?>
    </div>
    <br>
	<main>
			<article>
        <h3>Лабораторная работа №4</h3>
        <h4>"Исследование возможностей библиотеки jQuery.”"</h4>
        <p>
        <time datetime="2015-02-12">
          <span>Май</span>1
        </time>
        </p>
    </article>
    <article>
        <h3>Лабораторная работа №3</h3>
        <h4>"Исследование  объектной модели документа (DOM) и системы событий JavaScript."</h4>
        <p>
        <time datetime="2015-02-12">
          <span>Май</span>1
        </time>
        </p>
    </article>
    <article>
        <h3>Лабораторная работа №2</h3>
        <h4>"Исследование возможностей программирования на стороне клиента. Основы языка JavaScript.”"</h4>
        <p>
        <time datetime="2015-02-12">
          <span>Апрель</span>12
        </time>
        </p>
      </article>
      <article>
        <h3>Лабораторная работа №1</h3>
        <h4>"Исследование возможностей языка разметки гипертекстов HTML и каскадных таблиц стилей CSS"</h4>
        <p>
        <time datetime="2015-02-12">
          <span>Февраль</span>12
        </time>
        </p>
    </article>
	</main>
 
    <div class="navigation" id = "inter">
        <script src = "scripts/lists.js"></script>
    </div>
    <div id="overlay">
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
   </div><!-- Подложка -->
	</body>
</html>