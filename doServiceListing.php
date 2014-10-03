<?php

require_once("libs/vsllc_homepage.php");
//print "<pre>"; var_dump($_COOKIE); print "</pre>"; exit();

$prop = $_COOKIE["vs-property"];
$state = $_COOKIE["vs-state"];
$city = $_COOKIE["vs-city"];

// Alter property ID numbers for pulling services line items....
// function found in libs/vsllc_homepage.php
$myProp=switchProp($prop);


$Query = new FX($serverIP,591,'FMPro5/6');
$Query->SetDBData("Prop Serv & Cost Line Item","webView","All");
$Query->AddDBParam("Property ID",$myProp,"eq");
$Query->AddSortParam("Service Type","Ascend",1);
$Query->AddSortParam("Record ID","Ascend",2);
$Query->SetDBPassword('star~');
$Data=$Query->FMFind();
if($Data['foundCount'] > 0) {
	foreach($Data['data'] as $k=>$v) {
		$serviceOffered=$v['Service Offered'][0];
		$serviceCost   =$v['Service Cost'][0];
		$services["$serviceOffered"] = $serviceCost;
		$types["$serviceOffered"] = $v['Service Type'][0];
	}
}
//print "<pre>"; var_dump($types); print "</pre>"; exit();

unset($services["NIC Card"]);

// Others All Objects
foreach($services as $k=>$v) {
	if(!isset($cableTable)) {
		$cableTable="<table width=\"350\" cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
	}
	if($myCurrentService != $types[$k]) {
		$sectionLabel=getServiceLabel($types[$k]);
		$cableTable.="<tr><td class=\"content2\" colspan=\"2\"><hr>".$sectionLabel."<hr></td></tr>\n";
		$myCurrentService=$types[$k];
	}

	$kk=preg_replace("/&#8221;/",'"',$k);
	if($types[$k] == '0 SPC') {
		$url="<a href=\"/specials.php\">More Info</a>";
		$cableTable.=sprintf("<tr><td class=\"content\"><b>%s</b> %s</td><td class=\"content\" align=\"right\">$%.2f</td></tr>\n",$kk,$url,$v);
	} else {
		$cableTable.=sprintf("<tr><td class=\"content\"><b>%s</b></td><td class=\"content\" align=\"right\">$%.2f</td></tr>\n",$kk,$v);
	}
}

/** 
 * Closeing out my tables if they were created above.
 *
 */
if(isset($cableTable)) {
	$cableTable.="</table>\n";
}

?>
