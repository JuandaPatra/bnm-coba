<link rel="stylesheet" href="css/responsiveslides.css" type="text/css">
<script src="scripts/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });

      // Slideshow 2
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        speed: 300,
        maxwidth: 540
      });

      // Slideshow 3
      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 540
      });

      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
</script>

<div id="slider">
    <div class="callbacks_container">
      <ul class="rslides" id="slider4">
        <?php 
        $sliderQuery = $this->db->query("select * from slider order by slider_id");

        ?>

        <?php if($sliderQuery->num_rows()>0): ?>

        <?php foreach($sliderQuery->result_array() as $row): ?>
        <?php if($row['link']!=''): ?>
          <li><a href="<?php echo $row['link']; ?>"><img src="<?php echo base_url().$row['file_image_id']; ?>" alt=""></a></li>
          <?php else: ?>
      	   <li><img src="<?php echo base_url().$row['file_image_id']; ?>" alt=""></li>
        <?php endif; ?>
      <?php endforeach; ?>
      <?php endif; ?>
        
        <!----
        <li>
            <video autoplay="autoplay" id="bgvid" loop="loop" poster="video/video1.jpg" style="max-width:100%;">
                <source src="video/video1.mp4" type="video/mp4" />
                <source src="video/video1.ogv" type="video/ogv" />
                <source src="video/video1.webm" type="video/webm" />
                <img src="video/video1.jpg" />
           </video>
		</li>
        --->
      </ul>
    </div>
</div>
<div id="clearer"></div>