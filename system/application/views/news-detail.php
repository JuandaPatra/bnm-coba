<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BNM PRECISION STAINLESS STEEL: News</title>

<meta name="Keywords" content="thin stainless steel, thin gauged stainless steel, csp stainless steel, ba stainless steel, 1/4h stainless steel, hard stainless steel, extra hard stainless steel, soft stainless steel, annealed stainless steel, precision stainless steel, cold rolled stainless steel, stainless steel supplier, stainless steel 301, stainless steel 304, stainless steel 316l, stainless steel 904l, stainless steel stamping, stainless steel strip, high yield stainless steel, spring stainless steel, stainless steel coil, buy stainless steel, sell stainless steel, stainless steel rolling mill, stainless steel indonesia">

<meta name="Description" content="BNM stainless steel is a stainless steel cold rolling mill in Indonesia, specialized in thin-gauged (down to 0.05mm) & narrow slit materials (as narrow as 5 mm)">

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


<!--Start of Zopim Live Chat Script-->

<script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");

$.src="//v2.zopim.com/?2vW7fEzG8qt0lVH69RSSTlqTRJI6Rmce";z.t=+new Date;$.

type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

</script>

<!--End of Zopim Live Chat Script-->


</head>

<body>
<div style="background:url(<?php echo base_url(); ?>images/bgnews.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position:absolute; top:0; width:100%; overflow:hidden;">

<div id="bgheader">
	<div id="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" border="0" class="logo1" /><img src="images/logo2.png" border="0" class="logo2" /></a></div>
    <div id="judul"><img src="<?php echo base_url(); ?>images/hd-news.png" /></div>
</div>
<?php include'include/menu.php' ?>

<div id="content" style="background:url(<?php echo base_url(); ?>images/bgtransparant.png); border-radius:15px; -webkit-border-radius:15px; -moz-border-radius:15px;">
	<!----<h1 class="judul">NEWS</h1>-->
    <div id="news-detail">
    	<!--<img src="images/news/news1.jpg" />-->
        <div id="news-detail-teks">
            <?php

            $row = $query->row_array();

             ?>
        	<label><?php echo $row['title_id']; ?></label>
            <span><?php echo date('d M Y',strtotime($row['posting_date'])); ?></span>
           <!--  <script type="text/javascript">
              $(document).ready(function(){
                $('object').wrap("<div class='images'></div>");
                var img = $('object').attr('data');
                $('.images').append('<img style="float:none" src='+img +' />');
                $('object').remove();
              })
            </script> -->
            <?php echo $row['description_id']; ?>


            <?php

            //print_r($images);
            if($images->num_rows()>0):

             ?>
             
             <?php foreach($images ->result_array() as $row): ?>
             

             <p>
    <span style="font-size: small;">
    <div class="images">
        <img style="float:none" src="<?php echo base_url().$row['file_image']; ?>">
    </div><br>
    </span>
</p>

         <?php endforeach; ?>
         
         <?php endif; ?>
        </div>
    </div>
</div>
<?php include'include/footer.php' ?>
</div>
</body>
</html>
