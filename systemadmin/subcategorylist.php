<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();

$idcol = "subcategory_id";
$listtitle = $mainlib->getpagetitle("Sub Category",$mainlib->ocn);
$listeditpage = "subcategoryedit.php";
$listactionpage = "subcategoryact.php";

$arcolcaption = array("ID","Sub Category","Category");
$arcolname = array("subcategory_id","subcategory_name_id","category_name_id");
$arcolwidth = array("2%","20%","10%");

$initsortcol = "subcategory_id"; //When the list is first time opened, the sort order column will be $initsortcol
$initsortcolascending = false; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)

$arfiltercolcaption = array("ID","Sub Category","Category");
$arfiltercolname = array("subcategory_id","subcategory_name_id","category_name_id");

$sql = "select s.*, c.* from subcategory s, category c where s.category_id = c.category_id and subcategory_id <> 1";
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
						<table cellpadding="0" cellspacing="5" border="0" id="toolbar">
						<tr valign="middle" align="center">
							<td>
								<a class="toolbar" href="javascript:delSelectedRows();"><img src="images/delete_f2.png" alt="Delete" align="middle" border="0"><br>Delete</a>
							</td>
							<td>
								<a class="toolbar" href="<?php echo $listeditpage; ?>"><img src="images/new_f2.png" alt="Add New Gallery" align="middle" border="0"><br>New</a>
							</td>
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