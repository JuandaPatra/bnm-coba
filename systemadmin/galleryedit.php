<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Gallery",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from gallery where gallery_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$posting_date = $row['posting_date'];
		$header = stripslashes($row["header"]);
		$description = stripslashes($row["description"]);
		$image_small = stripslashes($row["image_small"]);
		$caption_small = stripslashes($row["caption_small"]);
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
<!--<script type="text/javascript" src="../inc/richtext_compressed.js"></script>-->
<!--<script type="text/javascript" src="../inc/xhtml.js"></script>-->

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

        document_base_url : "http://localhost/logica/",



        // Skin options

        skin : "o2k7",

        skin_variant : "silver",



        // Example content CSS (should be your site CSS)

        content_css : "systemadmin/tinymce/css/example.css",



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
		//if(isBlank(postingdate,'Entry required in Posting Date field!')) return false;
		if(isBlank(txtHeader,'Entry required in Header field!')) return false;
		//if(isBlank(txtDescription,'Entry required in Description field!')) return false;
		<?php
    if($image_small == "")
    {
      ?>
      if(isBlank(flUpload,'Entry required in Image Small field!')) return false;
      if(flUpload.value != ''){
        if(flUpload.value.toLowerCase().indexOf(".jpg")<=-1 && flUpload.value.toLowerCase().indexOf(".gif")<=-1 && flUpload.value.toLowerCase().indexOf(".png")<=-1){
          alert('You can upload JPG or GIF or PNG format');
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
	
	if(validateForm()){
		document.frm.action = 'galleryact.php';
		document.frm.submit();
	}
}

function DelImage()
{
	$.ajax({
		type: "POST",
		data: 'id=' + <?php echo $id; ?> + '&db=gallery',
		url: 'delete_image.php',
		success: function(msg){
			if(msg != ''){
				$('#'+msg).remove();
				location.href = "http://kristooferrickweddingdress.com/systemadmin/galleryedit.php?id=<?php echo $id; ?>";
			}
		}
	});
}

function DelImages(imageid)
{
	$.ajax({
		type: "POST",
		data: 'id=' + imageid + '&db=imagegallery',
		url: 'delete_image.php',
		success: function(msg){
			if(msg != ''){
				$('#'+msg).remove();
				location.href = "http://kristooferrickweddingdress.com/systemadmin/galleryedit.php?id=<?php echo $id; ?>";
			}
		}
	});
}

var param = 1;
function tambah()
{
	param = param + 1;
	if(param == 2)
	{
	document.getElementById("addImage2").innerHTML = 
	"<input name='image2' type='file' />&nbsp<input type='text' name='caption2' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 3)
	{
	document.getElementById("addImage3").innerHTML = 
	"<input name='image3' type='file' />&nbsp<input type='text' name='caption3' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 4)
	{
	document.getElementById("addImage4").innerHTML = 
	"<input name='image4' type='file' />&nbsp<input type='text' name='caption4' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 5)
	{
	document.getElementById("addImage5").innerHTML = 
	"<input name='image5' type='file' />&nbsp<input type='text' name='caption5' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 6)
	{
	document.getElementById("addImage6").innerHTML = 
	"<input name='image6' type='file' />&nbsp<input type='text' name='caption6' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 7)
	{
	document.getElementById("addImage7").innerHTML = 
	"<input name='image7' type='file' />&nbsp<input type='text' name='caption7' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 8)
	{
	document.getElementById("addImage8").innerHTML = 
	"<input name='image8' type='file' />&nbsp<input type='text' name='caption8' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 9)
	{
	document.getElementById("addImage9").innerHTML = 
	"<input name='image9' type='file' />&nbsp<input type='text' name='caption9' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
	else if(param == 10)
	{
	document.getElementById("addImage10").innerHTML = 
	"<input name='image10' type='file' />&nbsp<input type='text' name='caption10' class='inputtext' /><input name='temp[]' type='hidden' />";
	}
}


</script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body onload="document.frm.txtHeader.focus()">
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
								<a class="toolbar" href="gallerylist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
									<input name='posting_date' id='posting_date' value="<?=$posting_date?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date'>
<script type='text/javascript'>Calendar.setup({inputField : 'posting_date',	ifFormat : 'y-mm-dd',button : 'calender_date',align  : '',singleClick : true});</script>
									</td>
								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Header</b></td>
									<td width="78%">
										<input type="text" name="txtHeader" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $header; ?>">
									</td>
								</tr>
                                <tr class="row1">
									<td width="22%">&nbsp;<b>Description</b></td>
									<td width="78%">
                                        <textarea rows="" cols="" style="width:800px; height:449px" name="txtDescription" id="txtDescription"></textarea>
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
                                            <img src="../<?php echo $image_small; ?>" border="0" alt="" /><br /><br />
                                            <input type="text" name="edit_caption_small" class="inputtext" value="<?php echo $caption_small; ?>" /><br />
                                          <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>
                                          <?php } ?>
                      </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <input type="file" name="flUpload" />&nbsp <input type="text" name="caption_small" class="inputtext" />
                                        </div>
                                        <div id="<?php echo $id; ?>" style="padding-top:5px">
                                            <?php if($image_small != "") { ?>
                                            <img src="../<?php echo $image_small; ?>" border="0" alt="" /><br />
                                          <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>
                                          <?php } ?>
                      </div>
                      <?php
                    }
                    ?>
									</td>
								</tr>
                                <tr class="row5">
									<td valign="top" style="padding-top:8px">&nbsp;<b>Images</b></td>
									<td>
									<?php
                                    $query = $mainlib->dbquery("select * from imagegallery where gallery_id='".$id."' order by image_id asc",$mainlib->ocn);
									$jml = 1;
                                    while($data = mysql_fetch_array($query))
                                    {
                                    ?>
                                    <div id="<?php echo $data['image_id']; ?>" style="padding-top:5px">
                                        
                                        <img src="../<?php echo $data['file_image']; ?>" border="0" alt="" width="" /><br /><br />
                                        <input type="text" name="editCaption<?=$jml?>" class="inputtext" value="<?=$data['caption']?>">
                                        <br />
                                      <a href="javascript:void(0)" onclick="DelImages(<?php echo $data['image_id']; ?>)">delete this image</a>
                                      <input name="temp2[]" type="hidden" />
                                      <input name="id_image<?=$jml?>" type="hidden" value="<?=$data['image_id']?>" />
                                    </div>
                                    <?php
									$jml = $jml + 1;
                                    }
                                    ?>
                                    <div>
                                        <input type="file" name="image1" />&nbsp <input type="text" name="caption1" class="inputtext" /><input name="temp[]" type="hidden" /> <span class="text2"><a class="menu2" onClick="tambah();" style="cursor:pointer; ">Add</a></span>
                                    </div>
                                    <div id="addImage2"></div>
                                    <div id="addImage3"></div>
                                    <div id="addImage4"></div>
                                    <div id="addImage5"></div>
                                    <div id="addImage6"></div>
                                    <div id="addImage7"></div>
                                    <div id="addImage8"></div>
                                    <div id="addImage9"></div>
                                    <div id="addImage10"></div>
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