<?php

if(!isset($_GET['quota'])) {
	header("Location: quota.php");
	exit();
}
if(!isset($_GET['use'])) {
	header("Location: quota.php");
	exit();
}
if(isset($_GET['dom'])) {
	$dom=$_GET['dom'];
} else {
	$dom=date('j');
}
$total_days = date('t');

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
$pct_red	=.9*$dom/$total_days;
$pct_yellow	=.75*$dom/$total_days;
if($pct > $pct_red) {
	if($pct > 1) {
		$edge=WIDTH;
	} else {
		$edge=ceil(WIDTH*$pct);
	}
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$red);
	$edge=ceil(WIDTH*$pct_red);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$yellow);
	$edge=ceil(WIDTH*$pct_yellow);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
} elseif($pct >= $pct_yellow) {
	$edge=ceil(WIDTH*$pct);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$yellow);
	$edge=ceil(WIDTH*$pct_yellow);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
} else {
	$edge=ceil(WIDTH*$pct);
	imagefilledrectangle($im,0,0,$edge,HEIGHT,$green);
}



header("Content-type: image/png");
// Yellow Start
imagefilledrectangle($im,ceil(WIDTH*$pct_yellow),0,ceil(WIDTH*$pct_yellow)+3,HEIGHT-1,$yellow);
// Red Start
imagefilledrectangle($im,ceil(WIDTH*$pct_red),0,ceil(WIDTH*$pct_red)+3,HEIGHT-1,$red);
imagerectangle($im,0,0,WIDTH-1,HEIGHT-1,$black);
imagestring($im,3,25,5,"{$use} GB / {$quota} GB Transfer Used",$black);
imagepng($im);
?>
