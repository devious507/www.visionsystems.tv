<?php

//header("Location: error.html"); exit();
if (isset($_COOKIE["vs-property"])) {
	$prop = $_COOKIE["vs-property"];
	$state = $_COOKIE["vs-state"];
	$city = $_COOKIE["vs-city"];
	include("display-signup.php");
} else {
	$redirect="signup.php";
	include("newlocation.php");
}
