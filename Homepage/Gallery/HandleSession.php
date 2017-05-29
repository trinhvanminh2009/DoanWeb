<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/29/2017
 * Time: 7:23 PM
 */
session_start();
session_destroy();
header("Location:../index.php");