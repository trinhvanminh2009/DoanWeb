<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/4/2017
 * Time: 10:46 AM
 */
include_once "like.php";
include_once "Connection.php";
class LikeDb{
    private $conn;
    /**
     * UserDb constructor.
     */
    public function __construct()
    {
        $conn=new Connection();
    }
    public function like($username,$imageId){
        $conn=new Connection();
        $con=$conn->connect();

        $sql="INSERT INTO likeimage (Username,ImageID) 
        VALUES ('$username','$imageId')";
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->closeConnect();
    }
    public function unlike($username,$imageId){
        $conn=new Connection();
        $con=$conn->connect();

        $sql="DELETE FROM likeimage WHERE Username = '$username' AND ImageID = '$imageId'";
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->closeConnect();
    }
    public function getUserLikedImage($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from likeimage WHERE Username='$username'");
        $list=array();
        while ($row = $result->fetch_array())
        {
            $imageId=$row['ImageID'];
            array_push($list,$imageId);
        }

        $conn->closeConnect();
        return $list;
    }
}