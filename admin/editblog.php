<?php
session_start();
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
    <script src="../scripts/jquery-1.11.2.min.js"></script>
    <script src="../scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $(".edit").click(function(){
                $("#myModal").modal('show');
                var id = $(this).val();
                $("#postid").val(id);
                $.post("../php/getBlogRecord.php", {id: id}, function(data){
                    data = jQuery.parseJSON(data);
                    $.each(data, function(index, data){
                        $("#title").val(data.topic);
                        $("#text").val(data.mes);
                    });
                });
            });
            $("#update").click(function(){

                var id = $("#postid").val();
                var title = $("#title").val();
                var mes = $("#text").val();
                $.post("../php/saveRecord.php", {id:id, title: title, mes:mes}, function(data){
                    $("#"+id).html(data);
                });
                $("#myModal").modal('hide');
            })
        });
    </script>
    <style>
        .modal-body {
            max-height: 800px;
            max-width: 600px;
        }
    </style>
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
                    <a href="visitings.php"> Посещения </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class = "row">

                <?php
                include_once('../php/dedugan.php');
                $pd = connectDB();
                $table = new DataBase("blog");
                $array = $table->getAll($pd);
                foreach($array as $item){
                    echo "<div class = \"col-md-3\" id = \"{$item["id"]}\"><a href='details.php?id={$item["id"]}'><img src = \"".$item["imagePath"].
                        "\" class = \"img-circle\" width=200 height=200></a><p><h4>{$item["topic"]}</h4></p>
                        <p class=\"text-justify\">{$item["mes"]}</p>
                        <button class = \"btn btn-default edit\"  value = \"{$item["id"]}\" >Редактировать</button> <br><br></div>";
                }
                ?>

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

<!-- Morris Charts JavaScript -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Обновляем-таки</h4>
            </div>
            <div class="modal-body" >
                <input type="hidden" id = "postid" value ="">
                <label>Title: </label><div class="form-group"> <input type="text" id = "title"  value=""></div>
                <br>
                <label>Text:</label>
                <br><textarea class="form-group" id = "text" rows = 20 cols = 200> </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id = "update">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>


    </div>
</body>

</html>
