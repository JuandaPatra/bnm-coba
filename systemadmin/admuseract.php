<?php
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "admuseredit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		$id = $mainlib->getrandomstring(16);
		$username = trim($_POST["txtUserName"]);
		$fullname = trim($_POST["txtFullName"]);
		$password = trim($_POST["txtPassword"]);
		$email = $_POST["txtEmail"];
		if($mainlib->rowexists("select UserName from administrator where UserName='".$username."'",$mainlib->ocn))
		{
			$mainlib->closedb();
			$msg = "DUPLICATE USERNAME";
			echo '<html><title></title><head></head><body></body><script language="javascript">alert(\''.$msg.'\');window.location=\''.$pageedit.'\';</script></html>';
			exit;
		}
		$mainlib->dbquery("insert into administrator(UserName,FullName,Password,Email) values ('".$username."','".$fullname."','".$password."','".$email."')",$mainlib->ocn);
		break;
	case "edit":
		$id = trim($_POST["hidID"]);
		$username = trim($_POST["txtUserName"]);
		$fullname = trim($_POST["txtFullName"]);
		$password = trim($_POST["txtPassword"]);
		$email = $_POST["txtEmail"];
		/*if($mainlib->rowexists("select UserName from administrator where UserName='".$username."'",$mainlib->ocn))
		{
			$mainlib->closedb();
			$msg = "DUPLICATE USERNAME";
			echo '<html><title></title><head></head><body></body><script language="javascript">alert(\''.$msg.'\');window.location=\''.$pageedit.'?id='.$id.'\';</script></html>';
			exit;
		}*/

		$mainlib->dbquery("update administrator set UserName='".$username."',Fullname='".$fullname."',Password='".$password."',Email='".$email."' where UserName='".$id."'",$mainlib->ocn);
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
					$sql .= "UserName='".$arids[$i]."'";
				}
				$sql = "DELETE FROM administrator WHERE (".$sql.")";
				$mainlib->dbquery($sql,$mainlib->ocn);
			}
		}
		break;
}
$mainlib->closedb();
header("Location: admuserlist.php?pgret=1");
?>