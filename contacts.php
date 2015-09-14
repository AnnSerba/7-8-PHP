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
		<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/calendar.css">
    <script src="scripts/datetime.js"></script>
    <script src="scripts/calendar.js" type="text/javascript"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
    <link rel="stylesheet" href="css/jquery.webui-popover.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
  <script src="js/jquery.webui-popover.js" ></script>
		</head>
	<body onload="startClockAndShowHistory('contacts');setInterval('getDateTime()',1000); setLocalStorangeTec('Учёба'); setCookieAll('Учёба');" onbeforeunload="saveToCookies('contacts')">
	
	<nav> 
		<ul>
			<li> <a href="index.php" id = "ind" onmouseover="setBackground('ind')" onmouseout="restore('ind')"> Главная страница </a>
			<li> <a href="about.php" id = "about" onmouseover="setBackground('about')" onmouseout="restore('about')"> Обо мне </a>
			<li> <a href="interests.php" onclick = "showList()" id = "int" onmouseover="setBackground('int')" onmouseout="restore('int')"> Мои интересы </a>
			<ul>
                    <li><a href="interests.php#hobby">Моё хобби</a></li>
                    <li><a href="interests.php#books">Мои любимые книги</a></li>
                    <li><a href="interests.php#musics">Моя любимая музыка</a></li>
                    <li><a href="interests.php#films">Мои любимые фильмы</a></li>
                </ul>
            </li>
            <li> <a href="photoAlbum.php"> Фотоальбом </a></li>
			<li> <a href="study.php" onmouseover="setBackground('study')" onmouseout="restore('study')"> Учеба </a>
			<li> <a href="contacts.php" onmouseover="setBackground('contacts')" onmouseout="restore('contacts')"> Контакты </a>
			<li> <a href="tests.php" onmouseover="setBackground('tests')" onmouseout="restore('tests')"> Тесты </a>
            <li> <a href="guest.php"> Гостевая книга </a>
            <li> <a href="blog.php"> Мой блог </a>
		</ul>
	</nav>
	 <aside>
      <h1>Серба Анна Владимировна</h1>
      <h2>И-32д</h2>
      <img src="images/mainImg.jpg" alt="Серба Анна Владимировна">
      <datetime id='datatime'>
    <script>getDateTime()</script>
    </datetime>
    </aside>
    <div  >
		<div>
			<?php
			session_start();
			if (isset($_SESSION["user"])) {
				echo "<div class=\"history\" id=\"history\"> Привет, ".$_SESSION["fullName"]."</div>";
			}
			include_once('php/dedugan.php');
			$visit = new VisitRecord("contacts");

			$pd = connectDB();
			$visit->save($pd);
			?>
		</div>
	</div>
	<div class = "navigation" id = "inter">
		<script src = "scripts/lists.js"></script>
	</div>
	<main>
		 <h3>Введите ваши данные</h3>
      <form METHOD=post action="mailto:annserba94@gmail.com" enctype="text/plain"> 
        <h4>Введите Вашу фамилию, имя и отчество в формате Иванов Иван Иванович:</h4>
        <p><input id="popoverFIO" type='text' tabindex="1" pattern="([А-ЯЁ][а-яё]+[\-\s]?){3,}" required/></p>
        <h4>Укажите Ваш пол:</h4>
        <p><input type='radio' name='s' value='m' checked tabindex="2"/>Мужской<br />
        <input type='radio' name='s' value='f' tabindex="3"/>Женский</p>
        <h4>Введите дату рождения:</h4>
        <p><input type="text" name="date" class="tcal" value="01/01/1994" pattern="[0-9][0-9][/][0-9][0-9][/][0-9][0-9][0-9][0-9]" onchange="onChange()" /></p>
        <h4>Ваш возраст:</h4>
        <p><input  type='number' value="20" min="1" max="120" step="1" tabindex="4"/></p>
        <h4>Ваш e-mail</h4>
        <p><input id="popoverEmail" type="email" name="login" tabindex="5" required/></p>
        <h4>Введите телефон</h4>
        <p><input id="popoverNumber" type="tel" name="tel" 
   pattern="[+][73][0-9]{8,10}" tabindex="6" required>
        </p>
        <p>
        <button  type="submit" name="submit" tabindex="7">Отправить
        </button>
        <button href="#dialog" name="modal" type="reset" name="reset" tabindex="8">
            Очистить
        </button>
        </p>
      </form>
		</main>
	</body>
</html>