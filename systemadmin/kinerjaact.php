<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "kinerjaedit.php";
$mainlib->opendb();

$file_dir = realpath("../kinerjafile/")."/";
$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$posting_date = trim($_POST["posting_date"]);
		$title = addslashes(trim($_POST["title"]));
    $resume = addslashes(trim($_POST["resume"]));
		$description = addslashes(trim($_POST["description"]));
		$category = $_POST['category'];
		$tahun = $_POST['tahun'];
		$pdf = '';
                $image_small ='';
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUpload"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

			$pdf = "kinerjafile/".$pdfile;
		}
                
                
                if(trim($_FILES["flUpload2"]["name"])!="")
		{
			$file = trim($_FILES["flUpload2"]["name"]);
			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);
			
			move_uploaded_file($_FILES["flUpload2"]["tmp_name"],$file_dir.$file);

			$image_small = "kinerjafile/".$file;
		}
		
		$mainlib->dbquery("insert into kinerja(posting_date,title,resume,description,pdf,category,image_small,tahun) values ('$posting_date','$title','$resume','$description','$pdf','$category','$image_small','$tahun')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = trim($_POST["posting_date"]);
    $title = addslashes(trim($_POST["title"]));
    $resume = addslashes(trim($_POST["resume"]));
    $description = addslashes(trim($_POST["description"]));
	$category = $_POST['category'];
	$tahun = $_POST['tahun'];
    $pdf = '';    
    $image_small ='';
    if(trim($_FILES["flUpload"]["name"])!="")
    {
      $pdfile = trim($_FILES["flUpload"]["name"]);
      $pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
      
      move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

      $pdf = "kinerjafile/".$pdfile;
    }
    
                if(trim($_FILES["flUpload2"]["name"])!="")
		{
			$file = trim($_FILES["flUpload2"]["name"]);
			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);
			
			move_uploaded_file($_FILES["flUpload2"]["tmp_name"],$file_dir.$file);

			$image_small = "kinerjafile/".$file;
		}
    

		if($pdf == ''){
 			$mainlib->dbquery("update kinerja set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description', category = '$category',tahun = '$tahun' where kinerja_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update kinerja set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description', category = '$category',tahun = '$tahun', pdf='".$pdf."' where kinerja_id='".$id."'",$mainlib->ocn);
		}
                
                if($image_small !=''){
                    $mainlib->dbquery("update kinerja set image_small = '$image_small' where kinerja_id='".$id."'",$mainlib->ocn);
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
					$sql .= "kinerja_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM kinerja WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: kinerjalist.php?pgret=1");
?>