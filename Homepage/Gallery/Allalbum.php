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
                        <img class=\"img-fluid img-thumbnail\" id=\"imgalbum\"src=\"../../uploads/$itemUsername/$albumurl\" alt=\"Not Found\">
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
</body>
</html>