<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/21/2017
 * Time: 12:32 PM
 */
include_once "header.php";
$serverName = "localhost";
$username1 = "root";
$password1 = "";
$nameData = "images_management";
$conn = mysqli_connect($serverName, $username1, $password1, $nameData);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $user->getUsername();

$folder = "../../uploads/$username";

//Get name in of image
if(is_dir($folder))
{
    $handle = opendir($folder);
    $output = "";
    while ($files = readdir($handle))
    {

        if(!is_dir($files))
        {
           // echo $files;
            $sqlCount = "select * from image";
            $resultCount = $conn->query($sqlCount);
            $stt = $resultCount->num_rows;
            $stt1 = intval($stt +1);
            $imageID = 'img'.$stt1;
            $myString = $files;
            $myName = explode(".",$myString);

            $sql = "insert into image (ImageID ,Name ,Url,Username) VALUES('$imageID','$myName[0]','$files','$username')";
            if($conn->query($sql) == TRUE )
            {
             //   echo "New record created successfully";
            }
            else {
               // echo "Error: " . $sql . "<br>" . $conn->error;
            }


        }






    }
}


