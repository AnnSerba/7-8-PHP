
<?php
// C какой статьи будет осуществляться вывод
include_once('/php/dedugan.php');
$pd = connectDB();
$startFrom = $_POST['startFrom'];
$slut = new DataBase("blog");
// Получаем 10 статей, начиная с последней отображенной
$articles = $slut->getWithLimit($pd, $startFrom, 10);
// Превращаем массив статей в json-строку для передачи через Ajax-запрос
echo json_encode($articles);
?>

