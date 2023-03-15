<?php

set_time_limit(0);

include("../inc/class.mainlib.inc.php");

admsessions();



$mainlib = new mainlib();

$pageedit = "faqedit.php";

$mainlib->opendb();



$file_dir = realpath("../faqfile/")."/";

$act = trim($_REQUEST["act"]);
$temp = $_POST["temp"];

switch($act)

{

	case "add":

		

		$title = addslashes(trim($_POST["title"]));

    

		$description = addslashes(trim($_POST["description"]));





		
                
                
                if(trim($_FILES["flUpload1"]["name"])!="")

		{

			$file = trim($_FILES["flUpload1"]["name"]);

			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

			

			move_uploaded_file($_FILES["flUpload1"]["tmp_name"],$file_dir.$file);



			$image_small = "faqfile/".$file;

		}

		

		$mainlib->dbquery("insert into faq(title,description,image_small) values ('$title','$description','$image_small')",$mainlib->ocn);
                    
                
                $id_faq = mysql_insert_id();

    foreach($temp as $jlh)

      {

        $tes = $tes + 1;

        $im = "image" . $tes;

        if(trim($_FILES[$im]["name"])!="")

        {
            $file = trim($_FILES[$im]["name"]);

			$file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

         

          move_uploaded_file($_FILES[$im]["tmp_name"],$file_dir.$file);

    

          $images = "faqfile/".$file;

          

         

          $mainlib->dbquery("insert into imagefaq(faq_id,file_image) values('$id_faq','$images')",$mainlib->ocn);

        }

      }

		
		

		break;



	case "edit":

		$id = trim($_POST["hidID"]);

		

    $title = addslashes(trim($_POST["title"]));

    

    $description = addslashes(trim($_POST["description"]));

	

    
    $image_small ='';

  

    
     if(trim($_FILES["flUpload1"]["name"])!="")

    {

      $file = trim($_FILES["flUpload1"]["name"]);

      $file = $mainlib->DuplicateFileNameCorrection($file_dir,$file);

      

      move_uploaded_file($_FILES["flUpload1"]["tmp_name"],$file_dir.$file);



      $image_small = "faqfile/".$file;

    }


		if($pdf == ''){

 			$mainlib->dbquery("update faq set  title='$title', description = '$description' where faq_id='".$id."'",$mainlib->ocn);

		}else{

			$mainlib->dbquery("update faq set  title='$title',  description = '$description'  where faq_id='".$id."'",$mainlib->ocn);

		}
                
                if($image_small != ''){
                    $mainlib->dbquery("update faq set image_small = '$image_small' where faq_id='".$id."'",$mainlib->ocn);
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

    

          $images = "faqfile/".$file;

          

         

          $mainlib->dbquery("insert into imagefaq(faq_id,file_image) values('$id','$images')",$mainlib->ocn);

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

					$sql .= "faq_id='".$arids[$i]."'";

				}

				$sql = "DELETE FROM faq WHERE (".$sql.")";

				$mainlib->dbquery($sql,$mainlib->ocn);

			}

		}

		break;

}

$mainlib->closedb();

header("Location: faqlist.php?pgret=1");

?>