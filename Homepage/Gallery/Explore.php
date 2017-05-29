<?php
include_once "../Data/UserDb.php";
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
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/25/2017
 * Time: 12:42 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/ca-pub-3311815518700050.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <![endif]-->

</head>
<body>

<!-- Page Content -->
<div class="container" >
    <div clas="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-0 col-md-12">
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Explore</a></li>
                            <li role="presentation"><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab">Trending</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="home" role="tab" data-toggle="tab">Album</a></li>
                        </ul>
                        <hr>
                        <!-- Tab panes -->
                        <div class="tab-content tabs">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                <h3>All Image</h3>
                                <?php
                                include_once "AllUserPicture.php";
                                ?>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                <?php
                                include_once "Trending.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section3">
                                <h3>All Album</h3>
                                <?php require "Allalbum.php"?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section4">
                                <h3>Section 4</h3>
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
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
