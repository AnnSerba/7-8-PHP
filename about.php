
<html>
	<head>
		<meta charset="UTF-8">
		<title>О императоре юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/scripts.js"></script>
	</head>
	<body onload="startClockAndShowHistory('about')" onbeforeunload="saveToCookies('about')">
	<div>
		<div class="currentDate" id="currentDate"></div>
		<?php
		session_start();
		if (isset($_SESSION["user"])) {
			echo "<div class=\"history\" id=\"history\"> Aloha, ".$_SESSION["fullName"]."</div>";
		}
		include_once('php/dedugan.php');
		$visit = new VisitRecord("about");

		$pd = connectDB();
		$visit->save($pd);
		?>
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
	<div class="bodya"> 
			<br>
				&nbsp; &nbsp; &nbsp; &nbsp;
Родился на улице Герцена, в гастрономе № 22. Известный экономист, по призванию своему — библиотекарь. В народе — колхозник. В магазине — продавец. В экономике, так сказать, необходим. Это, так сказать, система… эээ… в составе 120 единиц. Фотографируете Мурманский полуостров и получаете te-le-fun-ken. И бухгалтер работает по другой линии — по линии библиотекаря. Потому что не воздух будет, академик будет! Ну вот можно сфотографировать Мурманский полуостров. Можно стать воздушным асом. Можно стать воздушной планетой. И будешь уверен, что эту планету примут по учебнику. Значит, на пользу физики пойдет одна планета. Величина, оторванная в область дипломатии, дает свои колебания на всю дипломатию. А Илья Муромец дает колебания только на семью на свою. Спичка в библиотеке работает. В кинохронику ходят и зажигают в кинохронике большой лист. В библиотеке маленький лист разжигают. Огонь… эээ… будет вырабатываться гораздо легче, чем учебник крепкий. А крепкий учебник будет весомее, чем гастроном на улице Герцена. А на улице Герцена будет расщепленный учебник. Тогда учебник будет проходить через улицу Герцена, через гастроном № 22, и замещаться там по формуле экономического единства. Вот в магазине 22 она может расщепиться, экономика! На экономистов, на диспетчеров, на продавцов, на культуру торговли… Так что, в эту сторону двинется вся экономика. Библиотека двинется в сторону 120 единиц, которые будут… эээ… предмет укладывать на предмет. 120 единиц — предмет физика. Электрическая лампочка горит от 120 кирпичей, потому что структура, так сказать, похожа у нее на кирпич. Илья Муромец работает на стадионе «Динамо». Илья Муромец работает у себя дома. Вот конкретная дипломатия! «Открытая дипломатия» — то же самое. Ну, берем телевизор, вставляем в Мурманский полуостров, накручиваем там… эээ… все время черный хлеб… Так что же, будет Муромец, что ли, вырастать? Илья Муромец, что ли, будет вырастать из этого?
	</div>
	</body>
</html>