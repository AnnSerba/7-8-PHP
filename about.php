
<html>
	<head>
		<meta charset="UTF-8">
		<title>Обо мне</title>
		<script src="scripts/scripts.js"></script>
		<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="scripts/datetime.js"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
	</head>
	<body onload="startClockAndShowHistory('about');setInterval('getDateTime()',1000); setLocalStorangeTec('Учёба'); setCookieAll('Учёба');" onbeforeunload="saveToCookies('about')">
	<nav> 
		<ul>
            <li> <a href="index.php" id = "ind" onmouseover="setBackground('ind')" onmouseout="restore('ind')"> Главная страница </a></li>
            <li> <a href="about.php" id = "about" onmouseover="setBackground('about')" onmouseout="restore('about')"> Обо мне </a></li>
            <li> <a href="interests.php" onclick = "showList()" id = "int" onmouseover="setBackground('int')" onmouseout="restore('int')"> Мои интересы </a>
				<ul>
            		<li><a href="interests.php#hobby">Моё хобби</a></li>
            		<li><a href="interests.php#books">Мои любимые книги</a></li>
            		<li><a href="interests.php#musics">Моя любимая музыка</a></li>
            		<li><a href="interests.php#films">Мои любимые фильмы</a></li>
          		</ul>
            </li>
            <li> <a href="photoAlbum.php" onmouseover="setBackground('photo')" onmouseout="restore('photo')"> Фотоальбом </a></li>
            <li> <a href="study.php" onmouseover="setBackground('study')" onmouseout="restore('study')"> Учеба </a></li>
            <li> <a href="contacts.php" onmouseover="setBackground('contacts')" onmouseout="restore('contacts')"> Контакты </a></li>

            <li> <a href="tests.php" onmouseover="setBackground('tests')" onmouseout="restore('tests')"> Тесты </a></li>
            <li> <a href="guest.php" > Гостевая книга </a></li>
            <li> <a href="blog.php"> Мой блог </a></li>
		</ul>
	</nav>

	<div class="navigation" id = "inter">
		<script src = "scripts/lists.js"></script>
	</div>
	
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
		session_start();
		if (isset($_SESSION["user"])) {
			echo "<div class=\"history\" id=\"history\"> Привет, ".$_SESSION["fullName"]."</div>";
		}
		include_once('php/dedugan.php');
		$visit = new VisitRecord("about");

		$pd = connectDB();
		$visit->save($pd);
		?>
	</div>
	<main> 
			<section>
				Я ну очень хорошенькая
			</section>
	</main>
	</body>
</html>