<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Awards",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from award where award_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$tahun = $row["tahun"];
		$bulan = $row["bulan"];
		$judul = stripslashes($row["judul"]);
		$tempat = stripslashes($row["tempat"]);
		$waktu = $row["waktu"];
		$penghargaan = stripslashes($row["penghargaan"]);
		$penyelenggara = stripslashes($row["penyelenggara"]);
		$image_small = $row['image_small'];
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
        document_base_url : "http://localhost/danatel/",

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
		/*if(isBlank(category,'Entry required in Category field!')) return false;
      	if(isBlank(name_id,'Entry required in Product Name ID field!')) return false;
		if(isBlank(name_en,'Entry required in Product Name EN field!')) return false;*/
	}
	return true;
}

function saveData(){
	//updateRTEs();
	if(validateForm()){
		document.frm.action = 'awardact.php';
		document.frm.submit();
	}
}

function DelImage()
{
  $.ajax({
    type: "POST",
    data: 'id=' + <?php echo $id; ?> + '&db=news',
    url: 'delete_image.php',
    success: function(msg){
      if(msg != ''){
        $('#'+msg).remove();
        location.href = "newsedit.php?id=<?php echo $id; ?>";
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
<body>
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
								<a class="toolbar" href="awardlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
									<td width="22%">&nbsp;<b>Tahun</b></td>
									<td width="78%">
                                    	<select name="tahun">
                                        	<option value="">Select One</option>
                                    	<?php
										for($i=2000;$i<=2020;$i++){
										?>
											<option value="<?php echo $i; ?>" <?php if($tahun ==  $i){ echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
                                        <?php
										}
										?>
                                        </select>
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Bulan</b></td>
									<td width="78%">
                                    	<select name="bulan">
                                        	<option value="">Select One</option>
                                    	<?php
										for($i=1;$i<=12;$i++){
										?>
											<option value="<?php echo $i; ?>" <?php if($bulan ==  $i){ echo 'selected="selected"'; } ?>>
												<?php
												switch($i){
													case 1:
														echo "Jan";
														break;
													case 2:
														echo "Feb";
														break;
													case 3:
														echo "Mar";
														break;
													case 4:
														echo "Apr";
														break;
													case 5:
														echo "Mei";
														break;
													case 6:
														echo "Jun";
														break;
													case 7:
														echo "Jul";
														break;
													case 8:
														echo "Agu";
														break;
													case 9:
														echo "Sep";
														break;
													case 10:
														echo "Okt";
														break;
													case 11:
														echo "Nov";
														break;
													case 12:
														echo "Des";
														break;
												}
												?>
                                            </option>
                                        <?php
										}
										?>
                                        </select>
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Judul</b></td>
									<td width="78%">
										<input type="text" name="judul" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $judul; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Tempat</b></td>
									<td width="78%">
										<input type="text" name="tempat" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $tempat; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Waktu</b></td>
									<td width="78%">
										<input type="text" name="waktu" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $waktu; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Penghargaan</b></td>
									<td width="78%">
										<input type="text" name="penghargaan" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $penghargaan; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Penyelenggara</b></td>
									<td width="78%">
										<input type="text" name="penyelenggara" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $penyelenggara; ?>">
									</td>

								</tr>
                                <tr class="row4">
                  <td valign="top" style="padding-top:8px">&nbsp;<b>Image Small</b></td>
                  <td>
                    <div>
                    <?php
                    if($image_small != "")
                    {
                      ?>
                      <div id="<?php echo $id; ?>" style="padding-top:5px">
                                            <?php if($image_small != "") { ?>
                                            <img src="../<?php echo str_replace("_large","",$image_small); ?>" border="0" alt="" /><br />
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
                                            <?php if($image_small != "") { ?>
                                            <img src="../<?php echo str_replace("_large","",$image_small); ?>" border="0" alt="" /><br />
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