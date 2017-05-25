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
                            <form action="index.php" method="post">
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
                    <a  id ="btnPopover1" title="<h4>Labdien, Ways of love</h4> <h5>Now you know how to greet people in Latvian</h5> "  data-placement="bottom" data-content="
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalCreateAlbum">
    Create New Album
</button>

<!-- Modal -->
<div class="modal fade" id="myModalCreateAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelCreateAlbum">Tạo Album</h4>
            </div>
            <form method="post" action="createAlbum.php">
            <div class="modal-body">
                <div class="container">

                    <table>
                        <tr>
                            <input type="hidden" name="username" value="<?= $user?>">
                            <td ><b>Album Name:</b></td>
                            <td style="">
                            <textarea name="txtAlbumName" style=" margin-left: 50px; border: 3px solid #765942;border-radius: 10px;
                        height: 60px;width: 400px;" required autocomplete="off"></textarea></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <div class="row">

                            <div class="form-group">

                                <table>
                                    <tr>
                                    <?php

                                    $count=1;
                                    foreach ($list as $item) {
                                        $url = $item->getUrl();
                                        $imgid=$item->getImageID();
                                        ?>
                                        <td>
                                            <div class="col-md-2"><label>
                                                    <img
                                                        src="../../uploads/<?=$user?>/<?=$url?>" style="width: 150px;height: 150px;"
                                                        class="img-check"><input type="checkbox" name="chk[]" id="item<?=$imgid?>"
                                                                                 value=<?=$imgid?> class="hidden"
                                                                                 autocomplete="off"></label></div>
                                        </td>
                                        <?php
                                        $count++;
                                        if($count==4){
                                            echo"</tr>";
                                            echo"<tr>";
                                            $count=1;
                                        }
                                    }
                                    ?>

                                    </tr>

                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
    include_once "../Data/AlbumDb.php";
    $albumDb=new AlbumDb();
    $AlbumList=$albumDb->getAllFirstImage($user);
?>
<div class="container">

    <h1 class="my-4 text-center text-lg-left">All Album</h1>

    <div class="row text-center text-lg-left">
        <?php
            foreach ($AlbumList as $album){
                $albumName=$album->getName();
                $albumDate=$album->getDate();
                $albumID=$album->getAlbumID();
                $albumurl=$albumDb->getFristImageFromAlbum($albumID);
                echo"    <div class=\"col-lg-3 col-md-4 col-xs-6\">
                    <a href=\"AlbumDetail.php?albumId=$albumID&username=$username\" class=\"d-block mb-4 h-100\">
                        <img class=\"img-fluid img-thumbnail\" src=\"../../uploads/$username/$albumurl\" alt=\"\">
                        <label>Album Name:</label>$albumName
                        <br>
                       <label>Created:</label> $albumDate
                    </a>
                </div>";
            }?>


           <?php
        ?>


    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
</body>
</html>
