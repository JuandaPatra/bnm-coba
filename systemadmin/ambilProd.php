<?php
include("../inc/class.mainlib.inc.php");
$mainlib = new mainlib();
$mainlib->opendb();
$category_id = $_GET['category_id'];
?>
<select name='product' class='inputtext'>
	<option value='1'>Empty</option>
	<?php 
	$ors = $mainlib->dbquery("select * from product where category_id = '$category_id'",$mainlib->ocn);
	while($row = $mainlib->dbfetcharray($ors))
	{ 
		echo "<option value='$row[product_id]'"; 
		if($category_id==$row["category_id"])
		{ 
			echo 'selected'; 
		} 
		echo '>'.$row["name_id"].'</option>'; 
		} 
		mysql_free_result($ors); 
	?>
</select>