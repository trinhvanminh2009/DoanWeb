<?php
if(isset($_SESSION['username']))
{
    $usernameHeader = $_SESSION['username'];
}
$test=new UserDb();
$userHeader=$test->getUserByUN("$usernameHeader");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="img/Google%20Images-48.png">
    <title>My Photos</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
        <link href="css/ProfileImage.css" rel="stylesheet">

    <link href="css/Gallery.css" rel="stylesheet">
    <link href="css/tabbar.css" rel="stylesheet">
    <link href="css/commentbox.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/listcomment.css" rel="stylesheet"type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.css">
    <link href="./css/fbphotobox.css" rel="stylesheet" type="text/css" />
    <link href="./css/likehover.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/ca-pub-3311815518700050.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/jquery-1.12.0.min.js"></script>

    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link href="css/fbphotobox.css" rel="stylesheet" type="text/css" />
    <script src="js/fbphotobox.js"></script>
    <script src="js/script.js"></script>
    <style>
        body {
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 13px;
            position: relative;
        }

        .fbphotobox img {
            width:200px;
            height:200px;
            margin:10px;
            border-radius:5px;
        }

        .fbphotobox img:hover {
            box-sizing:border-box;
            -moz-box-sizing:border-box;
            -webkit-box-sizing:border-box;
            border: 5px solid #4AE;
        }
    </style>


</head>
<body>
<script type="application/javascript">
   $(function () {
       $('#mymodal').attr('#commentform');
       $('#commentform').submit(function (e) {
           e.preventDefault();
       })
   })
</script>
<?php
include "../Data/ImageDb.php";
include_once "../Data/CommentDb.php";
include_once "../Data/UserDb.php";
include_once "../Data/likeDb.php";
$UserDB=new UserDb();
$listuser=$UserDB->getAllUserName();
$Image=new ImageDb();
$likeDb=new LikeDb();
$userinsession=$username;
?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
         This is a test
        </div>
    </div>
</div>
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
if(isset($_POST['comments'])){
    $UserName=$userinsession;
    $content=$_POST['comments'];
    $commentImage = $_POST['CommentImageID'];
    $insertcomment=new CommentDb();
    $insertcomment->insertComment($UserName,$commentImage,$content);

}

?>

<div class="col-lg-4" style="float: right">
    <table>
        <tr>
            <form name='dropdownform' method='post'>
                <td><label style="font-size: larger">Sort by date </label></td>
                <td>   <select class='form-control' name='sortbydate' onchange='this.form.submit()'>
                        <option>Select a type you want sort</option>
                        <option value='ASC'>Ascending</option>
                        <option value='DESC'>Descending</option>
                    </select></td>
            </form>
        </tr>
    </table>


