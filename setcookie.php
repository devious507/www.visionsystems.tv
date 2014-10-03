<?php

require_once("libs/vsllc_homepage.php");

if (isset($_GET['redirect'])) {
  $redirect=$_GET['redirect'];
}
if (!$redirect) { $redirect = "/products/"; }

$property=$_GET['property'];
$city=$_GET['city'];
$state=$_GET['state'];


if ($property) {
	setcookie("vs-property","$property",time()+(60*60*24*365)); // set for one full year.
	setcookie("vs-city","$city",time()+(60*60*24*365));
	setcookie("vs-state","$state",time()+(60*60*24*365));

	$propertyID=$property;


	$Query = new FX($serverIP,591,'FMPro5/6');
	$Query->SetDBData("Property","webView",'10');
	$Query->AddDBParam('Property ID',$propertyID,'eq');
	$Query->SetDBPassword('star~');
	$Data=$Query->FMFind();
	//print "<pre>"; var_dump($Data) ; print "</pre>"; exit();
	if($Data['foundCount'] > 0) {
		//foreach($Data['data'] as $k=>$v) { $property_name=$v['Property Name'][0]; }
		foreach($Data['data'] as $k=>$v) { $property_name=$v['Name For Ch Lineups'][0]; }
		setcookie("vs-propertyname","$property_name",time()+(60*60*24*365));
		header("Location: $redirect");
		exit;
	} else {
		header("Location: /index.php");
	}

} else {
	header("Location: /index.php");
}
?>
