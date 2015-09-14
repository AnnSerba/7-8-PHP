<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <title>Фотоальбом</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/jgallery.min.css?v=1.5.0" />
    <script  src="js/jquery-2.0.3.min.js"></script>
    <script  src="js/jgallery.js?v=1.5.0"></script>
    <script  src="js/touchswipe.min.js"></script>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="scripts/photo.js"></script>
    <script src="scripts/datetime.js"></script>
    <script src="scripts/setHistory.js"></script>
    <script src="scripts/cookie.js"></script>
</head>
<body onload="getPhotos(); setInterval('getDateTime()',1000); setLocalStorangeTec('Фото-альбом'); setCookieAll('Фото-альбом');">
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
</nav>
<aside>
      <h1>Серба Анна Владимировна</h1>
      <h2>И-32д</h2>
      <img src="images/mainImg.jpg" alt="Серба Анна Владимировна">
      <datetime id='datatime'>
    <script>getDateTime()</script>
    </datetime>
    </aside>
 <header>Фотоальбом</header>
    <main>
        <section>
            <div id="gallery">
                <div id="album1" class="album" data-jgallery-album-title="Album 1">
                
                </div>
                <div id="album2" class="album" data-jgallery-album-title="Album 2">
                
                </div>
            </div>
        </section>
    </main>
        <footer>
            <p>&copy; 2015 Имя компании.</p>
        </footer>
    </body>
</html>