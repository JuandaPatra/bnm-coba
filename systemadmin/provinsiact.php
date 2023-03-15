<?php
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "provinsiedit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		//$postingdate = trim($_POST["postingdate"]);
		$provinsi_name = trim($_POST["provinsi"]);
		$mainlib->dbquery("insert into provinsi(provinsi_name) values ('$provinsi_name')",$mainlib->ocn);
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$provinsi = trim($_POST["provinsi"]);
		$mainlib->dbquery("update provinsi set provinsi_name='$provinsi_name' where provinsi_id='".$id."'",$mainlib->ocn);
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
					$sql .= "provinsi_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM provinsi WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: provinsilist.php?pgret=1");
?>