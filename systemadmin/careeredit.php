<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Career",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from career where career_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$posting_date = $row['posting_date'];
		$expired_date = $row['expired_date'];
		$amount = $row['amount'];
		$code = $row["code"];
		$title_id = stripslashes($row["title_id"]);
		$title_en = stripslashes($row["title_en"]);
		$description_id = stripslashes($row["description_id"]);
		$description_en = stripslashes($row["description_en"]);
		$category = $row['category'];
		$lokasi = $row['lokasi'];
		$file_attach = $row['file_attach'];
	}
	mysql_free_result($ors);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo APP_TITLE; ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<link rel='stylesheet' type='text/css' media='all' href='../inc/calendar-win2k-cold-1.css' title='win2k-cold-1'>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar.js"></script>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar-en.js"></script>
<script language="JavaScript" type="text/JavaScript" src="../inc/calendar-setup.js"></script>
<script type="text/javascript" src="../inc/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

		relative_urls : false,
        remove_script_host : false,
        document_base_url : "http://localhost/sbb/",

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "tinymce/css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
<script language="javascript">
<?php
include("../inc/jscript.inc.php");
?>

function validateForm()
{
	with(document.frm){
		if(isBlank(code,'Entry required in Code field!')) return false;
		if(isBlank(posting_date,'Entry required in Posting Date field!')) return false;
		if(isBlank(expired_date,'Entry required in Expired Date field!')) return false;
    	if(isBlank(title_id,'Entry required in Title ID field!')) return false;
		//if(isBlank(category,'Entry required in Category field!')) return false;
	}
	return true;
}

function saveData(){
	//updateRTEs();
	if(validateForm()){
		document.frm.action = 'careeract.php';
		document.frm.submit();
	}
}

function DelFile()
{
	$.ajax({
		type: "POST",
		data: 'id=' + <?php echo $id; ?> + '&db=career',
		url: 'delete_image.php',
		success: function(msg){
			if(msg != ''){
				$('#'+msg).remove();
				location.href = "careeredit.php?id=<?php echo $id; ?>";
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
								<a class="toolbar" href="careerlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
                  <input name='posting_date' id='posting_date' value="<?php echo $posting_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date1'>
<script type='text/javascript'>Calendar.setup({inputField : 'posting_date',  ifFormat : 'y-mm-dd',button : 'calender_date1',align  : '',singleClick : true});</script>
                  </td>
                </tr>

                <tr class="row0">
									<td width="22%">&nbsp;<b>Lokasi</b></td>
									<td width="78%">
										<input type="text" name="lokasi" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $lokasi; ?>">
									</td>

								</tr>

                <tr class="row0">
                  <td width="22%">&nbsp;<b>Expired Date</b></td>
                  <td width="78%">
                  <input name='expired_date' id='expired_date' value="<?php echo $expired_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date2'>
<script type='text/javascript'>Calendar.setup({inputField : 'expired_date',  ifFormat : 'y-mm-dd',button : 'calender_date2',align  : '',singleClick : true});</script>
                  </td>
                </tr>
                	<tr class="row0">
									<td width="22%">&nbsp;<b>Code</b></td>
									<td width="78%">
										<input type="text" name="code" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $code; ?>">
									</td>

								</tr>

                                <tr class="row0">
									<td width="22%">&nbsp;<b>Title ID</b></td>
									<td width="78%">
										<input type="text" name="title_id" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title_id; ?>">
									</td>

								</tr>
                                <!--<tr class="row0">
									<td width="22%">&nbsp;<b>Title EN</b></td>
									<td width="78%">
										<input type="text" name="title_en" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title_en; ?>">
									</td>

								</tr>-->
                                <tr class="row1">
									<td width="22%">&nbsp;<b>Requirement ID</b></td>
									<td width="78%">
                                        <textarea name="description_id" style="width:630px; height:500px; "><?php echo $description_id; ?></textarea>
									</td>
								</tr>
								<!--
                                <tr class="row1">
									<td width="22%">&nbsp;<b>Requirement EN</b></td>
									<td width="78%">
                                        <textarea name="description_en" style="width:630px; height:500px; "><?php echo $description_en; ?></textarea>
									</td>
								</tr>-->
                                <!--<tr class="row0">
									<td width="22%">&nbsp;<b>Amount of Vacancy</b></td>
									<td width="78%">
										<input type="text" name="amount" class="inputtext" maxlength="255" style="width:100px" value="<?php echo $amount; ?>">
									</td>

								</tr>-->
                                <!--<tr class="row0">
									<td width="22%">&nbsp;<b>Location</b></td>
									<td width="78%">
                                    	<select name="category">
                                        	<option value="">Select One</option>
                                        	<option value="Nasional" <?php if($category == "Nasional"){ echo 'selected="selected"'; } ?>>Nasional</option>
											<option value="Kantor Pusat - Jakarta" <?php if($category == "Kantor Pusat - Jakarta"){ echo 'selected="selected"'; } ?>>Kantor Pusat - Jakarta</option>
                                            <option value="Jabodetabekser" <?php if($category == "Jabodetabekser"){ echo 'selected="selected"'; } ?>>Jabodetabekser</option>
                                            <option value="Jabar" <?php if($category == "Jabar"){ echo 'selected="selected"'; } ?>>Jawa Barat</option>
                                            <option value="Jateng" <?php if($category == "Jateng"){ echo 'selected="selected"'; } ?>>Jawa Tengah</option>
                                            <option value="Jatim" <?php if($category == "Jatim"){ echo 'selected="selected"'; } ?>>Jawa Timur</option>
                                            <option value="Sumatera Bagian Utara" <?php if($category == "Sumatera Bagian Utara"){ echo 'selected="selected"'; } ?>>Sumetera Bagian Utara</option>
                                            <option value="Sumatera Bagian Selatan" <?php if($category == "Sumatera Bagian Selatan"){ echo 'selected="selected"'; } ?>>Sumetera Bagian Selatan</option>
                                            <option value="Bali dan Nusa Tenggara" <?php if($category == "Bali dan Nusa Tenggara"){ echo 'selected="selected"'; } ?>>Bali dan Nusa Tenggara</option>
                                            <option value="Kalimantan" <?php if($category == "Kalimantan"){ echo 'selected="selected"'; } ?>>Kalimantan</option>
                                            <option value="Sulawesi dan Papua" <?php if($category == "Sulawesi dan Papua"){ echo 'selected="selected"'; } ?>>Sulawesi dan Papua</option>
                                        </select>
									</td>

								</tr>-->
                                <tr class="row4">
									<td valign="top" style="padding-top:8px">&nbsp;<b>File Attach</b></td>
									<td>
										<div>
                    <?php
                    if($file_attach != "")
                    {
                      ?>
                      <div id="<?php echo $id; ?>" style="padding-top:5px">
                                            <?php if($file_attach != "") { ?>
                                            <?php echo $file_attach; ?><br />
                                          <a href="javascript:void(0)" onclick="DelFile()">delete this file</a>
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
                                            <?php if($file_attach != "") { ?>
                                            <?php echo $file_attach; ?><br />
                                          <a href="javascript:void(0)" onclick="DelFile()">delete this file</a>
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