<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRECISION STAINLESS STEEL</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.js"></script>
<script src="scripts/jquery.min.js"></script>
<script defer src="scripts/jquery.flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).ready(function(){
		$("#drop2").click(function(){
			$("#menuhover").slideToggle("slow");
		});
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails",
			minItems: 5, 
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
	});
});
</script>
</head>

<body onload="initialize()">
<div style="background:url(images/bgproductapplication.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position:absolute; top:0; width:100%; overflow:hidden;">

<div id="bgheader">
	<div id="logo"><img src="images/logo.png" class="logo1" /><img src="images/logo2.png" class="logo2" /></div>
    <div id="judul"><img src="images/hd-product-application.png" /></div>
</div>
<?php include'include/menu.php' ?>

<div id="content">
	<div id="product-application-ket">
		<p>we can produce from soft up to super extra hard tempered product</p>
        <img src="images/bullet-link2.png" style="position:absolute; margin:-100px 0 0 155px;" />
        <img src="images/bullet-link.png" style="position:absolute; margin:0px 0 0 155px;" />
        <p>our thickness range is down to 0.05 mm and a width range down to 5 mm</p>
	</div>
	<div id="product-application-left">
    	<img src="images/product/bulat.png" />
        <p>Our product is a precision cold-rolled stainless steel with stringent accuracy in size dimension, mechanical properties and surface finish. It is highly customizable depending on each customer's requirment.</p>
    </div>
    <div id="product-application-right"><?php include'include/slider-product-application.php' ?></div><div id="clearer"></div>
    <!---
    <p style="text-align:center; background:url(<?php echo"$base"; ?>images/bgtransparant.png); color:#fff; margin:0 0 0 0; padding:10px; clear:both; display:block;">"we can produce from soft up to super extra hard tempered product" dan " our thickness range is down to 0.05 mm and a width range down to 5 mm"</p>
    --->
</div>
<?php include'include/footer.php' ?>
</div>
</body>
</html>