<?php
	$session_name = strtolower(basename($_SERVER['PHP_SELF']));
	$session_name = str_replace(".php","",$session_name);
	$session_name = str_replace("_","",$session_name);
	$session_name = str_replace("-","",$session_name);
	function process_colname()
	{
		global $i,$pos,$arcolname,$colname,$coltype,$colattr;
		$pos = strpos($arcolname[$i],'|');
		if($pos === false)
		{
			$colname = $arcolname[$i];
			$coltype = "text";
		}else{
			$colname = substr($arcolname[$i],0,$pos);
			$coltype = substr($arcolname[$i],$pos+1);
			$pos = strpos($coltype,'|');
			if($pos !== false)
			{
				$temp = $coltype;
				$coltype = substr($temp,0,$pos);
				$colattr = substr($temp,$pos+1);
			}
		}
	}
	
	if(!isset($list_sess_id))
	{
		$list_sess_id = "";
	}
	
	$colcount = count($arcolname) + 1;

	if(isset($_REQUEST["pgret"]))
	{
		$pageno = 	$_SESSION[$session_name."listpageno".$list_sess_id];
		$ordercol = $_SESSION[$session_name."listorder".$list_sess_id];
		$filtercol = $_SESSION[$session_name."listfiltercol".$list_sess_id];
		$filtertext = $_SESSION[$session_name."listfiltertext".$list_sess_id];
	}else{
		$pageno = $_REQUEST["hidPage"];
		$ordercol = $_REQUEST["hidOrder"];
		$filtercol = $_REQUEST["cboFilter"];
		$filtertext = $_REQUEST["txtFilter"];
	}
