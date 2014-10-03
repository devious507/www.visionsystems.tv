<?php

require_once("libs/vsllc_homepage.php");

//print "<!-- hi there {$prop} -->\n\n";

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
//print "<pre>"; var_dump($Data); print "</pre>"; exit();
if($Data['foundCount'] > 0) {
	foreach($Data['data'] as $k=>$v) {
		$serviceOffered=$v['Service Offered'][0];
		$serviceCost   =$v['Service Cost'][0];
		$services["$serviceOffered"] = $serviceCost;
		$types["$serviceOffered"] = $v['Service Type'][0];
	}
}

//print "<pre>"; var_dump($types); print "</pre>"; exit();
//print "<pre>"; var_dump($services); print "</pre>"; exit();
unset($services["NIC Card"]);
$hsiUpgrade=$services["HSI w|oTV UG"];
unset($services["HSI w|oTV UG"]);
unset($services["Modem"]);
$outInfo="";

foreach($services as $k=>$v) {
	if($myCurrentService != $types[$k]) {
		$sectionLabel=getServiceLabel($types[$k]);
		$outInfo.="<hr><b>".$sectionLabel."</b><hr>\n";
		$myCurrentService=$types[$k];
	}
	$string[0]=$k;
	$val[0]=$v;

	$string[1]=$string[0];
	$string[0]=preg_replace("/&#8221;/","\"",$string[0]);
	if($types[$k] == '0 SPC') {
		$url="<a href=\"specials.php\">More Info</a>";
		$outInfo.=sprintf("<input type=\"checkbox\" name=\"services[]\" value=\"%s\"> %s %s <i>($%.2f)</i><br>\n",$string[1],$string[0],$url,$val[0]);
	} else {
		$outInfo.=sprintf("<input type=\"checkbox\" name=\"services[]\" value=\"%s\"> %s <i>($%.2f)</i><br>\n",$string[1],$string[0],$val[0]);

	}
}


if ($outInfo == "") {
	$outInfo="We're sorry, but currently our web site does not contain the services available in your area. Please <a href=\"support-contact.php\">contact</a> us for available services and to sign up.<br>\n";
}

print $outInfo;
?>
