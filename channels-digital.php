<?php

//header("Location: error.html"); exit();
if (isset($_COOKIE["vs-property"])) {
	$propname = $_COOKIE['vs-propertyname'];
	$prop = $_COOKIE["vs-property"];
	$state = $_COOKIE["vs-state"];
	$city = $_COOKIE["vs-city"];
	switch($propname) {
	case "Sun Prairie 1173, 1193, 1233, 1253 & 6699":
		$channels = "pdfs/channel_guides/Des_Moines_Bulk-10-01-2014.pdf";
		break;
	default:
		$channels = "pdfs/channel_guides/Des_Moines-10-01-2014.pdf";
		break;
	}
	//print $propname; exit();
	embedPDF($channels);
	exit();
} else {
	$redirect="channels-digital.php";
	include("newlocation.php");
}

function embedPDF($pdf) {
	global $propname;
	print "<html><head><title>Channel Lineup</title></head><body>";
	//print "{$propname}<br>{$pdf}<br>";
	print "<embed src=\"{$pdf}\" width=\"100%\" height=\"100%\">";
	print "</body></html>";
}
?>
