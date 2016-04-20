<?php

function renderLogin() {
	print "<form method=\"get\" action=\"quota.php\">\n";
	print "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\">\n";
	print "<tr><td>Last Name</td><td><input type=\"text\" name=\"lastname\"></td></tr>\n";
	print "<tr><td>Account #</td><td><input type=\"text\" name=\"acctnum\"></td></tr>\n";
	print "<tr><td colspan=\"2\"><input type=\"submit\"></td></tr>\n";
	print "</table>\n";
	print "</form>\n";
	exit();
}
if(!isset($_GET['lastname'])) {
	renderLogin();
}
if(!isset($_GET['acctnum'])) {
	renderLogin();
}

$name=$_GET['lastname'];
$acct=$_GET['acctnum'];
$url="http://38.108.136.6/reporting/modemDump-JSON.php?acctnum={$acct}&lastname={$name}";
$fh=fopen($url,'r');
$raw=stream_get_contents($fh);
$data=json_decode($raw);
fclose($fh);
unset($raw);
if(isset($data->Error)) {
	print "<p>Unable to load history, please <a href=\"quota.php\">try again</a> or call Vision Systems technical support at 515-222-9997 for assistance with your usage.</p>";
	exit();
}

//print "<pre>"; var_dump($data); print "</pre>"; exit();
$quota=$data->quota;
$use  =$data->usage;
$updated = $data->last_update;
$tmp=preg_split("/ /",$updated);
$times=preg_split("/:/",$tmp[1]);
$tmp[1]=sprintf("%02d:%02d",$times[0],$times[1]);
$dates=preg_split("/-/",$tmp[0]);
$updated=sprintf("%02d/%02d/%d %s",$dates[1],$dates[2],$dates[0],$tmp[1]);

$img="quotaGraph.php?quota={$quota}&use={$use}";
print "<table cellpadding=\"2\" cellspacing=\"0\" border=\"0\">\n";
print "<tr><td align=\"center\">{$data->name}</td></tr>\n";
print "<tr><td align=\"center\"><img src=\"{$img}\"></td></tr>\n";
print "<tr><td align=\"center\">Last Updated: {$updated}</td></tr>\n";
print "<tr><td align=\"center\">Usage resets on the first of each month</td></tr>\n";
print "</table>\n";
?>
