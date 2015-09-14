<?php
/**
 * Created by PhpStorm.
 * User: andre_000
 * Date: 06.09.2015
 * Time: 17:20
 */

    session_start();
    include("dedugan.php");
    $pd = connectDB();

    $comment = new BlogCommentsRecord();
    $blogID = $_SESSION["currentID"];
    $comments = $comment->getComments($blogID, $pd);

    echo json_encode($comments);

?>