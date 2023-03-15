<?php
include("../inc/class.mainlib.inc.php");
admsessions();
if(isset($_SESSION["admusername"])){
	header("Location: main.php");
	exit;
}
$msg = $_REQUEST["msg"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Login Now - <?php echo APP_TITLE; ?></title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body onload="document.frm.txtUserName.focus();">
<table cellpadding="0" cellspacing="0" width="100%" style="height:100%">
<tr>
    <td align="center" valign="middle">
        <div class="login">
            <div class="login-form">
                <span style="color:#ffffff;font-size:18px">LOGIN</span>&nbsp;&nbsp; <span style="color:#fc9898;font-size:7pt"><?php echo $msg; ?></span>
								<form name="frm" method="post" action="loginact.php">
                <div class="form-block">
                    <div class="inputlabel">Username</div>
                    <div><input type="text" name="txtUserName" class="inputbox" maxlength="20" style="width:150px"></div>
                    <div class="inputlabel">Password</div>
                    <div><input type="password" name="txtPassword" class="inputbox" maxlength="20" style="width:150px"></div>
                    <div align="left"><input type="submit" class="button" value="Login"></div>
                </div>
								</form>
            </div>
            <div class="login-text">
                <div class="ctr"><img src="images/security.png" width="64" height="64" alt="security" style="border:2px solid #ffffff" /></div>
                <p>Welcome to <?php echo APP_TITLE; ?>!</p>
                <p>Use a valid username and password to gain access to the administration console.</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="footer" align="center">
            <noscript>
                Warning! Javascript must be enabled for proper operation of the Administrator
            </noscript><br>
            <?php echo APP_COPYRIGHT; ?>
        </div>
    </td>
</tr>
<tr><td height="150">&nbsp;</td></tr>
</table>
</body>
</html>