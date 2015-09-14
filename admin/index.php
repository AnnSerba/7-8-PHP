<?php
session_start();
if (isset($_SESSION["type"])){
    if ($_SESSION["type"] != "admin"){
        echo "<script>location.href='../index.php'</script>";
    }
} else {
    echo "<script>location.href='../index.php'</script>";
}

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


                <?php
                include_once('../php/dedugan.php');

                $pd = connectDB();
                if (isset($_POST['submit'])) {
                    $uploadfile = "";
                    if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK) {
                        $uploaddir = '../blog/';
                        $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
                        copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
                        unset($_FILES['uploadfile']);
                    } else {
                        $uploadfile = "none";
                    }
                    if ($_POST['theme'] != "" && $_POST['mes'] != "") {
                        $pd = connectDB();
                        $theme = $_POST['theme'];
                        $message = $_POST['mes'];
                        $date = date("Y-m-d");
                        $fN = strval($uploadfile);
                        $blog = new BlogRecord("blog", $theme, $message, $fN, $date);
                        $blog->save($pd);
                        } else {
                        echo  "Заполните все поля, камрад!";
                        unset($_POST['theme']);
                        unset($_POST['mes']);
                        unset($_POST['submit']);
                        }
                        unset($_POST['theme']);
                        unset($_POST['mes']);
                        unset($_POST['submit']);
                        }
                        ?>
                <form method = "post" action = "index.php" enctype=multipart/form-data>
                    <br>
                    <br>
                    <br>
                    <h3>Добавить запись:</h3>
                    <br>
                    Тема <input name = "theme">
                    <br>
                    <br>
                    Изображение: <input type=file name="uploadfile">
                    <br>
                    <br>
                    Текст сообщения:
                    <br>
                    <textarea name = "mes" id = "mes" rows = 10 cols = 60  data-tooltip="Вводите сообщение"></textarea>
                    <br>
                    <button type = "submit" id = "submit"  name = "submit">Отправить</button>
                    <button type = "reset"> Очистить </button>
                </form>

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
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
