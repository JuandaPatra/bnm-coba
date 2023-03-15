<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "productedit.php";
$mainlib->opendb();

$file_dir = realpath("../productfile/")."/";
$act = trim($_REQUEST["act"]);

function right($string,$chars)
{
    $vright = substr($string, strlen($string)-$chars,$chars);
    return $vright;
      
}

switch($act)
{
	case "add":
		$category_id = $_POST['category'];
            //  $subcategory_id = $_POST['subcategory'];
		$name_id = addslashes(trim($_POST["name_id"]));
		$name_en = addslashes(trim($_POST["name_en"]));
		//$resume_id = addslashes(trim($_POST["resume_id"]));
		//$resume_en = addslashes(trim($_POST["resume_en"]));
		//$description_id = addslashes(trim($_POST["description_id"]));
		//$description_en = addslashes(trim($_POST["description_en"]));
		//$status = $_POST['status'];
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
	
		  $image_small = "productfile/".$filename_large;
		  
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
		
		$mainlib->dbquery("insert into product(name_id,name_en,category_id,image_small) values ('$name_id','$name_en','$category_id','$image_small')",$mainlib->ocn);
    
    $id_product = mysql_insert_id();
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
    
          $images = "productfile/".$filename_large1;
          
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
          $mainlib->dbquery("insert into imageproduct(product_id,file_image) values('$id_product','$images')",$mainlib->ocn);
        }
      }
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$category_id = $_POST['category'];
            //  $subcategory_id = $_POST['subcategory'];
		$name_id = addslashes(trim($_POST["name_id"]));
		$name_en = addslashes(trim($_POST["name_en"]));
		//$resume_id = addslashes(trim($_POST["resume_id"]));
		//$resume_en = addslashes(trim($_POST["resume_en"]));
		//$description_id = addslashes(trim($_POST["description_id"]));
		//$description_en = addslashes(trim($_POST["description_en"]));
		//$status = $_POST['status'];
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
	
		  $image_small = "productfile/".$filename_large;
		  
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
		
		$mainlib->dbquery("update product set name_id = '$name_id', name_en = '$name_en', category_id = '$category_id'" . $q_image_small . " where product_id='".$id."'",$mainlib->ocn);
		
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
		
			  $images = "productfile/".$filename_large1;
			  
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
			  $mainlib->dbquery("insert into imageproduct(product_id,file_image) values('$id','$images')",$mainlib->ocn);
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
					$sql .= "product_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM product WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: productlist.php?pgret=1");
?>