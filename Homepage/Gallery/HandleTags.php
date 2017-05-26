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
        if($_POST['imageID'] != '')
        {
            $imageID = $_POST['imageID'];
            $username = $_POST['username'];
            $tags = $_POST['myTags'];
            $myArrayTags = explode('|',$tags);
            $sql = "select * from tag";
            $countNumberTags = $conn->query($sql);
            $tempCount= $countNumberTags->num_rows +1;
            $listTags = array();
            $listTagsAvaiable = array();
            while ($row = $countNumberTags->fetch_assoc())
            {
                $listTagsAvaiable[] = $row['Content'];
            }
            $listTags = compareTwoArray($listTagsAvaiable,$myArrayTags);
            if(count($listTags) >0)
            {
                for($i = 0; $i<count($listTags); $i++)
                {
                       $sqlInsert = "insert into tag(`TagID`,`Content`) VALUES ('tag$tempCount','$listTags[$i]')";
                       if($conn->query($sqlInsert) == true)
                       {

                           $sqlInsertImageTag = "insert into tagimage(`TagID`,`ImageID`) VALUES ('tag$tempCount','$imageID')";
                           if($conn->query($sqlInsertImageTag) == true)
                           {
                              header("Location:ImageInformation.php?id=$imageID&user=$username");
                           }
                           else{
                               echo $conn->error;
                           }
                       }
                }
            }
            if(count($listTags) == 0)
            {
               for($j = 0; $j< count($myArrayTags); $j++)
               {
                   $sqlGetIdTag = "select `TagID` from tag WHERE `Content` = '$myArrayTags[$j]'";
                   $resultGetIdTag = $conn->query($sqlGetIdTag);
                   if($resultGetIdTag->num_rows >0)
                   {
                       while ($rowIDTag = $resultGetIdTag->fetch_assoc())
                       {
                           $tagID = $rowIDTag['TagID'];
                           $sqlNotInListTags = "INSERT IGNORE INTO tagimage(`TagID`, `ImageID`) VALUES ('$tagID','$imageID')";
                           if($conn->query($sqlNotInListTags) == true)
                           {
                               header("Location:ImageInformation.php?id=$imageID&user=$username");
                           }
                           else{
                               echo $conn->error;
                           }
                       }
                   }
               }
            }

        }

    }
}

function compareTwoArray($arrayDataBase, $arrayInput)
{
    $arrayC = array();
    for($i = 0; $i < count($arrayInput); $i++)
    {
        if(!in_array("$arrayInput[$i]",$arrayDataBase))
        {
            if(!in_array("$arrayInput[$i]",$arrayC))
            {

                $arrayC[] = $arrayInput[$i];
            }
        }
    }
    return $arrayC;
}