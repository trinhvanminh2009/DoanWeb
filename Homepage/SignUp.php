<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/23/2017
 * Time: 4:20 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="Gallery/img/Google%20Images-48.png">
    <title>My Photos</title>
    <script src="js/HandleSingUp.js"></script>
    <link href="css/signUp.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

    <script src="js/ca-pub-3311815518700050.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>

<!-- multistep form -->
<form id="msform" action="HandleSignUp.php" method="post" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Avatar</li>

        <li>Personal Details</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Create your account</h2>
        <h3 class="fs-subtitle">Please input full text fields!</h3>
        <input type="text" name="username" id = "username" onkeyup="checkUserName()" required autocomplete="off"  placeholder="Username" /> <div id ="status"></div>
        <input type="password" name="pass" id = "pass"   placeholder="Password" required autocomplete="off"/>
        <input type="password" name="confirmPass" onchange="checkPassword()"  id ="confirmPass"  placeholder="Confirm Password" required autocomplete="off"/>
        <h5 id="message" style="font-style: italic; color: red;"></h5>
        <input type="button" id="btnNextStep1" disabled onclick="checkInput()"  name="next" class="next action-button"   value="Next" />
        <br>
        <b>Already have an account ?</b><a href="index.php" style="text-decoration: none"> Login</a>

    </fieldset>

    <fieldset>

        <h2 class="fs-title">Social Profiles</h2>
        <h3 class="fs-subtitle">Your presence on the social network</h3>
        <input type="file" id ="image" name = "image" accept=".png, .jpg, .jpeg" onchange="checkPreviewAndSize()">
        <img src="img/anonymous.png" id = "avatar" style="border-radius: 100%;width: 130px; height: 130px ;  " alt="Not selected image">
        <br>
        <h5 id = "messageSize" style="font-style: italic; color: red;"></h5>
        <br>

        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" id = "btnNext" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="firstName" required autocomplete="off" placeholder="First Name" />
        <input type="text" name="lastName" required autocomplete="off" placeholder="Last Name" />
        <select id = "gender"  name ="gender">
            <option value="Rather not say" selected  hidden>Rather not say</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            <option value="Rather not say">Rather not say</option>
        </select>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <button type="submit" name = "submit" value="submit" class="action-button">Submit</button>
    </fieldset>
</form>

<!-- jQuery -->
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/signUp.js"></script>
</body>
</html>
