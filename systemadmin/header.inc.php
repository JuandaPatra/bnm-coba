<?php

if(!isset($_SESSION["admusername"])){

	?><meta http-equiv='refresh' content='0;URL=login.php'><?php

	exit;

}

$menu = "";

$menu2 = "";

$moduleid = "";

$j = 0;

$i = 0;

$js = "";

$js .= "<script type=\"text/javascript\" language=\"JavaScript1.2\" >\n";

$js .= "stm_bm([\"menu72c3\",650,\"\",\"blank.gif\",0,\"\",\"\",0,0,250,0,0,1,0,0,\"\",\"100%\",0,0,1,2,\"default\",\"hand\",\"\"],this);\n";

$js .= "stm_bp(\"p0\",[0,4,0,0,0,5,0,7,100,\"\",-2,\"\",-2,90,0,0,\"#000000\",\"transparent\",\"\",3,0,0,\"#251611 #251611 #CC0000\"]);\n";

$js .= "stm_ai(\"p0i0\",[0,\"Home\",\"\",\"\",-1,-1,0,\"main.php\",\"\",\"\",\"\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,0,1,\"transparent\",0,\"#DFCD97\",0,\"\",\"\",3,3,0,0,\"#251611\",\"#F1f3f5 #C64934\",\"#ffffff\",\"#000000\",\"11px 'Tahoma','Arial'\",\"11px 'Tahoma','Arial'\",0,0]);\n";

$ors = $mainlib->dbquery("select * from adm_modules where `menu_name` !='Kegiatan Usaha Kami' order by order_no",$mainlib->ocn);

while($row=$mainlib->dbfetcharray($ors))

{

	$menu = trim($row["menu_name"]);
	$submenu = trim($row["submenu_name"]);

	$moduleid = $row["module_id"];

	if ($menu != $menu2)

	{

		if ($j > 1)

		{

			$js .= "stm_ep();";

		}

		
			$js .= "stm_aix(\"p0i".$i."\",\"p0i0\",[0,\"".$menu."\",\"\",\"\",-1,-1,0,\"\",\"_self\",\"\",\"\",\"\",\"\",0,0,0,\"images/arrow_d.gif\",\"images/arrow_d.gif\",7,7]);\n";

		
		
		
		$js .= "stm_bp(\"p1\",[1,4,0,0,0,0,0,0,100,\"\",-2,\"\",-2,90,0,0,\"#000000\",\"#F1F3f5\",\"\",3,1,1,\"#828282\"]);\n";
		

		
			//if(($row["submenu_name"]!='Pembiayaan Konvensional')){
		$js .= "stm_aix(\"p1i".$j."\",\"p0i0\",[1,\"<table id=\'".$moduleid."\' width=\\\"100%\\\" border=\\\"0\\\" bordercolor=\\\"#C64934\\\"  cellspacing=\\\"0\\\" cellpadding=\\\"4\\\" style=\\\"font:Tahoma,Arial; font-size:8 pt; color:#000000; \\\"><tr onmouseover=\\\"document.getElementById(\'".$moduleid."\');this.bgColor=\'#DFCD97\';document.getElementById(\'icon".$moduleid."\').bgColor=\'#DFCD97\';\\\" onMouseOut=\\\"document.getElementById(\'".$moduleid."\').border=0;this.bgColor=\'#F1F3F5\';document.getElementById(\'icon".$moduleid."\').bgColor=\'#DDE1E6\'\\\" ><td id=\\\"icon".$moduleid."\\\" bgcolor=\\\"#DDE1E6\\\" style=\\\" border-right:0;\\\" width=9 height=19><img src=\\\"images/arrow.png\\\" border=0 height=19></td><td style=\\\"border-left:0;\\\"><nobr>".$row["submenu_name"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nobr></td></tr></table>\",\"\",\"\",-1,-1,0,\"".$row["url"]."\",\"\",\"\",\"\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,0,1,\"\",0,\"\",0,\"\",\"\",3,3,0,0,\"\",\"#C64934\"]);\n";
			//}
		

		$i++;

		$j = 1;

	}

	else

	{
		if($row['show'] =='y' || $row['show']==''){
			$js .= "stm_aix(\"p1i".$j."\",\"p0i0\",[1,\"<table id=\'".$moduleid."\' width=\\\"100%\\\" border=\\\"0\\\" bordercolor=\\\"#C64934\\\"  cellspacing=\\\"0\\\" cellpadding=\\\"4\\\" style=\\\"font:Tahoma,Arial; font-size:8 pt; color:#000000; \\\"><tr onmouseover=\\\"document.getElementById(\'".$moduleid."\');this.bgColor=\'#DFCD97\';document.getElementById(\'icon".$moduleid."\').bgColor=\'#DFCD97\';\\\" onMouseOut=\\\"document.getElementById(\'".$moduleid."\').border=0;this.bgColor=\'#F1F3F5\';document.getElementById(\'icon".$moduleid."\').bgColor=\'#DDE1E6\'\\\" ><td id=\\\"icon".$moduleid."\\\" bgcolor=\\\"#DDE1E6\\\" style=\\\" border-right:0;\\\" width=9 height=19><img src=\\\"images/arrow.png\\\" border=0 height=19></td><td style=\\\"border-left:0;\\\"><nobr>".$row["submenu_name"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nobr></td></tr></table>\",\"\",\"\",-1,-1,0,\"".$row["url"]."\",\"\",\"\",\"\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,0,1,\"\",0,\"\",0,\"\",\"\",3,3,0,0,\"\",\"#C64934\"]);\n";
		}


		
		
		
	}

	$j++;

	$menu2 = $menu;

}

mysql_free_result($ors);

$js .= "stm_cf([0,0,0,\"mainFrame\",\"\",0]);";

$js .= "stm_em();";

$js .= "</script>";

?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>

	<td valign="top" width="100%" colspan="2" height="60">

		<table border="0" cellpadding="0" cellspacing="0" width="100%">

		<tr>

    	<td width="10">&nbsp;</td>

			<td valign="top"><img src="images/logo.png" border="0" alt="Logout"></td>

		</tr>

		</table>

	</td>

</tr>

<tr>

    <td valign="top" bgcolor="#251611" height="25">

        <?php echo $js; ?>

    </td>

    <td align="right" bgcolor="#251611" style="padding-top:2px">

        <a href="logout.php"><img src="images/logout.gif" border="0" alt="Logout"></a>&nbsp;&nbsp;&nbsp;

    </td>

</tr>

</table>