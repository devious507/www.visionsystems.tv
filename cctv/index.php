<?php

$formTable="<form method=\"post\" action=\"emailLead.php\">";
$formTable.="<table>";
$formTable.="<tr><td>Name</td><td><input type=\"text\" name=\"name\" size=\"25\"></td></tr>";
$formTable.="<tr><td>Phone</td><td><input type=\"text\" name=\"phone\" size=\"25\"></td></tr>";
$formTable.="<tr><td>Email</td><td><input type=\"text\" name=\"email\" size=\"25\"></td></tr>";
$formTable.="<tr><td>Zip Code</td><td><input type=\"text\" name=\"zip\" size=\"25\"></td></tr>";
$formTable.="<tr><td colspan=\"2\"><input type=\"Submit\"></td></tr>";
$formTable.="</table>";
$formTable.="</form>";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Messsages</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="Refresh" content="<?php echo $refresh_interval;?>;URL=index.php?lastmess=<?php echo $max;?>">
		<link href="normalize.css" rel="stylesheet" type="text/css">
		<link href="divs.css" rel="stylesheet" type="text/css">
	</head>
	<body>

		<div class="left_side"><img src="eye.png"></div>
		<div class="right_side">
			<div class="eye_on_life"><img src="keepaneyeonlife.png"></div>
			<div class="sites"><img src="bullets.png"></div>
			<div class="bullet_points"><img src="lockbox.png"></div>
			<div class="form_header">Complete this form and one of our security and surveillance specialists will call you.</div>
			<div class="form"><?php echo $formTable; ?></div>
			<div class="call_now"><img src="callnow.png"></div>
		</div>
		<div class="security_surveillance"><img src="security_surveillance.png"></div>
	</body>
</html>
