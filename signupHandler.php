<?php
	$fname	=	$_POST["fname"];
	$mname	=	$_POST["mname"];
	$lname	=	$_POST["lname"];
	$phone1	=	$_POST["phone1"];
	$phone2	=	$_POST["phone2"];
	$apt 	=	$_POST["apt"];
	$city	=	$_COOKIE["vs-city"];
	$state	=	$_COOKIE["vs-state"];
	$comm	=	$_COOKIE["vs-propertyname"];
	$addr	=	$_POST["address"];
	$serv	=	$_POST["services"];
	
	if ((!$fname)||(!$lname)||(!$phone1)||(!$addr)||(!$serv))
	{
		include("allFields.php");
	} else {
	
		$msg ="Name:\t\t\t" . $fname . " ";
		if ($mname) { $msg.= $mname . " "; }
		$msg.= $lname . "\n";
		$msg.="Phone:\t\t" . $phone1 . "\n";
		$msg.="Alt. Phone:\t\t" . $phone2 . "\n";
		$msg.="Address:\t\t" . $addr . "\n";
		$msg.="Apartment:\t\t" . $apt . "\n";
		$msg.="City:\t\t\t" . $city . "\n";
		$msg.="State:\t\t" . $state . "\n";
		$msg.="Community:\t\t" . $comm . "\n";
		$msg.="Services:\n";
		
		foreach($serv as $key=>$value)
		{
			$msg.= "\t\t\t" . $value . "\n";
		}
		
		mail("support@visionsystems.tv","Website Form Submission","$msg","From: $fname $lname <postmaster@visionsystems.tv>\r");
		
		include("thankYou.php");
	}		
?>
