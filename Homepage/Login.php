<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Gallery/img/Google%20Images-48.png">
    <title>My Photos</title>

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
                        <button class="btn btn-link-1 btn-link-1-google-plus" onclick="loginGoogle()">
                            <i class="fa fa-google-plus"></i> Google Plus
                        </button>
                        <form method="post" action="HandleGoogleLogin.php"  hidden>
                            <input type="text" id="txtEmail" name="txtEmail">
                            <input type="text" id="txtFirst_name" name="txtFirst_name">
                            <input type="text" id="txtLast_name"  name="txtLast_name" >
                            <input type="text" id="txtUrlImage"  name="txtUrlImage">
                            <input type="text" id="txtGender" name="txtGender">
                            <input type="submit" id="btnSubmitGoogle">
                        </form>
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

<script type="text/javascript">

    function logout()
    {
        gapi.auth.signOut();
        location.reload();
    }
    function loginGoogle()
    {
        var myParams = {
            'clientid' : '450400562302-pqsvm8mll7q5f9ik4vbtebj4e440ok40.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
        };
        gapi.auth.signIn(myParams);
    }

    function loginCallback(result)
    {
        if(result['status']['signed_in'])
        {
            var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
            request.execute(function (resp)
            {
                var email = '';
                if(resp['emails'])
                {
                    for(i = 0; i < resp['emails'].length; i++)
                    {
                        if(resp['emails'][i]['type'] == 'account')
                        {
                            email = resp['emails'][i]['value'];
                        }
                    }
                }
                document.getElementById("txtEmail").value = email;
                document.getElementById("txtFirst_name").value = resp['name']['familyName'];
                document.getElementById("txtLast_name").value = resp['name']['givenName'];
                document.getElementById("txtUrlImage").value = resp['image']['url'];
                document.getElementById("txtGender").value = resp['gender'];
                sleep(500).then(() => {
                    document.getElementById("btnSubmitGoogle").click();
                });
            });

        }

    }

    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    function onLoadCallback()
    {
        gapi.client.setApiKey('AIzaSyB1exM-sEOla1IK4ZR7nYF_1xqouc9py50');
        gapi.client.load('plus', 'v1',function(){});
    }

</script>

<script type="text/javascript">
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>
<!--[if lt IE 10]>
<script src="form-1/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>
