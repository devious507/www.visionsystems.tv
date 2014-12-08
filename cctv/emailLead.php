<?php

$body="";
foreach($_POST as $k=>$v) {
	$body.="{$k}: {$v}\n";
}
$emails[]='paulo@visionsystems.tv';
$emails[]='darlab@visionsystems.tv';
$emails[]='daveb@visionsystems.tv';
foreach($emails as $e) {
	mail($e,'Security Lead',$body);
}

$thankYou="<p>Thank you for your interest, one of our team members will contact you to discuss your security and surveillance needs.</p>";
?>
<!doctype html>
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
		<div class="right_side2"><?php echo $thankYou; ?></div>
		<div class="security_surveillance"><img src="security_surveillance.png"></div>
	</body>
</html>
