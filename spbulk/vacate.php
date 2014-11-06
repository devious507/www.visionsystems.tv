<?php

$maxCount=16;


$myDataTable='';
$class='normal';
for($i=1; $i < $maxCount; $i++) {
	if($myclass == "normal") {
		$myclass="shaded";
	} else {
		$myclass="normal";
	}
	$myDataTable.="<tr>";
	$myDataTable.="<td>{$i}</td>";
	$myDataTable.="<td><input class=\"{$myclass}\" size=\"10\" type=\"text\" name=\"date{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" size=\"5\" type=\"text\" name=\"building{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" size=\"5\" type=\"text\" name=\"apartment{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" type=\"text\" name=\"name1-{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" type=\"text\" name=\"name2-{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" type=\"text\" name=\"name3-{$i}\"></td>";
	$myDataTable.="<td><input class=\"{$myclass}\" type=\"text\" name=\"name4-{$i}\"></td>";
	$myDataTable.="</tr>\n";
}

$emails[]='karam@visionsystems.tv';
$emails[]='paigeh@visionsystems.tv';
$emails[]='darlab@visionsystems.tv';

$subject = 'Web Bulk Request';

if(isset($_POST['submitted'])) {
	$lines[]='---------------------------------------------------------';
	$lines[]='Mass Vacate Notice:';
	$lines[]='---------------------------------------------------------';
	$lines[]=' ';
	for($i=1; $i < $maxCount; $i++) {
		$tmpName=array();
		$date=$_POST["date{$i}"];
		$addr=$_POST["building{$i}"]." Apt# ".$_POST["apartment{$i}"];
		if(($_POST["name1-{$i}"] != ''))
			$tmpName[]=$_POST["name1-{$i}"];
		if(($_POST["name2-{$i}"] != ''))
			$tmpName[]=$_POST["name2-{$i}"];
		if(($_POST["name3-{$i}"] != ''))
			$tmpName[]=$_POST["name3-{$i}"];
		if(($_POST["name4-{$i}"] != ''))
			$tmpName[]=$_POST["name4-{$i}"];
		$names=implode(", ",$tmpName);
		$tmpLine="{$date}: {$addr} -- {$names}";
		if(strlen($tmpLine) > 12) {
			$lines[]=$tmpLine;
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
<form method="post" action="vacate.php">
<input type="hidden" name="submitted" value="true">
<table border="0" cellpadding="0" cellspacing="5">
<tr><td colspan="8" align="center" bgcolor="#ffffff"><img src="../images/sub-logo.jpg"></td></tr>
<tr><td>&nbsp;</td><td>Date</td><td>Building</td><td>Apt #</td><td>Name 1</td><td>Name 2</td><td>Name 3</td><td>Name 4</td></tr>
<?php echo $myDataTable; ?>
<tr><td colspan="8"><input type="submit" value="Submit"></td></tr>
</table>
</form>
<a href="index.php">Single Form Tool</a>
</body>
</html>
