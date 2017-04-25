<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/20/2017
 * Time: 4:04 PM
 */
Class Connection{
    /**
     * @var mysqli $conn
     * @return mysqli
     **/
    private  $conn;
    function  connect(){
        $this->conn=mysqli_connect('localhost','root','','images_management');
        if (!$this->conn) {
            die('Could not connect: ' . mysqli_error());
        }
        return $this->conn;
    }
    function closeConnect(){
        $this->conn->close();
    }
}
?>