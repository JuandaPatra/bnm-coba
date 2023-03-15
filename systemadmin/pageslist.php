<?php 

include("../inc/class.mainlib.inc.php");

admsessions();

if(!isset($_SESSION["admusername"])){

	header("Location: login.php");

	exit;

}

$mainlib = new mainlib();

$mainlib->opendb();



$idcol = "pages_id";

$listtitle = $mainlib->getpagetitle("Pages",$mainlib->ocn);

$listeditpage = "pagesedit.php";

$listactionpage = "pagesact.php";



$arcolcaption = array("ID","Title");

$arcolname = array("pages_id","title_id");

$arcolwidth = array("2%","20%");



$initsortcol = "pages_id"; //When the list is first time opened, the sort order column will be $initsortcol

$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)



$arfiltercolcaption = array("ID","Title");

$arfiltercolname = array("pages_id","title_id");



if(isset($_GET['param'])){

	$_SESSION['parameter'] = $_GET['param'];

}else{

	if(!isset($_SESSION['parameter'])){

		$_SESSION['parameter'] == 1;

	}

}

if($_SESSION['parameter'] == 11){

	$sql = "select * from pages where pages_id =118";

}elseif($_SESSION['parameter'] == 12){

	$sql = "select * from pages where pages_id =119";

}elseif($_SESSION['parameter'] == 13){

	$sql = "select * from pages where pages_id = 120";

}elseif($_SESSION['parameter'] == 21){

	$sql = "select * from pages where pages_id = 121";

}elseif($_SESSION['parameter'] == 22){

	$sql = "select * from pages where pages_id = 122";

}elseif($_SESSION['parameter'] == 23){

	$sql = "select * from pages where pages_id = 123";

}elseif($_SESSION['parameter'] == 31){

	$sql = "select * from pages where pages_id =124 ";

}elseif($_SESSION['parameter'] == 41){

	$sql = "select * from pages where pages_id = 125";

}elseif($_SESSION['parameter'] == 51){

	$sql = "select * from pages where pages_id = 126";

}else{

	$sql = "select * from pages where pages_id >= 38";

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<title><?php echo APP_TITLE; ?></title>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>

<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="height:100%">

<tr>

	<td valign="top">

		<form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<table cellpadding="0" cellspacing="0" width="100%">

		<tr>

			<td valign="top">

				<?php include("header.inc.php"); ?>

			</td>

		</tr>

		<tr>

			<td valign="top">

				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="menubar">

				<tr>

					<td class="menudottedline" align="right">

						<table cellpadding="0" cellspacing="5" border="0" id="toolbar">

						<tr valign="middle" align="center">

							<td>

								<a class="toolbar" href="javascript:delSelectedRows();"><img src="images/delete_f2.png" alt="Delete" align="middle" border="0"><br>Delete</a>

							</td>

							<td>

								<a class="toolbar" href="<?php echo $listeditpage; ?>"><img src="images/new_f2.png" alt="Add New Events" align="middle" border="0"><br>New</a>
								
								
							

							</td>

						</tr>

						</table>

					</td>

				</tr>

				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>

					<td valign="top" align="center">

						<table border="0" cellpadding="15" cellspacing="0" width="100%">

						<tr>

							<td valign="top" align="left">

								<?php

								include("../inc/listformbase.inc.php");

								?>

							</td>

						</tr>

						</table>

					</td>

				</tr>

				</table>

			</td>

		</tr>

		</table>

		</form>

	</td>

</tr>

<tr>

	<td valign="bottom">

		<?php include("bottom.inc.php"); ?>

	</td>

</tr>

</table>

</body>

</html>

<?php

$mainlib->closedb();

?>