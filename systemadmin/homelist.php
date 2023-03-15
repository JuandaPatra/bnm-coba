<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
admsessionchk();
$mainlib = new mainlib();
$mainlib->opendb();
$mainlib->permissionchk($_SESSION["admurl"],$_SERVER['PHP_SELF']);

$idcol = "frontpage_id";
$listtitle = $mainlib->getpagetitle($_SERVER['PHP_SELF'],$mainlib->ocn);
$listeditpage = "homeedit.php";
$listactionpage = "homeact.php";

$arcolcaption = array("Title","Description","Date","URL","Publish");
$arcolname = array("item_title","item_description","date_created","item_url","is_publish|boolean");
$arcolwidth = array("20%","30%","13%","17%","10%");

$initsortcol = "item_title"; //When the list is first time opened, the sort order column will be $initsortcol
$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)

$arfiltercolcaption = array("Title","Description");
$arfiltercolname = array("item_title","item_description");

$sql = "select * from frontpage";
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
		<form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
						<table cellpadding="0" cellspacing="5" border="0" id="toolbar" height="48">
						<tr valign="middle" align="center">&nbsp;
            	<!--
							<td>
								<a class="toolbar" href="javascript:delSelectedRows();"><img src="images/delete_f2.png" alt="Delete" align="middle" border="0"><br>Delete</a>
							</td>
							<td>
								<a class="toolbar" href="#"><img src="images/new_f2.png" alt="Add New User" align="middle" border="0"><br>New</a>
							</td>
              -->
						</tr>
						</table>
					</td>
				</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td valign="top" align="center">
						<table border="0" cellpadding="15" cellspacing="0" width="100%">
						<tr>
							<td valign="top" align="left">
								<?php
								include("../inc/listformbase.inc.php");
								?>
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