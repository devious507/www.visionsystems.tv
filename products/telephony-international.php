<?php
	$effective_date=date('m/d/Y');
	require_once("MDB2.php");
	$dsn="pgsql://paulo@localhost/newsip";
	$sql="SELECT country,digits,retail FROM international ORDER BY country ASC, retail ASC";
	$dbConn=MDB2::connect($dsn);
	if(PEAR::isError($dbConn)) {
		print "Error Connecting to database<br>\n";
		print $dbConn->getMessage();
		exit();
	}
	$resultSet=$dbConn->query($sql);
	if(PEAR::isError($resultSet)) {
		print "Query Failed<br>{$sql}<br>\n";
		print $resultSet->getMessage();
		$dbConn->disconnect();
		exit();
	}
	$dbConn->disconnect();
	while($r = $resultSet->fetchRow()) {
		$tbl.="\t\t<tr>";
		$tbl.="<td>{$r[0]}</td>";
		$tbl.="<td>{$r[1]}</td>";
		$tbl.="<td align=\"right\">{$r[2]}</td>";
		$tbl.="</tr>\n";
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>VisionSystems.tv</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../visionsystems.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function mmLoadMenus() {
   if (window.mm_menu_0924202232_0) return;
   window.mm_menu_0924202232_0 = new Menu("root",97,18,"Arial, Helvetica, sans-serif",10,"#ffffff","#ffffff","#999999","#666666","left","middle",0,0,250,-5,7,true,true,true,2,false,false);
   mm_menu_0924202232_0.addMenuItem("Check&nbsp;My&nbsp;Email","location='../checkemail.html'");
   mm_menu_0924202232_0.addMenuItem("Email&nbsp;Settings","location='../email-settings.html'");
   //mm_menu_0924202232_0.addMenuItem("Web Space","location='../webspace.html'");

mm_menu_0924202232_0.addMenuItem("Packages &amp; Pricing","location='../packages.php'");

mm_menu_0924202232_0.addMenuItem("Contact&nbsp;Support","location='../support-contact.php'");mm_menu_0924202232_0.addMenuItem("Explanation&nbsp;of&nbsp;Bill","location='../bill-explanation.html'");
   mm_menu_0924202232_0.hideOnMouseOut=true;
   mm_menu_0924202232_0.menuBorder=1;
   mm_menu_0924202232_0.menuLiteBgColor='#999999';
   mm_menu_0924202232_0.menuBorderBgColor='#666666';
   mm_menu_0924202232_0.bgColor='#999999';
   window.mm_menu_0924203121_1 = new Menu("root",77,18,"Arial, Helvetica, sans-serif",10,"#ffffff","#ffffff","#999999","#666666","left","middle",0,0,250,-5,7,true,true,true,2,false,false);
   mm_menu_0924203121_1.addMenuItem("Cable","location='cable-overview.html'");
   mm_menu_0924203121_1.addMenuItem("Digital&nbsp;Cable","location='digitalcable-overview.html'");   mm_menu_0924203121_1.addMenuItem("Internet","location='internet-overview.html'");   mm_menu_0924203121_1.addMenuItem("Telephony","location='telephony-overview.html'");
   mm_menu_0924203121_1.hideOnMouseOut=true;
   mm_menu_0924203121_1.menuBorder=1;
   mm_menu_0924203121_1.menuLiteBgColor='#999999';
   mm_menu_0924203121_1.menuBorderBgColor='#666666';
   mm_menu_0924203121_1.bgColor='#999999';

  mm_menu_0924203121_1.writeMenus();
} // mmLoadMenus()

//-->
</script>
<script language="JavaScript1.2" src="../mm_menu.js" type="text/javascript"></script>

</head>

<body bgcolor="#FFFFFF" background="../images/sub-background.jpg" text="#000000" link="#003366" vlink="#003366" alink="#003366" leftmargin=0 topmargin=0 marginwidth="0" marginheight="0">
<script language="JavaScript1.2" type="text/javascript">mmLoadMenus();</script>

<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>
		<table cellpadding="0" cellspacing="0" border="0" width="731">
			<tr>
				<td valign="top" rowspan="2"><a href="../index.php"><img src="../images/sub-logo.jpg" alt="VisionSystems.tv" width="172" height="74" border="0"></a></td>
				<td valign="top" width="559" align="right">
						<!--Begin Menu-->
						<table cellpadding=0 cellspacing=0 border=0>
							<tr>
								<td align="right"><img src="/images/menu-left.jpg" width="140" height="26" border="0" alt=""></td>
								<td><a href="/index.php" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuhome','','/images/menu-home-anim2.gif',1)"><img name="menuhome" src="/images/menu-home2.gif" width="38" height="26" border="0" alt="Home"></a></td>
								<td><a href="/customerservice/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0924202232_0,0,26,null,'menucustomerservice');MM_swapImage('menucustomerservice','','/images/menu-customerservice-anim2.gif',1)"><img name="menucustomerservice" src="/images/menu-customerservice2.gif" width="93" height="26" border="0" alt=""></a></td>
								<td><a href="/products/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0924203121_1,0,26,null,'menuproducts');MM_swapImage('menuproducts','','/images/menu-products-anim2.gif',1)"><img name="menuproducts" src="/images/menu-products2.gif" width="52" height="26" border="0" alt=""></a></td>
								<td><a href="/about.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuabout','','/images/menu-about-anim2.gif',1)"><img name="menuabout" src="/images/menu-about2.gif" width="43" height="26" border="0" alt=""></a></td>
								<td><a href="/employment/index.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuemployment', '', '/images/menu-employment-anim2.gif', 1)"><img name="menuemployment" src="/images/menu-employment2.gif" alt="" height="26" width="75" alt="" border="0"></a></td>
							</tr>						
						</table>
						<!--End Menu-->
				</td>
			</tr>
			<tr>
				<td valign="top" width="559">
				<table cellpadding=0 cellspacing=0 border=0 width="559">
					<tr>
						<td align="right" width="368"><img src="../images/Telephony.jpg" alt="Telephony" width="120" height="48" border="0"></td>
						<td width="6"><img src="../images/spacer.gif" alt="" height="1" width="6"></td>

						<td width="186"><img src="../images/sub-phototop.jpg" alt="" width="186" height="48"></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>

		<td width="731">
		<table cellpadding=0 cellspacing=0 border=0>
			<tr>
				<td width="539" valign="top">
				<table cellpadding=0 cellspacing=0 border=0 width="539">
					<tr>
						<td height="1" width="539" colspan="3"><img src="../images/sub-topline.gif" alt="" height="1" width="539"></td>
					</tr>
					<tr><td height="5" width="539" colspan="3"><img src="../images/spacer.gif" alt="" height="5" width="1"></td></tr>

					<tr>
						<td width="171" valign="top">
						<table cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td width="10"><img src="../images/spacer.gif" alt="" height="1" width="10"></td>
								<td class="content">
								<a href="index.html"><img src="../images/sub-productshead.gif" alt="Products" width="71" height="24" border="0"></a><br>
								<a href="cable-overview.html">Cable</a><br>
								<a href="digitalcable-overview.html">Digital Cable</a><br>
								<a href="internet-overview.html">Internet</a><br>
								<br>
								<b>Telephony</b><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="telephony-overview.html">Overview</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="../packages.php">Packages &amp; Pricing</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="./package_descriptions.html">Package Descriptions</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="../signup.php">Sign Up</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="telephony-ldhistory.php">Long Distance History</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> International Rates<br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="telephony-voicemailhelp.html">Voicemail Help</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="telephony-faq.html">FAQ</a><br>
								<img src="../images/spacer.gif" alt="" height="1" width="5"> <a href="telephony-terms.html">Terms of Service</a><br>
								<br>
								<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="140" HEIGHT="90" id="SPECIALS" ALIGN="">
 								<PARAM NAME=movie VALUE="../specials.swf"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#FFFFFF> <EMBED src="../specials.swf" quality=high bgcolor=#FFFFFF  WIDTH="140" HEIGHT="90" NAME="SPECIALS" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>

								</OBJECT>
								</td>
							</tr>
						</table>
						</td>
						<td width="1" background="../images/divider.gif"><img src="../images/spacer.gif" alt="" height="1" width="1"></td>
						<td width="367" valign="top">
						<table cellpadding="2" cellspacing="0" border="0" width="367">
						<!--page contents-->
						<tr><td colspan="3"><hr></td></tr>
						<tr><th colspan="3">International Calling Rates <?php echo $effective_date; ?></th></tr>
						<tr><td colspan="3"><hr></td></tr>
						<tr><th align="left">Country</th><th align="left">Prefix</th><th align="right">Per Minute</th></tr>
						<?php echo $tbl; ?>
						</table>
						</td>
					</tr>
					<tr>
						<td height="12" width="539" colspan="3"><img src="../images/sub-bottombar.gif" alt="" height="12" width="539"></td>
					</tr>
					<tr>
						<td width="539" colspan="3">

						<table cellpadding="0" cellspacing="0" border="0" width="539">
							<tr>
								<td width="10"><img src="../images/spacer.gif" alt="" height="1" width="10"></td>
								<td class="gray">&copy; Copyright 2003 Vision Systems. All Rights Reserved.</td>
								<td class="darkgray" align="right">
								<a href="../newlocation.php">Change Location</a>

								</td>

								<td width="5"><img src="../images/spacer.gif" alt="" height="1" width="5"></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				</td>
				<td width="6"><img src="../images/spacer.gif" alt="" height="1" width="6"></td>
				<td width="186" valign="top">

				<img src="../images/sub-photo.jpg" alt="" width="186" height="272" border="0">
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>

<br><br>
</body>
</html>
