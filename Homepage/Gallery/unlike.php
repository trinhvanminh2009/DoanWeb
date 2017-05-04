<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/4/2017
 * Time: 5:55 PM
 */
include_once "../Data/likeDb.php";

if(isset($_POST['ImageID'])){

    $likeDb=new LikeDb();
    $username=$_POST['UserName'];
    $ImageId=$_POST['ImageID'];
    $likeDb->unlike($username,$ImageId);
}
?>