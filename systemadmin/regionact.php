<?php
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "regionedit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		//$postingdate = trim($_POST["postingdate"]);
		$region_name = trim($_POST["region"]);
		$mainlib->dbquery("insert into region(region_name) values ('$region_name')",$mainlib->ocn);
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$region = trim($_POST["region"]);
		$mainlib->dbquery("update region set region_name='$region_name' where region_id='".$id."'",$mainlib->ocn);
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
					$sql .= "region_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM region WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: regionlist.php?pgret=1");
?>