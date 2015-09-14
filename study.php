<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Учёба императора юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/scripts.js"></script>
	</head>
	<body onload="startClockAndShowHistory('study')" onbeforeunload="saveToCookies('study')">
	<div>
		<div>
			<div class="currentDate" id="currentDate"></div>
			<?php
			session_start();
			if (isset($_SESSION["user"])) {
				echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
			}
			include_once('php/dedugan.php');
			$visit = new VisitRecord("study");

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
	<div class="bodys"> 
		<div class="lala">
			<div class="study">
			<br>Севастопольский Госудраственный Университет
			<br>Кафедра Информационных систем
			</div>
			<table>
			<tr>
				<th class=tabletitle rowspan="3">№</th>
				<th class=tabletitle rowspan="3">Дисциплина</th>	
				<th class=tabletitle colspan="12"> Часов в неделю 
				<br>(лекций, лаб.раб, практ.лаб)</th>
				</tr>
				<tr>
				<th class=tabletitle colspan="6"> 1 курс </th>
				<th class=tabletitle colspan="6"> 2 курс </th>
				</tr>		
				<tr>		
				<th class=tabletitle colspan="3"> 1 сем </th>
				<th class=tabletitle colspan="3"> 2 сем </th>
				<th class=tabletitle colspan="3"> 3 сем </th>
				<th class=tabletitle colspan="3"> 4 сем </th>
				</tr>		
				<tr>
					<th class=data> 1
					<th class=data> Экология
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>1
					<th class=tabletitle>0
					<th class=tabletitle>1

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>		
				
				<tr>
					<th class=data> 2
					<th class=data> Высшая математика 
					<th class=tabletitle>3
					<th class=tabletitle>0
					<th class=tabletitle>3

					<th class=tabletitle>3
					<th class=tabletitle>0
					<th class=tabletitle>3

					<th class=tabletitle>2
					<th class=tabletitle>0
					<th class=tabletitle>2

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>	

				<tr>
					<th class=data> 3
					<th class=data> Русский язык и культура речи 
					<th class=tabletitle>1
					<th class=tabletitle>0
					<th class=tabletitle>2

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 4
					<th class=data> Основы дискретной математики
					<th class=tabletitle>2
					<th class=tabletitle>0
					<th class=tabletitle>1

					<th class=tabletitle>3
					<th class=tabletitle>0
					<th class=tabletitle>2

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 5
					<th class=data> Основы программирования и алгоритмические языки
					<th class=tabletitle>3
					<th class=tabletitle>2
					<th class=tabletitle>0

					<th class=tabletitle>3
					<th class=tabletitle>3
					<th class=tabletitle>0

					<th class=tabletitle>0
					<th class=tabletitle>0
					<th class=tabletitle>1

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 6
					<th class=data> Основы экологии
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>1
					<th class=tabletitle>0
					<th class=tabletitle>0

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 7
					<th class=data> Теория вероятностей и 
					<br>математическая статистика
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>3
					<th class=tabletitle>1
					<th class=tabletitle>0

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 8
					<th class=data> Физика
					<th class=tabletitle>2
					<th class=tabletitle>2
					<th class=tabletitle>0

					<th class=tabletitle>2
					<th class=tabletitle>2
					<th class=tabletitle>0

					<th class=tabletitle>2
					<th class=tabletitle>1
					<th class=tabletitle>0

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>

				<tr>
					<th class=data> 9
					<th class=data> Основы электротехники и электроники
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>2
					<th class=tabletitle>1
					<th class=tabletitle>1

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>		
				</tr>
				
				<tr>
					<th class=data> 10
					<th class=data> Численные методы в информатике
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>2
					<th class=tabletitle>2
					<th class=tabletitle>0

					<th class=tabletitle>0
					<th class=tabletitle>0
					<th class=tabletitle>1		
				</tr>

				<tr>
					<th class=data> 11
					<th class=data> Методы исследования операций
					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>
					<th class=tabletitle>
					<th class=tabletitle>

					<th class=tabletitle>1
					<th class=tabletitle>1
					<th class=tabletitle>0

					<th class=tabletitle>2
					<th class=tabletitle>1
					<th class=tabletitle>1		
				</tr>
		</table>
		<br>
		<br>
	</div>	
	</div>

	</body>
</html>