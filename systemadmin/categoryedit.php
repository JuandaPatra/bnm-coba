<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Category",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from category where category_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$sort = $row['sort'];
		$category_name_id = htmlentities(stripslashes($row["category_name_id"]));
		$category_name_en = htmlentities(stripslashes($row["category_name_en"]));
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
		//if(isBlank(postingdate,'Entry required in Posting Date field!')) return false;
		if(isBlank(txtCategory_id,'Entry required in Category EN field!')) return false;
		if(isBlank(txtCategory_en,'Entry required in Category FR field!')) return false;
	}
	return true;
}

function saveData(){
	if(validateForm()){
		document.frm.action = 'categoryact.php';
		document.frm.submit();
	}
}
</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.txtTitle.focus()">
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
								<a class="toolbar" href="categorylist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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

									<td width="22%">&nbsp;<b>Sort</b></td>

									<td width="78%">

									<select name="sort">

                                    	<option value=""></option>

                                        <option value="1" <?php if($sort == 1){ echo 'selected="selected"'; } ?>>1</option>
                                        <option value="2" <?php if($sort == 2){ echo 'selected="selected"'; } ?>>2</option>
                                        <option value="3" <?php if($sort == 3){ echo 'selected="selected"'; } ?>>3</option>
                                        <option value="4" <?php if($sort == 4){ echo 'selected="selected"'; } ?>>4</option>
                                        <option value="5" <?php if($sort == 5){ echo 'selected="selected"'; } ?>>5</option>
                                        <option value="6" <?php if($sort == 6){ echo 'selected="selected"'; } ?>>6</option>
                                        <option value="6" <?php if($sort == 7){ echo 'selected="selected"'; } ?>>7</option>

                                        

                                    </select>

									</td>

								</tr>

                                <tr class="row0">
									<td width="22%">&nbsp;<b>Category ID</b></td>
									<td width="78%">
										<input type="text" name="txtCategory_id" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $category_name_id; ?>">
									</td>
								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Category EN</b></td>
									<td width="78%">
										<input type="text" name="txtCategory_en" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $category_name_en; ?>">
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