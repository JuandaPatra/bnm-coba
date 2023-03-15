<?php
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "categoryedit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$category_id = trim($_POST["category"]);
		$subcategory_name_id = trim($_POST["subcategory_id"]);
		$subcategory_name_en = trim($_POST["subcategory_en"]);
		$mainlib->dbquery("insert into subcategory(category_id,subcategory_name_id,subcategory_name_en) values ('$category_id','$subcategory_name_id','$subcategory_name_en')",$mainlib->ocn);
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$category_id = trim($_POST["category"]);
		$subcategory_name_id = trim($_POST["subcategory_id"]);
		$subcategory_name_en = trim($_POST["subcategory_en"]);
		$mainlib->dbquery("update subcategory set category_id='$category_id', subcategory_name_id = '$subcategory_name_id', subcategory_name_en = '$subcategory_name_en' where subcategory_id='".$id."'",$mainlib->ocn);
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
					$sql .= "subcategory_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM subcategory WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: subcategorylist.php?pgret=1");
?>