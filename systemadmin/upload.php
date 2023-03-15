<?php
set_time_limit(0);
?>
<html>
<head><title>Rad Upload</title></head>


<body style="margin: 0px">
<table border="0" cellpadding="0" width="100%">
<?
$id = $_REQUEST["fileid"];
$filetype = $_REQUEST["filetype"];
/*
 * SET THE SAVE PATH by editing the line below. Make sure that the path
 * name ends with the correct file system path separator ('/' in linux and
 * '\\' in windows servers (eg "c:\\temp\\uploads\\" )
 */
$file_dir = "../documents/".$id."/";
if(!is_dir($file_dir)){
	mkdir($file_dir,0777);
}

$save_path=realpath($file_dir)."/";
$userfile_parent = $_REQUEST['userfile_parent'];

$file = $_FILES['userfile'];
$k = count($file['name']);


for($i=0 ; $i < $k ; $i++)
{
	echo '<tr>';

	if(isset($save_path) && $save_path!="")
	{
		if(isset($userfile_parent))
		{
			/*
			 * Please refer to the encode_path parameter of Rad Upload
			 * http://www.radinks.com/upload/settings
			 */
			$name = str_replace($userfile_parent,"",urldecode($file['name'][$i]));
			error_log($name);
			
			$path ="$save_path" .  dirname($name);
			
			
			if(preg_match('/(;)|(\.\.)/',$path))
			{
				echo "<td>$path</td><td>rejected</td></tr>";
				continue;
			}
			if(file_exists($path))
			{
			 	if(!is_dir($path))
				{
					/*
					 * a file by that name already exists and it's not a directory.
					 * You will need to handle this situation according to your
					 * requirements. You have a range of options including siliently
					 * ingoring this file or rejecting the upload as a whole.
					 */
					error_log("file exists $path");
				}
			}
			else
			{
				/* 
				 * We need to create a directory. Notice that we are not pretending
				 * to be thread safe here. 
				 */
				 error_log('making path ' . $path);
				 mkdir($path,0777);
			}
		}
		else
		{
			$name = basename($file['name'][$i]);
		}
		
		/*
		 * now we can safely move the file from it's temporary location to a more
		 * permanent home.
		 */
		move_uploaded_file($file['tmp_name'][$i], $save_path . $filetype.'__'.$name);
	}
					
	echo '<td align="left">' . basename(urldecode($file['name'][$i])) . ' - ' . $file['size'][$i] ."</td>\n";

}
?>
</table>
</body>
</html>