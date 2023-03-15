<?php
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo APP_TITLE; ?></title>
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="height:100%">
<tr>
	<td valign="top">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td valign="top">
				<?php include("header.inc.php"); ?>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="2%">&nbsp;</td>
					<td valign="top" align="left" width="50%"><br>
						<h3>Hi, <?php echo $_SESSION["admfullname"]; ?>! Welcome to <?php echo APP_TITLE; ?>.</h3>
						<table cellpadding="0" cellspacing="0">
						<tr>
							<td>
								
							</td>
						</tr>
						</table>
					</td>
					<td width="48%">&nbsp;</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
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