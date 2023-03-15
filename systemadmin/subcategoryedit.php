<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Sub Category",$mainlib->ocn);

if(isset($_REQUEST["id"]))
{
	$id = $_REQUEST["id"];
	$act = "edit";
}else{
	$id = "";
	$act = "add";
}

if(trim($id)!="")
{
	$ors = $mainlib->dbquery("select s.*, c.* from subcategory s, category c where s.category_id = c.category_id and subcategory_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$subcategory_name_id = stripslashes($row["subcategory_name_id"]);
		$subcategory_name_en = stripslashes($row["subcategory_name_en"]);
		$category_id = $row['category_id'];
	}
	mysql_free_result($ors);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo APP_TITLE; ?></title>
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<link rel='stylesheet' type='text/css' media='all' href='../inc/calendar-win2k-cold-1.css' title='win2k-cold-1'>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar.js"></script>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar-en.js"></script>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar-setup.js"></script>
<script type="text/javascript" src="../inc/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="lang/en.js"></script>
<script type="text/javascript" src="../inc/richtext_compressed.js"></script>
<script type="text/javascript" src="../inc/xhtml.js"></script>
<script language="javascript">
<?php
include("../inc/jscript.inc.php");
?>

function validateForm()
{
	with(document.frm){
		if(isBlank(category,'Entry required in Category field!')) return false;
		if(isBlank(subcategory_id,'Entry required in Sub Category EN field!')) return false;
		if(isBlank(subcategory_en,'Entry required in Sub Category FR field!')) return false;
	}
	return true;
}

function saveData(){
	if(validateForm()){
		document.frm.action = 'subcategoryact.php';
		document.frm.submit();
	}
}
</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.subcategory.focus()">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="height:100%">
<tr>
	<td valign="top">
		<form name="frm" method="post" enctype="multipart/form-data">
		<input type="hidden" name="act" value="<?php echo $act; ?>">
		<input type="hidden" name="hidID" value="<?php echo $id; ?>">
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
								<a class="toolbar" href="subcategorylist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
                                <tr class="row1">
									<td>&nbsp;<b>Category</b></td>
									<td>
										<select name="category" class="inputtext">
											<option value="">Select one</option>
											<?php
											$ors = $mainlib->dbquery("select * from category where category_id <> 1",$mainlib->ocn);
											while($row = $mainlib->dbfetcharray($ors)){
												echo '<option value="'.$row["category_id"].'" ';
												if($category_id==$row["category_id"]){
													echo 'selected';
												}
												echo '>'.$row["category_name_id"].'</option>';
											}
											mysql_free_result($ors);
											?>
										</select>
									</td>
								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Sub Category ID</b></td>
									<td width="78%">
										<input type="text" name="subcategory_id" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $subcategory_name_id; ?>">
									</td>
								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Sub Category EN</b></td>
									<td width="78%">
										<input type="text" name="subcategory_en" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $subcategory_name_en; ?>">
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