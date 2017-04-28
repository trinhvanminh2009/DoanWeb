<?php
include_once "header.php";
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/22/2017
 * Time: 8:47 AM
 */
if(isset($_POST['upload']))
{
    $directory = "../../uploads/".$user->getUsername()."/avatar/";
    $fi = new FilesystemIterator($directory, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi);
    if($fileCount ==0)
    {


        $target = "../../uploads/".$user->getUsername()."/avatar/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

        }


    }
    if($fileCount ==1)
    {

        $dir = glob("../../uploads/".$user->getUsername()."/avatar/*");
        foreach ($dir as $item)
        {
            if(is_file($item))
            {
                unlink($item);
            }
        }


        $target = "../../uploads/".$user->getUsername()."/avatar/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
<form  action="HandleUpdate.php" method="post" enctype="multipart/form-data">
<div class="container"  >



    <h1>Edit Profile</h1>
    <hr>
    <div class="row">

        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">

                    <?php
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($user->getAvatar()) .'" class="img-circle" alt="Cinque Terre" width="100" height="100" id ="avatar" style="margin-left: 15px"/>';
                    ?>

                    <h6>Upload a different photo...</h6>
                    <input type="file" id ="image"  name = "image" onchange="checkPreviewAndSize()" accept=".png, .jpg, .jpeg">
                    <h5 id = "messageSize" style="color: red; font-style: italic"></h5>
            </div>
        </div>

        <div class="col-md-9 personal-info">

            <h3>Personal info</h3>
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" required autocomplete="off" type="text" name="firstName" value="<?php echo $user->getFristName() ?>">
                    </div>

                <div class="form-group">

                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" required autocomplete="off" type="text" name="lastName" value="<?php echo $user->getLastname()?>">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" required autocomplete="off" type="text" name = "userName" value="<?php echo $user->getUsername()?>" readonly ="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Gender:</label>
                    <div class="col-lg-8">
                        <div class="ui-select">

                            <select  class="form-control" name ="gender">
                                <option value="<?php echo $user->getGender()?>" selected  hidden><?php echo $user->getGender()?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                <option value="Rather not say">Rather not say</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">

                        <input class="form-control" required autocomplete="off" type="password" id="password" name="password" value="<?php echo $user->getPassword() ?>">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" required autocomplete="off" onkeyup="checkPassword()" type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $user->getPassword() ?> ">
                        <h5 id="message" style="color: red; font-style: italic"></h5>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <br>
                        <button type="submit" class="btn btn-primary" id="btnUpdate" name ="update">Update</button>
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>


        </div>
    </div>
</div>
<hr>
</form>
</body>
<script src="js/HandleUpdateProfile.js" type="text/javascript">



</script>
</html>
