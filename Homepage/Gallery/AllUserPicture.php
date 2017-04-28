<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/Gallery.css" rel="stylesheet">
    <link href="css/tabbar.css" rel="stylesheet">
    <link href="css/commentbox.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/listcomment.css" rel="stylesheet"type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.css">
    <link href="./css/fbphotobox.css" rel="stylesheet" type="text/css" />

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
$UserDB=new UserDb();
$listuser=$UserDB->getAllUserName();
$Image=new ImageDb();

$userinsession=$username;
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
                <td><label style="font-size: larger">Sort by date</label></td>
                <td>   <select class='form-control' name='sortbydate' onchange='this.form.submit()'>
                        <option>Select a type you want sort</option>
                        <option value='ASC'>ASC</option>
                        <option value='DESC'>DESC</option>
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

        echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>";
        echo "	
	<div class='fbphotobox' id='photo'>
                <a class='aaf' id='photo$imgId'><img class='photo' fbphotobox-src='../../uploads/$user1/$url'
         src='../../uploads/$user1/$url'></a></div>";
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
                    <td><Label>Decription:</Label></td>
                    <td><label>$Decription</label></td>
                    <tr>
            
                    </tr>
                </table>
                
                ";

        echo " 
 
        
           <div class='container' style='background-color: white' id='v'>
            <div class='row'>
            <div class='col-md-3'>
                    <label>Text you comment here!</label>
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










<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>

</body>

</html>