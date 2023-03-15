<?php

set_time_limit(0);

include("../inc/class.mainlib.inc.php");

admsessions();

if(!isset($_SESSION["admusername"])){

	header("Location: login.php");

	exit;

}



$mainlib = new mainlib();

$pageedit = "subproductedit.php";

$mainlib->opendb();



$file_dir = realpath("../pagesfile/")."/";

$act = trim($_REQUEST["act"]);

$bannerEN ='';
$bannerID ='';

function right($string,$chars)

{

    $vright = substr($string, strlen($string)-$chars,$chars);

    return $vright;

      

}



switch($act)

{

	case "add":

		$title_id = addslashes(trim($_POST["title_id"]));

		$title_en = addslashes(trim($_POST["title_en"]));

		$description_id = addslashes(trim($_POST["description_id"]));

		$description_en = addslashes(trim($_POST["description_en"]));

		$category_id = $_POST['category_id'];
		$product_id = $_POST['product_id'];

		$url = trim($_POST["url"]);

		$author = $_SESSION["admusername"];

		$status_id =$_POST["status"];

		$parent = $_POST["parent"];

		$order = $_POST["order"];

		$date_created = date("Y-m-d H:i:s");

		$date_modified = date("Y-m-d H:i:s");

		$file_attachment = '';	

		$latitude = trim($_POST['latitude']);	

		$longitude = trim($_POST['longitude']);	

		$temp = $_POST['temp'];


		

		if(trim($_FILES["flUpload"]["name"])!="")

		{

			$dlfile = trim($_FILES["flUpload"]["name"]);

			$dlfile = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile);

			

			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$dlfile);



			$file_attachment = "pagesfile/".$dlfile;

		}

		if(trim($_FILES["flUploadBannerID"]["name"])!="")

		{

			$dlfile2 = trim($_FILES["flUploadBannerID"]["name"]);

			$dlfile2 = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile2);

			

			move_uploaded_file($_FILES["flUploadBannerID"]["tmp_name"],$file_dir.$dlfile2);



			$bannerID = "pagesfile/".$dlfile2;

		}


		if(trim($_FILES["flUploadBannerEN"]["name"])!="")

		{

			$dlfile3 = trim($_FILES["flUploadBannerEN"]["name"]);

			$dlfile3 = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile3);

			

			move_uploaded_file($_FILES["flUploadBannerEN"]["tmp_name"],$file_dir.$dlfile3);



			$bannerEN = "pagesfile/".$dlfile3;

		}

		

		$mainlib->dbquery("insert into pages(category_id,product_id,title_id,title_en,description_id,description_en,url,author,status_id,parent,pages_order,date_created,date_modified,file_attachment,latitude,longitude,banner_id,banner_en)
				 values ('category_id','$product_id','$title_id','$title_en','$description_id','$description_en','$url','$author','$status_id','$parent','$order','$date_created','$date_modified','$file_attachment','$latitude','$longitude','$bannerID','$bannerEN')",$mainlib->ocn);

    

		$id_pages = mysql_insert_id();

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

			  $filename1 = strtolower(trim($filename1));

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

		

			  $images = "pagesfile/".$filename_large1;

			  

			  require_once('../inc/phpthumb/phpthumb.class.php');

		

			  // create medium and thumb

			  $phpThumb = new phpThumb();

			  $width = 203;

		  

			  $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));

			  $phpThumb->setParameter('w', $width);

			  if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename1)){

				}

			  }

			  $mainlib->dbquery("insert into imagepages(pages_id,file_image) values('$id_pages','$images')",$mainlib->ocn);

			}

      	}

		

		break;



	case "edit":

		$id = trim($_POST["hidID"]);

		$title_id = addslashes(trim($_POST["title_id"]));

		$title_en = addslashes(trim($_POST["title_en"]));

		$description_id = addslashes(trim($_POST["description_id"]));

		$description_en = addslashes(trim($_POST["description_en"]));

		$category_id = $_POST['category_id'];
		$product_id = $_POST['product_id'];

		$url = trim($_POST["url"]);

		$author = $_SESSION["admusername"];

		$status_id =$_POST["status"];

		$parent = $_POST["parent"];

		$order = $_POST["order"];

		$date_modified = date("Y-m-d H:i:s"); 

		$file_attachment = '';	

		$latitude = trim($_POST['latitude']);	

		$longitude = trim($_POST['longitude']);		   

		$temp = $_POST['temp'];

		

		if(trim($_FILES["flUpload"]["name"])!="")

		{

			$dlfile = trim($_FILES["flUpload"]["name"]);

			$dlfile = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile);

			

			move_uploaded_file($_FILES["flUpload"]["tmp_name"],$file_dir.$dlfile);



			$file_attachment = "pagesfile/".$dlfile;

		}

		if(trim($_FILES["flUploadBannerID"]["name"])!="")

		{

			$dlfile2 = trim($_FILES["flUploadBannerID"]["name"]);

			$dlfile2 = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile2);

			

			move_uploaded_file($_FILES["flUploadBannerID"]["tmp_name"],$file_dir.$dlfile2);



			$bannerID = "pagesfile/".$dlfile2;

		}


		if(trim($_FILES["flUploadBannerEN"]["name"])!="")

		{

			$dlfile3 = trim($_FILES["flUploadBannerEN"]["name"]);

			$dlfile3 = $mainlib->DuplicateFileNameCorrection($file_dir,$dlfile3);

			

			move_uploaded_file($_FILES["flUploadBannerEN"]["tmp_name"],$file_dir.$dlfile3);



			$bannerEN = "pagesfile/".$dlfile3;

		}		



		if($file_attachment == ''){

 			$mainlib->dbquery("update pages set category_id = '$category_id',product_id ='$product_id',title_id = '$title_id', title_en = '$title_en', description_id = '$description_id', description_en = '$description_en', url = '$url', author = '$author', status_id = '$status_id', parent = '$parent', pages_order = '$order', date_modified = '$date_modified', latitude = '$latitude', longitude = '$longitude' where pages_id='".$id."'",$mainlib->ocn);

		}else{

			$mainlib->dbquery("update pages set category_id = '$category_id',product_id ='$product_id', title_id = '$title_id', title_en = '$title_en', description_id = '$description_id', description_en = '$description_en', url = '$url', author = '$author', status_id = '$status_id', parent = '$parent', pages_order = '$order', date_modified = '$date_modified', file_attachment = '$file_attachment', latitude = '$latitude', longitude = '$longitude' where pages_id='".$id."'",$mainlib->ocn);

		}

		if($bannerID !=''){
				$mainlib->dbquery("update pages set banner_id = '$bannerID' where pages_id='".$id."'",$mainlib->ocn);
		}

		if($bannerEN !=''){
				$mainlib->dbquery("update pages set banner_en = '$bannerEN' where pages_id='".$id."'",$mainlib->ocn);
		}
		

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

			  $filename1 = strtolower(trim($filename1));

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

		

			  $images = "pagesfile/".$filename_large1;

			  

			  require_once('../inc/phpthumb/phpthumb.class.php');

		

			  // create medium and thumb

			  $phpThumb = new phpThumb();

			  $width = 203;

		  

			  $phpThumb->setSourceData(file_get_contents($file_dir.$filename_large1));

			  $phpThumb->setParameter('w', $width);

			  if ($phpThumb->GenerateThumbnail()) { // this line is VERY important, do not remove it!

				if($phpThumb->RenderToFile($file_dir.$filename1)){

				}

			  }

			  $mainlib->dbquery("insert into imagepages(pages_id,file_image) values('$id','$images')",$mainlib->ocn);

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

					$sql .= "pages_id='".$arids[$i]."'";

					if($sql2!="")

					{

						$sql2 .= " OR ";

					}

					$sql2 .= "pages_id='".$arids[$i]."'";

				}

				$sql = "DELETE FROM pages WHERE (".$sql.")";

				$mainlib->dbquery($sql,$mainlib->ocn);

				$sql2 = "DELETE FROM imagepages WHERE (".$sql2.")";

				$mainlib->dbquery($sql2,$mainlib->ocn);

			}

		}

		break;

}

$mainlib->closedb();

/*
if($act == "add"){

  header("Location: pagesedit.php?id=$id_pages"); 

}elseif($act == "edit"){

  header("Location: pagesedit.php?id=$id"); 

}else{

  header("Location: pageslist.php"); 

}
*/
header("Location:subproductlist.php"); 

?>