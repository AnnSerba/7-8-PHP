<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Тесты от императора юмора</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="scripts/validatetests.js"></script>
		<script src="scripts/scripts.js"></script>
		<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
     <link rel="stylesheet" href="css/modal.css">
    <script src="scripts/test.js"></script>
    <script src="scripts/datetime.js"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="scripts/modal.js"></script>
    <script  src="js/jquery-2.0.3.min.js"></script>
	</head>
	<body onload="startClockAndShowHistory('tests')" onbeforeunload="saveToCookies('tests')">
	
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
            <li> <a href="photoAlbum.php"> Фотоальбом </a></li>
            <li> <a href="study.php" onmouseover="setBackground('study')" onmouseout="restore('study')"> Учеба </a></li>
            <li> <a href="contacts.php" onmouseover="setBackground('contacts')" onmouseout="restore('contacts')"> Контакты </a></li>
            <li> <a href="tests.php" onmouseover="setBackground('tests')" onmouseout="restore('tests')"> Тесты </a></li>
            <li> <a href="guest.php" > Гостевая книга </a>
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
	<main>
		      <h3>Основы программирования и алгоритмические языки</h3>
      <form>
        <h3>Дан следующий фрагмент псевдокода. Что будет выведено?</h3>
          <p>
Begin<br/>
  i:=10<br/>
  n:=0<br/>
  while(i &lt; 10) do <br/>
    begin<br/>
      n:=n+1<br/>
      I:=I+1<br/>
    end <br/>
  While<br/>
    output n<br/>
end<br/>

          <SELECT NAME="selection">
            <OPTION selected>1</OPTION>
            <OPTION>0</OPTION>
            <OPTION>10</OPTION>
            <OPTION>9</OPTION>
          </SELECT>
          </p>
        
          <h3>Принципы ООП</h3>
          <p>
            <input type="checkbox" name="checkboxOOP"> Абстракция
          </p>
          <p>
            <input type="checkbox" name="checkboxOOP"> Инкапсуляция
          </p>
          <p>
            <input type="checkbox" name="checkboxOOP"> Наследование
          </p>
          <p>
            <input type="checkbox" name="checkboxOOP"> Полиморфизм
          </p>
          <p>
            <input type="checkbox" name="checkboxOOP"> Прототипирование
          </p>
        <h3>Что делает оператор декремента(--)?</h3>
          <p><input type='radio' name='decrement' checked/>Уменьшает значение операнда на 2
          <br>
          <input type='radio' name='decrement'/>Уменьшает значение операнда на 1
          <br>
          <input type='radio' name='decrement'/>Ничего не делает
        </p>
        <p>
        <a  href="#dialog" name="modal" >
        <button onclick="test(selection.selectedIndex, checkboxOOP, decrement[1].checked)">
          Проверить
          </button>
        </a>
        </p>
         <!-- Само окно -->
        <div id="boxes">  
          <div id="dialog" class="window"> 
            <div class="top"><a href="#" class="link close"/>Закрыть</a>
            </div>
            <div id="content" class="content">
          rr
            </div>
          </div>
        </div>

        <!-- Маска, затемняющая фон -->
        <div id="mask">
          
        </div>
      </form>
    </main>
    <footer>
      <p>&copy; 2015 Имя компании.</p>
    </footer>
      <script>
$(document).ready(function() {   
    $('a[name=modal]').click(function(e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').fadeIn(1000); 
    $('#mask').fadeTo("slow",0.8); 
    var winH = $(window).height();
    var winW = $(window).width();
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    $(id).fadeIn(2000); 
    });
    $('.window .close').click(function (e) { 
    e.preventDefault();
    $('#mask, .window').hide();
    }); 
    $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
    }); 
   }); 
</script>
		</main>
	</body>
</html>