?>
	<script language="javascript">
	function changeSortOrder(orderCol)
	{
		document.frm.hidOrder.value = orderCol;
		document.frm.submit();
	}
	
	function applyFilter()
	{
		document.frm.submit();
	}
	
	function releaseFilter()
	{
		document.frm.cboFilter.selectedIndex = 0;
		document.frm.txtFilter.value = '';
		document.frm.submit();
	}
	
	function gotoPage(pageNo)
	{
		document.frm.hidPage.value = pageNo;
		document.frm.submit();
	}
	
	function setListSelection()
	{
		try
		{
			for(i=1;i<document.frm.chkSelect.length;i++)
			{
				document.frm.chkSelect[i].checked = document.frm.chkSelectAll.checked;
			}
		}catch(e)
		{
		}
	}

	function delSelectedRows()
	{
		try
		{
			var anyRowChecked = false;
			for(i=1;i<document.frm.chkSelect.length;i++)
			{
				if(document.frm.chkSelect[i].checked)
				{
					anyRowChecked = true;
					break;
				}
			}
			if(!anyRowChecked)
			{
				alert('Please select at least one item');
				return;
			}
	
			if(confirm('Are you sure you want to delete selected items?'))
			{
				document.frm.hidIDs.value = '';
				for(i=1;i<document.frm.chkSelect.length;i++)
				{
					if(document.frm.chkSelect[i].checked)
					{
						if(document.frm.hidIDs.value!='')
						{
							document.frm.hidIDs.value += ',';
						}
						document.frm.hidIDs.value += '\'' + document.frm.chkSelect[i].value + '\'';
					}
				}
				document.frm.act.value = 'del';
				document.frm.action = '<?php echo $listactionpage; ?>';
				document.frm.submit();
			}
		}catch(e)
		{
		}
	}

	function changeStatus(id,status){
		document.frm.hidIDs.value = id;
		document.frm.hidStatus.value = status;
		document.frm.act.value = 'change';
		document.frm.action = '<?php echo $listactionpage; ?>';
		document.frm.submit();
	}
	
	function changeStatus2(id,status){
		document.frm.hidIDs.value = id;
		document.frm.hidStatus.value = status;
		document.frm.act.value = 'change2';
		document.frm.action = '<?php echo $listactionpage; ?>';
		document.frm.submit();
	}
	
	function changeStatus3(id,status){
		document.frm.hidIDs.value = id;
		document.frm.hidStatus.value = status;
		document.frm.act.value = 'change3';
		document.frm.action = '<?php echo $listactionpage; ?>';
		document.frm.submit();
	}
	
	function changeStatus4(id,status){
		document.frm.hidIDs.value = id;
		document.frm.hidStatus.value = status;
		document.frm.act.value = 'change4';
		document.frm.action = '<?php echo $listactionpage; ?>';
		document.frm.submit();
	}
	
	function changeLevel(id,status){
		document.frm.hidIDs.value = id;
		document.frm.hidStatus.value = status;
		document.frm.act.value = 'changeLvl';
		document.frm.action = '<?php echo $listactionpage; ?>';
		document.frm.submit();
	}
	</script>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="left" colspan="<?php echo $colcount; ?>">
			<input type="hidden" name="act">
			<input type="hidden" name="hidIDs">
			<input type="hidden" name="hidStatus">
			<input type="hidden" name="hidOrder">
			<input type="hidden" name="hidPage" value="<?php echo $pageno; ?>">
			<input type="hidden" name="hidFirstShown" value="1">
			<input type="hidden" name="chkSelect" value="">
			<table cellpadding="0" cellspacing="0" width="100%" class="adminheading">
			<tr>
				<td align="left"><?php echo $listtitle; ?></td>
				<td align="right" class="inputtext" style="color:#000000">Filter By&nbsp;
					<select name="cboFilter" class="inputtext">
					<?php
					for($i=0;$i<count($arfiltercolname);$i++)
					{
						echo '<option value="'.$arfiltercolname[$i].'"';
						if(strtolower($arfiltercolname[$i])==strtolower($filtercol))
						{
							echo ' selected';
						}
						echo '>'.$arfiltercolcaption[$i].'</option>';
					}
					?>
					</select>
					<input type="text" name="txtFilter" class="inputtext" style="width:130px" value="<?php echo stripslashes($filtertext); ?>">
					<input type="button" value="Apply" class="button" onClick="applyFilter();" style="padding:1px">&nbsp;<input type="button" class="button" style="padding:1px" value="Clear" onClick="releaseFilter();">
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
  <?php
	$readonly = "";
	$sql_filter = "";
	if($filtertext!="")
	{
		$sql_filter = "`".$filtercol."` LIKE '%".$filtertext."%' ";
	}
	if($sql_filter!="")
	{
		if(substr_count(strtolower($sql),"where")==0){
			$sql .= " WHERE ".$sql_filter;
		}else{
			$sql .= " AND ".$sql_filter;
		}
	}

	$_SESSION[$session_name."listfiltercol".$list_sess_id] = $filtercol;
	$_SESSION[$session_name."listfiltertext".$list_sess_id] = $filtertext;

	$sql_order = "";
	if($ordercol!="")
	{
			$pos = strpos($ordercol,'|');
			if(!($pos === false))
			{
				$ordercol = substr($ordercol,0,$pos);
			}

			$sql_order = "`".$ordercol."`";

			if($_SESSION[$session_name."listorder".$list_sess_id]==$ordercol)
			{
				if(!isset($_REQUEST["pgret"]))
				{
					$_SESSION[$session_name."listorderascending".$list_sess_id] = !$_SESSION[$session_name."listorderascending".$list_sess_id];
				}
				if(!$_SESSION[$session_name."listorderascending".$list_sess_id]) $sql_order .= " DESC";
			}else{
				$_SESSION[$session_name."listorderascending".$list_sess_id] = true;
			}
			$_SESSION[$session_name."listorder".$list_sess_id] = $ordercol;
	}else{
		if(!isset($_REQUEST["hidFirstShown"]))
		{
			$_SESSION[$session_name."listorder".$list_sess_id] = $initsortcol;
			$_SESSION[$session_name."listorderascending".$list_sess_id] = $initsortcolascending;
		}
		$sql_order = "`".$_SESSION[$session_name."listorder".$list_sess_id]."`";
		if(!$_SESSION[$session_name."listorderascending".$list_sess_id]) $sql_order .= " DESC";
	}

	if($sql_order!="")
	{
		$sql .= " ORDER BY ".$sql_order;
		if(isset($initsortcol2)){
			$sql .= ",".$initsortcol2;
		}
	}
	
	if(!isset($pagesize)){
		$pagesize = LIST_PAGE_SIZE;
	}
	
	$rowcount = $mainlib->countrows($sql,$mainlib->ocn);
	if(($rowcount % $pagesize)==0)
	{
		$pagecount = intval($rowcount/$pagesize);
	}else{
		$pagecount = intval($rowcount/$pagesize)+1;
	}

	if($pagecount<=0) $pagecount=1;
	if($pageno<=0) $pageno=1;
	if($pageno>$pagecount) $pageno=$pagecount;

	$_SESSION[$session_name."listpageno".$list_sess_id] = $pageno;

	$sql .= " LIMIT ".($pageno-1)*$pagesize.",".$pagesize;
	?>
	<table cellpadding="0" cellspacing="0" width="100%" class="adminlist">
	<tr>
		<th width="34%">&nbsp;</th>
		<th align="center" width="32%"><a href="JavaScript:gotoPage('<?php echo ($pageno-1); ?>');" title="Previous"><img src="images/arrow_left.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;Page&nbsp;<input type="text" class="inputtext" style="text-align:right" name="txtPage2" value="<?php echo $pageno; ?>" size="2" onkeypress="if(event.keyCode==13) gotoPage(document.frm.txtPage2.value);">&nbsp;of&nbsp;<?php echo $pagecount; ?>&nbsp;&nbsp;&nbsp;<a href="JavaScript:gotoPage('<?php echo ($pageno+1); ?>');" title="Next"><img src="images/arrow_right.gif" border="0" align="absmiddle"></a></th>
		<th width="34%">&nbsp;</th>
	</tr> 
	</table>
	<table cellpadding="2" cellspacing="0" width="100%" class="adminlist">
