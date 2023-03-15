<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "banneredit.php";
$mainlib->opendb();

$file_dir = realpath("../bannerfile/")."/";
$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
    $posting_date = trim($_POST["posting_date"]);
		$start_date = trim($_POST["start_date"]);
		$end_date = trim($_POST["end_date"]);
		$title = addslashes(trim($_POST['title']));
    $url = trim($_POST["url"]);
	$position = trim($_POST["position"]);
		$file_banner = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			$filename_large = str_replace(".jpg","_large.jpg",$filename);
			$filename_large = str_replace(".gif","_large.gif",$filename);
			$filename_large = str_replace(".png","_large.png",$filename);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);

			$file_banner = "bannerfile/".$filename;
			
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
		
		$mainlib->dbquery("insert into banner(posting_date,start_date,end_date,title,file_banner,url,position,hits) values ('$posting_date','$start_date','$end_date','$title','$file_banner','$url','$position','0')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = trim($_POST["posting_date"]);
    $start_date = trim($_POST["start_date"]);
    $end_date = trim($_POST["end_date"]);
	$title = addslashes(trim($_POST['title']));
    $url = trim($_POST["url"]);
	$position = trim($_POST["position"]);
    $file_banner = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			$filename_large = str_replace(".jpg","_large.jpg",$filename);
			$filename_large = str_replace(".gif","_large.gif",$filename);
			$filename_large = str_replace(".png","_large.png",$filename);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);

			$file_banner = "bannerfile/".$filename;
			
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

		if($file_banner == ''){
 			$mainlib->dbquery("update banner set posting_date = '$posting_date', start_date='$start_date', end_date = '$end_date', title = '$title', url = '$url', position = '$position' where banner_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update banner set posting_date = '$posting_date', start_date='$start_date', end_date = '$end_date', title = '$title', url = '$url', position = '$position', file_banner='".$file_banner."' where banner_id='".$id."'",$mainlib->ocn);
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
					$sql .= "banner_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM banner WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: bannerlist.php?pgret=1");
?>