<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "awardedit.php";
$mainlib->opendb();

$file_dir = realpath("../awardfile/")."/";
$act = trim($_REQUEST["act"]);

function right($string,$chars)
{
    $vright = substr($string, strlen($string)-$chars,$chars);
    return $vright;
      
}

switch($act)
{
	case "add":
		$tahun = $_POST['tahun'];
		$bulan = $_POST['bulan'];
		$judul = addslashes(trim($_POST["judul"]));
		$tempat = addslashes(trim($_POST["tempat"]));
		$waktu = addslashes(trim($_POST["waktu"]));
		$penghargaan = addslashes(trim($_POST["penghargaan"]));
		$penyelenggara = addslashes(trim($_POST["penyelenggara"]));
		$image_small = '';
		
		if(trim($_FILES["flUpload"]["name"])!="")
		{
		  if(right(trim($_FILES["flUpload"]["name"]),4) == 'jpeg'){
			$filename = str_replace('.jpeg','.jpg',trim($_FILES["flUpload"]["name"]));
			}else{
			$filename = trim($_FILES["flUpload"]["name"]); 
			}
			$filename = str_replace("_large","",$filename);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			if(trim($_FILES["flUpload"]["type"]) == 'image/jpg' || trim($_FILES["flUpload"]["type"]) == 'image/jpeg'){
			$filename_large = str_replace(".jpg","_large.jpg",$filename);  
			}elseif(trim($_FILES["flUpload"]["type"]) == 'image/gif'){
			$filename_large = str_replace(".gif","_large.gif",$filename);  
			}elseif(trim($_FILES["flUpload"]["type"]) == 'image/png'){
			$filename_large = str_replace(".png","_large.png",$filename);
			}
		  
		  move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename_large);
	
		  $image_small = "awardfile/".$filename_large;
		  
		  require_once('../inc/phpthumb/phpthumb.class.php');
	
		  // create medium and thumb
		  $phpThumb = new phpThumb();
		  $width = 150;
	  
		  $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));
		  $phpThumb->setParameter('w', $width);
		  if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
			if($phpThumb->RenderToFile($file_dir.$filename)){
			}
		  }
		}
		
		$mainlib->dbquery("insert into award(tahun,bulan,judul,tempat,waktu,penghargaan,penyelenggara,image_small) values ('$tahun','$bulan','$judul','$tempat','$waktu','$penghargaan','$penyelenggara','$image_small')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$tahun = $_POST['tahun'];
		$bulan = $_POST['bulan'];
		$judul = addslashes(trim($_POST["judul"]));
		$tempat = addslashes(trim($_POST["tempat"]));
		$waktu = addslashes(trim($_POST["waktu"]));
		$penghargaan = addslashes(trim($_POST["penghargaan"]));
		$penyelenggara = addslashes(trim($_POST["penyelenggara"]));
		$image_small = '';
    
		if(trim($_FILES["flUpload"]["name"])!="")
		{
		  if(right(trim($_FILES["flUpload"]["name"]),4) == 'jpeg'){
			$filename = str_replace('.jpeg','.jpg',trim($_FILES["flUpload"]["name"]));
			}else{
			$filename = trim($_FILES["flUpload"]["name"]); 
			}
			$filename = str_replace("_large","",$filename);
			$filename = $mainlib->DuplicateFileNameCorrection($file_dir,$filename);
			if(trim($_FILES["flUpload"]["type"]) == 'image/jpg' || trim($_FILES["flUpload"]["type"]) == 'image/jpeg'){
			$filename_large = str_replace(".jpg","_large.jpg",$filename);  
			}elseif(trim($_FILES["flUpload"]["type"]) == 'image/gif'){
			$filename_large = str_replace(".gif","_large.gif",$filename);  
			}elseif(trim($_FILES["flUpload"]["type"]) == 'image/png'){
			$filename_large = str_replace(".png","_large.png",$filename);
			}
		  
		  move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$filename_large);
	
		  $image_small = "awardfile/".$filename_large;
		  
		  require_once('../inc/phpthumb/phpthumb.class.php');
	
		  // create medium and thumb
		  $phpThumb = new phpThumb();
		  $width = 150;
	  
		  $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large));
		  $phpThumb->setParameter('w', $width);
		  if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
			if($phpThumb->RenderToFile($file_dir.$filename)){
			}
		  }
		}
		
		$q_image_small = "";
		if($image_small != ''){
		  $q_image_small = ", image_small = '$image_small'";
		}
		
		$mainlib->dbquery("update award set tahun = '$tahun', bulan='$bulan', judul = '$judul', tempat = '$tempat', waktu = '$waktu', penghargaan = '$penghargaan', penyelenggara = '$penyelenggara'" . $q_image_small . " where award_id='".$id."'",$mainlib->ocn);
		
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
					$sql .= "award_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM award WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: awardlist.php?pgret=1");
?>