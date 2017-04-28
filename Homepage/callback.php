<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/28/2017
 * Time: 6:49 AM
 */
/*$app_id = "415135538841889";
$app_secret = "62daf59fb534cb37d864ea99a432755d";
$redirect_uri = urlencode("http://localhost:8080/DoanWeb/Homepage/callback.php");
// Get code value
$code = $_GET['code'];


// Get access token info
$facebook_access_token_uri = "https://graph.facebook.com/v2.9/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$response = curl_exec($ch);
curl_close($ch);
// Get access token
$aResponse = json_decode($response);
$access_token = $aResponse->access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$response = curl_exec($ch);
curl_close($ch);

$user = json_decode($response);
// Log user in
$_SESSION['user_login'] = true;
$_SESSION['user_name'] = $user->name;

echo "Wellcome ". $user->name . "!";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '415135538841889',
            cookie: true, // This is important, it's not enabled by default
            version: 'v2.9'
        });
    };


    function login() {
        FB.login(function(response) {
            if (response.status == 'connected') {
                alert('You are logged in &amp; cookie set!');
                // Now you can redirect the user or do an AJAX request to
                // a PHP script that grabs the signed request from the cookie.
            } else {
                alert('User cancelled login or did not fully authorize.');
            }
        },{scope:'email'});

    };



    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function getInfo() {
        FB.api('/me', 'GET',{fields:'first_name,last_name,name,id, picture.width(150).height(150)'},
        function (response) {
            document.getElementById('status').innerHTML = "<img src='"+response.picture.data.url+"'>";
        });
    };
</script>
<div id = "status">
    <button onclick="getInfo()">Get info</button>
    <button onclick="login()">Login</button>
</div>

</body>
</html>