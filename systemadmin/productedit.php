<?php 
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$mainlib->opendb();
$listtitle = $mainlib->getpagetitle("Add/Edit Product",$mainlib->ocn);

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
	$ors = $mainlib->dbquery("select p.*, c.category_id  from product p, category c where p.category_id = c.category_id and product_id='".$id."'",$mainlib->ocn);
	if($row = $mainlib->dbfetcharray($ors))
	{
		$category_id = $row['category_id'];
    	$subcategory_id = $row['subcategory_id'];
		$name_id = stripslashes($row["name_id"]);
		$name_en = stripslashes($row["name_en"]);
		$resume_id = stripslashes($row["resume_id"]);
		$resume_en = stripslashes($row["resume_en"]);
		$description_id = stripslashes($row["description_id"]);
		$description_en = stripslashes($row["description_en"]);
		$status = $row['status'];
		$image_small = $row['image_small'];
    $brand = $row['brand'];
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

var xmlhttp = false;
//Check if we are using IE.
  try {
//If the Javascript version is greater than 5.
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
  } catch (e) {
//If not, then use the older active x object.
    try {
//If we are using Internet Explorer.
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
    } catch (e) {
//Else we must be using a non-IE browser.
      xmlhttp = false;
    }
  }
//If we are using a non-IE browser, create a javascript instance of the object.
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest()
    //alert ("You are not using Microsoft Internet Explorer");
  }
  
function tampil(category_id)
{
  serverPage = "ambilSubCat.php?category_id=" + category_id;
  xmlhttp.open("POST", serverPage);
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("tsub").innerHTML = xmlhttp.responseText;
      //xmlDoc=xmlhttp.responseXML;
      //var xjlh = xmlDoc.getElementsByTagName("jlh");
      //document.getElementById("nilai").innerHTML = "aaaaaaaaaaaaa";
    }
  }
  xmlhttp.send(null);
}

function validateForm()
{
	with(document.frm){
		if(isBlank(category,'Entry required in Category field!')) return false;
      	if(isBlank(name_id,'Entry required in Product Name ID field!')) return false;
		if(isBlank(name_en,'Entry required in Product Name EN field!')) return false;
	}
	return true;
}

function saveData(){
	//updateRTEs();
	if(validateForm()){
		document.frm.action = 'productact.php';
		document.frm.submit();
	}
}

function DelImage()
{
  $.ajax({
    type: "POST",
    data: 'id=' + <?php echo $id; ?> + '&db=product',
    url: 'delete_image.php',
    success: function(msg){
      if(msg != ''){
        $('#'+msg).remove();
        location.href = "productedit.php?id=<?php echo $id; ?>";
      }
    }
  });
}

function DelImages(imageid)
{
  $.ajax({
    type: "POST",
    data: 'id=' + imageid + '&db=imageproduct',
    url: 'delete_image.php',
    success: function(msg){
      if(msg != ''){
        $('#'+msg).remove();
        location.href = "productedit.php?id=<?php echo $id; ?>";
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
<body onload="document.frm.category.focus()">
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
								<a class="toolbar" href="productlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>
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
                    <select name="category" class="inputtext" onchange="tampil(this.value)">
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



                 <tr class="row1">
                  <td>&nbsp;<b>Brand</b></td>
                  <td>
                    <select name="category" class="inputtext" onchange="tampil(this.value)">
                      <option value="">Select one</option>
                      <?php
                      $ors = $mainlib->dbquery("select * from brand",$mainlib->ocn);
                      while($row = $mainlib->dbfetcharray($ors)){
                        echo '<option value="'.$row["title"].'" ';
                        if($title==$row["title"]){
                          echo 'selected';
                        }
                        echo '>'.$row["title"].'</option>';
                      }
                      mysql_free_result($ors);
                      ?>
                    </select>
                  </td>
                </tr>



                           
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Product Name ID</b></td>
									<td width="78%">
										<input type="text" name="name_id" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $name_id; ?>">
									</td>

								</tr>
                                <tr class="row0">
									<td width="22%">&nbsp;<b>Product Name EN</b></td>
									<td width="78%">
										<input type="text" name="name_en" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $name_en; ?>">
									</td>

								</tr>
             
                            
                <!--<tr class="row1">
                  <td width="22%">&nbsp;<b>Status</b></td>
                  <td width="78%">
                                  	<select name="status" class="inputtext">
                                    	<option value="">Select One</option>
                                        <option value="New Products" <?php //if($status == "New Products") echo 'selected="selected"'; ?>>New Products</option>
                                    </select>
                  </td>
                </tr>  -->
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
                <tr class="row5">
                  <td valign="top" style="padding-top:8px">&nbsp;<b>Images</b></td>
                  <td>
                  <?php
                                    $query = $mainlib->dbquery("select * from imageproduct where product_id='".$id."'",$mainlib->ocn);
                                    while($data = mysql_fetch_array($query))
                                    {
                                    ?>
                                    <div id="<?php echo $data['image_id']; ?>" style="padding-top:5px">
                                        
                                        <img src="../<?php echo str_replace("_large","",$data['file_image']); ?>" border="0" alt="" /><br />
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