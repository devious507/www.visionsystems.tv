<?php

//header("Location: error.html"); exit();
if (isset($_COOKIE["vs-property"])) {
	$propname = $_COOKIE['vs-propertyname'];
	$prop = $_COOKIE["vs-property"];
	$state = $_COOKIE["vs-state"];
	$city = $_COOKIE["vs-city"];
	switch($propname) {
	case "Weston Park - DSM":
		$specials = "pdfs/specials/WPSpecial.pdf";
		break;
	case "Sun Prairie 6017, 6127, 6137, 6147, 6257, 6367, 6377, 6387 Vista Dr.":
		$specials = "pdfs/specials/6000sSpecial.pdf";
		break;
	default:
		$specials = "pdfs/specials/MetroSpecial.pdf";
		break;
	}
	embedPDF($specials);
	exit();
} else {
	$redirect="specials.php";
	include("newlocation.php");
}

function embedPDF($pdf) {
	global $propname;
	print "<html><head><title>Specials</title></head><body>";
	//print "--{$propname}--<br>{$pdf}<br>";
	print "<embed src=\"{$pdf}\" width=\"100%\" height=\"100%\">";
	print "</body></html>";
}
?>
