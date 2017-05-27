<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/21/2017
 * Time: 12:08 PM
 */
include_once "Image.php";
include_once "Connection.php";
Class ImageDb{
    private $conn;
    /**
     * UserDb constructor.
     */
    public function geImageByUN($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from Image WHERE username='$username' ");
        $list=array();
        while ($row = $result->fetch_array())
        {
           $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
           array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;
    }


    public function getImageByUNASC($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from Image WHERE username='$username' ORDER BY DateUpdated ASC ");
        $list=array();
        while ($row = $result->fetch_array())
        {

            $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
            array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;
    }
    public function getImageByUNDESC($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from Image WHERE username='$username' ORDER BY DateUpdated DESC ");
        $list=array();
        while ($row = $result->fetch_array())
        {
            $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
            array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;
    }

    public function getImageByName($ImageName,$Username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from Image WHERE username='$Username'and  Name LIKE '%$ImageName%' ");
        $list=array();
        while ($row = $result->fetch_array())
        {
            $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
            array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;
    }

    public function getAllImageByName($ImageName){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from Image WHERE Name LIKE '%$ImageName%' ");
        $list=array();
        while ($row = $result->fetch_array())
        {
            $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
            array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;
    }

    public function updateDescription($imageID , $description)
    {
        $conn = new Connection();
        $con = $conn->connect();
        $sql = "UPDATE `image` SET `Desciption` = '$description' WHERE `image`.`ImageID` = '$imageID';";
        if ($con->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->closeConnect();
    }

}
?>