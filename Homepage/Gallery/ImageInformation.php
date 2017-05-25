<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/9/2017
 * Time: 3:41 PM
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<style>
    .containerImage {

        position: relative;
        width: 50%;
        margin-left: 30%;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;

    }




    .contextImage {

        white-space: nowrap;
        color: white;
        font-size: 20px;
        position: absolute;
        overflow: hidden;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }

</style>
<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/mab-jquery-taginput.css" />
<style type="text/css">
    .narrow {
        width: 300px !important;
    }
</style>
<body>
<?php

function cameraUsed($imagePath) {

if ((isset($imagePath)) and (file_exists($imagePath))) {

// There are 2 arrays which contains the information we are after, so it's easier to state them both
$exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0) ;
$exif_exif =  read_exif_data($imagePath ,'EXIF' ,0);

//error control

        $notFound = "Unavailable";
// Make
        if (@array_key_exists('Make', $exif_ifd0)) {
            $camMake = $exif_ifd0['Make'];
        } else { $camMake = $notFound; }

// Model Device
        if (@array_key_exists('Model', $exif_ifd0)) {
            $camModel = $exif_ifd0['Model'];
        } else { $camModel = $notFound; }

// Exposure
        if (@array_key_exists('ExposureTime', $exif_ifd0)) {
            $camExposure = $exif_ifd0['ExposureTime'];
        } else { $camExposure = $notFound; }

// Aperture
        if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
            $camAperture = $exif_ifd0['COMPUTED']['ApertureFNumber'];
        } else { $camAperture = $notFound; }

// Date
        if (@array_key_exists('DateTime', $exif_ifd0)) {
            $camDate = $exif_ifd0['DateTime'];
        } else { $camDate = $notFound; }

// ISO
        if (@array_key_exists('ISOSpeedRatings',$exif_exif))
        {
            $camIso = $exif_exif['ISOSpeedRatings'];
        }
        else {
            $camIso = $notFound;
        }
        $return = array();
        $return['make'] = $camMake;
        $return['model'] = $camModel;
        $return['exposure'] = $camExposure;
        $return['aperture'] = $camAperture;
        $return['date'] = $camDate;
        $return['iso'] = $camIso;
        return $return;
}
else {
    return false;
}
}

?>


<?php
include_once 'header.php';

if(isset($_GET['id']) && isset($_GET['user']))
{
   $imageID = $_GET['id'];
   $userName = $_GET['user'];
   $connect = new Connection();
   $con = $connect->connect();
   $result = $con->query("select Url from image where ImageID = '$imageID'");
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $imageName= $row['Url'];
        }
    }


    $dir = "../../uploads/$userName/$imageName";
    ?>
    <div class="containerImage">
        <img src="<?php echo $dir ?>" alt="Image" class="image">
        <div class="overlayImage">
            <div class="contextImage">
                <?php
                $typeFile = mime_content_type($dir);
                $data = getimagesize($dir);
                $filesizeTemp = filesize($dir);
                $filesize = round(($filesizeTemp/1024),2) ;
                if($typeFile == 'image/jpeg')
                {
                    ?>
                    <style>

                        .overlayImage {
                            position: absolute;
                            bottom: 0;
                            left: 100%;
                            right: 0;
                            background-color: #1bba6c;
                            overflow: hidden;
                            width: 0;
                            height: 350px;
                            transition: .5s ease;
                        }
                        .containerImage:hover .overlayImage {
                            width: 55%;
                            left: 0;
                        }
                    </style>
                <?php
                    $camera = cameraUsed($dir);
                    echo "<img src='img/Android-100.png'>" . $camera['make'] . " " . $camera['model'] . "<br />";
                    echo "<img src='img/Picture-24.png'>" .$imageName ." ". "<br>";
                    echo "<img src='img/Width-24.png'>"." $data[0]"." pixel <br />";
                    echo "<img src='img/Height-24.png'>"." $data[1]". " pixel <br />";
                    echo "<img src='img/Micro%20SD-24.png'>". $filesize. " kb"."<br>";
                    echo "<img src='img/Exposure%20Value-24.png'> " . $camera['exposure'] . "<br />";
                    echo "<img src='img/Aperture-24.png'>" . $camera['aperture']. "<br>";
                    echo "<img src='img/ISO-24.png'> " . $camera['iso'] . "<br />";
                    echo "<img src='img/Calendar-24.png'> " .  $camera['date'] . "<br />";
                }
                else{
                    ?>
                    <style>
                        .overlayImage {
                            position: absolute;
                            bottom: 0;
                            left: 100%;
                            right: 0;
                            background-color: #1bba6c;
                            overflow: hidden;
                            width: 0;
                            height: 150px;
                            transition: .5s ease;
                        }
                        .containerImage:hover .overlayImage {
                            width: 35%;
                            left: 0;
                        }
                    </style>
                    <?php
                    echo "<img src='img/Picture-24.png'>" .$imageName ." ". "<br>";
                    echo "<img src='img/Width-24.png'>"." $data[0]"." pixel <br />";
                    echo "<img src='img/Height-24.png'>"." $data[1]". " pixel <br />";
                    echo "<img src='img/Micro%20SD-24.png'>". $filesize. " kb"."<br>";
                }
                ?>
            </div>

        </div>

    </div>
<form action="HandleTags.php" method="post" onsubmit=" return onSubmit()">
    <div class="form-group" style="margin-left: 200px; margin-right: 200px">
        <label for="tags2">Add tags</label>
        <input type="text" class="form-control tag-input" name="tags2" id="tags2" required autocomplete="off" placeholder="Enter tags" >
    </div>
    <input type="hidden" id="myTags" name = "myTags" required autocomplete="off">
    <input style="margin-left: 200px"  type="submit" name="submitTag" class="btn btn-primary" value="Apply">
</form>
    <?php
}
else{
    echo "Wrong direction ! Please comeback";
}

?>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/mab-jquery-taginput.js"></script>
<script type="text/javascript">

    jQuery(function ($){

        // Instantiate the Bloodhound suggestion engine
        var tags = new Bloodhound({
            datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.tag); },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: [
                { tag: 'animal' },
                { tag: 'beach' },
                { tag: 'family' },
                { tag: 'nature' },
                { tag: 'people' },
                {tag: 'sky'},
                {tag:'snow'},
                {tag:'summer'},
                {tag:'sunset'},

            ]
        });

        tags.initialize();

        // Set up an on-screen console for the demo
        var screenConsole = $('#console');

        // Write callback data to the screen when tags are added or removed in demo inputs
        var logCallbackDataToConsole = function(added, removed) {
            screenConsole.append('Tag Data: ' + (this.val() || null) + ', Added: ' + added + ', Removed: ' + removed + '\n');
            document.getElementById("myTags").value = this.val();
        };

        // Create typeahead-enabled tag inputs
        $('.tag-input').tagInput({
            allowDuplicates: false,
            typeahead: true,
            typeaheadOptions: {
                highlight: true
            },
            typeaheadDatasetOptions: {
                display: function(d) { return d.tag; },
                source: tags.ttAdapter()
            },
            onTagDataChanged: logCallbackDataToConsole
        });

        // Create basic tag inputs with no typeahead
        $('.tag-input-basic').tagInput({
            onTagDataChanged: logCallbackDataToConsole
        });

        $('#results a[rel="external"]').attr('target', '_blank');

    });

</script>
<script>
   function onSubmit() {
       var tag = document.getElementById("myTags").value;
       if(tag != '')
       {

           return true;
       }
       else
       {

           return false;
       }


   }

</script>
</body>
</html>
