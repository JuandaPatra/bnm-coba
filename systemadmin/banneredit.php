<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Banner",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from banner where banner_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
    $posting_date = $row['posting_date'];
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$title = stripslashes($row['title']);
		$file_banner = $row["file_banner"];
    $url = $row["url"];
	$position = $row["position"];
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
    if(isBlank(posting_date,'Entry required in Posting Date field!')) return false;
		if(isBlank(start_date,'Entry required in Start Date field!')) return false;
		if(isBlank(end_date,'Entry required in End Date field!')) return false;
    if(isBlank(url,'Entry required in URL field!')) return false;
		<?php
    if($file_banner == "")
    {
      ?>
      if(isBlank(flUpload,'Entry required in File Banner field!')) return false;
      if(flUpload.value != ''){
        if(flUpload.value.toLowerCase().indexOf(".jpg")<=-1 && flUpload.value.toLowerCase().indexOf(".gif")<=-1 && flUpload.value.toLowerCase().indexOf(".png")<=-1 && flUpload.value.toLowerCase().indexOf(".swf")<=-1){
          alert('You can upload JPG or GIF or PNG or SWF format');
          return false;
        }
      }
      <?php
    }
    ?>
	}
	return true;
}

function saveData(){
	//updateRTEs();
	if(validateForm()){
		document.frm.action = 'banneract.php';
		document.frm.submit();
	}
}

function DelImage()
{
	$.ajax({
		type: "POST",
		data: 'id=' + <?php echo $id; ?> + '&db=banner',
		url: 'delete_image.php',
		success: function(msg){
			if(msg != ''){
				$('#'+msg).remove();
				location.href = "banneredit.php?id=<?php echo $id; ?>";
			}
		}
	});
}

/*function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	updateRTEs();
	//alert("rte1 = " + document.getElementById('rte1').value);
	document.addWedding.submit();
	//change the following line to true to submit form
	return false;
}*/
//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML)
//initRTE("editorimages/", "rich/", "", true);

// Optional javascript rteSafe function
// var SAFE_CONTENT = rteSafe(YOUR_CONTENT);
// writeRichText('rte1', SAFE_CONTENT, '', 500, 150, true, false, false);
</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.posting_date.focus()">
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
								<a class="toolbar" href="bannerlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
                  <td width="22%">&nbsp;<b>Posting Date</b></td>
                  <td width="78%">
                  <input name='posting_date' id='posting_date' value="<?php echo $posting_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date'>
<script type='text/javascript'>Calendar.setup({inputField : 'posting_date',  ifFormat : 'y-mm-dd',button : 'calender_date',align  : '',singleClick : true});</script>
                  </td>
                </tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Start Date</b></td>
									<td width="78%">
									<input name='start_date' id='start_date' value="<?php echo $start_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date1'>
<script type='text/javascript'>Calendar.setup({inputField : 'start_date',	ifFormat : 'y-mm-dd',button : 'calender_date1',align  : '',singleClick : true});</script>
									</td>
								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>End Date</b></td>
									<td width="78%">
									<input name='end_date' id='end_date' value="<?php echo $end_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date2'>
<script type='text/javascript'>Calendar.setup({inputField : 'end_date',	ifFormat : 'y-mm-dd',button : 'calender_date2',align  : '',singleClick : true});</script>
									</td>
								</tr>
                                <tr class="row0">
                  <td width="22%">&nbsp;<b>Title</b></td>
                  <td width="78%">
                    <input type="text" name="title" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title; ?>">
                  </td>
                </tr>
                <tr class="row0">
                  <td width="22%">&nbsp;<b>URL</b></td>
                  <td width="78%">
                    <?php 
                    if($url == ""){
                      ?>
                      <input type="text" name="url" class="inputtext" maxlength="255" style="width:500px" value="http://">
                      <?php
                    }else{
                      ?>
                      <input type="text" name="url" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $url; ?>">
                      <?php
                    }
                    ?>
                  </td>
                </tr>
                <input type="hidden" name="position" class="inputtext" maxlength="255" style="width:500px" value="">
								<tr class="row4">
									<td valign="top" style="padding-top:8px">&nbsp;<b>File Banner</b></td>
									<td>
										<div>
                    <?php
                    if($file_banner != "")
                    {
                      ?>
                      <div id="<?php echo $id; ?>" style="padding-top:5px">
                                            <?php if($file_banner != "") { ?>
                                            <img src="../<?php echo $file_banner; ?>" border="0" alt="" /><br />
                                          <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>
                                          <?php } ?>
                      </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <input type="file" name="flUpload" />
                                        </div>
                                        <div id="<?php echo $id; ?>" style="padding-top:5px">
                                            <?php if($file_banner != "") { ?>
                                            <img src="../<?php echo $file_banner; ?>" border="0" alt="" /><br />
                                          <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>
                                          <?php } ?>
                      </div>
                      <?php
                    }
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