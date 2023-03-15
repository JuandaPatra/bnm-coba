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
    <div id="news-isi">
    	<div id="news-isi-left">
            <?php

                $newsQuery = $this->db->query("select * from news where feature = 'yes' order by news_id desc limit 1");
                $news = $newsQuery->row_array();
             ?>
             <?php if($newsQuery->num_rows()>0): ?>
        <iframe title="BNMSTAINLESS" class="youtube-player" type="text/html" 
width="436" height="225" src="http://www.youtube.com/embed/<?php echo $news['youtube'] ?>"
frameborder="0" allowFullScreen></iframe>
            <a href="<?php echo site_url('id/news/detail/'.$news['news_id'].'/'.url_title($news['title_id'])); ?>" class="link"><?php echo $news['title_id']; ?></a>
            <?php echo $news['resume_id']; ?>
        <?php endif; ?>
        </div>
        <div id="news-isi-right">
        	
            <?php if($jlh>0): ?>

            <?php foreach($query->result_array() as $row): ?>
            <a href="<?php echo site_url('id/news/detail/'.$row['news_id'].'/'.url_title($row['title_id'])); ?>" class="link"><?php echo $row['title_id']; ?></a>
            <img src="<?php echo base_url().$row['image_small'] ?>" />
            <?php echo $row['resume_id']; ?>
            <div id="clearer"></div>
        <?php endforeach; ?>

        <?php endif; ?>
            
        </div>
        <div id="clearer"></div>
        <!--<div id="data-link">
            <label>Halaman : </label> 1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a>
        </div>-->
    </div>
</div>
<?php include'include/footer.php' ?>
</div>
</body>
</html>