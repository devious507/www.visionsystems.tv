<?php

include_once "emailSetupError.php";
include_once "config.php";
include_once "common.inc.php";
include_once "libs/database.php";

require_once("mail_db_include.php");

//make sure we're not going over our max number of users
$res1 = pg_query($dbconn, "select uid from mail_users order by uid desc limit 1;");
$row1 = pg_fetch_row($res1);
$idval = $row1[0];
$_POST['email'] = strtolower($_POST['email']); //Set e-mail to lower case to prevent further issues
if($idval > $vsm_highestpossibleuid)
{
  echo "<h1>Number of users has exceeded the limit of $vsm_highestpossibleuid</h1>";
}
else
{
  $idval++;
}


//START OLD CODE
/*$uidgidrows = $maildb->getCol("SELECT $vsm_utuid FROM $vsm_usertable ORDER BY $vsm_utuid");
$uids = array();
foreach($uidgidrows as $row)
{       $row = 0+$row;
        $uids[] = $row;
}
if (count($uids) > 0)
{       $curval = 0;
        if($uids[0] != $vsm_lowestpossibleuid)
	        {$maildb->query("UPDATE idmap SET id = " . $vsm_lowestpossibleuid);}
        else
        {       while(in_array($uids[$curval]+1, $uids))
                {$curval++;}
                if ($curval > $vsm_highestpossibleuid)
                {       echo "<h1>Number of users has exceeded the limit of $vsm_highestpossibleuid</h1>";
                }
                else
                {       $val = $uids[$curval]+1;
                        $maildb->query("UPDATE idmap SET id = " . $val);
                }
        }
}
else
	{$maildb->query("UPDATE idmap SET id = " . $vsm_lowestpossibleuid);}
$idval = $maildb->getOne("SELECT id FROM idmap");*/
//END OLD CODE

$goBack = "Please <a href=\"javascript:history.go(-1)\">go back</a> and try again.";

//Get variables from POST
if($_GET['account'] != "")
{
  $rid=$_GET['rid'];
  $lastname=$_GET['lastname'];
  $accountid=$_GET['account'];
}
else
{
  $rid=$_POST['rid'];
  $lastname=$_POST['lastname'];
  $accountid=$_POST['account'];
}

//Get the username out of the full email address
if(ereg("@",$_POST['email'])) {
  $tmp=explode("@",$_POST['email']);
  $username=$tmp[0];
} else {
  $username           =$_POST['email'];
}

$name		=$_POST['name'];
$password	=$_POST['password'];
$password2	=$_POST['password2'];
$secretq	=$_POST['secretq'];
$secreta	=$_POST['secreta'];
$ok		=$_POST['ok'];

/*if($rid != "") {
  if(ereg("@",$_POST['email'])) {
    $tmp=explode("@",$_POST['email']);
    $username=$tmp[0];
    } else {
    $username		=$_POST['email'];
    }
  $name			=$_POST['name'];
  $password		=$_POST['password'];
  $password2    =$_POST['password2'];
  $secretq		=$_POST['secretq'];
  $secreta		=$_POST['secreta'];
  $ok			=$_POST['ok'];
  } else {
  header("Location: newaccount.html");
  exit();
  }*/

if($ok == 'ok') {
  if($username == "") {
	$ok="<u>Email Address</u> is a required field.";
	} elseif($name == "") {
	$ok="<u>Name</u> is a required field.";
	} elseif($password == "") { 
	$ok="<u>Password</u> is required.";
	} elseif($password != $password2) {
	$ok="<u>Passwords</u> do not match.";
	} elseif($secreta == "") {
	$ok="Please enter your <u>secret question</u> and <u>answer</u>.";
	} elseif($lastname == "") {
	//header("Location: newaccount.html");
	  emailSetupError("An error has occured. (lastname) <br><br>$goBack"); exit();
	} elseif($accountid == "") {
	//header("Location: newaccount.html");
	  emailSetupError("An error has occured. (accountid)<br><br>$goBack"); exit();
	} else {
	$email=$username."@visionsystems.tv";
	$homedir="/var/virtual/home/visionsystems.tv/".$username . "/";
	$maildir="/var/virtual/mail/visionsystems.tv/".$username."/";
	$sql ="INSERT INTO mail_users (wincable,login,pass,uid,gid,homedir,name,maildir,mailquota,homequota,squestion,sanswer,active,defaultdelivery,dirs_created,crypt)";
	$sql.=" VALUES (";
	$sql.="$accountid,'$email','$password',$idval,$idval,'$homedir','" . addslashes($name) . "','$maildir','20000000S','20000000S','" . addslashes($secretq) . "','" . addslashes($secreta) . "',true,'default',false,' ');";
	//echo $sql;

	$inuse1 = "SELECT login FROM mail_users WHERE login='$username@visionsystems.tv'";
	$inuse2 = "SELECT address FROM mail_alias WHERE address like '$username"."@%'";

        $q1 = pg_query($dbconn, "$inuse1");
	$q2 = pg_query($dbconn, "$inuse2");
	$r_num = pg_num_rows($q1);
	$r_num += pg_num_rows($q2);

	if($r_num > 0)
	{
          emailSetupError("We're sorry but that e-mail address is already in use.<br><br>$goBack"); exit();
	}

	$res2 = pg_query($dbconn, "$sql");

	if($res2 == false)
	{
	  emailSetupError("An error has occured while creating your email address. Please try again. <br><br>$goBack"); exit();
	}

	//OLD DB STUFF
	/*$dbIP          = "kosh.visionsystems.tv";
	$dbUserName = "mail_system";
	$dbPassword = "vsllc_mail";
	$dbConn=mysql_connect($dbIP,$dbUserName,$dbPassword);
	mysql_select_db('mailauth',$dbConn);

	$badWORD="SELECT word FROM naughtyword WHERE word='$username'";
	$inuse[0]="SELECT username FROM users WHERE username='$username@visionsystems.tv'";
	$inuse[1]="SELECT address FROM alias WHERE address like '$username"."@%'";
	$q[0]=mysql_query($badWORD,$dbConn);
	$q[1]=mysql_query($inuse[0],$dbConn);
	$q[2]=mysql_query($inuse[1],$dbConn);
	if(mysql_num_rows($q[0]) > 0) { emailSetupError("We're sorry but that e-mail address is not permitted.<br><br>$goBack"); exit(); }
	if(mysql_num_rows($q[1]) > 0) { emailSetupError("We're sorry but that e-mail address is already in use.<br><br>$goBack"); exit(); }
	if(mysql_num_rows($q[2]) > 0) { emailSetupError("We're sorry but that e-mail address is already in use.<br><br>$goBack"); exit(); }
	$q[3]=mysql_query($sql,$dbConn);
//	var_dump($q[3]);
//	$q[4]=mysql_query($sql1,$dbConn);
	mysql_close($dbConn);
	*/

// write fsmodslist
	/*$df = fopen("/var/www/admin.visionsystems.tv/vsmail/fsmodslist.txt", "a");
        fwrite($df, "mkdir {$homedir} {$idval} {$idval} -\n");
        fwrite($df, "mkmaildir {$maildir} {$idval} {$idval} -\n");
        fclose($df);*/
// end write fsmodslist
	
	//$maildb->disconnect();
	header("Location: emailSignupStep3.php?username=$username&rid=$rid&password=$password");
	exit();
	}
  }

if($ok=="ok") { $ok=""; }

include("displayEmailSignupStep2.php");

?>
