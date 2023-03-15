<?php
// Change the session timeout
include("globals.inc.php");
ini_set("session.gc_maxlifetime", SESSION_TIMEOUT);

class mainlib
{
	var $ocn;
	
	function createrandomvalue($min=null,$max=null) {
		static $seeded;
	
		if (!isset($seeded)) {
			mt_srand((double)microtime()*1000000);
			$seeded = true;
		}
		if (isset($min) && isset($max)) {
			if ($min >= $max) {
				return $min;
			} else {
				return mt_rand($min, $max);
			}
		} else {
			return mt_rand();
		}
	}
	
	function getrandomstring($length,$type='mixed') {
		if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;
	
		$rand_value = '';
		while (strlen($rand_value) < $length) {
			if($type == 'digits')
			{
				$char = $this->createrandomvalue(0,9);
			}else{
				$char = chr($this->createrandomvalue(0,255));
			}
	
			if($type == 'mixed')
			{
				if(eregi('^[a-z0-9]$', $char)) $rand_value .= $char;
			}elseif($type == 'chars'){
				if(eregi('^[a-z]$', $char)) $rand_value .= $char;
			}elseif($type == 'digits'){
				if(ereg('^[0-9]$', $char)) $rand_value .= $char;
			}
		}
		return $rand_value;
	}

	function dbconnect($server,$username,$password,$database) 
	{
		$retval = mysql_connect($server,$username,$password,true);
    # Set character_set_results
    mysql_query("SET character_set_results=utf8",
    $retval);

    # Set character_set_client and character_set_connection
    mysql_query("SET character_set_client=utf8",
    $retval);
    mysql_query("SET character_set_connection=utf8",
    $retval);
		if ($retval) mysql_select_db($database,$retval);
		return $retval;
	}

