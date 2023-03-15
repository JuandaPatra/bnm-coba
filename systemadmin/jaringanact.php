<?php
set_time_limit(0);
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "jaringanedit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);

function right($string,$chars)
{
    $vright = substr($string, strlen($string)-$chars,$chars);
    return $vright;
      
}

switch($act)
{
	case "add":
		$network = addslashes(trim($_POST["network"]));
		$branch = addslashes(trim($_POST["branch"]));
		$region_id = $_POST['region'];
		$alamat = addslashes(trim($_POST["alamat"]));
		$kelurahan = addslashes(trim($_POST["kelurahan"]));
		$kecamatan = addslashes(trim($_POST["kecamatan"]));
		$kota = addslashes(trim($_POST["kota"]));
		$kodepos = trim($_POST["kodepos"]);
		$provinsi = $_POST['provinsi'];
	
		$mainlib->dbquery("insert into jaringan(network,branch,region_id,alamat,kelurahan,kecamatan,kota,kodepos,provinsi) values ('$network','$branch','$region_id','$alamat','$kelurahan','$kecamatan','$kota','$kodepos','$provinsi')",$mainlib->ocn);
		
		break;

	case "edit":
		$id = trim($_POST["hidID"]);
		$network = addslashes(trim($_POST["network"]));
		$branch = addslashes(trim($_POST["branch"]));
		$region_id = $_POST['region'];
		$alamat = addslashes(trim($_POST["alamat"]));
		$kelurahan = addslashes(trim($_POST["kelurahan"]));
		$kecamatan = addslashes(trim($_POST["kecamatan"]));
		$kota = addslashes(trim($_POST["kota"]));
		$kodepos = trim($_POST["kodepos"]);
		$provinsi = $_POST['provinsi'];
		
		$mainlib->dbquery("update jaringan set network = '$network', branch = '$branch', region_id = '$region_id', alamat = '$alamat', kelurahan = '$kelurahan', kecamatan = '$kecamatan', kota = '$kota', kodepos = '$kodepos', provinsi = '$provinsi' where jaringan_id='".$id."'",$mainlib->ocn);
		
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
					$sql .= "jaringan_id='".$arids[$i]."'";
				}
				$sql = "DELETE FROM jaringan WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: jaringanlist.php?pgret=1");
?>