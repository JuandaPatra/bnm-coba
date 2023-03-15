<!---<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />-->
<!---<script src="scripts/modernizr.js"></script>-->
<!--- 
<div class="flexslider">
	<ul class="slides">
    	<li data-thumb="images/product-application-handphone.jpg"><img src="images/product-application-handphone2.jpg" /></li>
        <li data-thumb="images/product-application-electrical.jpg"><img src="images/product-application-electrical2.jpg" /></li>
        <li data-thumb="images/product-application-automotive.jpg"><img src="images/product-application-automotive2.jpg" /></li>
        <li data-thumb="images/product-application-industrial.jpg"><img src="images/product-application-industrial2.jpg" /></li>
        <li data-thumb="images/product-application-medical.jpg"><img src="images/product-application-medical2.jpg" /></li>
	</ul>
</div>
-->

	<link type="text/css" href="<?php echo base_url(); ?>css/base.css" rel="stylesheet" />
		<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>lib/jquery.pikachoose.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>lib/jquery.touchwipe.min.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose();
				});
		</script>

	<ul id="pikame" >
		<li><a href="#"><img src="<?php echo base_url(); ?>images/product-application-handphone2.jpg"/></a></li>
		<li><a href="#"><img src="<?php echo base_url(); ?>images/product-application-electrical2.jpg"/></a></li>
		<li><a href="#"><img src="<?php echo base_url(); ?>images/product-application-automotive2.jpg"/></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/product-application-industrial2.jpg"/></a></li>
		<li><a href="#"><img src="<?php echo base_url(); ?>images/product-application-medical2.jpg"/></a></li>
	</ul>



		