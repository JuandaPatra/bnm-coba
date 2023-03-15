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
		//$postingdate = trim($_POST["postingdate"]);
		$sort = $_POST['sort'];
		$category_name_id = trim($_POST["txtCategory_id"]);
		$category_name_en = trim($_POST["txtCategory_en"]);
		$mainlib->dbquery("insert into category(category_name_id,category_name_en,sort) 
					values ('$category_name_id','$category_name_en','$sort')",$mainlib->ocn);
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$category_name_id = trim($_POST["txtCategory_id"]);
		$category_name_en = trim($_POST["txtCategory_en"]);
		$sort = $_POST['sort'];
		$mainlib->dbquery("update category set category_name_id='$category_name_id', category_name_en = '$category_name_en', sort = '$sort' where category_id='".$id."'",$mainlib->ocn);
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
					$sql .= "category_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM category WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: categorylist.php?pgret=1");
?>