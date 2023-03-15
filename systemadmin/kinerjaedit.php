<?php 

include("../inc/class.mainlib.inc.php");

admsessions();

$mainlib = new mainlib();

$mainlib->opendb();

$listtitle = $mainlib->getpagetitle("Add/Edit Kinerja Keuangan",$mainlib->ocn);



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

	$ors = $mainlib->dbquery("select * from kinerja where kinerja_id='".$id."'",$mainlib->ocn);

	if($row = $mainlib->dbfetcharray($ors))

	{

		$posting_date = $row['posting_date'];

		$title = stripslashes($row["title"]);

    $resume = stripslashes($row["resume"]);

		$description = stripslashes($row["description"]);

		$pdf = $row["pdf"];
                $image_small  = $row['image_small'];
		$category = $row['category'];
		$tahun = $row['tahun'];
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

        document_base_url : "http://localhost/ffh/",



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

		if(isBlank(title,'Entry required in Title field!')) return false;

		if(isBlank(category,'Entry required in Category field!')) return false;

    <?php

    if($pdf == ""){

      ?>

      if(flUpload.value != ''){

        if(flUpload.value.toLowerCase().indexOf(".pdf")<=-1){

          alert('You can upload PDF format');

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

		document.frm.action = 'kinerjaact.php';

		document.frm.submit();

	}

}



function DelFile()

{

	$.ajax({

		type: "POST",

		data: 'id=' + <?php echo $id; ?> + '&db=kinerja',

		url: 'delete_image.php',

		success: function(msg){

			if(msg != ''){

				$('#'+msg).remove();

				location.href = "kinerjaedit.php?id=<?php echo $id; ?>";

			}

		}

	});

}


function DelFile1()

{

	$.ajax({

		type: "POST",

		data: 'id=' + <?php echo $id; ?> + '&db=kinerjaimage',

		url: 'delete_image.php',

		success: function(msg){

			if(msg != ''){

				$('#'+msg).remove();

				location.href = "kinerjaedit.php?id=<?php echo $id; ?>";

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

								<a class="toolbar" href="kinerjalist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>

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

									<td width="22%">&nbsp;<b>Category</b></td>

									<td width="78%">

									<select name="category">

                                    	<option value=""></option>

                                        <option value="Laporan Keuangan Triwulan" <?php if($category == "Laporan Keuangan Triwulan"){ echo 'selected="selected"'; } ?>>Laporan Keuangan</option>

                                        <option value="Laporan Tahunan" <?php if($category == "Laporan Tahunan"){ echo 'selected="selected"'; } ?>>Laporan Tahunan</option>

                                    </select>

									</td>

								</tr>

                                <tr class="row0">

									<td width="22%">&nbsp;<b>Posting Date</b></td>

									<td width="78%">

									<input name='posting_date' id='posting_date' value="<?php echo $posting_date; ?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date'>

<script type='text/javascript'>Calendar.setup({inputField : 'posting_date',	ifFormat : 'y-mm-dd',button : 'calender_date',align  : '',singleClick : true});</script>

									</td>

								</tr>



<tr class="row0">

									<td width="22%">&nbsp;<b>Tahun</b></td>

									<td width="78%">

									<input name='tahun' id='tahun' value="<?php echo $tahun; ?>" type=text>



									</td>

								</tr>





                                <tr class="row0">

									<td width="22%">&nbsp;<b>Title</b></td>

									<td width="78%">

										<input type="text" name="title" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title; ?>">

									</td>

								</tr>

                <tr class="row1">

                  <td width="22%">&nbsp;<b>Resume</b></td>

                  <td width="78%">

                                        <textarea name="resume" style="width:630px; height:500px; "><?php echo $resume; ?></textarea>

                  </td>

                </tr>

                                <tr class="row1">

									<td width="22%">&nbsp;<b>Description</b></td>

									<td width="78%">

                                        <textarea name="description" style="width:630px; height:500px; "><?php echo $description; ?></textarea>

									</td>

								</tr>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                             <!--==============================================IMAGE SMALL =======================================-->
                             
                             
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

                                            <?php echo $image_small; ?><br />
                                            <img src="../<?php echo $image_small; ?>" border="0" alt="" /><br />

                                          <a href="javascript:void(0)" onclick="DelFile1()">delete this file</a>

                                          <?php } ?>

                      </div>

                      <?php

                    }

                    else

                    {

                      ?>

                      <input type="file" name="flUpload2" />

                                        </div>

                                        <div id="<?php echo $id; ?>" style="padding-top:5px">

                                            <?php if($image_small != "") { ?>
                                            

                                            <?php echo $image_small; ?><br />

                                          <a href="javascript:void(0)" onclick="DelFile()">delete this file</a>

                                          <?php } ?>

                      </div>

                      <?php

                    }

                    ?>

									</td>

								</tr>
                                                                    
                                                                    
                                                                    
                                                                    
                             <!-- ================================================END IMAGE SMALL ==============================--------->                                       
                                                                    
                                                                    
                                                                    
                              <!-- =================================FILE PDF --================================================== -->

								<tr class="row4">

									<td valign="top" style="padding-top:8px">&nbsp;<b>File PDF</b></td>

									<td>

										<div>

                    <?php

                    if($pdf != "")

                    {

                      ?>

                      <div id="<?php echo $id; ?>" style="padding-top:5px">

                                            <?php if($pdf != "") { ?>

                                            <?php echo $pdf; ?><br />

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

                                            <?php if($pdf != "") { ?>

                                            <?php echo $pdf; ?><br />

                                          <a href="javascript:void(0)" onclick="DelFile()">delete this file</a>

                                          <?php } ?>

                      </div>

                      <?php

                    }

                    ?>

									</td>

								</tr><!-- ====================end pdf =========================== -->
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                

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