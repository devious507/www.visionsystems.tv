<?php
$property=NULL; // clear out any value passed through.

require_once("libs/vsllc_homepage.php");

$Query = new FX($serverIP,591,'FMPro5/6');
$Query->SetDBData("Property","webView",'All');
$Query->AddDBParam('Show in Website','Yes');
$Query->SetDBPassword('star~');
$Data=$Query->FMFind();


if($Data['foundCount'] > 0) {
	foreach($Data['data'] as $k=>$v) {
		$city	=$v['Property City'][0];
		$state 	=$v['Property State'][0];
		//$propname =$v['Property Name'][0];
		$propname =$v['Name For Ch Lineups'][0];
		$propid   =$v['Property ID'][0];
		if($state == "ND") { $fstate="North Dakota"; }
		if($state == "IA") { $fstate="Iowa"; }
			if($state == "MN") { $fstate="Minnesota"; }
				if($state == "TX") { $fstate="Texas"; }
					if($state == "CO") { $fstate="Colorado"; }
						$states["$state"]=$fstate;
		$cities["$city"]=$state;
		$property["$propname"]=$city;
		$propertyid["$propname"]=$propid;
	}
}

// print "<pre>"; var_dump($property); print "</pre>";
if ($states) {
	asort($states);
}
if ($cities) {
	ksort($cities);
	foreach($cities as $k=>$v) {
		if (isset($cityCount[$v])) {
			$cityCount[$v]++;
		} else {
			$cityCount[$v]=1;
		}
	}
}
if ($property) {
	ksort($property);
	foreach($property as $k=>$v) {
		if (isset($propCount[$v])) {
			$propCount[$v]++;
		} else {
			$propCount[$v]=1;
		}
	}
}
$maxCity=0;
// Find Maximum Number of Cities per State
if (is_array($cityCount)) {
	foreach($cityCount as $k=>$v) { 
		if ($v > $maxCity) { 
			$maxCity=$v; 
		}
	}
}
// Find Maximum Number of Props per City
$maxProp=0;
if (is_array($propCount)) {
	foreach($propCount as $k=>$v) { if($v > $maxProp) { $maxProp=$v; } } }

		// Build Initial State Selector
		//$stateSelector="<option value=\"State\" selected=\"selected\">Select State</option>\n";
		$stateSelector="";
	if (is_array($states)) foreach($states as $k=>$v) { $stateSelector.="<option value=\"$k\">$v</option>\n"; }
		// Build Initial City Selector
		$citySelector="<option value=\"0\" selected=\"selected\"> </option>\n";
	for($i=0;$i<$maxCity;$i++) { $citySelector.="<option value=\"$i\"></option>\n"; }
		// Build Initial Property Selector
		$propSelector="<option value=\"0\" selected=\"selected\"> </option>\n";
	for($i=0;$i<$maxProp;$i++) { $propSelector.="<option value=\"$i\"></option>\n"; }
		// updateCities function 
		$js ="\nfunction updateCities()\n";
	$js.="{\n";
	$js.="\tdocument.propselector.city.options[0].text='';\n";
	$js.="\tdocument.propselector.city.options[0].value='';\n";
	$js.="\tfor(index=1; index<=$maxCity; index++)\n";
	$js.="\t{\n";
	$js.="\t\tdocument.propselector.city.options[index].text='';\n";
	$js.="\t\tdocument.propselector.city.options[index].value='';\n";
	$js.="\t}\n";
	$js.="\tstateSelected = document.propselector.state.selectedIndex;\n\n";
	if (is_array($states)) foreach($states as $k=>$v) {
		$localstate=$k;
		$js.="\tif(document.propselector.state.options[stateSelected].value == '$k')\n";
		$js.="\t{\n";
		$localcount=1;
		$js.="\t\tdocument.propselector.city.options[0].selected='true';\n";
		$js.="\t\tdocument.propselector.city.options[0].text='Select City';\n";
		$js.="\t\tdocument.propselector.city.options[0].value='';\n";
		foreach($cities as $k=>$v) {
			if($v == $localstate) {
				$js.="\t\tdocument.propselector.city.options[$localcount].text='$k';\n";
				$js.="\t\tdocument.propselector.city.options[$localcount].value='$k';\n";
				$localcount++;
			}
		}
		$js.="\t}\n\n";
	}
	$js.="\treturn true;\n";
	$js.="}\n";

	// update Properties function
	$js.="function updateProperties()\n";
	$js.="{\n";
	$js.="\tdocument.propselector.property.options[0].text='';\n";
	$js.="\tdocument.propselector.property.options[0].value='';\n";
	$js.="\tfor(index=1; index<=$maxProp; index++)\n";
	$js.="\t\t{\n";
	$js.="\t\tdocument.propselector.property.options[index].text='';\n";
	$js.="\t\tdocument.propselector.property.options[index].value='';\n";
	$js.="\t\t}\n";
	$js.="\tcitySelected = document.propselector.city.selectedIndex;\n\n";
	if (is_array($cities)) foreach($cities as $localcity=>$localstate) {
		$js.="\tif(document.propselector.city.options[citySelected].value == '$localcity')\n";
		$js.="\t{\n";
		$js.="\t\tdocument.propselector.property.options[0].selected='true';\n";
		$js.="\t\tdocument.propselector.property.options[0].text='Select Property';\n";
		$js.="\t\tdocument.propselector.property.options[0].value='';\n";
		$localcount=1;
		foreach($property as $k=>$v) {
			if($v == $localcity) {
				$localvalue=$propertyid["$k"];
				$js.="\t\tdocument.propselector.property.options[$localcount].text='$k';\n";
				$js.="\t\tdocument.propselector.property.options[$localcount].value='$localvalue';\n";
				$localcount++;
			}
		}
		$js.="\t}\n";
	}
	$js.="\treturn true;\n";
	$js.="}\n";
?>
