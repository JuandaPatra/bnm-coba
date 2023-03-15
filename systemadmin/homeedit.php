<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
admsessionchk();
$mainlib = new mainlib();
$mainlib->opendb();
$mainlib->permissionchk($_SESSION["admurl"],$_SERVER['PHP_SELF']);
$listtitle = $mainlib->getpagetitle($_SERVER['PHP_SELF'],$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from frontpage where frontpage_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$item_title = htmlentities(stripslashes($row["item_title"]));
		$item_description = stripslashes($row["item_description"]);
		$item_image = stripslashes($row["item_image"]);
		$item_url = stripslashes($row["item_url"]);
	}
	mysql_free_result($ors);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo APP_TITLE; ?></title>
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<script type="text/javascript" src="../inc/jquery-1.3.2.min.js"></script>
<script language="javascript">
<?php
include("../inc/jscript.inc.php");
?>

function validateForm()
{
	with(document.frm){
		if(isBlank(txtItemTitle,'Entry required in TITLE field!')) return false;
		if(isBlank(txtItemDescription,'Entry required in DESCRIPTION field!')) return false;
		if(flUpload.value != ''){
			if(flUpload.value.toLowerCase().indexOf(".jpg")<=-1 && flUpload.value.toLowerCase().indexOf(".gif")<=-1 && flUpload.value.toLowerCase().indexOf(".png")<=-1){
				alert('You can upload JPG or GIF or PNG format');
				return false;
			}
		}
	}
	return true;
}

function saveData(){
	if(validateForm()){
		document.frm.action = 'homeact.php';
		document.frm.submit();
	}
}

function DelImage()
{
	$.ajax({
		type: "POST",
		data: 'id=' + <?php echo $id; ?> + '&db=frontpage',
		url: 'delete_image.php',
		success: function(msg){
			if(msg != ''){
				$('#'+msg).remove();
			}
		}
	});
}
</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.txtItemTitle.focus()">
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
								<a class="toolbar" href="homelist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
									<td width="22%">&nbsp;<b>Title</b></td>
									<td width="78%">
										<input type="text" name="txtItemTitle" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $item_title; ?>">
									</td>
								</tr>
                <tr class="row1">
                	<td valign="top" style="padding-top:8px">&nbsp;<b>Description</b></td>
                  <td>
                  	<textarea name="txtItemDescription" style="width:500px;height:70px"><?php echo $item_description; ?></textarea>
                  </td>
                </tr>
								<tr class="row0">
									<td>&nbsp;<b>URL</b></td>
									<td>
										<input type="text" name="txtItemUrl" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $item_url; ?>">
									</td>
								</tr>
								<tr class="row1">
									<td valign="top" style="padding-top:8px">&nbsp;<b>Image</b></td>
									<td>
										<div>
                    	<input type="file" name="flUpload" />
                    </div>
                    <div id="<?php echo $id; ?>" style="padding-top:5px">
                    	<?php if($item_image != "") { ?>
                    	<img src="../<?php echo $item_image; ?>" border="0" alt="" /><br />
                      <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>
                      <?php } ?>
										</div>
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