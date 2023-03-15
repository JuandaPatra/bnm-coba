<?php
session_register("FilterField".$n);
session_register("FilterValue".$n);
session_register("PageNo".$n);

if(isset($_REQUEST["pgret"]))
{
	if($_REQUEST["pgret"]=='1')
	{
		$readsession = true;
	}else{
		$readsession = false;
	}
}else{
	$readsession = false;
}

if($readsession)
{
	$filterfield = $_SESSION["FilterField".$n];
	$filtervalue = $_SESSION["FilterValue".$n];
	$pageno = $_SESSION["PageNo".$n];
}
else
{
	if(isset($_POST["txtFilter"]))
	{
		$filterfield = $_POST["cboFilter"];
		$filtervalue = $_POST["txtFilter"];
  	}else{
		$filterfield = "";
		$filtervalue = "";
	}

	if(isset($_POST["hidApplyFilter"]))
	{
		if($_POST["hidApplyFilter"]=="1")
  		{
    		$pageno = 1;
	  	}else{
    		$pageno = $_POST["pg"];
		} 
	}else{
		$pageno = 1;
	}
	$_SESSION["FilterField".$n] = $filterfield;
	$_SESSION["FilterValue".$n] = $filtervalue;
	$_SESSION["PageNo".$n] = $pageno;
} 

if(isset($pageno))
{
	if(trim($pageno)=="" || !is_numeric($pageno))
	{
		$pageno = 1;
	}else{
		$pageno = intval($pageno);
	}
}else{
	$pageno = 1;
}
?>