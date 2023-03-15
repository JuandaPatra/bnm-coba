<?php
include("../../inc/class.mainlib.inc.php");
admsessions();
admsessionchk();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Generator" content="Asbru Web Content Editor">
<meta http-equiv="Copyright" content="(C) 2002-2006 - Asbru Ltd. - www.asbrusoft.com">
<script type="text/javascript" src="webeditor.properties.js"></script>
<title>Web Content Editor - Insert Attachments</title>
<link rel="stylesheet" href="webeditor.css">
<script type="text/javascript">

// UPLOADING MULTIPLE FILES
// =\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\
var gblvar = 1;

function AddRow() //This function will add extra row to provide another file
{
	var prevrow;
	if (document.all) {
		 prevrow = document.all['uplimg'];
	} else {
		 prevrow = document.getElementById('uplimg');
	}
	var tmpvar = gblvar;
	var newrow = prevrow.insertRow(prevrow.rows.length);
	newrow.id = newrow.uniqueID; // give row its own ID
	
	var newcell; // an inserted row has no cells, so insert the cells
	newcell = newrow.insertCell(0);
	newcell.id = newcell.uniqueID;
	newcell.innerHTML = "<tr><td valign='top'>&nbsp;<input name='attachfile[]' type='file'></td></tr>";
	gblvar = tmpvar + 1;
}

function DelRow() //This function will delete the last row
{
	if(gblvar == 1)
		return;
	var prevrow;
	if (document.all) {
		 prevrow = document.all['uplimg'];
	} else {
		 prevrow = document.getElementById('uplimg');
	}
	prevrow.deleteRow(prevrow.rows.length-1);
	gblvar = gblvar - 1;
}
// =\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\=\


document.title = HtmlDecode(Text('hyperlink_title'));

function requestParameter(name) {
	var value = "";
	if (start = request.indexOf("?"+name+"=")+1) {
		value = request.substring(start+name.length+1);
	} else if (start = request.indexOf("&"+name+"=")+1) {
		value = request.substring(start+name.length+1);
	}
	if (value.indexOf("&")+1) {
		value = value.substring(0, value.indexOf("&"));
	}
	value = unescape(value);
	return value;
}

window.focus();
var request = "" + window.location;
editor = requestParameter("editor");

function initform(link) {
	var border = "";
	var text = "";
	var width = "";
	var height = "";
	var vspace = "";
	var hspace = "";
	var align = "";
	var onmouseover = "";
	var onmouseout = "";
	var usemap = "";
	var htmlclass = "";
	var htmlid = "";
	if (link == null) {
		link = requestParameter("href");
	}

	document.linkform.link.value=link;
	if (link) {
		if(document.linkform.quicklink != null){
		}else{
			for (j=0; j<=document.linkform.quicklink.length; j++) {
				if (document.linkform.quicklink.options[j] && (document.linkform.quicklink.options[j].value == type+link)) {
					document.linkform.quicklink.selectedIndex = j;
				}
			}
		}
	}
}

function linkit() {
	var url;
	var text;
	var target = '_blank';
	
	url = document.linkform.link.value;
	
	if(url != ''){
		if(url.toLowerCase().indexOf(".jpg")!=-1){
			text = '<img src="'+url+'" border="0" />';
		}
		if(url.toLowerCase().indexOf(".doc")!=-1){
			text = '<img src="images/icon_doc.gif" border="0" />';
		}
		if(url.toLowerCase().indexOf(".xls")!=-1){
			text = '<img src="images/icon_xls.gif" border="0" />';
		}
		if(url.toLowerCase().indexOf(".pdf")!=-1){
			text = '<img src="images/icon_pdf.gif" border="0" />';
		}
		if(url.toLowerCase().indexOf(".zip")!=-1){
			text = '<img src="images/icon_zip.gif" border="0" />';
		}
		if(url.toLowerCase().indexOf(".rar")!=-1){
			text = '<img src="images/icon_rar.gif" border="0" />';
		}
		if(url.toLowerCase().indexOf(".jpg")==-1 && url.toLowerCase().indexOf(".doc")==-1 && url.toLowerCase().indexOf(".xls")==-1 && url.toLowerCase().indexOf(".pdf")==-1 && url.toLowerCase().indexOf(".zip")==-1 && url.toLowerCase().indexOf(".rar")==-1 ){
			text = '<img src="images/icon_unknown.gif" border="0" />';
		}
		
		top.opener[editor].insertImage(url);
	}
		
	top.close();
}

function uploadFile(){
	document.frm.method = 'post';
	document.frm.action = 'mediaact.php';
	document.frm.submit();
}
</script>
</head>
<body onload="initform()">
<form action="mediaact.php" name="frm" style="margin:0px" method="post" enctype="multipart/form-data">
<table width="100%" border="0" class="dtree">
	<tr align="left" valign="top"> 
		<td colspan="4" class="webeditor_window_title">Insert Attachments (jpg, doc, xls, pdf, ppt, zip, and rar files)</td>
	</tr>
	<tr align="left" valign="top"> 
		<td colspan="4">
			<fieldset>
			<legend class="webeditor_window_heading">Files</legend>
				<table width="100%">
				<tr>
					<td valign="top">
					   <input class="button" type="button" value="Attach More Files" onClick="AddRow();">&nbsp;&nbsp;
					   <input class="button" type="button" value="Delete Last Row" onClick="DelRow();">&nbsp;&nbsp;
						<input type="button" value="Upload!" onclick="uploadFile();">
					</td>
				</tr>
				</table>
				<table id="uplimg" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">&nbsp;<input name="attachfile[]" type="file"></td>
				</tr>
			</table>
			</fieldset>
		</td>
	</tr>
</table>
</form>
<form action="#" name="linkform" onSubmit="linkit(); return false;" style="margin:0px">
<table width="100%" border="0" class="dtree">
<input type="hidden" name="usemap" value="">
	<tr align="left" valign="top"> 
		<td colspan="4">
			<fieldset>
			<legend class="webeditor_window_heading"><script type="text/javascript">document.write(Text('media_url'));</script></legend>
				<table width="100%">
					<tr>
						<td class="webeditor_window_attribute"><script type="text/javascript">document.write(Text('media_url_quicklinks'));</script></td>
						<td class="webeditor_window_value"> 
							<select name="quicklink" style="width: 100%;" onChange="javascript:initform(this.options[this.selectedIndex].value)">
								<option value="" selected>&nbsp;
								<?php
								if ($dir = @opendir("../../images/events/")) {
									while (($file = readdir($dir)) !== false) {
										if($file!="." && $file!="..")
										{
											echo '<option value="'.ROOT_DIR.'images/events/'.$file.'">'.$file.'</option>';
										}
									}  
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="webeditor_window_attribute"><script type="text/javascript">document.write(Text('media_url_address'));</script></td>
						<td class="webeditor_window_value"> 
							<input type="text" name="link" style="width:455px">
						</td>
					</tr>
				</table>
			</fieldset>
		</td>
	</tr>
</table>
<br>
<div align="center">
<script type="text/javascript">document.write('<input type="submit" value="' + Text('ok') + '">');</script>
<script type="text/javascript">document.write('<input type="button" value="' + Text('cancel') + '" onClick="window.close()">');</script>
</div>
</form>
</body>
</html>
