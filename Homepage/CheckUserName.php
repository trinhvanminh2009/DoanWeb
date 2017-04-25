<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/24/2017
 * Time: 5:38 PM
 */
if(isset($_POST['username']))
{
    $serverName = "localhost";
    $username1 = "root";
    $password1 = "";
    $nameData = "images_management";
    $conn = mysqli_connect($serverName, $username1, $password1, $nameData);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $sql = "select * from user where username = '$username'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        echo "<img src='img/NotAllowed.png' style='margin-bottom: -5px'> ";
        echo "<b style='color: red'>This username already exist . Please choose another username !</b>";
    }
    if($count ==0)
    {
        echo "<img src='img/Checked.png' style='margin-bottom: -5px'  > ";
        echo "<b style='color: green; '>You can use this username!</b>";
    }
}