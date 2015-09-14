<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Тесты от императора юмора</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/validatetests.js"></script>
    <script src="scripts/scripts.js"></script>
</head>
<body >
<div  >
    <div class="currentDate" id="currentDate"></div>
    <div class="history" id="history" ></div>
</div>
<br>
<div class="navigation">
    <ul>
        <li> <a href="index.php" id = "ind"> Главная страница </a>
        <li> <a href="about.php" id = "about"> Обо мне </a>
        <li> <a href="#" onclick = "showList()"> Мои интересы </a>
        <li> <a href="study.php"> Учеба </a>
        <li> <a href="contacts.php"> Контакты </a>
        <li> <a href="tests.php"> Тесты </a>
        <li> <a href="guest.php" > Гостевая книга </a>
        <li> <a href="blog.php"> Мой блог </a>
    </ul>
</div>
<div class="navigation" id = "inter">
    <script src = "scripts/lists.js"></script>
</div>
<div class="bodyc">
    <table>
        <tr>
            <td>
                ФИО
            </td>
            <td>
                Вопрос первый
            </td>
            <td>
                Вопрос второй
            </td>
            <td>
                Вопрос третий
            </td>
            <td>
                Дата
            </td>
        </tr>
    <?php
    include("/php/dedugan.php");
    $pd = connectDB();
    $bitch = new DataBase("tests");
    $res = $bitch->getAll($pd);
    foreach ($res as $row)
    {
        echo "<tr>
        <td>
            ".$row['fio']."
        </td>
        <td>
            ".$row['firstQ']."
        </td>
        <td>
            ".$row['secondQ']."
        </td>
        <td>
            ".$row['thirdQ']."
        </td>
        <td>
            ".$row['date']."
        </td>
        </tr>";
    }
    ?>
    </table>
</div>
</body>
</html>