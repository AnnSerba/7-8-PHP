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
			$visit = new VisitRecord("contacts");

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
	<div class = "bodyc">
		<form name = "contact_form" method="post" action = "validated_contacts.php">
		ФИО: <input name = "fio" id = "fio"  data-tooltip="Вводите имя">
			<div id="tooltip"></div>
		<br>
		<span class="hint" id = "hintName" >  </span>
		<br>

		Выбирайте пол: 
			<label><input name = "sex" type = "radio" > Мужчина </label>
			<label><input name = "sex" type = "radio" > Женщина </label>
		<br>
		<br>
		E-MAIL: <input name = "email" id = "email"  data-tooltip="Вводите e-mail">
			<div id="tooltip"></div>
		<br>
		<span class="hint" id = "hintMail">   </span>

		<br>
			Дата рождения: <input type="text" id="datepicker" name = "datepicker">
		<br>
		<br>
		Введите сообщение:
		<br>
			<textarea name = "mes" id = "mes" rows = 10 cols = 60  data-tooltip="Вводите сообщение"></textarea>
			<div id="tooltip"></div>
		<br>
		<br>
		Телефон: <input name = "phone" id = "phone" data-tooltip="Вводите телефон">
			<div id="tooltip"></div>
		<br>
		<span class = "hint" id = "hintPhone">  </span>
		<br>
		<br>
		<button type = "submit" id = "submit"  name = "submit">Отправить</button>
		<button type = "reset"> Очистить </button>
		</form>
		</div>
	</body>
</html>