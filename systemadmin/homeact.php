<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();
admsessionchk();

$mainlib = new mainlib();
$pageedit = "homeedit.php";
$mainlib->opendb();
$mainlib->permissionchk($_SESSION["admurl"],$pageedit);

$file_dir = realpath("../images/")."/";
$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$item_title = trim($_POST["txtItemTitle"]);
		$item_description = trim($_POST["txtItemDescription"]);
		$item_url = trim($_POST["txtItemUrl"]);

		$item_image = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);
			$item_image = "images/".$filename;
			
			require_once('../inc/phpthumb/phpthumb.class.php');

			// create medium and thumb
			$phpThumb = new phpThumb();
			$width = 285;
	
			$phpThumb->setSourceData(file_get_contents($file_dir.$filename));
			$phpThumb->setParameter('w', $width);
			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
				if($phpThumb->RenderToFile($file_dir.$filename)){
				}
			}
		}

		$mainlib->dbquery("insert into frontpage(item_title, item_description, item_image, date_created, item_url) values ('".$item_title."','".$item_description."','".$item_image."',now(),'".$item_url."')",$mainlib->ocn);
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$item_title = trim($_POST["txtItemTitle"]);
		$item_description = trim($_POST["txtItemDescription"]);
		$item_url = trim($_POST["txtItemUrl"]);

		$item_image = '';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$filename = trim($_FILES["flUpload"]["name"]);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename);
			$item_image = "images/".$filename;
			
			require_once('../inc/phpthumb/phpthumb.class.php');

			// create medium and thumb
			$phpThumb = new phpThumb();
			$width = 285;
	
			$phpThumb->setSourceData(file_get_contents($file_dir.$filename));
			$phpThumb->setParameter('w', $width);
			if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
				if($phpThumb->RenderToFile($file_dir.$filename)){
				}
			}
		}

		if($item_image == ''){
			$mainlib->dbquery("update frontpage set item_title='".$item_title."', item_description='".$item_description. "', item_url='".$item_url."' where frontpage_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update frontpage set item_title='".$item_title."', item_description='".$item_description. "', item_image='".$item_image."', item_url='".$item_url."' where frontpage_id='".$id."'",$mainlib->ocn);
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
					$sql .= "frontpage_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM frontpage WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;

	case "change":
		$id = $_POST["hidIDs"];
		$status = $_POST["hidStatus"];
		$mainlib->dbquery("update frontpage set is_publish='".$status."' where frontpage_id='".$id."'",$mainlib->ocn);
		break;
}
$mainlib->closedb();
header("Location: homelist.php?pgret=1");
?>