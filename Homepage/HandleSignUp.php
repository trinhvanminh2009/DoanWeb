<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/24/2017
 * Time: 8:55 AM
 */
if(isset($_POST['submit']))
{

    $serverName = "localhost";
    $username1 = "root";
    $password1 = "";
    $nameData = "images_management";

    $username = $_POST['username'];
    $password = $_POST['pass'];
    $confirmPass = $_POST['confirmPass'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];

    $conn = mysqli_connect($serverName, $username1, $password1, $nameData);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']) ;
    $imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name'])) ;

   $sql = "INSERT INTO `user` (`Username`, `Password`, `LastName`, `FirstName`, `Gender`,`Avatar`) VALUES
  ('$username', '$password', '$lastName', '$firstName', '$gender','$imageData')";
    if($conn->query($sql) == true)
    {
        $currenDir = '../uploads/';

       if(mkdir($currenDir."/$username",0777))
       {
           echo "Successfully";
           header("Location:index.php");
       }
    }
    else
    {
        echo "Error".$conn->error;
    }
   
    $conn->close();

}