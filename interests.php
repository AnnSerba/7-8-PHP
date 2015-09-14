<html>
	<head>
		<meta charset="UTF-8">
		<title>Интересы императора юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/scripts.js"></script>
	</head>
	<body onload="startClockAndShowHistory('interests')" onbeforeunload="saveToCookies('interests')">
	<div>
        <div>
            <div class="currentDate" id="currentDate"></div>
            <?php
            session_start();
            if (isset($_SESSION["user"])) {
                echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
            }
            include_once('php/dedugan.php');
            $visit = new VisitRecord("interests");

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
        <?php
        function showList($hrefs, $listobjects){
            echo "<ul>";
            for ($i = 0; $i < count($hrefs); $i++){
                echo "<li> <a href=\"" . $hrefs[$i] . "\"> " . $listobjects[$i] . " </a>";
            }
            echo "</ul>";
        }
        $hrefs = array('interests.php#films', 'interests.php#books', 'interests.php#music');
        $listobject = array('Любимые фильмы', 'Любимые книги', 'Любимая музыка');
        showList($hrefs,$listobject);
        ?>
	</div>
    <div class="bodyi">
        <a name="films"> Мои любимые фильмы </a>
        <br>
        <img src="images/lock.jpg" alt="image">
        <img src="images/vaza.jpg" alt="image">
        <img src="images/bast.jpg" alt="image">
        <br>

        <a name="books"> Мои любимые книги </a>
        <br>
        <img src="images/earthsea.jpg" alt="image">
        <img src="images/orange.jpg" alt="image">
        <img src="images/vedmak.jpg" alt="image">
        <br>
        <a name="music"> Моя любимая музыка </a>
        <br>
        <img src="images/nino.jpeg" alt="image">
        <img src="images/lennon.jpg" alt="image">
        <img src="images/ozzy.jpg" alt="image">
        <br>
        <audio src="audio/nino.mp3" controls></audio>
        <audio src="audio/imagine.mp3" controls></audio>
        <audio src="audio/ozzy.mp3" controls></audio>
    </div>
	</body>
</html>