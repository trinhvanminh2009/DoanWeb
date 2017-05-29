<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/10/2017
 * Time: 2:05 PM
 */

?>


<style>
    .checkaa
    {
        opacity: 1;
        color:#996;
        background-color: orangered;
    ;

    }
    .img-check {

        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px;  /* Rounded border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
        position: relative;

    }
    #containerAlbum {
        position: relative;
        width: 50%;
    }

    #imgalbum {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        bottom: 10%;
        background-color: #008CBA;
        left: 0;
        right: 0;
        overflow: hidden;
        width: 100%;
        height:0%;
        transition: .5s ease;
    }

    #containerAlbum:hover .overlay {
        bottom: 0;
        height: 50%;
    }

    .text {
        white-space: nowrap;
        color: whitesmoke;
        font-size: 20px;
        position: absolute;
        overflow: hidden;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }
</style>

<script>
    $(document).ready(function(e){
        $(".img-check").click(function(){
            $(this).toggleClass("checkaa");


        });
    });
</script>
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

                            <input type="text" placeholder="Photos, people, or groups" name="searchImage"  class="form-control fa-search" />


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
                    <a  id ="btnPopoverAllAlbum" title="<h4>Labdien, Ways of love</h1> Now you know how to greet people in Latvian"  data-placement="bottom" data-content="
                    <div id='myProgress' style='width: 250px;background-color: #ddd'>
                                    <div id='myBar' style='width: 20%;height: 5px;background-color: #4CAF50'></div>
                                </div>
                                  <h6 style='text-align: center'>Using 20% of 1GB</h6>
                                            <a href='#'>Help</a>
                                            <a href ='EditProfile.php' style='text-align: center; margin-left:30%'>Settings</a>
                                             <a href ='HandleSession.php' style='text-align: center; margin-left:10%'>Sign out</a>"

                        data-html ="true"  data-toggle="popover" >
                        <?php
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($user->getAvatar()) .'" class="img-circle" alt="Cinque Terre" width="40" height="40" style="margin-left: 15px"/>';
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
include_once "../Data/AlbumDb.php";
$albumDb=new AlbumDb();
$listUsername=$UserDB->getAllUserName();

?>
<div class="container">

    <h1 class="my-4 text-center text-lg-left">All Album</h1>

    <div class="row text-center text-lg-left">
        <?php
        foreach ($listUsername as $itemUsername){
            $AlbumList=$albumDb->getAllFirstImage($itemUsername);
            foreach ($AlbumList as $album){
                $albumName=$album->getName();
                $albumDate=$album->getDate();
                $albumID=$album->getAlbumID();
                $createtor=$album->getUsername();
                $albumurl=$albumDb->getFristImageFromAlbum($albumID);
                echo"    <div class=\"col-lg-3 col-md-6 col-xs-12\" id='containerAlbum'>
                    <a href=\"AlbumDetail.php?albumId=$albumID&username=$username\" class=\"d-block mb-4 h-100\">
                        <img class=\"img-fluid img-thumbnail\" id=\"imgalbum\"src=\"../../uploads/$itemUsername/$albumurl\" alt=\"Not Found\" style='width: 550px; height: 350px'>
                          <div class=\"overlay\">
                            <div class=\"text\"> <label>Album Name:</label>$albumName<br>
                              <label>Created:</label> $albumDate<br>
                               <label>Owner:$createtor</label></div>
                             
                            
                          </div>
                       
                        <br>
                     
                    </a>
                </div>";
            }
        }
    ?>


        <?php
        ?>


    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btnPopoverAllAlbum').popover();
    });
</script>
</body>
</html>