<?php
if (isset($_COOKIE["vs-city"])) {
	include("display-contact.php");
} else {
	$redirect="support-contact.php";
	include("newlocation.php");
}
?>
