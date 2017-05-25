<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/22/2017
 * Time: 4:03 AM
 */
include_once "../Data/AlbumDb.php";
if(isset($_POST['txtAlbumName'])){
    $albumName=$_POST['txtAlbumName'];
    $userName=$_POST['username'];
    $imgList=$_POST['chk'];
    $albumDb=new AlbumDb();
    $albumDb->createAlbum($albumName,$userName,$imgList);
    header("location: index.php");
}
?>