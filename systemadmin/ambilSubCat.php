<?php
include("../inc/class.mainlib.inc.php");
$mainlib = new mainlib();
$mainlib->opendb();
$category_id = $_GET['category_id'];
?>
<select name='subcategory' class='inputtext' onchange="tampil2(this.value,<?php echo $category_id; ?>)">
	<option value='1'>Empty</option>
	<?php 
	$ors = $mainlib->dbquery("select * from subcategory where category_id = '$category_id'",$mainlib->ocn);
	while($row = $mainlib->dbfetcharray($ors))
	{ 
		echo "<option value='$row[subcategory_id]'"; 
		if($subcategory_id==$row["subcategory_id"])
		{ 
			echo 'selected'; 
		} 
		echo '>'.$row["subcategory_name_id"].'</option>'; 
		} 
		mysql_free_result($ors); 
	?>
</select>