<?php

/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 4/20/2017
 * Time: 5:21 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/Google%20Images-48.png">
    <title>My Photos</title>
    <link href="css/dropzone.css" type="text/css" rel="stylesheet">
    <script src="js/dropzone.js"></script>
    <script>
        Dropzone.options.uploads = {
            acceptedFiles:".png,.jpg,.bmp,.gif,.ico",
            maxFilesize:10

        };

    </script>


</head>
<body>
<?php include_once "header.php"?>
<form action="paser.php" class ="dropzone" id="uploads">

</form>


</body>
</html>