	function opendb()
	{
		$this->ocn = $this->dbconnect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) or die("Cannot connect to main database");
	}

	function opendb2($db_id)
	{
		$retval = NULL;
		$ors = $this->dbquery("select * from adm_db where db_id='".$db_id."'",$this->ocn);
		if($row=$this->dbfetcharray($ors)){
			$retval = $this->dbconnect($row["db_server"],$row["db_user"],$row["db_psw"],$row["db_name"]) or die("Cannot connect to ".$row["db_server"].".".$row["db_name"]);
		}
		mysql_free_result($ors);
		
		return $retval;
	}

	function closedb()
	{
		mysql_close($this->ocn);
	}
	
	function dbquery($query,$ocn) {
		$result = mysql_query($query, $ocn) or die("Invalid query: " . mysql_error());
		return $result;
	}
	
	function query($query_str,$ocn,$multi=true) {

		$row=null;
		$num=0;
		$this->last_query=null;
		$this->result=null;
		$this->output=null;
		$this->output=array();

		if(!$query_str) { return 0; } // If there is no query string, return 0

		$this->last_query = $query_str;
		$this->result = mysql_query($query_str, $ocn) or die(mysql_error()); // Do the query

		if ( preg_match("/^\\s*(insert|delete|update|replace) /i",$query_str) ) {
			$this->rows_done = mysql_affected_rows();
			// Return the number of rows affected by this operation
			return $this->rows_done;

		} else {

			// Return multiple rows stored in a multi dimensional array
			if($multi) {
				// If the query was to get data, i.e, select, then return the data as arrays

				while ( $row = mysql_fetch_array($this->result, MYSQL_ASSOC) ) {
					$this->output[$num] = $row;
					$num++;
				}
			}


			else {
				// Return the result in a one dimensional array
				return mysql_fetch_array($this->result, MYSQL_ASSOC);
			}

			return $this->output; // Return the multi demensional array
		}

	} // End function
	
	function dbfetcharray($dbquery) {
		return mysql_fetch_array($dbquery, MYSQL_ASSOC);
	}
	
	function countrows($sql,$ocn)
	{
		$retval = 0;
		$ors = $this->dbquery($sql,$ocn);
		$retval = mysql_num_rows($ors);
		mysql_free_result($ors);
		return $retval;
	}

	function keyvalue($CRYPT_KEY){
		$keyvalue = "";
		$keyvalue[1] = "0";
		$keyvalue[2] = "0";
		for ($i=1; $i<strlen($CRYPT_KEY); $i++) {
			$curchr = ord(substr($CRYPT_KEY, $i, 1));
			$keyvalue[1] = $keyvalue[1] + $curchr;
			$keyvalue[2] = strlen($CRYPT_KEY);
		}
		return $keyvalue;
	}

	function encrypt($txt,$CRYPT_KEY){
		if (!$txt && $txt != "0"){
			return false;
			exit;
		}
		
		if (!$CRYPT_KEY){
			return false;
			exit;
		}
		
		$kv = $this->keyvalue($CRYPT_KEY);
		$estr = "";
		$enc = "";
	
		for ($i=0; $i<strlen($txt); $i++) {
			$e = ord(substr($txt, $i, 1));
			$e = $e + $kv[1];
			$e = $e * $kv[2];
			(double)microtime()*1000000;
			$rstr = chr(rand(65, 90));
			$estr .= "$rstr$e";
		}
	
		return $estr;
	}
	
	function decrypt($txt, $CRYPT_KEY){
		if (!$txt && $txt != "0"){
			return false;
			exit;
		}
		
		if (!$CRYPT_KEY){
			return false;
			exit;
		}
		
		$kv = $this->keyvalue($CRYPT_KEY);
		$estr = "";
		$tmp = "";
	
		for ($i=0; $i<strlen($txt); $i++) {
			if ( ord(substr($txt, $i, 1)) > 64 && ord(substr($txt, $i, 1)) < 91 ) {
				if ($tmp != "") {
					$tmp = $tmp / $kv[2];
					$tmp = $tmp - $kv[1];
					$estr .= chr($tmp);
					$tmp = "";
				}
			} else {
				$tmp .= substr($txt, $i, 1);
			}
		}
	
					$tmp = $tmp / $kv[2];
					$tmp = $tmp - $kv[1];
		$estr .= chr($tmp);
	
		return $estr;
	}
	
	function getfilename($path)
	{
		$retval = $path;
		$i = strrpos($path,"/");
		if($i!==false)
		{
			$retval = substr($path,$i+1);
		}
		return $retval;
	}

	function removedir($path)
	{
		$handle = opendir($path);
		while (false!==($item = readdir($handle)))
		{
			if($item != '.' && $item != '..')
			{
				if(is_dir($path.'/'.$item)) 
				{
					$this->remove_dir($path.'/'.$item);
				}else{
					unlink($path.'/'.$item);
				}
			}
		}
		closedir($handle);
		if(rmdir($path))
		{
			$success = true;
		}
		return $success;
	}

	function rowexists($sql,$ocn)
	{
		return $this->dbfetcharray($this->dbquery($sql,$ocn));
	}

	function meta($pageid)
	{
		$meta = "";
		$ors = $this->dbquery("select meta_desc,meta_keyword from pages where page_id='".$pageid."'",$this->ocn);
		if($row=$this->dbfetcharray($ors)){
			$meta = '<META NAME="description" CONTENT="'.stripslashes($row["meta_desc"]).'">';
			$meta .= '<META NAME="keywords" CONTENT="'.stripslashes($row["meta_keyword"]).'">';
		}
		mysql_free_result($ors);
		return $meta;
	}
	
	function changedateformat($dateval,$curformat,$newformat)
	{
		$retval = '';
		$curformat = strtolower($curformat);
		$newformat = strtolower($newformat);

		$ar_delimiters = array('-','/');
		$delimiter = '';
		for($i=0;$i<count($ar_delimiters);$i++)
		{
			if(strpos($newformat,$ar_delimiters[$i]))
			{
				$delimiter = $ar_delimiters[$i];
				break;
			}
		}

		if($delimiter!='')
		{
			$dateparts = split('[/.-]',$dateval);
			
			$dpos = strpos($curformat,'d');
			$mpos = strpos($curformat,'m');
			if(!$mpos) $mpos = strpos($curformat,'n');
			$ypos = strpos($curformat,'y');
	
			if($dpos<$mpos && $mpos<$ypos)
			{
				$d = $dateparts[0];
				$m = $dateparts[1];
				$y = $dateparts[2];
			}else{
				if($mpos<$dpos && $dpos<$ypos)
				{
					$m = $dateparts[0];
					$d = $dateparts[1];
					$y = $dateparts[2];
				}else{
					if($ypos<$mpos && $mpos<$dpos)
					{
						$y = $dateparts[0];
						$m = $dateparts[1];
						$d = $dateparts[2];
					}
				}
			}
	
			if(strlen($y)<4)
			{
				if($y<51)
				{
					$y = '20'.$y;
				}else{
					$y = '19'.$y;
				}
			}
	
			$dpos = strpos($newformat,'d');
			$mpos = strpos($newformat,'m');
			if(!$mpos) $mpos = strpos($newformat,'n');
			$ypos = strpos($newformat,'y');
			
			if($dpos<$mpos && $mpos<$ypos)
			{
				$retval = $d.$delimiter.$m.$delimiter.$y;
			}else{
				if($mpos<$dpos && $dpos<$ypos)
				{
					$retval = $m.$delimiter.$d.$delimiter.$y;
				}else{
					if($ypos<$mpos && $mpos<$dpos)
					{
						$retval = $y.$delimiter.$m.$delimiter.$d;
					}
				}
			}
		}

		return $retval;
	}
	
	function getpost($request_name)
	{
		$retval = '';
		if(isset($_POST[$request_name]))
		{
			if(trim($_POST[$request_name])!='')
			{
				$retval = $_POST[$request_name];
			}
		}
		return $retval;
	}

	function getreq($request_name)
	{
		$retval = '';
		if(isset($_REQUEST[$request_name]))
		{
			if(trim($_REQUEST[$request_name])!='')
			{
				$retval = $_REQUEST[$request_name];
			}
		}
		return $retval;
	}

	function getsession($session_name)
	{
		$retval = '';
		if(isset($_SESSION[$session_name]))
		{
			if(trim($_SESSION[$session_name])!='')
			{
				$retval = $_SESSION[$session_name];
			}
		}
		return $retval;
	}
	
	function redirect($url)
	{
		header("Location: ".$url);
		exit;
	}

	function permissionchk($urlpermit,$currenturl)
	{
		if(substr_count(strtolower($urlpermit),strtolower(trim(basename($currenturl))))<1)
		{
			$this->closedb();
			echo 'Permission denied. Click <a href="main.php">here</a> to go back to main page';
			exit;
		}
	}
	
	function getpagetitle($url,$ocn)
	{
		$retval = "";
		/*$ors = $this->dbquery("select submenu_name from adm_modules where url='".strtolower(trim(basename($url)))."'",$ocn);
		if($row=$this->dbfetcharray($ors)){
			$retval = $row["submenu_name"];
		}
		mysql_free_result($ors);*/
		$retval = $url;
		return $retval;
	}
	
	function datediff($interval, $datefrom, $dateto, $using_timestamps = false) 
	{  
		/*
		$interval can be:
		yyyy - Number of full years
		q - Number of full quarters
		m - Number of full months
		y - Difference between day numbers
			(eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
		d - Number of full days    
		w - Number of full weekdays    
		ww - Number of full weeks    
		h - Number of full hours    
		n - Number of full minutes    
		s - Number of full seconds (default)  
		*/    
		if (!$using_timestamps)
		{
			$datefrom = strtotime($datefrom, 0);
			$dateto = strtotime($dateto, 0);
		}
		$difference = $dateto - $datefrom; // Difference in seconds
		switch($interval) {
			case 'yyyy': // Number of full years
				$years_difference = floor($difference / 31536000);
				if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) 
				{
					$years_difference--;
				}
				if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) 
				{
					$years_difference++;
				}
				$datediff = $years_difference;
				break;
			case "q": // Number of full quarters
				$quarters_difference = floor($difference / 8035200); 
				while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
					$months_difference++;
				} 
				$quarters_difference--;
				$datediff = $quarters_difference;
				break;
			case "m": // Number of full months
				$months_difference = floor($difference / 2678400); 
				while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
					$months_difference++;
				}
				$months_difference--;
				$datediff = $months_difference;
				break;
			case 'y': // Difference between day numbers
				$datediff = date("z", $dateto) - date("z", $datefrom); 
				break;
			case "d": // Number of full days
				$datediff = floor($difference / 86400);
				break; 
			case "w": // Number of full weekdays
				$days_difference = floor($difference / 86400);
				$weeks_difference = floor($days_difference / 7); // Complete weeks
				$first_day = date("w", $datefrom);
				$days_remainder = floor($days_difference % 7);
				$odd_days = $first_day + $days_remainder; 
				// Do we have a Saturday or Sunday in the remainder? 
				if ($odd_days > 7) { // Sunday
					$days_remainder--;
				} 
				if ($odd_days > 6) { // Saturday
					$days_remainder--;
				}
				$datediff = ($weeks_difference * 5) + $days_remainder;
				break;
			case "ww": // Number of full weeks
				$datediff = floor($difference / 604800);
				break;
			case "h": // Number of full hours
				$datediff = floor($difference / 3600);
				break;
			case "n": // Number of full minutes
				$datediff = floor($difference / 60);
				break;
			default: // Number of full seconds (default)
				$datediff = $difference; 
				break;
		}
		return $datediff;
	}
	
	function DuplicateFileNameCorrection($path,$filename)
	{
		$filename = preg_replace('/[^\w0-9_.-]/','',$filename);
		$finalfilename = $filename;
		$i = 2;
		$info = pathinfo($path.$filename);
		$filewithoutext = pathinfo($path.$filename, PATHINFO_FILENAME);
		while (file_exists($path.$finalfilename))
		{
			$finalfilename = basename($filewithoutext."_".$i.".".$info['extension']);
			$i++;
		}
	
		return $finalfilename;
	}
	
	function createthumb($name,$filename,$new_w,$new_h)
	{
		$retval = false;
		$system=explode('.',$name);
		if (preg_match('/jpg|jpeg/',$system[1]))
		{
			$src_img=imagecreatefromjpeg($name);
		}
		
		if (preg_match('/png/',$system[1]))
		{
			$src_img=imagecreatefrompng($name);
		}

		$old_x=imagesx($src_img);
		$old_y=imagesy($src_img);
		if($new_h==""){
			$thumb_w = $new_w;
			$thumb_h = ($old_y/$old_x)*$new_w;
		}else{
			if ($old_x > $old_y)
			{
				$thumb_w=$new_w;
				$thumb_h=$old_y*($new_h/$old_x);
			}
			if ($old_x < $old_y)
			{
				$thumb_w=$old_x*($new_w/$old_y);
				$thumb_h=$new_h;
			}
			if ($old_x == $old_y)
			{
				$thumb_w=$new_w;
				$thumb_h=$new_h;
			}
		}
	
		$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
		if(imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y)){
			$retval = true;
		}

		if(preg_match("/png/",$system[1]))
		{
			imagepng($dst_img,$filename); 
		}else{
			imagejpeg($dst_img,$filename); 
		}
		imagedestroy($dst_img); 
		imagedestroy($src_img); 
		return $retval;
	}
}

//Outside mainlib class function library
//**************************************
function websessions()
{
	session_start();
//	session_register("admuserid");
}

function admsessions()
{
	ini_set('register_globals','On');
	session_start();
//	session_register("admuserid");
}

function admsessionchk()
{
	if(isset($_SESSION["admuserid"]))
	{
		if(trim($_SESSION["admuserid"])=="")
		{
			print "<script language=JavaScript>";
			print "window.location='index.php';";
			print "</script>";
			exit();
		}
	}else{
		print "<script language=JavaScript>";
		print "window.location='index.php';";
		print "</script>";
		exit();
	}
}

function sendmail($from,$to,$subject,$msg,$html)
{
	$retval = false;
	$headers = '';
	if($html){
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	}
	$headers .= 'From: '.$from."\r\n";	

	mail($to,$subject,$msg,$headers);
	$retval = true;
	
	return $retval;
}

function AutoBackslash($value){
	$value = trim($value);
	if (!get_magic_quotes_gpc()) {
		$value = addslashes($value);
	}
	return $value;
}
?>