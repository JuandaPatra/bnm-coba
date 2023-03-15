<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "investoredit.php";
$mainlib->opendb();

$file_dir = realpath("../investorfile/")."/";
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
		$title_id = addslashes(trim($_POST["title_id"]));
		$title_en = addslashes(trim($_POST["title_en"]));
		$resume_id = addslashes(trim($_POST["resume_id"]));
		$resume_en = addslashes(trim($_POST["resume_en"]));
		$description_id = addslashes(trim($_POST["description_id"]));
		$description_en = addslashes(trim($_POST["description_en"]));
		$source = trim($_POST['source']);
		$temp = $_POST["temp"];
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
	
		  $image_small = "investorfile/".$filename_large;
		  
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
		
		$file_pdf = '';		
		if(trim($_FILES["flUploadPDF"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUploadPDF"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUploadPDF"]["tmp_name"],$file_dir.$pdfile);

			$file_pdf = "investorfile/".$pdfile;
		}
		
		$mainlib->dbquery("insert into investor(posting_date,title_id,title_en,resume_id,resume_en,description_id,description_en,source,image_small,file_pdf) values ('$posting_date','$title_id','$title_en','$resume_id','$resume_en','$description_id','$description_en','$source','$image_small','$file_pdf')",$mainlib->ocn);
    
    $id_investor = mysql_insert_id();
    foreach($temp as $jlh)
      {
        $tes = $tes + 1;
        $im = "image" . $tes;
        if(trim($_FILES[$im]["name"])!="")
        {
          if(right(trim($_FILES[$im]["name"]),4) == 'jpeg'){
            $filename1 = str_replace('.jpeg','.jpg',trim($_FILES[$im]["name"]));
          }else{
            $filename1 = trim($_FILES[$im]["name"]); 
          }
		  $filename1 = str_replace("_large","",$filename1);
          $filename1 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename1);
          if(trim($_FILES[$im]["type"] == "image/jpeg")){  
            $filename_large1 = str_replace(".jpg","_large.jpg",$filename1);  
          }elseif(trim($_FILES[$im]["type"]) == 'image/gif'){
            $filename_large1 = str_replace(".gif","_large.gif",$filename1);  
          }elseif(trim($_FILES[$im]["type"]) == 'image/png'){
            $filename_large1 = str_replace(".png","_large.png",$filename1);
          }
          
          move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$filename_large1);
    
          $images = "investorfile/".$filename_large1;
          
          require_once('../inc/phpthumb/phpthumb.class.php');
    
          // create medium and thumb
          $phpThumb = new phpThumb();
          $width = 150;
      
          $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));
          $phpThumb->setParameter('w', $width);
          if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
            if($phpThumb->RenderToFile($file_dir.$filename1)){
            }
          }
          $mainlib->dbquery("insert into imageinvestor(investor_id,file_image) values('$id_investor','$images')",$mainlib->ocn);
        }
      }
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$posting_date = $_POST['posting_date'];
		$title_id = addslashes(trim($_POST["title_id"]));
		$title_en = addslashes(trim($_POST["title_en"]));
		$resume_id = addslashes(trim($_POST["resume_id"]));
		$resume_en = addslashes(trim($_POST["resume_en"]));
		$description_id = addslashes(trim($_POST["description_id"]));
		$description_en = addslashes(trim($_POST["description_en"]));
		$source = trim($_POST['source']);
		$temp = $_POST["temp"];
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
	
		  $image_small = "investorfile/".$filename_large;
		  
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
		
		$file_pdf = '';		
		if(trim($_FILES["flUploadPDF"]["name"])!="")
		{
			$pdfile = trim($_FILES["flUploadPDF"]["name"]);
			$pdfile = $mainlib->DuplicateFileNameCorrection($file_dir,$pdfile);
			
			move_uploaded_file($_FILES["flUploadPDF"]["tmp_name"],$file_dir.$pdfile);

			$file_pdf = "investorfile/".$pdfile;
		}
		
		$q_image_small = "";
		if($image_small != ''){
		  $q_image_small = ", image_small = '$image_small'";
		}
		
		$q_file_pdf = "";
		if($file_pdf != ''){
		  $q_file_pdf = ", file_pdf = '$file_pdf'";
		}
		
		$mainlib->dbquery("update investor set posting_date = '$posting_date', title_id='$title_id', title_en = '$title_en', resume_id = '$resume_id', resume_en = '$resume_en', description_id = '$description_id', description_en = '$description_en', source = '$source'" . $q_image_small . $q_file_pdf . " where investor_id='".$id."'",$mainlib->ocn);
		
		foreach($temp as $jlh)
		  {
			$tes = $tes + 1;
			$im = "image" . $tes;
			if(trim($_FILES[$im]["name"])!="")
			{
			  if(right(trim($_FILES[$im]["name"]),4) == 'jpeg'){
				$filename1 = str_replace('.jpeg','.jpg',trim($_FILES[$im]["name"]));
			  }else{
				$filename1 = trim($_FILES[$im]["name"]); 
			  }
			  $filename1 = str_replace("_large","",$filename1);
			  $filename1 = $mainlib->DuplicateFileNameCorrection($file_dir,$filename1);
			  if(trim($_FILES[$im]["type"] == "image/jpeg")){  
				$filename_large1 = str_replace(".jpg","_large.jpg",$filename1);  
			  }elseif(trim($_FILES[$im]["type"]) == 'image/gif'){
				$filename_large1 = str_replace(".gif","_large.gif",$filename1);  
			  }elseif(trim($_FILES[$im]["type"]) == 'image/png'){
				$filename_large1 = str_replace(".png","_large.png",$filename1);
			  }
			  
			  move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$filename_large1);
		
			  $images = "investorfile/".$filename_large1;
			  
			  require_once('../inc/phpthumb/phpthumb.class.php');
		
			  // create medium and thumb
			  $phpThumb = new phpThumb();
			  $width = 150;
		  
			  $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));
			  $phpThumb->setParameter('w', $width);
			  if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!
				if($phpThumb->RenderToFile($file_dir.$filename1)){
				}
			  }
			  $mainlib->dbquery("insert into imageinvestor(investor_id,file_image) values('$id','$images')",$mainlib->ocn);
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
					$sql .= "investor_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM investor WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: investorlist.php?pgret=1");
?>