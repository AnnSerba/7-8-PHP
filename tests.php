<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Тесты от императора юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/validatetests.js"></script>
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
			$visit = new VisitRecord("tests");

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
		if (isset($_SESSION['user'])){
			echo "<a href = \"test_archive.php\" id = \"history\">Просмотреть историю</a>";
		}
		?>
        <br>
        <br>
        <br>
        <br>
		<form name = "tests" method = "post" action="validated_tests.php">
		ФИО: <input name = "fio" id = fio>
		<br>
		<br>
		Группа:
			 <select name="group">
				<option value=0>
				<option value=1> ИТ(б)-31
				<option value=2> ИТ(б)-32
				<option value=3> ИТ(б)-33
			 </select>
		<br>
		<br>
		Имя преподавателя: <input name = "quest1" id = "quest1" >
		<br>
		<br>
		Экология - это:
			 <select name = "quest2" id = "quest2">
				<option value=0>
				<option value=1> наука
				<option value=2> я
				<option value=3> экология
				<option value=4> ролтон
			 </select>
		<br>
		<br>
		Экология изучает: 
			<label><input type="checkbox" name = "checkboxone"> природу </label>
			<label><input type="checkbox" name = "checkboxtwo"> астрономию </label>
			<label><input type="checkbox" name = "checkboxthree"> Бабу Тоню из третьего подъезда </label>
		<br>
		<br>
		<button type = "submit" name = "submit" id = "submit">Отправить</button>
		<button type = "reset">Очистить</button>
		</form>
		</div>
	</body>
</html>