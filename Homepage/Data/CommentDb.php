<?php

/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/21/2017
 * Time: 5:04 PM
 */
include_once "Connection.php";
include_once"Comment.php";
class CommentDb
{
    private $conn;
    /**
     * UserDb constructor.
     */

    public function getCommentByImageId($imageId){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from comments WHERE ImageID='$imageId'");
        $list=array();

        while ($row = $result->fetch_array())
        {
            $comment=new Comment($row['CommentsID'],$row['Username'],$row['ImageID'],$row['Date'],$row['Content']);
            array_push($list,$comment);
        }

        $conn->closeConnect();
        return $list;
    }
    public  function insertComment($Username,$ImageID,$Content){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from comments");
        $list=array();

        while ($row = $result->fetch_array())
        {
            $comment=new Comment($row['CommentsID'],$row['Username'],$row['ImageID'],$row['Date'],$row['Content']);
            array_push($list,$comment);
        }
        $listSize=count($list)+1;
        $commentId='cmt'.$listSize;
        $sql="INSERT INTO comments (CommentsID,Username,ImageID,Content) 
        VALUES ('$commentId','$Username','$ImageID','$Content')";
        if ($con->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->closeConnect();
    }
}