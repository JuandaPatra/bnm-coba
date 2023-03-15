<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "galleryedit.php";
$mainlib->opendb();

$file_dir = realpath("../galleryimage/")."/";
$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$posting_date = trim($_POST["posting_date"]);
		$header = trim($_POST["txtHeader"]);
		$description = trim($_POST["txtDescription"]);
		$caption_small = trim($_POST["caption_small"]);
		$temp = $_POST["temp"];
		$image_small = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			if(trim($_FILES["flUpload"]["type"] == "image/jpeg")){	
				$filename_large = str_replace(".jpg","_large.jpg",$filename); 
			}
			if(trim($_FILES["flUpload"]["type"] == "image/gif")){	
				$filename_large = str_replace(".gif","_large.gif",$filename);
			}
			if(trim($_FILES["flUpload"]["type"] == "image/png")){	
				$filename_large = str_replace(".png","_large.png",$filename);
			}
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename_large);

			$image_small = "galleryimage/".$filename;
			
			require_once('../inc/phpthumb/phpthumb.class.php');

			// create medium and thumb
			$phpThumb = new phpThumb();
			$width = 180;
	
			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));
			$phpThumb->setParameter('w', $width);
			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
				if($phpThumb->RenderToFile($file_dir.$filename)){
				}
			}
		}
		
		$mainlib->dbquery("insert into gallery(posting_date,header,description,image_small,caption_small) values ('$posting_date','$header','$description','$image_small','$caption_small')",$mainlib->ocn);
		
		$id_gallery = mysql_insert_id();
		foreach($temp as $jlh)
			{
				$tes = $tes + 1;
				$im = "image" . $tes;
                $caption = "caption" . $tes;
                $cap = trim($_POST[$caption]);
				if(trim($_FILES[$im]["name"])!="")
				{
					$filename1 = trim($_FILES[$im]["name"]);
					$filename1 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename1);
					if(trim($_FILES[$im]["type"] == "image/jpeg")){	
						$filename_large1 = str_replace(".jpg","_large.jpg",$filename1); 
					}
					if(trim($_FILES[$im]["type"] == "image/gif")){	
						$filename_large1 = str_replace(".gif","_large.gif",$filename1);
					}
					if(trim($_FILES[$im]["type"] == "image/png")){	
						$filename_large1 = str_replace(".png","_large.png",$filename1);
					}
					
					move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$filename_large1);
		
					$images = "galleryimage/".$filename1;
					
					require_once('../inc/phpthumb/phpthumb.class.php');
		
					// create medium and thumb
					$phpThumb = new phpThumb();
					$width = 180;
			
					$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));
					$phpThumb->setParameter('w', $width);
					if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
						if($phpThumb->RenderToFile($file_dir.$filename1)){
						}
					}
					$mainlib->dbquery("insert into imagegallery(gallery_id,file_image,caption) values('$id_gallery','$images','$cap')",$mainlib->ocn);
				}
			}
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = trim($_POST["posting_date"]);
		$header = trim($_POST["txtHeader"]);
		$description = trim($_POST["txtDescription"]);
		$edit_caption_small = trim($_POST["edit_caption_small"]);
		$temp = $_POST["temp"];
		$temp2 = $_POST["temp2"];
		$image_small = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			if(trim($_FILES["flUpload"]["type"] == "image/jpeg")){	
				$filename_large = str_replace(".jpg","_large.jpg",$filename); 
			}
			if(trim($_FILES["flUpload"]["type"] == "image/gif")){	
				$filename_large = str_replace(".gif","_large.gif",$filename);
			}
			if(trim($_FILES["flUpload"]["type"] == "image/png")){	
				$filename_large = str_replace(".png","_large.png",$filename);
			}
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename_large);

			$image_small = "galleryimage/".$filename;
			
			require_once('../inc/phpthumb/phpthumb.class.php');

			// create medium and thumb
			$phpThumb = new phpThumb();
			$width = 180;
	
			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));
			$phpThumb->setParameter('w', $width);
			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
				if($phpThumb->RenderToFile($file_dir.$filename)){
				}
			}
		}

		if($image_small == ''){
			$mainlib->dbquery("update gallery set posting_date = '$posting_date', header='$header', description = '$description', caption_small = '$edit_caption_small' where gallery_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update gallery set posting_date = '$posting_date', header='$header', description = '$description', caption_small = '$edit_caption_small', image_small='".$image_small."' where gallery_id='".$id."'",$mainlib->ocn);
		}
		
		foreach($temp as $jlh)
			{
				$tes = $tes + 1;
				$im = "image" . $tes;
                $caption = "caption" . $tes;
                $cap = trim($_POST[$caption]);
				if(trim($_FILES[$im]["name"])!="")
				{
					$filename1 = trim($_FILES[$im]["name"]);
					$filename1 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename1);
					if(trim($_FILES[$im]["type"] == "image/jpeg")){	
						$filename_large1 = str_replace(".jpg","_large.jpg",$filename1); 
					}
					if(trim($_FILES[$im]["type"] == "image/gif")){	
						$filename_large1 = str_replace(".gif","_large.gif",$filename1);
					}
					if(trim($_FILES[$im]["type"] == "image/png")){	
						$filename_large1 = str_replace(".png","_large.png",$filename1);
					}
					
					move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$filename_large1);
		
					$images = "galleryimage/".$filename1;
					
					require_once('../inc/phpthumb/phpthumb.class.php');
		
					// create medium and thumb
					$phpThumb = new phpThumb();
					$width = 180;
			
					$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));
					$phpThumb->setParameter('w', $width);
					if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
						if($phpThumb->RenderToFile($file_dir.$filename1)){
						}
					}
					$mainlib->dbquery("insert into imagegallery(gallery_id,file_image,caption) values('$id','$images','$cap')",$mainlib->ocn);
				}
			}
			
		if(!empty($temp2))
		{
			$q = 0;
			foreach($temp2 as $jlh2)
			{
				$q = $q + 1;
				$editCaption = "editCaption" . $q;
				$id_image = "id_image" . $q;
				if($_POST[$editCaption] != "")
				{
					$editCaption = $_POST[$editCaption];
					$id_image = $_POST[$id_image];
					$mainlib->dbquery("update imagegallery set caption = '$editCaption' where image_id = '$id_image'",$mainlib->ocn);
				}
			}
		}
		break;

	case "del":
		if(isset($_REQUEST["hidIDs"]))
		{
			if(trim($_REQUEST["hidIDs"])!="")
			{
				$ids = stripslashes(trim($_REQUEST["hidIDs"]));
				$ids = str_replace("'","",$ids);
				$arids = split(',',$ids);
				$sql = "";
				for($i=0;$i<count($arids);$i++)
				{
					if($sql!="")
					{
						$sql .= " OR ";
					}
					$sql .= "gallery_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM gallery WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: gallerylist.php?pgret=1");
?>