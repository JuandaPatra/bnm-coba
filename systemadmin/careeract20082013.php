<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "careeredit.php";
$mainlib->opendb();

$file_dir = realpath("../careerfile/")."/";
$act = trim($_REQUEST["act"]);

function right($string,$chars)
{
    $vright = substr($string, strlen($string)-$chars,$chars);
    return $vright;
      
}

switch($act)
{
	case "add":
		$posting_date = $_POST['posting_date'];
		$expired_date = $_POST['expired_date'];
		$code = $_POST['code'];
		$title_id = addslashes(trim($_POST["title_id"]));
		$title_en = addslashes(trim($_POST["title_en"]));
		$description_id = addslashes(trim($_POST["description_id"]));
		$description_en = addslashes(trim($_POST["description_en"]));
		$amount = $_POST['amount'];
		$category = trim($_POST['category']);
		$lokasi = trim($_POST['lokasi']);
		$file_attach = '';		
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUpload"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

			$file_attach = "careerfile/".$pdfile;
		}

		$mainlib->dbquery("insert into career(posting_date,lokasi,expired_date,amount,code,title_id,title_en,description_id,description_en,category,file_attach) values ('$posting_date','$lokasi','$expired_date','$amount','$code','$title_id','$title_en','$description_id','$description_en','$category','$file_attach')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = $_POST['posting_date'];
		$expired_date = $_POST['expired_date'];
		$code = $_POST['code'];
		$title_id = addslashes(trim($_POST["title_id"]));
		$title_en = addslashes(trim($_POST["title_en"]));
		$description_id = addslashes(trim($_POST["description_id"]));
		$description_en = addslashes(trim($_POST["description_en"]));
		$amount = $_POST['amount'];
		$category = trim($_POST['category']);
		$lokasi = trim($_POST['lokasi']);
		$file_attach = '';		
		if(trim($_FILES["flUpload"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUpload"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$pdfile);

			$file_attach = "careerfile/".$pdfile;
		}
		
		if($file_attach == ''){
 			$mainlib->dbquery("update career set posting_date = '$posting_date',lokasi = '$lokasi', expired_date = '$expired_date', amount = '$amount', code = '$code', title_id='$title_id', title_en = '$title_en',  description_id = '$description_id', description_en = '$description_en', category = '$category' where career_id='".$id."'",$mainlib->ocn);
		}else{
			$mainlib->dbquery("update career set posting_date = '$posting_date',lokasi = '$lokasi', expired_date = '$expired_date', amount = '$amount', code = '$code', title_id='$title_id', title_en = '$title_en',  description_id = '$description_id', description_en = '$description_en', category = '$category', file_attach = '$file_attach' where career_id='".$id."'",$mainlib->ocn);
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
					$sql .= "career_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM career WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: careerlist.php?pgret=1");
?>