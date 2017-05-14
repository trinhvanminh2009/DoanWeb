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
        height: 100%;

    }

    .overlayImage {
        position: absolute;
        bottom: 0;
        left: 100%;
        right: 0;
        background-color: #008CBA;
        overflow: hidden;
        width: 0;
        height: 60%;
        transition: .5s ease;
    }

    .containerImage:hover .overlayImage {
       width: 50%;
        left: 0;
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
<body>
<?php
function cameraUsed($imagePath) {

// Check if the variable is set and if the file itself exists before continuing
if ((isset($imagePath)) and (file_exists($imagePath))) {

// There are 2 arrays which contains the information we are after, so it's easier to state them both
$exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);
$exif_exif = read_exif_data($imagePath ,'EXIF' ,0);

//error control
$notFound = "Unavailable";

// Make
if (@array_key_exists('Make', $exif_ifd0)) {
$camMake = $exif_ifd0['Make'];
} else { $camMake = $notFound; }

// Model
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
if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
$camIso = $exif_exif['ISOSpeedRatings'];
} else { $camIso = $notFound; }

$return = array();
$return['make'] = $camMake;
$return['model'] = $camModel;
$return['exposure'] = $camExposure;
$return['aperture'] = $camAperture;
$return['date'] = $camDate;
$return['iso'] = $camIso;
return $return;

} else {
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
                $data = getimagesize($dir);
                $filesizeTemp = filesize($dir);
                $filesize = round(($filesizeTemp/1024),2) ;
                $camera = cameraUsed($dir);
                echo "<img src='img/Android-100.png'>" . $camera['make'] . " " . $camera['model'] . "<br />";
                echo "<img src='img/Width-24.png'>"." $data[0]". "<br />";
                echo "<img src='img/Height-24.png'>"." $data[1]". "<br />";
                echo "<img src='img/Micro%20SD-24.png'>". $filesize. " kb"."<br>";
                echo "<img src='img/Exposure%20Value-24.png'> " . $camera['exposure'] . "<br />";
                echo "<img src='img/Aperture-24.png'>" . $camera['aperture']. "<br>";
                echo "<img src='img/ISO-24.png'> " . $camera['iso'] . "<br />";
                echo "<img src='img/Calendar-24.png'> " . $camera['date'] . "<br />";
                ?>
            </div>

        </div>
    </div>
    <?php
}
else{
    echo "Wrong direction ! Please comeback";
}





?>

</body>
</html>
