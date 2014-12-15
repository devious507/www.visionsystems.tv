<?php

if (strstr(getenv("HTTP_USER_AGENT"), "Windows")) {
	$os="windows";
}

include("getproperties.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>VisionSystems.tv</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="visionsystems.css" rel="stylesheet" type="text/css">

<script type="text/javascript" language="JavaScript">
<?php echo $js; ?>
</script>

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
   mm_menu_0924202232_0.addMenuItem("Check&nbsp;My&nbsp;Email","location='checkemail.html'");
   mm_menu_0924202232_0.addMenuItem("Email&nbsp;Settings","location='email-settings.html'");
   //mm_menu_0924202232_0.addMenuItem("Web Space","location='webspace.html'");
   mm_menu_0924202232_0.addMenuItem("Packages &amp; Pricing","location='packages.php'");
   mm_menu_0924202232_0.addMenuItem("Contact&nbsp;Support","location='support-contact.php'");
   mm_menu_0924202232_0.addMenuItem("Explanation&nbsp;of&nbsp;Bill","location='bill-explanation.html'");
   mm_menu_0924202232_0.hideOnMouseOut=true;
   mm_menu_0924202232_0.menuBorder=1;
   mm_menu_0924202232_0.menuLiteBgColor='#999999';
   mm_menu_0924202232_0.menuBorderBgColor='#666666';
   mm_menu_0924202232_0.bgColor='#999999';
   window.mm_menu_0924203121_1 = new Menu("root",77,18,"Arial, Helvetica, sans-serif",10,"#ffffff","#ffffff","#999999","#666666","left","middle",0,0,250,-5,7,true,true,true,2,false,false);
   mm_menu_0924203121_1.addMenuItem("Cable","location='products/cable-overview.html'");
   mm_menu_0924203121_1.addMenuItem("Digital&nbsp;Cable","location='products/digitalcable-overview.html'");   mm_menu_0924203121_1.addMenuItem("Internet","location='products/internet-overview.html'");   mm_menu_0924203121_1.addMenuItem("Telephony","location='products/telephony-overview.html'");
   mm_menu_0924203121_1.hideOnMouseOut=true;
   mm_menu_0924203121_1.menuBorder=1;
   mm_menu_0924203121_1.menuLiteBgColor='#999999';
   mm_menu_0924203121_1.menuBorderBgColor='#666666';
   mm_menu_0924203121_1.bgColor='#999999';

  mm_menu_0924203121_1.writeMenus();
} // mmLoadMenus()

//-->
</script>
<script language="JavaScript1.2" src="mm_menu.js" type="text/javascript"></script>

</head>

<body onLoad="updateCities();" bgcolor="#FFFFE5" text="#000000" link="#003366" vlink="#003366" alink="#003366" leftmargin=0 topmargin=0 marginwidth="0" marginheight="0">
<script language="JavaScript1.2" type="text/javascript">mmLoadMenus();</script>



