<?php

$emails[]='karam@visionsystems.tv';
$emails[]='paigeh@visionsystems.tv';
$emails[]='darlab@visionsystems.tv';

$subject = 'Web Bulk Request';

if(isset($_POST['submitted'])) {
	$lines[]='---------------------------------------------------------';
	$lines[]=' ';
	foreach($_POST as $k=>$v) {
		if($k!='submitted') {
			$lines[]=sprintf("%-30s %s",$k,$v);
		}
	}
	$lines[]=' ';
	$lines[]='---------------------------------------------------------';
	$data=implode("\n",$lines);
	//print "<pre>"; print $data; exit();
	foreach($emails as $e) {
		        mail($e,$subject,$data);
	}
	print "<html><head><title>Thank You</title></head><body>Thank your for letting us know about the status change for this unit.<br><br>Vision Systems Staff<br><br><a href=\"index.php\">Process Another</a></body></html>\n";
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Bulk Status Change</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../visionsystems.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFE5" text="#000000" link="#003366" vlink="#003366" alink="#003366" leftmargin=0 topmargin=0 marginwidth="0" marginheight="0">
<form method="post" action="index.php">
<input type="hidden" name="submitted" value="true">
<table border="1" cellpadding="5" cellspacing="0">
<tr><td colspan="2" align="center" bgcolor="#ffffff"><img src="../images/sub-logo.jpg"></td></tr>
<tr><td>Entered By</td><td><input name="EnteredBy" type="text" size="30"></td></tr>
<tr><td>Reason</td><td><input type="radio" name="inout" value="In">In<br><input type="radio" name="inout" value="Out">Out<br><input type="radio" name="inout" value="transition">Change</td></tr>
<tr><td>Effective Date</td><td><input name="Date" type="text" size="10"></td></tr>
<tr><td>Building #</td><td><input name="building" type="text" size="10"></td></tr>
<tr><td>Apartment</td><td><input name="apartment" type="text" size="10"></td></tr>

<tr><td>Primary Name</td><td><input name="p_name" type="text" size="30"></td></tr>
<tr><td>Primary Phone</td><td><input name="p_phone" type="text" size="30"></td></tr>

<tr><td>Tenant2 Name</td><td><input name="t2_name" type="text" size="30"></td></tr>
<tr><td>Tenant2 Phone</td><td><input name="t2_phone" type="text" size="30"></td></tr>

<tr><td>Tenant3 Name</td><td><input name="t3_name" type="text" size="30"></td></tr>
<tr><td>Tenant3 Phone</td><td><input name="t3_phone" type="text" size="30"></td></tr>
<tr><td colspan="2">Notes</td></tr>
<tr><td colspan="2"><textarea name="notes" rows="5" cols="40"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
</table>
</form>
</body>
</html>
