<?php
session_start();

// Generate random text
$text = rand(10000, 99999);
$_SESSION["vercode"] = $text;

// Set dimensions and create the image
$width = 70;
$height = 30;
$image_p = imagecreate($width, $height);

// Allocate colors
$black = imagecolorallocate($image_p, 0, 0, 0);
$white = imagecolorallocate($image_p, 255, 255, 255);

// Fill background and draw text
imagefill($image_p, 0, 0, $black);
$font_size = 5; // Valid font size (1 to 5)
imagestring($image_p, $font_size, 10, 8, $text, $white);

// Output the image
header("Content-Type: image/jpeg");
imagejpeg($image_p, null, 80);

// Free up memory
imagedestroy($image_p);
?>
