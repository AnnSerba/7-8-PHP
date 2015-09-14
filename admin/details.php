<?php
session_start();
$_SESSION["currentID"] = $_GET["id"];
/*if (isset($_SESSION["type"])){
    if ($_SESSION["type"] != "admin"){
        echo "<script>location.href='../index.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../scripts/jquery-1.11.2.min.js"></script>
    <script src="../scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        //function displayComments(){

        //};
        $(document).ready(function(){
            $.post("../php/displayComments.php").done( function(data){
                data = jQuery.parseJSON(data);
                if (data.length > 0) {

                    $("#showComments").html("");
                    $.each(data, function(index, data){
                        $("#showComments").append("<p>"+data.author+" on "+ data.date + " posted: " + data.text + "</p>")
                    })
                }
            })
            $("#comment").click(function(){
                var username = "";
                if (!$("#username").val()){
                    username = "Анонимус";
                } else {
                    username = $("#username").val();
                }
                if (!$("#text").val() ){
                    alert("Ну и зачем нам пустой комментарий?")
                } else {
                    var text = $("#text").val();
                    $.post("../php/addcomment.php", {username: username, text: text}).done(function(){
                        $.post("../php/displayComments.php").done( function(data){
                            data = jQuery.parseJSON(data);
                            if (data.length > 0) {

                                $("#showComments").html("");
                                $.each(data, function(index, data){
                                    $("#showComments").append("<p>"+data.author+" on "+ data.date + " posted: " + data.text + "</p>")
                                })
                            }
                        })
                    });
                }
            });
        });
    </script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SB Admin</a>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="index.php"> Редактор блога </a>
                </li>
                <li>
                    <a href="../admin/guest.php"> Файл гостевой книги </a>
                </li>
                <li>
                    <a href="visitings.php?begin=0"> Посещения </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class = "row">

                <?php
                if (isset($_GET["id"])){
                    include_once('../php/dedugan.php');
                    $pd = connectDB();
                    $id = $_GET["id"];
                    $table = new DataBase("blog");
                    $array = $table->getById($pd, $id);
                    foreach($array as $item){
                        echo "<div class = \"col-md-12 text-center\" ><img src = \"".$item["imagePath"].
                            "\" class = \"img-circle\" width=400 height=400><p><h4>{$item["topic"]}</h4></p>
                        <p class=\"text-justify\">{$item["mes"]}</p></div>";
                    }

                }

                ?>

            </div>

            <div id = "comments">

                <div id = "addComment" class = "col-md-12 form-inline">
                    <div class="form-group"> <input type="text" id = "username" placeholder="Ваше имячкофамилия" value=""></div>
                    <div class="form-group"> <input type="text" id = "text" placeholder="Ваш комментарий" value=""></div>
                    <div class="form-group"><button class="btn btn-default" id="comment">Комментировать</button></div>
                </div>
                <br>
                <div id = "showComments" class = "col-md-12">

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>



</body>

</html>
