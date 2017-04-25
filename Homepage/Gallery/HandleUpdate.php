<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/23/2017
 * Time: 4:00 PM
 */
if(isset($_POST['update']))
{
    $serverName = "localhost";
    $username1 = "root";
    $password1 = "";
    $nameData = "images_management";
    $conn = mysqli_connect($serverName, $username1, $password1, $nameData);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $password = $_POST['password'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $gender = $_POST['gender'];
    $username = $_POST['userName'];


        $imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']) ;
        if($imageName != '')
        {
            $imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name'])) ;
            $sql = "update user set Password = '$password', LastName ='$lastName' ,FirstName = '$firstName', Gender = '$gender',Avatar ='$imageData' where Username = '$username'";
            if($conn->query($sql) == true)
            {
                 header("Location:EditProfile.php");

            }
            else
            {
                echo "Error".$conn->error;
            }
        }
        else{
            $sql = "update user set Password = '$password', LastName ='$lastName' ,FirstName = '$firstName', Gender = '$gender' where Username = '$username'";
            if($conn->query($sql) == true)
            {
                header("Location:EditProfile.php");

            }
            else
            {
                echo "Error".$conn->error;
            }
        }





    $conn->close();
}
