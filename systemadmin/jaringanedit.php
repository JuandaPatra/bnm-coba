<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Jaringan",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from jaringan where jaringan_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$network = stripslashes($row["network"]);
		$branch = stripslashes($row["branch"]);
		$region_id = $row['region_id'];
		$alamat = stripslashes($row["alamat"]);
		$kelurahan = stripslashes($row["kelurahan"]);
		$kecamatan = stripslashes($row["kecamatan"]);
		$kota = stripslashes($row["kota"]);
		$kodepos = stripslashes($row["kodepos"]);
		$provinsi = $row['provinsi_id'];
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
		document.frm.action = 'jaringanact.php';
		document.frm.submit();
	}
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
<body onload="document.frm.network.focus()">
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
								<a class="toolbar" href="jaringanlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
									<td width="22%">&nbsp;<b>Network ID</b></td>
									<td width="78%">
										<input type="text" name="network" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $network; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Branch</b></td>
									<td width="78%">
										<input type="text" name="branch" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $branch; ?>">
									</td>

								</tr>
                <tr class="row1">
                  <td>&nbsp;<b>Region</b></td>
                  <td>
                    <select name="region" class="inputtext">
                      <option value="">Select one</option>
                      <?php
                      $ors = $mainlib->dbquery("select * from region",$mainlib->ocn);
                      while($row = $mainlib->dbfetcharray($ors)){
                        echo '<option value="'.$row["region_id"].'" ';
                        if($region_id==$row["region_id"]){
                          echo 'selected';
                        }
                        echo '>'.$row["region_name"].'</option>';
                      }
                      mysql_free_result($ors);
                      ?>
                    </select>
                  </td>
                </tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Alamat</b></td>
									<td width="78%">
										<input type="text" name="alamat" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $alamat; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Kelurahan</b></td>
									<td width="78%">
										<input type="text" name="kelurahan" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $kelurahan; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Kecamatan</b></td>
									<td width="78%">
										<input type="text" name="kecamatan" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $kecamatan; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Kota</b></td>
									<td width="78%">
										<input type="text" name="kota" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $kota; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Kode Pos</b></td>
									<td width="78%">
										<input type="text" name="kodepos" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $kodepos; ?>">
									</td>

								</tr>
                                <tr class="row1">
                  <td>&nbsp;<b>Provinsi</b></td>
                  <td>
                    <select name="provinsi" class="inputtext">
                      <option value="">Select one</option>
                      <?php
                      $ors = $mainlib->dbquery("select * from provinsi",$mainlib->ocn);
                      while($row = $mainlib->dbfetcharray($ors)){
                        echo '<option value="'.$row["provinsi_id"].'" ';
                        if($provinsi_id==$row["provinsi_id"]){
                          echo 'selected';
                        }
                        echo '>'.$row["provinsi_name"].'</option>';
                      }
                      mysql_free_result($ors);
                      ?>
                    </select>
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