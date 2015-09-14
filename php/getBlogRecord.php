<?php
/**
 * Created by PhpStorm.
 * User: StarWind
 * Date: 07.09.2015
 * Time: 14:03
 */
    include("dedugan.php");
    $pd = connectDB();
    $id = $_POST["id"];
    $bd = new DataBase("blog");
    $array = $bd->getById($pd, $id);
    echo json_encode($array);

?>