<table cellpadding=0 cellspacing=0 border=0 width="100%" height="100%">
	<tr>
		<td align="center" valign="top">
		<table cellpadding=0 cellspacing=0 border=0 width="748" height="100%">
			<tr>
				<td width="9" background="images/bgshadow-left.gif"></td>
				<td width="730" bgcolor="#E5E5E5" valign="top">
				<table cellpadding=0 cellspacing=0 border=0 width="730">
					<tr>
                		<td colspan="3">
                		<!--Begin Header-->
						<table cellpadding=0 cellspacing=0 border=0 width="730">
							<tr>
								<td><img src="images/head-left.jpg" alt="VisionSystems.tv" width="200" height="114" border="0"></td>
								<td><img src="images/head-center.jpg" alt="View the World." width="261" height="114" border="0"></td>
								<td><img src="images/head-right.jpg" width="269" height="114" border="0" alt=""></td>
							</tr>
						</table>
						<!--End Header-->
						</td>
					</tr>
					<tr>
						<td colspan="3" align="right" bgcolor="#FFFFFF">
							
						<!--Begin Menu-->
						<table cellpadding=0 cellspacing=0 border=0>
							<tr>
								<!--<td width="289"><OBJECT codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="140" HEIGHT="90" id="SPECIALS" ALIGN=""><PARAM NAME=movie VALUE="tape.swf"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#FFFFFF> <EMBED src="tape.swf" quality=high bgcolor=#FFFFFF  WIDTH="289" HEIGHT="26" NAME="TICKER" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED></OBJECT></td>-->
								<td width="289"><a href="https://secure.visionsystems.tv/billpay"><img src="images/billpayment.jpg" border="0"></a></td>
								<td align="right"><img src="images/menu-left.jpg" width="140" height="26" border="0" alt=""></td>
								<?php
								if (isset($os) && $os == "windows") // Fixes problem with non-windows type browsers.
								{
								?>
								<td><a href="/index.php" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuhome','','images/menu-home-anim2.gif',1)"><img name="menuhome" src="images/menu-home2.gif" width="38" height="26" border="0" alt="Home"></a></td>
								<td><a href="/customerservice/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0924202232_0,0,26,null,'menucustomerservice');MM_swapImage('menucustomerservice','','images/menu-customerservice-anim2.gif',1)"><img name="menucustomerservice" src="images/menu-customerservice2.gif" width="93" height="26" border="0" alt=""></a></td>
								<td><a href="/products/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_showMenu(window.mm_menu_0924203121_1,0,26,null,'menuproducts');MM_swapImage('menuproducts','','images/menu-products-anim2.gif',1)"><img name="menuproducts" src="images/menu-products2.gif" width="52" height="26" border="0" alt=""></a></td>
								<td><a href="/about.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuabout','','images/menu-about-anim2.gif',1)"><img name="menuabout" src="images/menu-about2.gif" width="43" height="26" border="0" alt=""></a></td>
								<td><a href="/employment/index.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuemployment', '', 'images/menu-employment-anim2.gif', 1)"><img name="menuemployment" src="images/menu-employment2.gif" alt="" height="26" width="75" alt="" border="0"></a></td>
								<?php
								} else {
								?>
								<td><a href="/index.php" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuhome','','images/menu-home-anim.gif',1)"><img name="menuhome" src="images/menu-home.gif" width="38" height="26" border="0" alt="Home"></a></td>
								<td><a href="/customerservice/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_swapImage('menucustomerservice','','images/menu-customerservice-anim.gif',1)"><img name="menucustomerservice" src="images/menu-customerservice.gif" width="93" height="26" border="0" alt=""></a></td>
								<td><a href="/products/index.html" onMouseOut="MM_swapImgRestore();MM_startTimeout();" onMouseOver="MM_swapImage('menuproducts','','images/menu-products-anim.gif',1)"><img name="menuproducts" src="images/menu-products.gif" width="52" height="26" border="0" alt=""></a></td>
								<td><a href="/about.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuabout','','images/menu-about-anim.gif',1)"><img name="menuabout" src="images/menu-about.gif" width="43" height="26" border="0" alt=""></a></td>
								<td><a href="/employment/index.html" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('menuemployment', '', 'images/menu-employment-anim2.gif', 1)"><img src="images/menu-employment2.gif" alt="" height="26" width="75" alt="" border="0"></a></td>
								<?php
								}
								?>
							</tr>						
						</table>
						<!--End Menu-->
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" valign="top" width="425">
						<!--Start Mid Boxes-->

						<table cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td colspan="2"><a href="products/digitalcable-overview.html"><img border="0" src="images/mayupdate-r1c1.jpg"></a></td>
								<td colspan="2"><a href="products/internet-overview.html"><img border="0" src="images/mayupdate-r1c2.jpg"></a></td>
								<td colspan="2"><a href="products/telephony-overview.html"><img border="0" src="images/mayupdate-r1c3.jpg"></a></td>
							</tr>
							<tr>
								<td><a href="products/digitalcable-overview.html"><img src="images/mayupdate-r2c1.jpg" border="0"></a></td>
								<td><a href="signup.php"><img src="images/mayupdate-r2c2.jpg" border="0"></a></td>
								<td><a href="products/internet-overview.html"><img src="images/mayupdate-r2c3.jpg" border="0"></a></td>
								<td><a href="signup.php"><img src="images/mayupdate-r2c4.jpg" border="0"></a></td>
								<td><a href="products/telephony-overview.html"><img src="images/mayupdate-r2c5.jpg" border="0"></a></td>
								<td><a href="signup.php"><img src="images/mayupdate-r2c6.jpg" border="0"></a></td>
							</tr>
						</table>
						<table cellpadding="5" cellspacing="0" border="0" width="420">
							<tr>
								<td>
								<script src="http://securityalerts.mcafee.com/mcalerts/en-us/AlertConstant.js"></script>
								<script src="http://securityalerts.mcafee.com/mcalerts/en-us/ResourceFile.js"></script>
								<script src="http://securityalerts.mcafee.com/mcalerts/AlertDisplay.js"></script>
								<script>
									dspylogolnk = 0;
									lnklogo = "";
									dsplyrec = 0;
									dsplyrem = 0;
									dsplysrc = 0;
									DisplayMcAfeeAlerts();
								</script>
								</td><td valign="top">
								<img src="images/spacer.gif" alt="" height=2 width=1><br>
								<table cellpadding="1" cellspacing="0" border="0">
									<tr>
										<td bgcolor="#CCCCCC">
										<!--<center><strong>NEWS &amp; DOWNLOADS</strong></center>-->
										<table cellpadding="5" cellspacing="0" border="0">
											<tr>
												<td bgcolor="#F2F2F2">
												For <strong><em>FREE</em></strong> Virus Alerts,
												Virus Scanners and Removal Tools, visit any of the following sites:<br>
												<img src="images/spacer.gif" alt="" height="5" width="1"><br>
												&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.mcafee.com" target="_blank">McAfee Security</a><br>
												&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://housecall.antivirus.com" target="_blank">Trend Micro's HouseCall</a><br>
												&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://securityresponse.symantec.com/avcenter/tools.list.html" target="_blank">Symantec Virus Removal Tools</a><br>
												&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.grisoft.com/us/us_index.php" target="_blank">AVG Anti-Virus</a><br>
												<br><br><br>
												</td>
											</tr>
										</table>
										</td>
									</tr>
								</table>
								</td>
							</tr>
						</table>
						<!--End Mid Boxes-->
						</td>
						<td background="images/mid-curve.jpg"><img src="images/spacer.gif" alt="" height="1" width="20"></td>
						<!--Begin Mid-Right-->
						<td width="250" valign="top" bgcolor="#CCCCCC">
