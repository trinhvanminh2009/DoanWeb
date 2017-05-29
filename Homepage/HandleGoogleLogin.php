<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/29/2017
 * Time: 9:53 AM
 */
session_start();
if(isset($_POST['txtEmail']))
{
    $email = $_POST['txtEmail'];
    $first_name = $_POST['txtFirst_name'];
    $last_name = $_POST['txtLast_name'];
    $gender = $_POST['txtGender'];
    $url = $_POST['txtUrlImage'];
    $serverName = "localhost";
    $username1 = "root";
    $password1 = "";
    $nameData = "images_management";
    $conn = mysqli_connect($serverName, $username1, $password1, $nameData);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $image = mysqli_real_escape_string($conn,file_get_contents($url)) ;
    $sql = "insert into user(`Username`,`LastName`,`FirstName`,`Gender`,`Avatar`)  VALUES 
     ('$email',N'$last_name',N'$first_name','$gender','$image')";

    if($conn->query($sql) == true)
    {
        $currenDir = '../uploads/';

        if(mkdir($currenDir."/$email",0777))
        {
            header("location:Gallery/index.php");
            $_SESSION['username'] = $email;
        }
    }
    if($conn->query($sql) == false)
    {
        if(mysqli_errno() == 0 )
        {
            header("location:Gallery/index.php");
            $_SESSION['username'] = $email;
        }
        else{
            echo $conn->error;
        }

    }

}