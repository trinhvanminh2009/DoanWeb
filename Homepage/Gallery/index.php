<?php
include "../Data/UserDb.php";
session_start();
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

}
else
{
    header("Location:../index.php");
}
$test=new UserDb();
$user=$test->getUserByUN("$username");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" type="image/png" href="img/Google%20Images-48.png">
    <title>My Photos</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/Gallery.css" rel="stylesheet">
    <link href="css/tabbar.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/css.css" rel="stylesheet" type="text/css">
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/ca-pub-3311815518700050.js"></script>

    <![endif]-->

</head>

<body>


<!-- Navigation -->

<header id="top" class="header" style="background-image: url(img/bg.jpg)">


    <div>
        <table>

            <tr>
                <td >
                    <?php
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($user->getAvatar()) .'" class="img-circle" alt="Not Found" width="90" height="90" style="margin-top: 100px; margin-left: 100px"/>';
                    ?>
                </td>
                <td>
                    <label style="color:white;font-size: x-large;margin-top: 120px;margin-left: 10px; "><?php echo $user->getFristName() ." ". $user->getLastname()?></label>
                </td>
                <td>

                </td>

            </tr>
        </table>
    </div>
    <link href="css/bootstrap-tagsinput.css" rel="stylesheet">

</header>

<!-- Page Content -->
<div class="container">
    <div clas="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-0 col-md-12">
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Photostream</a></li>
                            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Album</a></li>

                        </ul>
                        <hr>
                        <!-- Tab panes -->
                        <div class="tab-content tabs">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                <h3>Photostream</h3>
                                <?php require"Photostream.php" ?>
                                <?php
                                    $user
                                ?>
                                <div class="row">
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                <h3>Album</h3>
                                <?php require "Album.php"?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <!-- Footer -->
    <footer >
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Contact Us</strong>
                    </h4>
                    <p>19, Nguyen Huu Tho, District 7
                        <br>Ho Chi Minh City , VietNam</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> 0164 7976 713</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:trinhvanminh2009@gmail.com">trinhvanminh2009@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/minh.trinh.52493"><i class="fa fa-facebook-square fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="https://github.com/trinhvanminh2009"><i class="fa fa-github fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="https://www.flickr.com/photos/147362186@N03/"><i class="fa fa-flickr fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">

                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>



</body>

</html>
