<?php
include("../inc/class.mainlib.inc.php");
admsessions();
$mainlib = new mainlib();
$username = trim($_POST["txtUserName"]);
$psw = trim($_POST["txtPassword"]);
if($username=="" || $psw==""){
	echo '<html><title></title><head></head><body><form name="frm" method="post" action="login.php"><input type="hidden" name="msg" value="Invalid username or password"></form></body><script language="javascript">document.frm.submit();</script></html>';
	exit;
}
$mainlib->opendb();

$ors = $mainlib->dbquery("select * from administrator where UserName='$username' and Password = '$psw'",$mainlib->ocn);
if($row=$mainlib->dbfetcharray($ors))
{
	if(mysql_num_rows($ors) == 0)
	{
		$mainlib->closedb();
		echo '<html><title></title><head></head><body><form name="frm" method="post" action="login.php"><input type="hidden" name="msg" value="Invalid username or password"></form></body><script language="javascript">document.frm.submit();</script></html>';
		exit;
	}
	else
	{
		$admusername = trim($row["UserName"]);
		$_SESSION["admusername"] = $admusername;
		$_SESSION["admfullname"] = trim($row["FullName"]);
		mysql_free_result($ors);
	
		$mainlib->closedb();
		$mainlib->redirect('main.php');
	}
}
else{
	mysql_free_result($ors);
	$mainlib->closedb();
	echo '<html><title></title><head></head><body><form name="frm" method="post" action="login.php"><input type="hidden" name="msg" value="Invalid username or password"></form></body><script language="javascript">document.frm.submit();</script></html>';
}
?>