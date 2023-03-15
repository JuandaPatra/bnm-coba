<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRECISION STAINLESS STEEL</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.4.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#drop2").click(function(){
			$("#menuhover").slideToggle("slow");
		});
	});
</script>
</head>

<body>
<div style="background:url(<?php echo base_url(); ?>images/bgnews.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position:absolute; top:0; width:100%; overflow:hidden;">

<div id="bgheader">
	<div id="logo"><img src="<?php echo base_url(); ?>images/logo.png" class="logo1" /><img src="<?php echo base_url(); ?>images/logo2.png" class="logo2" /></div>
    <div id="judul"><img src="<?php echo base_url(); ?>images/hd-news.png" /></div>
</div>
<?php include'include/menu.php' ?>

<div id="content" style="background:url(<?php echo base_url(); ?>images/bgtransparant.png); border-radius:15px; -webkit-border-radius:15px; -moz-border-radius:15px;">
	<!----<h1 class="judul">NEWS</h1>-->
    <div id="news-detail">
    	<img src="images/news/news1.jpg" />
        <div id="news-detail-teks">
            <?php

            $row = $query->row_array();

             ?>
        	<label><?php echo $row['title_id']; ?></label>
            <span><?php echo date('d M Y',strtotime($row['posting_date'])); ?></span>
            <?php echo $row['description_id']; ?>
        </div>
    </div>
</div>
<?php include'include/footer.php' ?>
</div>
</body>
</html>