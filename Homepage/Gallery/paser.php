<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/20/2017
 * Time: 5:24 PM
 */
include_once 'header.php';

if(!empty($_FILES))
{
        $username = $user->getUsername();
        $temp  = $_FILES['file']['tmp_name'];
        $dir_separator = DIRECTORY_SEPARATOR;
        $folder = "../../uploads/$username";
        $destination_path = dirname(__FILE__).$dir_separator.$folder.$dir_separator;
        $target_path = $destination_path.$_FILES['file']['name'];
        move_uploaded_file($temp,$target_path);
        include_once 'ImagesDB.php';
}

