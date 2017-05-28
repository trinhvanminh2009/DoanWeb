<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/27/2017
 * Time: 9:19 PM
 */
$servername = "localhost";
$usernameDB = "root";
$password = "";
$dbname = "images_management";

// Create connection
$conn = new mysqli($servername, $usernameDB, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['btnDescription']))
{
    $imageID = $_POST['txtImageID'];
    $description = $_POST['txtDescription'];
    $sql = "UPDATE `image` SET `Desciption` = '$description' WHERE `image`.`ImageID` = '$imageID'";
    if($conn->query($sql) == true)
    {
        header("Location:index.php");
    }
    else{
        echo $conn->error;
    }
}