<form method="post" action="/webmail/src/redirect.php">
<input type="hidden" name="js_autodetect_results" value="SMPREF_JS_OFF">
<input type="hidden" name="just_logged_in" value="1">
						<table cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td colspan="2"><img src="images/webmail-heading.jpg" alt="" width="269" height="23"><br><img src="images/spacer.gif" alt="" height="5" width="1"></td>
							</tr>
							<tr>
								<td class="darkgray" align="right" width="40%">Email Address:<img src="images/spacer.gif" alt="" height="1" width="10"></td>
								<td class="darkgray" width="60%"><input type="text" name="login_username" size="30" class="darkgray"></td>
							</tr>
							<tr>
								<td class="darkgray" align="right" width="40%">Password:<img src="images/spacer.gif" alt="" height="1" width="10"></td>
								<td class="darkgray" width="60%"><input type="password" name="secretkey" size="30" class="darkgray"></td>
							</tr>
							<tr>
								<td colspan="2">
								<table cellpadding=0 cellspacing=0 border=0>
									<tr>
                            			<td height="5"><img src="images/spacer.gif" alt="" height="5" width="1"></td>
                         			</tr>
									<tr>
										
										<td><a href="newaccount.html"><img src="images/new-account.jpg" alt="New Account Sign-Up" width="102" height="16" border="0"></a></td>
										<td><a href="forgotpassword.html"><img src="images/forget-password.jpg" alt="Forget Password?" width="109" height="16" border="0"></a></td>
										<td><input type="image" value="Login" src="images/login.jpg" border="0"></td>
									</tr>
								</table>
								<br>
								</td>
							</tr>
							<tr>
								<td colspan="2"><img src="images/property-heading.jpg" alt="Property Heading" width="269" height="25"></td>
							</tr>
							<tr>
								<td colspan="2" class="darkgray"></form><form method="get" action="setcookie.php" name="propselector">
								<table cellpadding=0 cellspacing=2 border=0>
									<tr>
