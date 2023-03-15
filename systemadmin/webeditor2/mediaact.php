<?php
include("../../inc/class.mainlib.inc.php");
admsessions();
admsessionchk();

// uploading multiple files
// ======================================================
$dirname = '../../images/events'; //Specify where the file(s) will be stored 
$tmpfile = $_FILES['attachfile']['tmp_name']; //Path & filename where the uploaded file(s) are stored in the server
$filename = $_FILES['attachfile']['name']; //Name of the provided file
$type = $_FILES['attachfile']['type'];

if(!is_dir($dirname)){
	mkdir($dirname,0700);
}

for($i=0; $i<count($tmpfile); $i++)
{
	if (($tmpfile[$i] != 'none') && ($tmpfile[$i] != '' )) //Checkout if file is selected or not
	{ 
		// uploading files			
		if (is_uploaded_file($tmpfile[$i]))
		{
			move_uploaded_file( $tmpfile[$i], $dirname."/".str_replace(" ","_",$filename[$i]) ); 
		}
	} 
}
header("Location: media.php?media.php?editor=webeditor&href=&border=&alt=&width=&height=&vspace=&hspace=&align=&onmouseover=&onmouseout=&usemap=&htmlclass=&htmlid=&mediaclass=");
?>