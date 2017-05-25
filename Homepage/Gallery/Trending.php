<?php

$servername = "localhost";
$usernameDB = "root";
$password = "";
$dbname = "images_management";

// Create connection
$conn = new mysqli($servername, $usernameDB, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/ProfileImage.css" rel="stylesheet">

    <link href="css/Gallery.css" rel="stylesheet">
    <style>
        .textContent
        {
            position: absolute;
            color: white;
            font-size: 24px;
            font-weight: bold;
            left: 100px;
            top: 100px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <a class="navbar-brand" href="index.php">You</a>
                <li>
                    <a href="Explore.php">Explorer</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>


                <li>
                    <a href="#">
                        <div class="form-group has-feedback"  style="margin-left: 350px">
                            <form action="Explore.php" method="post">
                                <input type="text" placeholder="Photos, people, or groups" name="searchImage"  class="form-control fa-search" />
                            </form>

                        </div>
                    </a>
                </li>
                <li>

                </li>
                <li>
                    <a href="Upload.php">
                        <img src="img/upload_cloud.png" >
                    </a>
                </li>
                <li>
                    <img src="img/notifycation_icon.png" style="margin-top: 15px ; margin-left: 10px">
                </li>
                <li>
                    <a  id ="btnPopover" title="<h4>Labdien, Ways of love</h4> <h5>Now you know how to greet people in Latvian</h5> "  data-placement="bottom" data-content="
                    <div id='myProgress' style='width: 250px;background-color: #ddd'>
                                    <div id='myBar' style='width: 20%;height: 5px;background-color: #4CAF50'></div>
                                </div>
                                  <h6 style='text-align: center'>Using 20% of 1GB</h6>
                                            <a href='#'>Help</a>
                                            <a href ='EditProfile.php' style='text-align: center; margin-left:30%'>Settings</a>
                                             <a href ='../index.php' style='text-align: center; margin-left:10%'>Sign out</a>"

                        data-html ="true"  data-toggle="popover" >
                        <?php
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($userHeader->getAvatar()) .'" class="img-circle" alt="Cinque Terre" width="40" height="40" style="margin-left: 15px"/>';
                        ?>
                    </a>

                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<?php

$sql = "SELECT * from trending";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
<div class="col-lg-3 col-md-4 col-xs-6">
    <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../uploads/trending/<?php echo $row['Url']?>" alt="Not Found" style="width: 400px;height: 200px;">
        <?php $tagID = $row['TagID'];
            $sql1 = "select Content from tag WHERE `TagID` = '$tagID'";
            $result1 = $conn->query($sql1);
            if($result1->num_rows >0)
            {
                $row1 = $result1->fetch_assoc();
                $tagName = $row1['Content'];
                ?>
                <p class="textContent"><?php echo $tagName?></p>
                <?php
            }
        ?>
        <br>
        <br>
    </a>
</div>
<?php

    }
} else {
    echo "0 results";
}
$conn->close();
?>


</body>
</html>