<?php
//header("Location: error.html"); exit();

if (isset($_COOKIE["vs-property"])) {
		include("display-packages.php");
		exit();
} else {
	$redirect="packages.php";
	include("newlocation.php");
}
