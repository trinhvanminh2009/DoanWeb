<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="form-1/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="form-1/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="form-1/assets/css/form-elements.css">
    <link rel="stylesheet" href="form-1/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>Enter your username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="handleLogin.php" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" required autocomplete="off" name="txtUsername" placeholder="Username..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" required autocomplete="off" name="txtPassword" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Sign in!</button>

                            <?php
                            if(isset($_SESSION['error']))
                            {
                                echo '<h3 style="text-align: center ; font-weight: 300; color: red">'. $_SESSION['error']. '</h3>';
                                session_destroy();
                            }?>

                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3 style="color: green">...or login with:</h3>
                    <div class="social-login-buttons">
                        <button class="btn btn-link-1 btn-link-1-facebook" onclick="login()" >
                            <i class="fa fa-facebook"></i> Facebook
                        </button>
                        <form action="HandleFacebookLogin.php" method="post" hidden>
                            <input type="text" id = "txtUserName"  name="txtUsername">
                            <input type="text" id ="first_name" name = "first_name" >
                            <input type="text" id ="last_name" name = "last_name" >
                            <input type="text" id ="gender" name = "gender" >
                            <input type="url" id="url" name ="url" >
                            <input type="submit" id="btnSubmit">
                        </form>
                        <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                            <i class="fa fa-google-plus"></i> Google Plus
                        </a>
                        <a>
                            <button type="submit" onclick="window.location.href='SignUp.php'" class="btn btn-primary">Sign Up</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="form-1/assets/js/jquery-1.11.1.min.js"></script>
<script src="form-1/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="form-1/assets/js/jquery.backstretch.min.js"></script>
<script src="form-1/assets/js/scripts.js"></script>
<script src="js/FacebookLogin.js"></script>

<!--[if lt IE 10]>
<script src="form-1/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>
