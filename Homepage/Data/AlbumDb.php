<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/22/2017
 * Time: 3:53 AM
 */
include_once "Connection.php";
include_once "Album.php";
include_once "Image.php";
class AlbumDb{
    private $conn;
    /**
     * UserDb constructor.
     */
    public  function createAlbum($Name,$Username,$imgList){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from album");
        $list=array();

        while ($row = $result->fetch_array())
        {
            $album=new Album($row['AlbumID'],$row['AlbumName'],$row['CreateDate'],$row['Username']);
            array_push($list,$album);
        }
        $listSize=count($list)+1;
        $albumId='album'.$listSize;
        $sql="INSERT INTO album (AlbumID,AlbumName,Username) 
        VALUES ('$albumId',N'$Name','$Username')";

        if ($con->query($sql) === TRUE) {
            echo "new Album has been created";

            foreach ($imgList as $item) {
                echo $item;
                $sql = "INSERT INTO gallery (ImageID, AlbumID)
            VALUES ('$item','$albumId')";
                $con->query($sql);
            }

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $conn->closeConnect();
    }
    public function getFristImageFromAlbum($albumId){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select Url from image WHERE ImageID in (SELECT  ImageID from gallery WHERE AlbumID='$albumId')");
        while ($row = $result->fetch_array()){
            $url=$row['Url'];

        }




        return $url;
    }
    public function getAllFirstImage($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from album WHERE username='$username'");
        $list=array();

        while ($row = $result->fetch_array())
        {
            $album=new Album($row['AlbumID'],$row['AlbumName'],$row['CreateDate'],$row['Username']);
            array_push($list,$album);
        }

        $conn->closeConnect();
        return $list;
    }
    public  function getAllImageInAblum($albumId){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from image WHERE ImageID in (SELECT  ImageID from gallery WHERE AlbumID='$albumId')");
        $list=array();
        while ($row = $result->fetch_array())
        {

            $img=new Image($row['ImageID'],$row['Name'],$row['Desciption'],$row['Topic'],$row['DateUpdated'],$row['Url'],$row['Username']);
            array_push($list,$img);
        }
        $conn->closeConnect();
        return $list;




        return $url;
    }
    public function getAlbumName($albumId){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("SELECT  AlbumName from album WHERE AlbumID='$albumId'");
        while ($row = $result->fetch_array())
        {
            $albumName=$row['AlbumName'];
        }
        $conn->closeConnect();
        return $albumName;
    }
}
?>