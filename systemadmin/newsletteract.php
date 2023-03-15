<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "newsletteredit.php";
$mainlib->opendb();

$file_dir = realpath("../newsletterfile/")."/";
$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$posting_date = trim($_POST["posting_date"]);
		$title = addslashes(trim($_POST["title"]));
    $resume = addslashes(trim($_POST["resume"]));
		$description = addslashes(trim($_POST["description"]));
		
		$pdf = '';		
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUpload"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

			$pdf = "newsletterfile/".$pdfile;
		}
		
		$mainlib->dbquery("insert into newsletter(posting_date,title,resume,description,pdf) values ('$posting_date','$title','$resume','$description','$pdf')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = trim($_POST["posting_date"]);
    $title = addslashes(trim($_POST["title"]));
    $resume = addslashes(trim($_POST["resume"]));
    $description = addslashes(trim($_POST["description"]));
	
    $pdf = '';    
    if(trim($_FILES["flUpload"]["name"])!="")
    {
      $pdfile = trim($_FILES["flUpload"]["name"]);
      $pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
      
      move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

     $pdf = "newsletterfile/".$pdfile;
    }

		if($pdf == ''){
 			$mainlib->dbquery("update newsletter set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description' where newsletter_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update newsletter set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description',  pdf='".$pdf."' where newsletter_id='".$id."'",$mainlib->ocn);
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
					$sql .= "newsletter_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM newsletter WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: newsletterlist.php?pgret=1");
?>