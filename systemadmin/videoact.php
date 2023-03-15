<?php

set_time_limit(0);

include("../inc/class.mainlib.inc.php");

admsessions();



$mainlib = new mainlib();

$pageedit = "videoedit.php";

$mainlib->opendb();

$pdf='';


$file_dir = realpath("../videofile/")."/";

$act = trim($_REQUEST["act"]);
$temp = $_POST["temp"];

switch($act)

{

	case "add":

		$posting_date = trim($_POST["posting_date"]);
		

		$title = addslashes(trim($_POST["title"]));

    $resume = addslashes(trim($_POST["resume"]));

		$description = addslashes(trim($_POST["description"]));

		$uri = trim($_POST["uri"]);
                
                $latitude = trim($_POST["latitude"]);
                
                $longitude = trim($_POST["longitude"]);
                

                    
                
                
                if(trim($_FILES["flUpload1"]["name"])!="")

		{

			$file = trim($_FILES["flUpload1"]["name"]);

			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

			

			move_uploaded_file($_FILES["flUpload1"]["tmp_name"],$file_dir.$file);



			$image_small = "videofile/".$file;

		}

		

		$mainlib->dbquery("insert into video(posting_date,title,resume,description,uri,image_small,latitude,longitude) values ('$posting_date','$title','$resume','$description','$uri','$image_small','$latitude','$longitude')",$mainlib->ocn);
                    
                
                $id_video = mysql_insert_id();

    foreach($temp as $jlh)

      {

        $tes = $tes + 1;

        $im = "image" . $tes;

        if(trim($_FILES[$im]["name"])!="")

        {
            $file = trim($_FILES[$im]["name"]);

			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

         

          move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$file);

    

          $images = "videofile/".$file;

          

         

          $mainlib->dbquery("insert into imagevideo(video_id,file_image) values('$id_video','$images')",$mainlib->ocn);

        }

      }

		
		

		break;



	case "edit":

		$id = trim($_POST["hidID"]);

            $posting_date = trim($_POST["posting_date"]);

         

		$title = addslashes(trim($_POST["title"]));

    $resume = addslashes(trim($_POST["resume"]));

		$description = addslashes(trim($_POST["description"]));

		$uri = trim($_POST["uri"]);
                
                $latitude = trim($_POST["latitude"]);
                
                $longitude = trim($_POST["longitude"]);

    
     if(trim($_FILES["flUpload1"]["name"])!="")

    {

      $file = trim($_FILES["flUpload1"]["name"]);

      $file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

      

      move_uploaded_file($_FILES["flUpload1"]["tmp_name"],$file_dir.$file);



      $image_small = "videofile/".$file;

    }


		if($pdf == ''){

 			$mainlib->dbquery("update video set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description', uri = '$uri',latitude = '$latitude',longitude = '$longitude' where video_id='".$id."'",$mainlib->ocn);

		}else{

			$mainlib->dbquery("update video set posting_date = '$posting_date', title='$title', resume = '$resume', description = '$description',uri = '$uri',latitude = '$latitude',longitude = '$longitude' where video_id='".$id."'",$mainlib->ocn);

		}
                
                if($image_small != ''){
                    $mainlib->dbquery("update video set image_small = '$image_small' where video_id='".$id."'",$mainlib->ocn);
                }
                
       
                foreach($temp as $jlh)

      {

        $tes = $tes + 1;

        $im = "image" . $tes;

        if(trim($_FILES[$im]["name"])!="")

        {
            $file = trim($_FILES[$im]["name"]);

			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

         

          move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$file);

    

          $images = "videofile/".$file;

          

         

          $mainlib->dbquery("insert into imagevideo(video_id,file_image) values('$id','$images')",$mainlib->ocn);

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

					$sql .= "video_id='".$arids[$i]."'";

				}

				$sql = "DELETE FROM video WHERE (".$sql.")";

				$mainlib->dbquery($sql,$mainlib->ocn);

			}

		}

		break;

}

$mainlib->closedb();

header("Location: videolist.php?pgret=1");

?>