<?php

if(!isset($_GET['quota'])) {
	header("Location: quota.php");
	exit();
}
if(!isset($_GET['use'])) {
	header("Location: quota.php");
	exit();
}

$quota=$_GET['quota'];
$use  =$_GET['use'];
// The Graphing Magic Starts here


define("WIDTH",350);
define("HEIGHT",25);
$im	= imagecreate(WIDTH,HEIGHT);
$green  = imagecolorallocate($im,0,255,0);
$red    = imagecolorallocate($im,255,0,0);
$yellow	= imagecolorallocate($im,255,255,0);
$white	= imagecolorallocate($im,255,255,255);
$black	= imagecolorallocate($im,0,0,0);
imagefilledrectangle($im,0,0,WIDTH,HEIGHT,$white);
$pct=$use/$quota;
if($pct > .9) {
	if($pct > 1) {
		$edge=WIDTH;
	} else {
		$edge=ceil(WIDTH*$pct);
	}
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$red);
	$edge=ceil(WIDTH*.9);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$yellow);
	$edge=ceil(WIDTH*.75);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
} elseif($pct >=.75) {
	$edge=ceil(WIDTH*$pct);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$yellow);
	$edge=ceil(WIDTH*.75);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
} else {
	$edge=ceil(WIDTH*$pct);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
}



header("Content-type: image/png");
// Yello Start
imagefilledrectangle($im,ceil(WIDTH*.75),0,ceil(WIDTH*.75)+3,HEIGHT-1,$yellow);
// Red Start
imagefilledrectangle($im,ceil(WIDTH*.9),0,ceil(WIDTH*.9)+3,HEIGHT-1,$red);
imagerectangle($im,0,0,WIDTH-1,HEIGHT-1,$black);
imagestring($im,3,25,5,"{$use} GB / {$quota} GB Transfer Used",$black);
imagepng($im);
?>
