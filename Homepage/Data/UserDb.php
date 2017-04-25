<?php
include_once "Connection.php";
include_once "User.php";
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/20/2017
 * Time: 4:12 PM
 */
class UserDb{
    private $conn;
    /**
     * UserDb constructor.
     */
    public function __construct()
    {
        $conn=new Connection();
    }
    public function getUserByUN($username){
        $conn=new Connection();
        $con=$conn->connect();
        $result=$con->query("Select * from user WHERE username='$username'");
        $row=$result->fetch_array();
        $user=new User($row['Username'],$row['Password'],$row['LastName'],$row['FirstName'],$row['Gender'],$row['Avatar']);
        $conn->closeConnect();
        return $user;
    }

}
?>