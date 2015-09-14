<?php
session_start();
if (isset($_SESSION["logAdm"]) == false){
    session_destroy();
    header ('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>administration</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/scripts.js"></script>
</head>
<body>
<br>
<div class="navigation">
    <ul>
        <li> <a href="index.php" > exit </a>
        <li> <a href="openComment.php" > openComment </a>
        <li> <a href="visitings.php" > Посещения </a>
    </ul>
</div>

<div class="body">
    <?php
    include_once("php/dedugan.php");

    echo "Hello, ".$_SESSION['name'];
    ?>
<form>

</form>
</div>
<div class = "body">

</div>

<div class="bodyc">

</div>
</body>
</html>