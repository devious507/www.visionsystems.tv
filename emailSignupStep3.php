<?php

require_once("libs/vsllc_homepage.php");
include_once("emailSetupError.php");

$username	=$_GET['username'];
$rid		=$_GET['rid'];
$password	=$_GET['password'];
$emailaddr	=$username."@visionsystems.tv";

/*$sql="SELECT active FROM users WHERE username='$emailaddr' AND active='1'";


$dbConn=mysql_connect('kosh.visionsystems.tv','mail_system','vsllc_mail');
mysql_select_db('mailauth',$dbConn);
for($i=0;$i<30;$i++) {
  $res=mysql_query($sql,$dbConn);
  $numrows=mysql_num_rows($res);
  if($numrows >= 1) { $i=99; $entered="true"; }
  unset($res);
  unset($numrows);
  sleep(1);
  }
mysql_close($dbConn);

if($entered == "true") {
  // Insert into Filemaker
  $AccountQuery = new FX($serverIP,591,'FMPro5/6');
  $AccountQuery->SetDBPassword('star~');
  $AccountQuery->SetDBData("SubEmail", "DISPLAY"); 
  $AccountQuery->AddDBParam('Data Sub RID' , $rid);
  $AccountQuery->AddDBParam('Email Address', $emailaddr);
  $AccountQuery->AddDBParam('Email User Name', $username);
  $AccountQuery->AddDBParam('Email Pswd', $password);
  $AccountData = $AccountQuery->FMNew();



	// insert into db
	$dbConn=mysql_connect('kosh.visionsystems.tv','mail_system','vsllc_mail');
	mysql_select_db('mailauth',$dbConn);
	$sql="insert into users values('{$emailaddr}', '{$username}', '{$password}', {$uid}, {$gid}, '/var/virtual/home/visionsystems.tv/{$username}', 'blank', '/var/virtual/mail/visionsystems.tv/{$username}', 10485760, 10485760, 'blank', 'blank', '1')";
	$res=mysql_query($sql,$dbConn);
//echo"<pre>";var_dump($res);echo"</pre>";
	mysql_close($dbConn);
	
	// end insert into db


	// write to fsmodslist here
//	$df = fopen("fsmodslist.txt", "a");
//      fwrite($df, "mkdir {$usershomedir} {$_REQUEST['uid']} {$_REQUEST['gid']} -\n");
//      fwrite($df, "mkmaildir {$usersmaildir} {$_REQUEST['uid']} {$_REQUEST['gid']} -\n");
//      fclose($df);
	// end fsmodslist write
	*/
  
  header("Location: emailThankYou.html");
  
  /*} else {
  // Delete from mysql
  $dbConn=mysql_connect('kosh.visionsystems.tv','mail_system','vsllc_mail');
  mysql_select_db('mailauth',$dbConn);
  $sql="DELETE FROM users WHERE userid='$username'";
  $res=mysql_query($sql,$dbConn);
  mysql_close($dbConn);
  emailSetupError("We're sorry, we can not create your account at this time.  Please try again later.");
  exit();
  }*/
?>
