<?php
include("../inc/class.mainlib.inc.php");
admsessions();

$mainlib = new mainlib();
$pageedit = "admaccountedit.php";
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "edit":
		$id = $_SESSION["admusername"];
		$username = trim($_POST["txtUserName"]);
		$fullname = trim($_POST["txtFullName"]);
		$password = $_POST["txtPassword"];
		$email = $_POST["txtEmail"];
		$mainlib->dbquery("update administrator set UserName='".$username."',Fullname='".$fullname."',Password='".$password."',Email='".$email."' where UserName='".$id."'",$mainlib->ocn);
		break;
}
$mainlib->closedb();
header("Location: admaccountedit.php");
?>