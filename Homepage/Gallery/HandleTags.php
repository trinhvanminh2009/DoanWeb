<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/25/2017
 * Time: 8:06 PM
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


if(isset($_POST['submitTag']))
{
    if($_POST['myTags'] == '')
    {
        header("Location:ImageInformation.php");
    }
    if($_POST['myTags'] != ''){
        $tags = $_POST['myTags'];
        $myArrayTags = explode('|',$tags);
        for($i = 0; $i <count($myArrayTags); $i++)
        {
            $sql = "select * from tag";
            $countNumberTags = $conn->query($sql);
            $tempCount= $countNumberTags->num_rows +1;

            echo $myArrayTags[$i];
            $sqlInsert = "insert into tag(`TagID`,`Content`) VALUES ('tag$tempCount','$myArrayTags[$i]')";
            if($conn->query($sqlInsert) == true)
            {
                echo "Success";
            }

        }

    }

}