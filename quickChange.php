<?php

require_once("libs/vsllc_homepage.php");


if (isset($_GET['property'])) {
	$property=$_GET['property'];
}
if (isset($_GET['city'])) {
	$city=$_GET['city'];
}
if (isset($_GET['state'])) {
	$state=$_GET['state'];
}


if (isset($property)) {
	setcookie("vs-property","$property",time()+(60*60*24*365)); // set for one full year.
	setcookie("vs-city","$city",time()+(60*60*24*365));
	setcookie("vs-state","$state",time()+(60*60*24*365));

	$propertyID=$property;


	$Query = new FX($serverIP,591,'FMPro5/6');
	$Query->SetDBData("Property","webView",'10');
	$Query->AddDBParam('Property ID',$propertyID,'eq');
	$Query->SetDBPassword('star~');
	$Data=$Query->FMFind();
	if($Data['foundCount'] > 0) {
		foreach($Data['data'] as $k=>$v) {
			$property_name=$v['Property Name'][0];
		}
		foreach($Data['data'] as $k=>$v) {
			$property_name=$v['Name For Ch Lineups'][0];
		}
		setcookie("vs-propertyname","$property_name",time()+(60*60*24*365));
	}
	header("Location: quickChange.php");
	exit();
}

$Query = new FX($serverIP,591,'FMPro5/6');
$Query->SetDBData("Property","webView",'All');
$Query->AddDBParam('Show in Website','Yes');
$Query->SetDBPassword('star~');
$Data=$Query->FMFind();

//print "<pre>"; var_dump($Data); print "</pre>"; exit();
if($Data['foundCount'] > 0) {
	foreach($Data['data'] as $k=>$v) {
		$city   =$v['Property City'][0];
		$state  =$v['Property State'][0];
		$propname =$v['Name For Ch Lineups'][0];
		$propid   =$v['Property ID'][0];
		$url=sprintf("<a href=\"quickChange.php?property=%s&city=%s&state=%s\">%s -- %s, %s</a>",
			$propid,
			$city,
			$state,
			$propname,
			$city,
			$state
		);
		$links[]=$url;
	}	
}

$myList=implode("<br>\n",$links);
?>
<html>
<head>
<title>Quick Property Selector</title>
</head>
<body>
<?php echo $myList; ?>
<pre>
<?php var_dump($_COOKIE); ?>
</pre>
</body>
</html>
