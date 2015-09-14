<?php
/**
 * Created by PhpStorm.
 * User: StarWind
 * Date: 07.09.2015
 * Time: 14:03
 */
include("dedugan.php");
$pd = connectDB();

$bd = new DataBase("blog");
$bd->updateBlogRecord($_POST["id"], $_POST["title"], $_POST["mes"], $pd);
$output = $bd->getById($pd, $_POST["id"]);
foreach($output as $item){
    echo "<a href='details.php?id={$item["id"]}'><img src = \"".$item["imagePath"].
        "\" class = \"img-circle\" width=200 height=200></a><p><h4>{$item["topic"]}</h4></p>
                        <p class=\"text-justify\">{$item["mes"]}</p>
                        <button class = \"btn btn-default edit\"  value = \"{$item["id"]}\" >Редактировать</button> <br><br>";
}?>