<?php
if ((isset($_COOKIE["vs-property"]) && $_COOKIE["vs-property"])&&($_COOKIE["vs-city"])&&(isset($_COOKIE["vs-state"]) && $_COOKIE["vs-state"])) {
?>
<!--start cookies set-->
										<td class="darkgray" width="5"><img src="images/spacer.gif" alt="" height="1" width="5"></td>
										<td class="darkgray">
										Your current property is set to
										<i><?php echo $_COOKIE["vs-propertyname"] . "." ?></i><br>
										<br>
										<a href="products/">View</a> available information for your property.
										If you would like, you can <a href="newlocation.php">change</a> your location.
										</td>
<!--end cookies set-->
<?php
} else {
?>
<!--start cookies not set-->
										<td class="darkgray" align="right">
										<b>1.</b> Select State:
										</td>
										<td><select name="state" onChange="updateCities()" class="select"><?php echo $stateSelector; ?></select></td>
									</tr>
									<tr>
										<td class="darkgray" align="right">
										<b>2.</b> Select City:
										</td>
										<td><select name="city" onChange="updateProperties()" class="select"><?php echo $citySelector; ?></select></td>
									</tr>
									<tr>
										<td class="darkgray" align="right">
										<b>3.</b> Select Property:
										</td>
										<td><select name="property" onChange="document.propselector.submit()" class="select"><?php echo $propSelector; ?></select></td>
									</tr>
<!--end cookies not set-->
<?php
}
?>
								</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" height="20" width="1"><img src="images/spacer.gif" alt="" height="20" width="1"></td>
							</tr>
							<tr>
								<td colspan="2">
								<table cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td height="2"><img src="images/spacer.gif" alt="" height="2" width="1"></td>
									</tr>
									<tr>
										<td colspan="2" height="102" width="259" bgcolor="#CCCCCC"><table cellpadding="0" cellspacing="1" border="0" height="102" width="259">
											<tr>
                                    			<td width="250" height="120" bgcolor="#CCCCCC">
												
												<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="250" height="120">
												<param name="movie" value="120703.swf">
												<param name="quality" value="high">
												<embed src="120703.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="250" height="120"></embed></object>
												</td>
											</tr>
										</table></td>
										<td width="3"><img src="images/spacer.gif" alt="" height="1" width="3"></td>
									</tr>
								</table>
								</td>
							</tr>

							
						</table>
						</td>
						<!--End Mid-Right-->
					</tr>
					<tr>
						<td colspan="3" width="730" height="7"><img src="images/foot-line.gif" width="730" height="7" border="0"></td>
					</tr>
					<tr>
						<td colspan="3" class="gray">
						<table cellpadding=0 cellspacing=0 border=0 width="730">
							<tr>
								<td class="gray">
								&nbsp;&nbsp;&copy;
								Copyright 2003 Vision Systems. All Rights Reserved.
								</td>
								<td align="right" class="gray">
								&nbsp;&nbsp;<!--Space off edge-->
								</td>
							</tr>
						</table>
						</td>
					</tr>
					<tr><td><br><br><br></td></tr>
				</table>
				</td>
				<td width="9" background="images/bgshadow-right.gif"></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</form>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2774960-1";
urchinTracker();
</script>

</body>
</html>
