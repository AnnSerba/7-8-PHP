<?php
if (isset($_POST["text"])) {
    session_start();
    include("dedugan.php");
    $pd = connectDB();
    $user = $_POST["username"];
    $comment = new BlogCommentsRecord("blogcomments");
    $text = $_POST["text"];
    $blogID = $_SESSION["currentID"];
    $date = date("Y-m-d H:i:s");
    $comment->add($blogID, $text, $user, $date, $pd);
    echo "ok";
}
?>