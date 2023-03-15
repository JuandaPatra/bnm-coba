<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Edit My Account",$mainlib->ocn);

$act = "edit";
$id = $_SESSION["admusername"];
if(trim($id)!="")
{
	$ors = $mainlib->dbquery("select * from administrator where UserName='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$username = stripslashes($row["UserName"]);
		$fullname = stripslashes($row["FullName"]);
		$password = trim($row["Password"]);
		$email = $row["Email"];
	}
	mysql_free_result($ors);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo APP_TITLE; ?></title>
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<script language="javascript">
<?php
include("../inc/jscript.inc.php");
?>

function splitEmail(EmailAddr){
	var EmailSplit;
	var re = /;/g;
	EmailAddr = EmailAddr.replace(re,",");
	re2 = /\s/g;
	EmailAddr = EmailAddr.replace(re2,"");
	EmailSplit = EmailAddr.split(",");
	return(EmailSplit);
}

function validateForm()
{
	with(document.frm){
		if(isBlank(txtUserName,'Entry required in USERNAME field!')) return false;
		if(isBlank(txtFullName,'Entry required in FULL NAME field!')) return false;
		if(isBlank(txtPassword,'Entry required in PASSWORD field!')) return false;
		if(txtPassword.value!=txtPassword2.value)
		{
			txtPassword.value = '';
			txtPassword2.value = '';
			txtPassword.focus();
			alert('Password verification error');
			return false;
		}
		if(isBlank(txtEmail,'Entry required in EMAIL field!')) return false;
		for (i = 0; i < splitEmail(document.frm.txtEmail.value).length; i++)
		{
			if(trim(splitEmail(document.frm.txtEmail.value)[i])!='')
			{
				if(!isEmailAddressValid(trim(splitEmail(document.frm.txtEmail.value)[i])))
				{
					alert(trim(splitEmail(document.frm.txtEmail.value)[i])+' is invalid EMAIL ADDRESS format');
					txtEmail.focus();
					return false;
				}
			}
		}
	}
	return true;
}

function saveData(){
	if(validateForm()){
		document.frm.action = 'admaccountact.php';
		document.frm.submit();
	}
}

function resetData(){
	document.frm.reset();
	document.frm.txtUserName.focus();
}
</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.txtUserName.focus()">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="height:100%">
<tr>
	<td valign="top">
		<form name="frm" method="post">
		<input type="hidden" name="act" value="<?php echo $act; ?>">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td valign="top">
				<?php include("header.inc.php"); ?>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="menubar">
				<tr>
					<td class="menudottedline" align="right">
						<table cellpadding="0" cellspacing="5" border="0" id="toolbar">
						<tr valign="middle" align="center">
							<td>
								<a class="toolbar" href="javascript:saveData();"><img src="images/save_f2.png" alt="Save" border="0"><br>Save</a>
							</td>
							<td>
								<a class="toolbar" href="javascript:resetData();"><img src="images/reload_f2.png" alt="Reset" border="0"><br>Reset</a>
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="15">
				<tr>
					<td valign="top">
						<table cellpadding="0" cellspacing="0" width="100%" class="adminheading">
						<tr>
							<td><?php echo $listtitle; ?></td>
						</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="adminform">
						<tr>
							<td valign="top" align="center">
								<table cellpadding="0" cellspacing="0" border="0" width="100%" class="adminlist">
								<tr class="row0">
									<td width="15%">&nbsp;<b>Username</b></td>
									<td width="85%">
										<input type="text" name="txtUserName" class="inputtext" maxlength="20" style="width:150px" value="<?php echo $username; ?>" readonly>
									</td>
								</tr>
								<tr class="row1">
									<td>&nbsp;<b>Full Name</b></td>
									<td>
										<input type="text" name="txtFullName" class="inputtext" maxlength="100" style="width:250px" value="<?php echo $fullname; ?>">
									</td>
								</tr>
								<tr class="row0">
									<td>&nbsp;<b>Password</b></td>
									<td>
										<input type="password" name="txtPassword" class="inputtext" maxlength="20" style="width:150px" value="<?php echo $password; ?>">
									</td>
								</tr>
								<tr class="row1">
									<td>&nbsp;<b>Retype Password</b></td>
									<td>
										<input type="password" name="txtPassword2" class="inputtext" maxlength="20" style="width:150px" value="<?php echo $password; ?>">
									</td>
								</tr>
								<tr class="row0">
									<td valign="top" style="line-height:22px">&nbsp;<b>Email&nbsp;Address</b></td>
									<td><i>please separate email addresses by comma ( , ) or semicolon ( ; )</i><br>
										<input type="text" name="txtEmail" class="inputtext" maxlength="255" style="width:450px" value="<?php echo $email; ?>">
									</td>
								</tr>
								</table>
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		</form>
	</td>
</tr>
<tr>
	<td valign="bottom">
		<?php include("bottom.inc.php"); ?>
	</td>
</tr>
</table>
</body>
</html>
<?php
$mainlib->closedb();
?>