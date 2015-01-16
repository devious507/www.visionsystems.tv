<?php

$name = $_POST["Name"];
$email = $_POST["Email"];
$phone = $_POST["Phone"];
//$city = $_POST["City"];
$city = $_COOKIE["vs-city"];
$state = $_COOKIE["vs-state"];
$community = $_COOKIE["vs-propertyname"];
$regarding = $_POST["Regarding"];
$comments = $_POST["Comments"];
$address  = $_POST["Address"];
$apartment= $_POST["Apartment"];

if ((!$name)||(!$email)||(!city)||(!$state)||(!$community)||(!$comments)) // required fields.
{
	include("allFields.php");
} else {
	$msg="Name:\t\t\t$name\n";
	$msg.="E-Mail:\t\t$email\n";
	$msg.="Phone:\t\t$phone\n";
	$msg.="Address:\t\t$address\n";
	$msg.="Apartment:\t\t$apartment\n";
	$msg.="City:\t\t\t$city\n";
	$msg.="State:\t\t$state\n";
	$msg.="Community:\t\t$community\n";
	$msg.="Regarding:\t\t$regarding\n";
	$msg.="Comments:\n$comments\n";

	mail($regarding,"Website Form Submission","$msg","From: $name <$email>\r");
	include("thankYou.php");
}

?>
