<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Учёба</title>
		<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="scripts/datetime.js"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
		<script src="scripts/scripts.js"></script>
	</head>
	<body onload="startClockAndShowHistory('study');setInterval('getDateTime()',1000); setLocalStorangeTec('Учёба'); setCookieAll('Учёба');" onbeforeunload="saveToCookies('study')" >
	<nav> 
		<ul>
            <li> <a href="index.php" id = "ind" onmouseover="setBackground('ind')" onmouseout="restore('ind')"> Главная страница </a></li>
            <li> <a href="about.php" id = "about" onmouseover="setBackground('about')" onmouseout="restore('about')"> Обо мне </a></li>
            <li> <a href="interests" onclick = "showList()" id = "int" onmouseover="setBackground('int')" onmouseout="restore('int')"> Мои интересы </a>
             <ul>
                    <li><a href="interests.php#hobby">Моё хобби</a></li>
                    <li><a href="interests.php#books">Мои любимые книги</a></li>
                    <li><a href="interests.php#musics">Моя любимая музыка</a></li>
                    <li><a href="interests.php#films">Мои любимые фильмы</a></li>
                </ul></li>
            <li> <a href="photoAlbum.php"> Фотоальбом </a></li>
            <li> <a href="study.php" onmouseover="setBackground('study')" onmouseout="restore('study')"> Учеба </a></li>
            
            <li> <a href="contacts.php" onmouseover="setBackground('contacts')" onmouseout="restore('contacts')"> Контакты </a></li>
            <li> <a href="tests.php" onmouseover="setBackground('tests')" onmouseout="restore('tests')"> Тесты </a></li>
            <li> <a href="guest.php" > Гостевая книга </a></li>
            <li> <a href="blog.php"> Мой блог </a></li>

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

			<?php
			session_start();
			if (isset($_SESSION["user"])) {
				echo "<div class=\"history\" id=\"history\"> Привет, ".$_SESSION["fullName"]."</div>";
			}
			include_once('php/dedugan.php');
			$visit = new VisitRecord("study");

			$pd = connectDB();
			$visit->save($pd);

			?>

	<main>
      <section>
        <h3>Место учёбы</h3>
        <table>
          <tr>  
            <td>Вуз:</td>
            <td>СевГУ '16</td>
          </tr> 
          <tr>
            <td>Факультет:</td>
            <td>Автоматики и вычислительной техники</td>
          </tr>
          <tr>
            <td>Кафедра:</td>
            <td>Информационных систем (ИС)</td>
          </tr>
          <tr>
            <td>Форма обучения:</td>
            <td>Дневное отделение</td>
          </tr>
          <tr>
            <td>Статус:</td>
            <td>Студентка (бакалавр)</td>
          </tr>
        </table>
      </section>
      <section>
          <h3>План учебного процесса</h3>
        <table>
          <tr>
            <th>№</th>
            <th>Дисциплина</th>
            <th>Кафедра</th>
            <th colspan="6">Всего часов</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Всего</th>
            <th>Ауд</th>
            <th>Лек</th>
            <th>Лб</th>
            <th>Пр</th>
            <th>СРС</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Экология</td>
            <td>БЖ</td>
            <td>54</td>
            <td>27</td>
            <td>18</td>
            <td>0</td>
            <td>9</td>
            <td>27</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Высшая математика</td>
            <td>ВМ</td>
            <td>540</td>
            <td>282</td>
            <td>141</td>
            <td>0</td>
            <td>141</td>
            <td>258</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Русский язык и культура речи</td>
            <td>НГиГ</td>
            <td>108</td>
            <td>54</td>
            <td>18</td>
            <td>0</td>
            <td>26</td>
            <td>54</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Основы дискретной математики</td>
            <td>ИС</td>
            <td>216</td>
            <td>139</td>
            <td>87</td>
            <td>0</td>
            <td>52</td>
            <td>77</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Основы программирования и алгоритмические языки</td>
            <td>ИС</td>
            <td>405</td>
            <td>210</td>
            <td>105</td>
            <td>87</td>
            <td>18</td>
            <td>195</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Основы экологии</td>
            <td>ПЭОП</td>
            <td>54</td>
            <td>27</td>
            <td>18</td>
            <td>0</td>
            <td>9</td>
            <td>27</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Теория вероятностей и математическая статистика</td>
            <td>ИС</td>
            <td>162</td>
            <td>72</td>
            <td>54</td>
            <td>18</td>
            <td>0</td>
            <td>90</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Физика</td>
            <td>Физики</td>
            <td>324</td>
            <td>194</td>
            <td>106</td>
            <td>88</td>
            <td>0</td>
            <td>130</td>
          </tr>
          <tr>
            <td>9</td>
            <td>Основы электротехники и электроники</td>
            <td>ИС</td>
            <td>108</td>
            <td>72</td>
            <td>36</td>
            <td>18</td>
            <td>18</td>
            <td>36</td>
          </tr>
          <tr>
            <td>10</td>
            <td>Численные методы в информатике</td>
            <td>ИС</td>
            <td>189</td>
            <td>89</td>
            <td>36</td>
            <td>36</td>
            <td>17</td>
            <td>100</td>
          </tr>
          <tr>
            <td>11</td>
            <td>Методы исследования операций</td>
            <td>ИС</td>
            <td>216</td>
            <td>104</td>
            <td>52</td>
            <td>35</td>
            <td>17</td>
            <td>112</td>
          </tr>
        </table>
        </section>
	</main>
	</body>
</html>