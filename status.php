<?php
/** LOAD TEAMSPEAK FRAMEWORK **/
require_once('/path/to/the/needed/libary/ts3_lib/TeamSpeak3.php'); #EDIT THIS

/** CONNECT TO TEAMSPEAK WITH QUERY **/
$ts3 = TeamSpeak3::factory("serverquery://QUERYNAME:QUERYPASSWORD@SERVERIP:QUERYPORT/?server_port=SERVERPORT"); #EDIT ALL THAT'S WRITTEN IN CAPSLOCK

/** FAKE TO PNG FILE **/
header("Content-type: image/png");

if($ts3->virtualserver_queryclientsonline < 1) {
	$status = "offline";
} else {
	$status = "online";
} 

/** BANNER STRING **/
$string = date("H:i") . " Uhr |" . " Online: " . $ts3->virtualserver_clientsonline . "/" . $ts3->virtualserver_maxclients;

/** CHECK WHICH DAY **/
$image = "images/example.png"; #PATH TO THE BANNER (PNG)

/** PRINT DATA ON PNG **/
$im     = imagecreatefrompng($image);
$color = imagecolorallocate($im, 255, 255, 255); #You can change the RGB code here 
$px     = (imagesx($im) - 7.5 * strlen($string)) / 25;
imagestring($im, 100, $px, 0, $string, $color);
imagepng($im);
imagedestroy($im);
?>