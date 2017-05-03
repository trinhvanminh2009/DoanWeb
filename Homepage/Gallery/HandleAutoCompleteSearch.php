<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/28/2017
 * Time: 6:33 PM
 */
include_once "../Data/Connection.php";
$conn=new Connection();
$con=$conn->connect();
if(isset($_POST["query"]))
{

    $output = '';
    $sql ="Select * from Image WHERE Name LIKE '%".$_POST["query"]."%' ";
    $result = mysqli_query($con,$sql);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) >0)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<li style="display: block; padding: 1em;">'.$row["Name"].'</li>';
        }
    }
    else{

    }
    $output .= '</ul>';
    echo $output;
}