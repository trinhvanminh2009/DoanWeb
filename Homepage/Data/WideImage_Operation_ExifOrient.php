<?php


class WideImage_Operation_ExifOrient
{
    function execute($img, $orientation)
    {
        switch ($orientation) {
            case 2:
                return $img->mirror();
                break;

            case 3:
                return $img->rotate(180);
                break;

            case 4:
                return $img->rotate(180)->mirror();
                break;

            case 5:
                return $img->rotate(90)->mirror();
                break;

            case 6:
                return $img->rotate(90);
                break;

            case 7:
                return $img->rotate(-90)->mirror();
                break;

            case 8:
                return $img->rotate(-90);
                break;

            default: return $img->copy();
        }
    }
}