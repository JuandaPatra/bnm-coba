<?php 

include("../inc/class.mainlib.inc.php");

admsessions();

$mainlib = new mainlib();

$mainlib->opendb();

$listtitle = $mainlib->getpagetitle("Add/Edit Slider",$mainlib->ocn);



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

	$ors = $mainlib->dbquery("select * from slider where slider_id='".$id."'",$mainlib->ocn);

	if($row = $mainlib->dbfetcharray($ors))

	{

		$title = stripslashes($row['title']);

		$start_date = $row['start_date'];

		$end_date = $row['end_date'];

		$file_image_id = stripslashes($row["file_image_id"]);
		$file_image_en = stripslashes($row["file_image_en"]);

		$link = stripslashes($row["link"]);

		$caption = stripslashes($row['caption']);
		$sort = $row['sort'];

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

		if(isBlank(title,'Entry required in Title field!')) return false;

//		if(isBlank(start_date,'Entry required in Start Date field!')) return false;

//		if(isBlank(end_date,'Entry required in End Date field!')) return false;

		<?php

    if($file_image_id == "")

    {

      ?>

      if(isBlank(flUpload,'Entry required in Image field!')) return false;

      if(flUpload.value != ''){

        if(flUpload.value.toLowerCase().indexOf(".jpg")<=-1 && flUpload.value.toLowerCase().indexOf(".gif")<=-1 && flUpload.value.toLowerCase().indexOf(".png")<=-1 && flUpload.value.toLowerCase().indexOf(".swf")<=-1){

          alert('You can upload JPG or GIF or PNG or SWF format');

          return false;

        }

      }

      <?php

    }

    ?>


    <?php

    if($file_image_en == "")

    {

      ?>

      if(isBlank(flUpload,'Entry required in Image field!')) return false;

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

		document.frm.action = 'slideract.php';

		document.frm.submit();

	}

}



function DelImage()

{

	$.ajax({

		type: "POST",

		data: 'id=' + <?php echo $id; ?> + '&db=slider',

		url: 'delete_image.php',

		success: function(msg){

			if(msg != ''){

				$('#'+msg).remove();

				location.href = "slideredit.php?id=<?php echo $id; ?>";

			}

		}

	});

}


function DelImage2()

{

	$.ajax({

		type: "POST",

		data: 'id=' + <?php echo $id; ?> + '&db=slider2',

		url: 'delete_image.php',

		success: function(msg){

			if(msg != ''){

				$('#'+msg).remove();

				location.href = "slideredit.php?id=<?php echo $id; ?>";

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

<body onload="document.frm.title.focus()">

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

								<a class="toolbar" href="sliderlist.php?pgret=1"><img src="images/cancel_f2.png" alt="Cancel" border="0"><br>Cancel</a>

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

                                        <option value="1" <?php if($sort == 1){ echo 'selected="selected"'; } ?>>Slider 1</option>

                                        <option value="2" <?php if($sort == 2){ echo 'selected="selected"'; } ?>>Slider 2</option>
                                        <option value="3" <?php if($sort == 3){ echo 'selected="selected"'; } ?>>Slider 3</option>
                                        <option value="4" <?php if($sort == 4){ echo 'selected="selected"'; } ?>>Slider 4</option>
                                        <option value="5" <?php if($sort == 5){ echo 'selected="selected"'; } ?>>Slider 5</option>
                                        <option value="6" <?php if($sort == 6){ echo 'selected="selected"'; } ?>>Slider 6</option>
                                        <option value="7" <?php if($sort == 7){ echo 'selected="selected"'; } ?>>Slider 7</option>
                                        <option value="8" <?php if($sort == 8){ echo 'selected="selected"'; } ?>>Slider 8</option>
                                        <option value="9" <?php if($sort == 9){ echo 'selected="selected"'; } ?>>Slider 9</option>
                                        <option value="10" <?php if($sort == 10){ echo 'selected="selected"'; } ?>>Slider 10</option>

                                    </select>

									</td>

								</tr>



                                <tr class="row0">

                  <td width="22%">&nbsp;<b>Title</b></td>

                  <td width="78%">

                    <input type="text" name="title" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $title; ?>">

                  </td>

                </tr>

<!--
                                <tr class="row0">

									<td width="22%">&nbsp;<b>Start Date</b></td>

									<td width="78%">

									<input name='start_date' id='start_date' value="<?=$start_date?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date1'>

<script type='text/javascript'>Calendar.setup({inputField : 'start_date',	ifFormat : 'y-mm-dd',button : 'calender_date1',align  : '',singleClick : true});</script>

									</td>

								</tr>

                                <tr class="row0">

									<td width="22%">&nbsp;<b>End Date</b></td>

									<td width="78%">

									<input name='end_date' id='end_date' value="<?=$end_date?>" type=text>&nbsp;<img src='images/calender.gif' id='calender_date2'>

<script type='text/javascript'>Calendar.setup({inputField : 'end_date',	ifFormat : 'y-mm-dd',button : 'calender_date2',align  : '',singleClick : true});</script>

									</td>

								</tr>
							-->

                                <tr class="row0">

                  <td width="22%">&nbsp;<b>Link</b></td>

                  <td width="78%">

                    <?php 

                    if($link == ""){

                      ?>

                      <input type="text" name="link" class="inputtext" maxlength="255" style="width:500px" value="http://">

                      <?php

                    }else{

                      ?>

                      <input type="text" name="link" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $link; ?>">

                      <?php

                    }

                    ?>

                  </td>

                </tr>

                <tr class="row0">

                  <td width="22%">&nbsp;<b>Caption</b></td>

                  <td width="78%">

                    <input type="text" name="caption" class="inputtext" maxlength="255" style="width:500px" value="<?php echo $caption; ?>">

                  </td>

                </tr>

								<tr class="row4">

									<td valign="top" style="padding-top:8px">&nbsp;<b>File Image ID</b></td>

									<td>

										<div>

                    <?php

                    if($file_image_id != "")

                    {

                      ?>

                      <div id="<?php echo $id; ?>" style="padding-top:5px">

                                            <?php if($file_image_id != "") { ?>

                                            <img src="../<?php echo $file_image_id; ?>" border="0" alt="" /><br />

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

                                            <?php if($file_image_id != "") { ?>

                                            <img src="../<?php echo $file_image_id; ?>" border="0" alt="" /><br />

                                          <a href="javascript:void(0)" onclick="DelImage()">delete this image</a>

                                          <?php } ?>

                      </div>

                      <?php

                    }

                    ?>

									</td>

								</tr><!-- end file image id -->





<!--								<tr class="row4">

									<td valign="top" style="padding-top:8px">&nbsp;<b>File Image EN</b></td>

									<td>

										<div>

                    <?php

                    if($file_image_en != "")

                    {

                      ?>

                      <div id="<?php echo $id; ?>" style="padding-top:5px">

                                            <?php if($file_image_en != "") { ?>

                                            <img src="../<?php echo $file_image_en; ?>" border="0" alt="" /><br />

                                          <a href="javascript:void(0)" onclick="DelImage2()">delete this image</a>

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

                                            <?php if($file_image_en != "") { ?>

                                            <img src="../<?php echo $file_image_en; ?>" border="0" alt="" /><br />

                                          <a href="javascript:void(0)" onclick="DelImage2()">delete this image</a>

                                          <?php } ?>

                      </div>

                      <?php

                    }

                    ?>

									</td>

								</tr><!-- end file image id -->





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