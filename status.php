<?php
//load the Teamspeak framework
require_once('/path/to/the/needed/libary/ts3_lib/TeamSpeak3.php'); #EDIT THIS

//build a query connection to the Teamspeak server
$ts3 = TeamSpeak3::factory("serverquery://QUERYNAME:QUERYPASSWORD@SERVERIP:QUERYPORT/?server_port=SERVERPORT"); #EDIT ALL THAT'S WRITTEN IN CAPSLOCK

//Say to Teamspeak that's a image file
header("Content-type: image/png");

//String that will be printed on the banner
$string = date("H:i") . " Uhr |" . " Online: " . $ts3->virtualserver_clientsonline . "/" . $ts3->virtualserver_maxclients;

//select the image 
$image = "images/example.png"; #change the path to your wished banner image (must be .png)

//Print the string on the png
$im     = imagecreatefrompng($image);
$color = imagecolorallocate($im, 255, 255, 255); #You can change the RGB code here 
$px     = (imagesx($im) - 7.5 * strlen($string)) / 25;
imagestring($im, 100, $px, 0, $string, $color);
imagepng($im);
imagedestroy($im);
?>
