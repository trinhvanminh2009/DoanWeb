<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/19/2017
 * Time: 6:59 PM
 */
$serverName = "localhost";
$username1 = "root";
$password1 = "";
$nameData = "images_management";
$conn = mysqli_connect($serverName, $username1, $password1, $nameData);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from image";
$result = $conn->query($sql);

$count = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $x = $row['Url'];
       echo $x;

    }
}

    $conn->close();