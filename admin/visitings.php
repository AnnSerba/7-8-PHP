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
                <li >
                    <a href="index.php"> Редактор блога </a>
                </li>
                <li>
                    <a href="../admin/guest.php"> Файл гостевой книги </a>
                </li>
                <li>
                    <a class="active" href="visitings.php?begin=0"> Посещения </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Посещения</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Page</th>
                                <th>DateTime</th>
                                <th>IP</th>
                                <th>Browser</th>
                                <th>HostName</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('../php/dedugan.php');
                                $pd = connectDB();
                                $startWith = 0;
                                $visits = new DataBase("visits");
                                if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["start"])) {
                                    $startWith = $_GET["start"];
                                };
                                $array = $visits->getWithLimitAndOrder($pd, $startWith*10, 10);
                                foreach($array as $item){
                                    echo "<tr>
                                               <th> ".$item['Page']."</th>
                                               <th> ".$item['DateTime']."</th>
                                               <th> ".$item['IP']."</th>
                                               <th> ".$item['BrowserName']."</th>
                                               <th> ".$item['HostName']."</th>

                                            </tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                        <br>

                        <?php
                        $totalrecords = $visits->getCount($pd);
                        $total_pages = ceil($totalrecords / 10);
                        echo "<p class=\"text-center\"><a href='visitings.php?start=0'>".'|<'."</a> "; // Goto 1st page
                        for ($i = 1; $i < $total_pages - 1; $i++) {
                            echo "<a href='visitings.php?start=".$i."'>".$i."</a> ";
                        };
                        echo "<a href='visitings.php?start=".($total_pages-1)."'>".'>|'."</a> </p> "; // Goto last page
                        ?>
                        </div>
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
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
