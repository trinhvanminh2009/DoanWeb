<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/19/2017
 * Time: 6:49 PM
 */

session_start();
$_SESSION['email'] = $_POST['txtUsername'];
$_SESSION['pass'] = $_POST['txtPassword'];
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
    $userName = $_SESSION['email'];
    $password = $_SESSION['pass'];


    if ($userName != '' || $password != '') {
        $serverName = "localhost";
        $username1 = "root";
        $password1 = "";
        $nameData = "images_management";

// Create connection
        $conn = mysqli_connect($serverName, $username1, $password1, $nameData);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select Username from user where Username = '$userName' and Password = '$password'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $count = mysqli_num_rows($result);
        echo "$count";

        if($count == 1)
        {

            header("location:Gallery/index.php");
            $_SESSION['username'] = $userName;

        }
        else{
            header("location:login.php");
            $_SESSION['error'] = "Username or password invalid";

        }

    }
}
