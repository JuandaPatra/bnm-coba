<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit News",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select * from news where news_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$posting_date = $row['posting_date'];
		$title_id = stripslashes($row["title_id"]);
		$title_en = stripslashes($row["title_en"]);
		$resume_id = stripslashes($row["resume_id"]);
		$resume_en = stripslashes($row["resume_en"]);
		$description_id = stripslashes($row["description_id"]);
		$description_en = stripslashes($row["description_en"]);
		$source = $row['source'];
		$image_small = $row['image_small'];
    $feature = $row['feature'];
    $youtube = $row['youtube'];
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
		if(isBlank(posting_date,'Entry required in Posting Date field!')) return false;
    	if(isBlank(title_id,'Entry required in Title ID field!')) return false;
		//if(isBlank(title_en,'Entry required in Title EN field!')) return false;
	}
	return true;
}

function saveData(){
	//updateRTEs();
	if(validateForm()){
		document.frm.action = 'newsact.php';
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

function DelImages(imageid)
{
  $.ajax({
    type: "POST",
    data: 'id=' + imageid + '&db=imagenews',
    url: 'delete_image.php',
    success: function(msg){
      if(msg != ''){
        $('#'+msg).remove();
        location.href = "newsedit.php?id=<?php echo $id; ?>";
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
  "<input name='image2' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 3)
  {
  document.getElementById("addImage3").innerHTML = 
  "<input name='image3' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 4)
  {
  document.getElementById("addImage4").innerHTML = 
  "<input name='image4' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 5)
  {
  document.getElementById("addImage5").innerHTML = 
  "<input name='image5' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 6)
  {
  document.getElementById("addImage6").innerHTML = 
  "<input name='image6' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 7)
  {
  document.getElementById("addImage7").innerHTML = 
  "<input name='image7' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 8)
  {
  document.getElementById("addImage8").innerHTML = 
  "<input name='image8' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 9)
  {
  document.getElementById("addImage9").innerHTML = 
  "<input name='image9' type='file' /><input name='temp[]' type='hidden' />";
  }
  else if(param == 10)
  {
  document.getElementById("addImage10").innerHTML = 
  "<input name='image10' type='file' /><input name='temp[]' type='hidden' />";
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
								<a class="toolbar" href="newslist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
									<td width="22%">&nbsp;<b>Title ID</b></td>
									<td width="78%">
										<input type="text" name="title_id" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title_id; ?>">
									</td>

								</tr>
                        <!--        <tr class="row0">
									<td width="22%">&nbsp;<b>Title EN</b></td>
									<td width="78%">
										<input type="text" name="title_en" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title_en; ?>">
									</td>

								</tr>-->

                <tr class="row0">
                  <td width="22%">&nbsp;<b>Youtube</b></td>
                  <td width="78%">
                    <input type="text" name="youtube" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $youtube; ?>">
                  </td>

                </tr>


                <tr class="row1">
                  <td width="22%">&nbsp;<b>Resume ID</b></td>
                  <td width="78%">
                                        <textarea name="resume_id" style="width:630px; height:500px; "><?php echo $resume_id; ?></textarea>
                  </td>
                </tr>
                <!--<tr class="row1">
                  <td width="22%">&nbsp;<b>Resume EN</b></td>
                  <td width="78%">
                                        <textarea name="resume_en" style="width:630px; height:500px; "><?php echo $resume_en; ?></textarea>
                  </td>
                </tr>-->
                                <tr class="row1">
									<td width="22%">&nbsp;<b>Description ID</b></td>
									<td width="78%">
                                        <textarea name="description_id" style="width:630px; height:500px; "><?php echo $description_id; ?></textarea>
									</td>
								</tr>
  
  <!--                              <tr class="row1">
									<td width="22%">&nbsp;<b>Description EN</b></td>
									<td width="78%">
                                        <textarea name="description_en" style="width:630px; height:500px; "><?php echo $description_en; ?></textarea>
									</td>
								</tr>-->

                  <tr class="row0">
                  <td width="22%">&nbsp;<b>Feature <?php //echo $feature; ?></b></td>
                  <td width="78%">
                                      <select name="feature">
                                          <option value="">Select One</option>
                                          <option value="yes" <?php if($feature == "yes"){ echo 'selected="selected"'; } ?>>Yes</option>
                                          <option value="no" <?php if($feature == "no"){ echo 'selected="selected"'; } ?>>No</option>
                                            
                                        </select>
                  </td>

                </tr>

                                <tr class="row0">
									<td width="22%">&nbsp;<b>Source</b></td>
									<td width="78%">
										<input type="text" name="source" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $source; ?>">
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
                                            <img src="../<?php echo $image_small//str_replace("_large","",$image_small); ?>" border="0" alt="" /><br />
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
                                            <img src="../<?php echo $image_small; //str_replace("_large","",$image_small); ?>" border="0" alt="" /><br />
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
                                    $query = $mainlib->dbquery("select * from imagenews where news_id='".$id."'",$mainlib->ocn);
                                    while($data = mysql_fetch_array($query))
                                    {
                                    ?>
                                    <div id="<?php echo $data['image_id']; ?>" style="padding-top:5px">
                                        
                                        <img src="../<?php echo $data['file_image'];//str_replace("_large","",$data['file_image']); ?>" border="0" alt="" /><br />
                                        Image URL : <b><?php echo ROOT_DIR . $data['file_image']; ?></b> &nbsp;
                                      <a href="javascript:void(0)" onclick="DelImages(<?php echo $data['image_id']; ?>)">delete this image</a>
                                      
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div>
                                        <input type="file" name="image1" /><input name="temp[]" type="hidden" /> <span class="text2"><a class="menu2" onClick="tambah();" style="cursor:pointer; ">Add</a></span>
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