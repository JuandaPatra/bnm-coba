<?php

set_time_limit(0);

include("../inc/class.mainlib.inc.php");

admsessions();



$mainlib = new mainlib();

$pageedit = "slideredit.php";

$mainlib->opendb();



$file_dir = realpath("../sliderfile/")."/";

$act = trim($_REQUEST["act"]);

switch($act)

{

	case "add":

		$title = addslashes(trim($_POST["title"]));

		$start_date = trim($_POST["start_date"]);

		$end_date = trim($_POST["end_date"]);

		$link = trim($_POST["link"]);
		$sort = trim($_POST["sort"]);

		$caption = addslashes(trim($_POST['caption']));

		$file_image = '';
		$file_image2 = '';

		if(trim($_FILES["flUpload"]["name"])!="")

		{

			$filename = trim($_FILES["flUpload"]["name"]);

			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);

			$filename_large = str_replace(".jpg","_large.jpg",$filename);

			$filename_large = str_replace(".gif","_large.gif",$filename);

			$filename_large = str_replace(".png","_large.png",$filename);

			

			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);



			$file_image = "sliderfile/".$filename;

			

			/*require_once('../inc/phpthumb/phpthumb.class.php');



			// create medium and thumb

			$phpThumb = new phpThumb();

			//$width = 100;

	

			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));

			$phpThumb->setParameter('w', $width);

			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename)){

				}

			}*/

		}


/*
		if(trim($_FILES["flUpload2"]["name"])!="")

		{

			$filename2 = trim($_FILES["flUpload2"]["name"]);

			$filename2 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename2);

			$filename_large2 = str_replace(".jpg","_large.jpg",$filename2);

			$filename_large2 = str_replace(".gif","_large.gif",$filename2);

			$filename_large2 = str_replace(".png","_large.png",$filename2);

			

			move_uploaded_file($_FILES["flUpload2"]["tmp_name"],$file_dir.$filename2);



			$file_image2 = "sliderfile/".$filename2;

			

			/*require_once('../inc/phpthumb/phpthumb.class.php');



			// create medium and thumb

			$phpThumb = new phpThumb();

			//$width = 100;

	

			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));

			$phpThumb->setParameter('w', $width);

			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename)){

				}

			}*/

		/*}
hhide dulu ini untuk file slider en*/
		

		$mainlib->dbquery("insert into slider(start_date,end_date,title,file_image_id,file_image_en,link,caption,sort) values ('$start_date','$end_date','$title','$file_image','$file_image2','$link','$caption','$sort')",$mainlib->ocn);

		

		break;



	case "edit":

		$id = trim($_POST["hidID"]);

		$title = addslashes(trim($_POST["title"]));

    $start_date = trim($_POST["start_date"]);

    $end_date = trim($_POST["end_date"]);

	$link = trim($_POST["link"]);
			$sort = trim($_POST["sort"]);

	$caption = addslashes(trim($_POST['caption']));

    $file_image = '';
    $file_image2 ='';

		if(trim($_FILES["flUpload"]["name"])!="")

		{

			$filename = trim($_FILES["flUpload"]["name"]);

			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);

			$filename_large = str_replace(".jpg","_large.jpg",$filename);

			$filename_large = str_replace(".gif","_large.gif",$filename);

			$filename_large = str_replace(".png","_large.png",$filename);

			

			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);



			$file_image = "sliderfile/".$filename;

			

			/*require_once('../inc/phpthumb/phpthumb.class.php');



			// create medium and thumb

			$phpThumb = new phpThumb();

			//$width = 285;

	

			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));

			$phpThumb->setParameter('w', $width);

			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename)){

				}

			}*/

		}

/*
		if(trim($_FILES["flUpload2"]["name"])!="")

		{

			$filename2 = trim($_FILES["flUpload2"]["name"]);

			$filename2 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename2);

			$filename_large2 = str_replace(".jpg","_large.jpg",$filename2);

			$filename_large2 = str_replace(".gif","_large.gif",$filename2);

			$filename_large2 = str_replace(".png","_large.png",$filename2);

			

			move_uploaded_file($_FILES["flUpload2"]["tmp_name"],$file_dir.$filename2);



			$file_image2 = "sliderfile/".$filename2;

			

			/*require_once('../inc/phpthumb/phpthumb.class.php');



			// create medium and thumb

			$phpThumb = new phpThumb();

			//$width = 100;

	

			$phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));

			$phpThumb->setParameter('w', $width);

			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename)){

				}

			}*/

		/*}
*/


		if($file_image == ''){

 			$mainlib->dbquery("update slider set title = '$title', start_date='$start_date', end_date = '$end_date', link = '$link', caption = '$caption',sort = '$sort' where slider_id='".$id."'",$mainlib->ocn);

		}else{
			

			$mainlib->dbquery("update slider set title = '$title', start_date='$start_date', end_date = '$end_date', link = '$link', caption = '$caption',sort = '$sort', file_image_id='".$file_image."' where slider_id='".$id."'",$mainlib->ocn);

		}


		if($file_image2 !=''){
			$mainlib->dbquery("update slider set  file_image_en='".$file_image2."' where slider_id='".$id."'",$mainlib->ocn);			
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

					$sql .= "slider_id='".$arids[$i]."'";

				}

				$sql = "DELETE FROM slider WHERE (".$sql.")";

				$mainlib->dbquery($sql,$mainlib->ocn);

			}

		}

		break;

}

$mainlib->closedb();

header("Location: sliderlist.php?pgret=1");

?>