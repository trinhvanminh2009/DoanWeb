<?php

/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/27/2017
 * Time: 9:38 AM
 */
include_once "Connection.php";
include_once "Trending.php";
include_once "Image.php";
class TrendingDB
{

    public function getAllImageByTag($content)
    {
        $conn = new Connection();
        $con = $conn->connect();
        $result = $con->query("SELECT ImageID FROM tagimage 
        INNER JOIN tag on tagimage.TagID = tag.TagID WHERE tag.Content = '$content' ");
        $listID = array();
        $listImage = array();
        if($result->num_rows >0)
        {
            while ($row =$result->fetch_assoc())
            {
                array_push($listID,$row['ImageID']);
            }
        }
        for($i = 0 ; $i< count($listID); $i++)
        {
            $resultImage = $con->query("select * from image where `ImageID` = '$listID[$i]'");
            if($resultImage->num_rows >0)
            {
                while ($rowImage = $resultImage->fetch_assoc())
                {
                    $img=new Image($rowImage['ImageID'],$rowImage['Name'],$rowImage['Desciption'],$rowImage['Topic'],$rowImage['DateUpdated'],$rowImage['Url'],$rowImage['Username']);
                    array_push($listImage,$img);
                }
            }
        }
        $con->close();
        return $listImage;

    }
}