</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Gallery</h1>
    </div>

    <?php
    foreach ($listuser as $item){
        $user1=$item;
        $list=$Image->geImageByUN($user1);
        if(isset($_POST['sortbydate'])){
            $sortType=$_POST['sortbydate'];
            if($sortType=='ASC'){
                $list=$Image->getImageByUNASC($user1);
            }else{
                $list=$Image->getImageByUNDESC($user1);
            }
        }

        if(isset($_POST['searchImage']))
        {
            $imageName = $_POST['searchImage'];


            $list = $Image->getAllImageByName($imageName);
        }




        foreach ($list as $img) {
        $url = $img->getUrl();
        $imgId = $img->getImageID();
        $UserName = $img->getUsername();
        $Decription = $img->getDesciption();
        $Date = $img->getDate();
        if (isset($_GET['ImageID'])) {
            $a = $_GET['ImageID'];
        } else {
            $a = 0;
        }


        echo "    <script>
        
        jQuery(function ($) {
       
       
         
         
         $(document).ready(function() {
             
            $('#target').submit( function(event) {
              
            
                event.preventDefault();
            
                setTimeout( function () { 
                    this.submit();
                }, 3000000);
            }); 
                      $('#like$imgId').on('click',function() {
                  $('#like$imgId').hide();
                  $.post('like.php',{ImageID:$('#ImageID$imgId').val(),UserName:$('#username').val()},
                       function (data) {
                       {               
                              $('#unlike$imgId').show();
                         console.log(data);
                       }
                 });
              
        
            })
            $('#unlike$imgId').on('click',function() {
                $('#unlike$imgId').hide();
                    $.post('unlike.php',{ImageID:$('#ImageID$imgId').val(),UserName:$('#username').val()},
                       function (data) {
                       {               
                              $('#like$imgId').show();
                         console.log(data);
                       }
                 });
    
        
            })
            $('#photo$imgId').on('click',function(){
                $.post('submit.php',{ImageID:$('#ImageID$imgId').val()},
                       function (data) {
                       {               
                            imgId=data;
                            $('.fbphotobox-image-content').load('Explore.php #abc'+data);
                            console.log(data);
                       }
                });
                $.get('AllUserPicture.php',{ImageID:$('#ImageID$imgId').val()}),function(data) {
                  
                }
            });
             $('.fbphotobox img').fbPhotoBox({
                    rightWidth: 360,
                    leftBgColor: 'black',
                    rightBgColor: 'white',
                    footerBgColor: 'black',
                    overlayBgColor: '#222',
                    containerClassName: 'fbphotobox',
                    imageClassName: 'photo',
                    
                    onImageShow: function() {
                     
                        $('.fbphotobox img').fbPhotoBox('addTags',
                            [{x:0.3,y:0.3,w:0.3,h:0.3}]);
                       
                        
                        
                 
                       	
                    }
                   });
            });
        })(jQuery);
           
    </script>";

            echo "<form id='target' method='get'>";
            echo "<input type='hidden'id='ImageID$imgId' name='ImageID' value='$imgId'>";
            echo "<input type='hidden' id='username' value='$userinsession'>";
            echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>";
            echo "
            <div class='view effect'>  
               <div class='fbphotobox' id='photo'>
                <a class='aaf' id='photo$imgId'><hr><img class='photo' fbphotobox-src='../../uploads/$user1/$url'
         src='../../uploads/$user1/$url'></a></div>
          <div class='mask' >
              <menuitem label=\"Refresh\">  
" ;
            $listImageLiked=$likeDb->getUserLikedImage($userinsession);
            $liked=false;
            foreach ($listImageLiked as $itemliked){
                if($itemliked==$imgId){
                    $liked=true;
                }
            }
            if($liked==true){
                echo"
                <table cellpadding='10'>
                    <tr>
                        <td style=\"padding-right:50px\">   <a id='like$imgId'style='display: none'> <img id='likeimg$imgId'src='../../Homepage/Gallery/img/Like Filled-24 (1).png' >
                </a>
                <a id='unlike$imgId' >  <img id='unlikeimg$imgId' src='../../Homepage/Gallery/img/Like Filled-24.png''>
                </a></td>
                 <td ><a download='$imgId' href='../../uploads/$user1/$url'><img id='DownLoadimg$imgId' src='../../Homepage/Gallery/img/download.png' style='width: 20px;height: 20px'></a> </td>
                  <td ><a  href='ImageInformationExplorer.php?id=$imgId&user=$user1'><img  src='../../Homepage/Gallery/img/Info-24.png' style='width: 20px;height: 20px; margin-left: 50px'></a> </td>
                    
</td>
                    </tr>
                </table>
               ";
            }
            else{
                echo"
                <table >
                    <tr>
                        <td style=\"padding-right:50px\">   <a id='like$imgId'> <img id='likeimg$imgId'src='../../Homepage/Gallery/img/Like Filled-24 (1).png' >
                </a>
                <a id='unlike$imgId' style='display: none'>  <img id='unlikeimg$imgId' src='../../Homepage/Gallery/img/Like Filled-24.png''>
                </a></td>
                <td ><a download='$imgId' href='../../uploads/$user1/$url'><img id='DownLoadimg$imgId' src='../../Homepage/Gallery/img/download.png' style='width: 20px;height: 20px'></a> </td>
                <td>
                  <td ><a  href='ImageInformationExplorer.php?id=$imgId&user=$user1'><img id='DownLoadimg$imgId' src='../../Homepage/Gallery/img/Info-24.png' style='width: 20px;height: 20px; margin-left: 50px'></a> </td>
                </td>
                    </tr>
                </table>";
            }
            echo" 
            
              </menuitem>
   
              </menu>
     
    
        </div>  
          <div class=\"content\">  
      
          </div>  
        </div>   
	";

            echo "</form>";
        echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
              <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                  <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title\" id=\"myModalLabel\">Modal title</h4>
                  </div>
                  <div class=\"modal-body\">
                <div id='abc$imgId'style='width: 20%;height: 100px;padding-right: 35%'>
                
                <table align='center' style='margin-left: 30px'>
                    <tr>
                        <td>";?>
            <?php
            $avatarUpdate=$test->getAvatarByUserName($user1);
           echo '<img src="data:image/jpeg;base64,'.base64_encode( $avatarUpdate) .'" class="img-circle" alt="Cinque Terre" width="60" height="60" id ="avatar" style="margin-left: 15px"/>';
            ?>
            <?php echo"
                        </td>
                        <td>
                            <label style=\"font-size: large;float: right;margin-top: 20px;margin-left: 10px \">$UserName</label>
                            <label style='text-align: center;margin-left: 10px'>Updated:</label>
                          
                            $Date
                        </td>
                    </tr>
                   
                    <td><label>$Decription</label></td>
                   
                    <tr>
            
                    </tr>
                </table>
                
                ";

        echo " 
                 
        
           <div class='container' style='background-color: white' id='v'>
            <div class='row'>
            <div class='col-md-3'>
                    <button onclick='showEditc()' id='showDiv' class='fa fa fa-times'>Edit Description</button>
                    <div class='resume' id = 'edit'>
                    <input type='text' placeholder='Enter your description here!'>
                    </div>
                    <br>
                    <button onclick='showEditc()'>Edit Description</button>
                    <label>Text you comment here !</label>
                    <form method='post' id='commentform'>
                            <input type='hidden' name='CommentImageID' value='$imgId'>
                          <textarea placeholder=\"comment here\"  row='5' cols='45' name='comments' id='comments' display:none data-dismiss='modal'></textarea>
                          <button type='submit' style='margin-top: 10px'class=\"btn btn-success green\" id='formcomment''><i class=\"fa fa-share\"></i>Comment</button>
                      
                    </form>
                         
            </div>
        </div></div>";
        $commentDb = new CommentDb();
        $listComment = $commentDb->getCommentByImageId($imgId);
        $sizeoflComment = count($listComment);
        echo " 
                <div class=\"container\" >
                 <div class=\"row\"style='margin: 0'>
                <div class='col-md-3'>
                    <div class='page-header'>
                       <small class='pull-right'>$sizeoflComment comments</small> Comments
                    </div>
                 
                ";

        foreach ($listComment as $comment) {
            $UserComment = $comment->getUsername();
            $Content = $comment->getContent();
            $DateComment = $comment->getDate();
            $avatarComment=$test->getAvatarByUserName($UserComment);
            echo "  <div class='comments-list'>
                          <div class='media'>
                            <p class='pull-right'><small>$DateComment</small></p>
                            <a class='media-left' href='#'>"; ?>

            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode($avatarComment) .'" class="img-circle" alt="Cinque Terre" width="40" height="40" id ="avatar" style="margin-left: 15px"/>';
            ?>
                            <?php
                            echo "
                            </a>
                            <div class='media-body' ><h4 class=\"media-heading user_name\" >$UserComment</h4 >
                           $Content    
                           
                       <p ><small ><a href = \"\" > Like</a > - <a href = \"\" > Share</a ></small ></p >
                               </div>
                               </div>
                               </div>";

        }

        echo "   
                </div>
                 </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>    
            
         
           ";
        echo "</div>";
    }
    }
    ?>
</div>


<script>
    $(document).ready(function () {
        $('#btnPopover').popover();
    });



</script>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>


</body>

</html>