<?php
	echo '<tr>';
	for($i=0;$i<count($arcolname);$i++)
	{
		process_colname();
		
		echo '<th ';
		if(isset($arcolwidth))
		{
			echo ' width="'.$arcolwidth[$i].'"';
		}
		if($coltype=="number")
		{
			echo ' align="right"';
		}
		else if($coltype=="boolean" || $coltype=="boolean2" || $coltype=="boolean3" || $coltype=="boolean4" || $coltype=="protect")
		{
			echo ' align=center';
		}else{
			echo ' align="left"';
		}
		echo '>';
		
		if($coltype!='link' && $coltype!='link2')
		{
			echo '<a href="JavaScript:changeSortOrder(\''.$colname.'\');">'.$arcolcaption[$i].'</a> ';

			if($_SESSION[$session_name."listorder".$list_sess_id]==$colname)
			{
				if($_SESSION[$session_name."listorderascending".$list_sess_id])
				{
					echo '<img src="images/sort_asc.gif" align="absmiddle">';
				}else{
					echo '<img src="images/sort_desc.gif" align="absmiddle">';
				}
			}
		}
		
		echo '</th>';
	}
	echo '<th width="5%" align="right">&nbsp;</th><th width="3%" align="left">';
	echo '<input type="checkbox" name="chkSelectAll" onclick="setListSelection();">';
	echo '</th>';
	echo '</tr>';

	$ors = $mainlib->dbquery($sql,$mainlib->ocn);
	$resultfound = false;
	if($rowcount==0)
	{
		echo '<tr><td align="left" colspan='.($colcount).'>No entries were found</td><td><img src="images/spacer.gif" width="20" height="20" align="absmiddle"></td></tr>';
	}
	$j = 0;
	while($row = $mainlib->dbfetcharray($ors))
	{
		$resultfound = true;
		if($j%2==0){
			echo '<tr class="row0">';
		}else{
			echo '<tr class="row1">';
		}
		for($i=0;$i<count($arcolname);$i++)
		{
			process_colname();
						
			$coltext = "";
			switch($coltype)
			{
				case "text":
					$coltext = $row[$colname];
					break;
				case "number":
					$coltext = number_format($row[$colname],$colattr);
					break;
				case "timestamp":
					$coltext = date(DATETIME_FORMAT,$row[$colname]);
					break;
				case "date":
					$coltext = date(DATE_FORMAT,strtotime($row[$colname]));
					break;
				case "datetime":
					$coltext = date(DATETIME_FORMAT,strtotime($row[$colname]));
					break;
				case "link":
					if(strpos($colattr,';') !== false)
					{
						list($linktitle,$linkurl,$path) = explode(";",$colattr);
					}else{
						$linktitle = $colattr;
						$linkurl = '';
						$path = '';
					}
					if($row[$colname] != ""){
						$coltext = '<a href="'.$linkurl.'/'.$row[$path].'/'.$row[$colname].'" target="_blank">'.$linktitle.'</a>';
					}else{
						$coltext = "";
					}
					break;
				case "link2":
					if(strpos($colattr,';') !== false)
					{
						list($linkurl,$linktitle) = explode(";",$colattr);
					}else{
						$linkurl = $colattr;
						$linktitle = '';
					}
					$coltext = '<a href="'.$linkurl.$row[$idcol].'" title="'.$linktitle.'">'.$colname.'</a>';
					break;
				case "protect":
					$protect = strtolower($row[$colname]);
					if($protect=="y"){
						$readonly = "readonly";
						$coltext = '<img src="images/icon_lock.gif" border="0">';
					}else{
						$coltext = '<img src="images/icon_unlock.gif" border="0">';
					}
					break;
				case "boolean":
					if(strtolower($row[$colname])=="y"){
						$coltext = '<img src="images/icon_status_green.gif" border="0">&nbsp;&nbsp;';
						$coltext .= '<a href="javascript:changeStatus(\''.$row[$idcol].'\',\'N\');"><img src="images/icon_status_red_light.gif" border="0"></a>';
					}else{
						$coltext = '<a href="javascript:changeStatus(\''.$row[$idcol].'\',\'Y\');"><img src="images/icon_status_green_light.gif" border="0"></a>&nbsp;&nbsp;';
						$coltext .= '<img src="images/icon_status_red.gif" border="0">';
					}
					break;
				case "boolean2":
					if(strtolower($row[$colname])=="y"){
						$coltext = '<img src="images/icon_status_green.gif" border="0">&nbsp;&nbsp;';
						$coltext .= '<a href="javascript:changeStatus2(\''.$row[$idcol].'\',\'N\');"><img src="images/icon_status_red_light.gif" border="0"></a>';
					}else{
						$coltext = '<a href="javascript:changeStatus2(\''.$row[$idcol].'\',\'Y\');"><img src="images/icon_status_green_light.gif" border="0"></a>&nbsp;&nbsp;';
						$coltext .= '<img src="images/icon_status_red.gif" border="0">';
					}
					break;
				case "boolean3":
					if(strtolower($row[$colname])=="y"){
						$coltext = '<img src="images/icon_status_green.gif" border="0">&nbsp;&nbsp;';
						$coltext .= '<a href="javascript:changeStatus3(\''.$row[$idcol].'\',\'N\');"><img src="images/icon_status_red_light.gif" border="0"></a>';
					}else{
						$coltext = '<a href="javascript:changeStatus3(\''.$row[$idcol].'\',\'Y\');"><img src="images/icon_status_green_light.gif" border="0"></a>&nbsp;&nbsp;';
						$coltext .= '<img src="images/icon_status_red.gif" border="0">';
					}
					break;
				case "boolean4":
					if(strtolower($row[$colname])=="y"){
						$coltext = '<img src="images/icon_status_green.gif" border="0">&nbsp;&nbsp;';
						$coltext .= '<a href="javascript:changeStatus4(\''.$row[$idcol].'\',\'N\');"><img src="images/icon_status_red_light.gif" border="0"></a>';
					}else{
						$coltext = '<a href="javascript:changeStatus4(\''.$row[$idcol].'\',\'Y\');"><img src="images/icon_status_green_light.gif" border="0"></a>&nbsp;&nbsp;';
						$coltext .= '<img src="images/icon_status_red.gif" border="0">';
					}
					break;
				case "lvldropdown":
					$ardatalist = array('1','2','3','4');
					for($x=0;$x<count($ardatalist);$x++){
						if($ardatalist[$x]!=$row[$colname]){
							$coltext .= '
										<a href="javascript:changeLevel(\''.$row[$idcol].'\',\''.$ardatalist[$x].'\');">'.$ardatalist[$x].'</a>&nbsp;&nbsp;';
						}else{
							$coltext .= '
										<b>'.$ardatalist[$x].'</b>&nbsp;&nbsp;';
										
						}
					}
					break;
				case "cutleft":
					if(strlen($row[$colname])>$colattr){
						$coltext = substr($row[$colname],0,$colattr)."...";
					}else{
						$coltext = $row[$colname];
					}
					break;
				case "basename":
					$coltext = basename($row[$colname]);
					break;
				case "period":
					$coltext = ConvertTime($row[$colname]);
					break;
			}
			$coltext = stripslashes($coltext);
			
			echo '<td ';
			if($coltype=="number")
			{
				echo 'align="right"';
			}
			elseif($coltype=="boolean" || $coltype=="boolean2" || $coltype=="boolean3" || $coltype=="boolean4" || $coltype=="protect")
			{
				echo 'align="center"';
			}else{
				echo 'align="left"';
			}
			echo '>'.$coltext.'&nbsp;</td>';
		}
		echo '<td width="5%" align="right">&nbsp;';
		if($listeditpage!="")
		{
      if(strpos($_SERVER['SCRIPT_NAME'],trim("consultation")))
      { 
        echo '<a href="consultationreply.php?id='.urlencode($row[$idcol]).'" title="Reply" style="border:1px solid black; padding:1px 2px 1px 2px; text-decoration:none; color:black; ">Reply</a>';
        echo ' &nbsp&nbsp&nbsp&nbsp'; 
      }
			echo '<a href="'.$listeditpage.'?id='.urlencode($row[$idcol]).'" title="edit"><img src="images/edit.gif" border="0" align="absmiddle"></a>';
		}
		echo '</td><td width="3%" align="left">';
		if($readonly=="readonly"){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}else{
			echo '<input type="checkbox" name="chkSelect" value="'.$row[$idcol].'">';
		}
		echo '</td>';
		echo '</tr>';
		$readonly = "";
		$j++;
	}
	mysql_free_result($ors);
?>
	</table>
	<table cellpadding="0" cellspacing="0" width="100%" class="adminlist">
	<tr>
		<th width="34%">&nbsp;</th>
		<th align="center" width="32%"><a href="JavaScript:gotoPage('<?php echo ($pageno-1); ?>');" title="Previous"><img src="images/arrow_left.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;Page&nbsp;<input type="text" class="inputtext" style="text-align:right" name="txtPage" value="<?php echo $pageno; ?>" size="2" onkeypress="if(event.keyCode==13) gotoPage(document.frm.txtPage.value);">&nbsp;of&nbsp;<?php echo $pagecount; ?>&nbsp;&nbsp;&nbsp;<a href="JavaScript:gotoPage('<?php echo ($pageno+1); ?>');" title="Next"><img src="images/arrow_right.gif" border="0" align="absmiddle"></a></th>
		<th width="34%">&nbsp;</th>
	</tr> 
	</table>