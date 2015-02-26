<?php

require_once("libs/vsllc_nocache.php");
include_once "emailSetupError.php";

$lastname   = $_GET['lastname'];
$accountid  = $_GET['accountid'];

$lastname = strtolower($lastname);

require_once("mail_db_include.php");

//Use the db connection to check the mail masters table for this lastname and accountid
if (!pg_connection_busy($dbconn)) //Don't do anything if the server is too busy
{
  $res1 = pg_query($dbconn, "select count(wincable) from mail_master where wincable = $accountid AND lower(lastname) = '$lastname';");
  $res2 = pg_query($dbconn, "select count(wincable) from mail_users where wincable='$accountid';");
  
  if($row = pg_fetch_row($res1))
  {
    $num = $row[0];

    if($num == 1) //We found ONE account, EXCELLENT
    {
      if($row2 = pg_fetch_row($res2))
      {
        $num_used = $row2[0]; //Number of accounts created with this account

	//Find number of accounts total they should have
	$res3 = pg_query($dbconn, "select num_accts from mail_master where wincable = '$accountid';");
	$row3 = pg_fetch_row($res3);

	$total_accts = $row3[0];

	if($num_used < $total_accts)
	{
	  // Lets move on to the next step!
          header("Location: emailSignupStep2.php?lastname=$lastname&account=$accountid");
	}
	else
	{
          emailSetupError("We're sorry, but you currently have the maximum number of accounts allowed.");
	}
      }
    }
    else
    {
      emailSetupError('There was a problem with your last name, or account id.');
    }
  }
  else
  {
    emailSetupError('There was a problem with your last name, or account id.');
  }
}
else
{
  emailSetupError("Database is too busy, try again later.");
}


/*$Query = new FX($serverIP,591,'FMPro5/6');
$Query->SetDBData("Data Subscribers","Webview","All");
$Query->AddDBParam("Sub Last Name",$lastname,"eq");
$Query->AddDBParam("Sub Account ID",$accountid,"eq");
$Query->AddDBParam("Sub Status","Y","eq");
$Query->SetDBPassword('star~');
$Data=$Query->FMFind();// two errors originate here
if($Data['foundCount'] == 1) {
// Exactly 1 result found EXCELLENT
  foreach($Data['data'] as $key=>$val) {
	$cw=$val['Record ID'][0];
	$local_last=$val['Sub Last Name'][0];
	$local_acid=$val['Sub Account ID'][0];
//	echo " FM: ";var_dump($local_acid);
//	echo " local: ";var_dump($accountid);
	
	$numberAccounts=$val['Email Qty Entry'][0];
	if(strtolower($local_last) != strtolower($lastname)) {
	  emailSetupError('There was a problem with your last name, or account id.');
	  }
    if($local_acid != $accountid) {
  	  emailSetupError('There was a problem with your last name, or account id.');
	  }
    }
  } else {
  emailSetupError('There was a problem with your last name, or account id. '.$Data['foundCount']);
  }

$Query = new FX($serverIP,591,'FMPro5/6');
$Query->SetDBData('SubEmail','webView','All');
$Query->AddDBParam('Data Sub RID',$cw,'eq');
$Query->SetDBPassword('star~');
$Data=$Query->FMFind();
$numberUsed=$Data['foundCount'];
if($numberUsed < $numberAccounts) {
  // Lets move on to the next step!
  header("Location: emailSignupStep2.php?rid=$cw&lastname=$lastname&account=$accountid");
  } else {
  emailSetupError("We're sorry, but you currently have the maximum number of accounts allowed.");
  }
*/

?>
