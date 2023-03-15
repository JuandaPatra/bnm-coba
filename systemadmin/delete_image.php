<?php
include("../inc/class.mainlib.inc.php");
admsessions();

if(!isset($_POST['id']) && !isset($_POST['db'])){
	return '';
}

$id = $_POST['id'];
$db = $_POST['db'];

$mainlib = new mainlib();
$mainlib->opendb();

function right($string,$chars)
{
    $vright = substr($string, strlen($string)-$chars,$chars);
    return $vright;
      
}

switch($db){	  
  case "news":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from news where news_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update news set image_small='' where news_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
  case "imagenews":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imagenews where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imagenews where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;

       
     case "video":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from video where video_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update video set image_small='' where video_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
    
    case "imagevideo":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imagevideo where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imagevideo where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;
    
	
  case "layanan":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from layanan where layanan_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update layanan set image_small='' where layanan_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
  case "imagelayanan":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imagelayanan where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imagelayanan where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;
	
  case "investor":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from investor where investor_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update investor set image_small='' where investor_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
  case "investorpdf":
    $file_pdf = "";
    $ors = $mainlib->dbquery("select file_pdf from investor where investor_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_pdf = $row["file_pdf"];
    }
    mysql_free_result($ors);
    
    if($file_pdf != ""){
      $mainlib->dbquery("update investor set file_pdf='' where investor_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$file_pdf)){
        unlink("../".$file_pdf);
      }
    }
    break;
  
  case "imageinvestor":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imageinvestor where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imageinvestor where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;
    
  case "promosi":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from promosi where promosi_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update promosi set image_small='' where promosi_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
  case "imagelayanan":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imagelayanan where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imagelayanan where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;	
	
  case "product":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from product where product_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update product set image_small='' where product_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
    case "subproduct":
    $image_small = "";
    $ors = $mainlib->dbquery("select image_small from sub_product where sub_product_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $image_small = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($image_small != ""){
      $mainlib->dbquery("update sub_product set image_small='' where sub_product_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$image_small)){
        unlink("../".$image_small);
        $image_small2 = str_replace("_large","",$image_small);
        unlink("../".$image_small2);
      }
    }
    break;
    
  case "imageproduct":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imageproduct where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imageproduct where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;
    
    
    case "imagesubproduct":
    $images = "";
    $ors = $mainlib->dbquery("select file_image from imagesubproduct where image_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $images = $row["file_image"];
    }
    mysql_free_result($ors);
    
    if($images != ""){
      $mainlib->dbquery("delete from imagesubproduct where image_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$images)){
        unlink("../".$images);
        $images2 = str_replace("_large","",$images);
        unlink("../".$images2);
      }
    }
    break;
	
  case "slider":
    $file_image = "";
    $ors = $mainlib->dbquery("select file_image_id from slider where slider_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_image_id = $row["file_image_id"];
    }
    mysql_free_result($ors);
    
    if($file_image_id != ""){
      $mainlib->dbquery("update slider set file_image_id='' where slider_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$file_image)){
        unlink("../".$file_image);
      }
    }
    break;


    case "slider2":
    $file_image = "";
    $ors = $mainlib->dbquery("select file_image_en from slider where slider_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_image_en = $row["file_image_en"];
    }
    mysql_free_result($ors);
    
    if($file_image_en != ""){
      $mainlib->dbquery("update slider set file_image_en='' where slider_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$file_image)){
        unlink("../".$file_image);
      }
    }
    break;
	
  case "banner":
    $file_banner = "";
    $ors = $mainlib->dbquery("select file_banner from banner where banner_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_banner = $row["file_banner"];
    }
    mysql_free_result($ors);
    
    if($file_banner != ""){
      $mainlib->dbquery("update banner set file_banner='' where banner_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$file_banner)){
        unlink("../".$file_banner);
      }
    }
    break;

  case "pages":
		$file_attachment = "";
		$ors = $mainlib->dbquery("select file_attachment from pages where pages_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $file_attachment = $row["file_attachment"];
		}
		mysql_free_result($ors);
		if($file_attachment != ""){
		  $mainlib->dbquery("update pages set file_attachment='' where pages_id='".$id."'",$mainlib->ocn);
		  if(file_exists("../".$file_attachment)){
			unlink("../".$file_attachment);
		  }
		}
		break;
	
	case "imagepages":
		$file_images = "";
		$ors = $mainlib->dbquery("select file_image from imagepages where image_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $file_images = $row["file_image"];
		}
		mysql_free_result($ors);
		
		if($file_images != ""){
		  $mainlib->dbquery("delete from imagepages where image_id='".$id."'",$mainlib->ocn);
		  
		  if(file_exists("../".$file_images)){
			unlink("../".$file_images);
			$file_images2 = str_replace("_large","",$file_images);
			unlink("../".$file_images2);
		  }
		}
		break;


  case "pagesbannerID":
    $file_attachment = "";
    $ors = $mainlib->dbquery("select banner_id from pages where pages_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_attachment = $row["banner_id"];
    }
    mysql_free_result($ors);
    if($file_attachment != ""){
      $mainlib->dbquery("update pages set banner_id='' where pages_id='".$id."'",$mainlib->ocn);
      if(file_exists("../".$file_attachment)){
      unlink("../".$file_attachment);
      }
    }
    break;

    case "pagesbannerEN":
    $file_attachment = "";
    $ors = $mainlib->dbquery("select banner_en from pages where pages_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $file_attachment = $row["banner_en"];
    }
    mysql_free_result($ors);
    if($file_attachment != ""){
      $mainlib->dbquery("update pages set banner_en='' where pages_id='".$id."'",$mainlib->ocn);
      if(file_exists("../".$file_attachment)){
      unlink("../".$file_attachment);
      }
    }
    break;
    
		
	case "award":
		$image_small = "";
		$ors = $mainlib->dbquery("select image_small from award where award_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $image_small = $row["image_small"];
		}
		mysql_free_result($ors);
		
		if($image_small != ""){
		  $mainlib->dbquery("update award set image_small='' where award_id='".$id."'",$mainlib->ocn);
		  
		  if(file_exists("../".$image_small)){
			unlink("../".$image_small);
			$image_small2 = str_replace("_large","",$image_small);
			unlink("../".$image_small2);
		  }
		}
		break;

   case "press":
		$pdf = "";
		$ors = $mainlib->dbquery("select pdf from press where press_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $pdf = $row["pdf"];
		}
		mysql_free_result($ors);
		
		if($pdf != ""){
		  $mainlib->dbquery("update press set pdf='' where press_id='".$id."'",$mainlib->ocn);
		  
		  if(file_exists("../".$pdf)){
			unlink("../".$pdf);
		  }
		}
		break;
		
	case "kinerja":
		$pdf = "";
		$ors = $mainlib->dbquery("select pdf from kinerja where kinerja_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $pdf = $row["pdf"];
		}
		mysql_free_result($ors);
		
		if($pdf != ""){
		  $mainlib->dbquery("update kinerja set pdf='' where kinerja_id='".$id."'",$mainlib->ocn);
		  
		  if(file_exists("../".$pdf)){
			unlink("../".$pdf);
		  }
		}
		break;


    case "kinerjaimage":
    $pdf = "";
    $ors = $mainlib->dbquery("select image_small from kinerja where kinerja_id='".$id."'",$mainlib->ocn);
    if($row=$mainlib->dbfetcharray($ors)){
      $pdf = $row["image_small"];
    }
    mysql_free_result($ors);
    
    if($pdf != ""){
      $mainlib->dbquery("update kinerja set image_small ='' where kinerja_id='".$id."'",$mainlib->ocn);
      
      if(file_exists("../".$pdf)){
      unlink("../".$pdf);
      }
    }
    break;
		
	case "career":
		$file_attach = "";
		$ors = $mainlib->dbquery("select file_attach from career where career_id='".$id."'",$mainlib->ocn);
		if($row=$mainlib->dbfetcharray($ors)){
		  $file_attach = $row["file_attach"];
		}
		mysql_free_result($ors);
		
		if($file_attach != ""){
		  $mainlib->dbquery("update career set file_attach ='' where career_id='".$id."'",$mainlib->ocn);
		  
		  if(file_exists("../".$file_attach)){
			unlink("../".$file_attach);
		  }
		}
		break;
}

echo $id;
$mainlib->closedb();
?>