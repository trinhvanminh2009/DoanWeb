<?php
function _mirrorImage ( $imgsrc)
{
    $width = imagesx ( $imgsrc );
    $height = imagesy ( $imgsrc );

    $src_x = $width -1;
    $src_y = 0;
    $src_width = -$width;
    $src_height = $height;

    $imgdest = imagecreatetruecolor ( $width, $height );

    if ( imagecopyresampled ( $imgdest, $imgsrc, 0, 0, $src_x, $src_y, $width, $height, $src_width, $src_height ) )
    {
        return $imgdest;
    }

    return $imgsrc;
}

function adjustPicOrientation($full_filename){
    $exif = exif_read_data($full_filename);
    if($exif && isset($exif['Orientation'])) {
        $orientation = $exif['Orientation'];
        if($orientation != 1){
            $img = imagecreatefromjpeg($full_filename);

            $mirror = false;
            $deg    = 0;

            switch ($orientation) {
                case 2:
                    $mirror = true;
                    break;
                case 3:
                    $deg = 180;
                    break;
                case 4:
                    $deg = 180;
                    $mirror = true;
                    break;
                case 5:
                    $deg = 270;
                    $mirror = true;
                    break;
                case 6:
                    $deg = 270;
                    break;
                case 7:
                    $deg = 90;
                    $mirror = true;
                    break;
                case 8:
                    $deg = 90;
                    break;
            }
            if ($deg) $img = imagerotate($img, $deg, 0);
            if ($mirror) $img = _mirrorImage($img);
            $full_filename = str_replace('.jpg', "-O$orientation.jpg",  $full_filename);
            imagejpeg($img, $full_filename, 95);
        }
    }
    return $full_filename;
}
echo adjustPicOrientation('../../uploads/vanminh2009/20170406_103008.jpg');
echo "<img src='../../uploads/vanminh2009/20170406_103008-O8.jpg'>";
