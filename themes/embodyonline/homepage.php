<?php /*
Template Name: Homepage
*/ ?>

<?php
add_action( 'genesis_after_header', 'naada_videoBanner', 10 );
function naada_videoBanner() {
  ?>
  <div class="videoBanner">

  <!-- Calls our Call out Widget -->
  <?php dynamic_sidebar("video_callout"); ?>

  <!-- Video -->
  <video id="naadaFootage" autoplay playsinline muted loop poster="<?php echo get_stylesheet_directory_uri(); ?>/vid/still.jpg">
    <source src="<?php echo get_stylesheet_directory_uri(); ?>/vid/VideoBanner3-HD.mp4" type="video/mp4">
    <source src="<?php echo get_stylesheet_directory_uri(); ?>/vid/WebMVideo1.webm" type="video/webm">


    Your browser doesn't support HTML5 video. Here's a <a href="#">link</a> to download the video.
    </video>
  </div>
  <?php
}
?>

<?php

function homepage_Output(){
  ?>
  <div class="homeContentWrap">
    <div class="announcement">
      <?php the_field('announcement_text');?>
    </div>
    <h3 class="schedule"><?php the_field('todays_schedule');?></h3>
    <a class="fullSched" href="/schedule"><?php the_field('full_schedule');?></a>
    <div class="live-stream-sched"><?php echo do_shortcode( '[hc-hmw snippet="Live-Stream-Schedule"]');?></div>
    <div class="sell">
      <div class="greenbox first">
        <h3><?php the_field('sell_box_1_title'); ?></h3>
      </div>
      <p>
        <a class="naada-button orange-button medium" href="<?php the_field('sell_btn_link1');?>"><?php the_field('sell_btn_text1');?></a>
      </p>
      <p><?php the_field('sell_box_1_text');?></p>
    </div>
    <div class="sell">
      <div class="greenbox second">
        <h3><?php the_field('sell_box_2_title'); ?></h3>
        </div>
        <p>
          <a class="naada-button orange-button medium" href="http://clients.mindbodyonline.com/ws.asp?studioid=6387&amp;stype=41&amp;prodid=155"><?php the_field('sell_btn_text2');?></a>
        </p>
        <p><?php the_field('sell_box_2_text');?></p>
    </div>

    <hr />

    <h3>Upcoming Courses</h3>
    <div class="naada-carousel">
      <div id="healCodeLoading"><?php echo do_shortcode( '[hc-hmw snippet="Homepage-Events-Carousel"]');?></div>
    </div>

  </div><!-- .homeContentWrap -->

  <!-- NYTT Parallax Section -->
  <section id="nytt" class="module parallax parallax-2">
    <div class="parallaxContent">
    <h2><?php the_field('parallax2_section_title');?></h2>
      <div class="block center">
        <?php the_field('parallax2_center');?>
      </div>
      <div class="flex">
           <div>
            <?php the_field('parallax2_flex_col_1');?>
          </div>

          <div>
           <?php the_field('parallax2_flex_col_2');?>
         </div>

         <div>
          <?php the_field('parallax2_flex_col_3');?>
        </div>

      </div>
      <div class="clear"></div>
      <!-- <a class="button orange-button medium" href="/yoga-teacher-training"><?php //the_field('parallax2_more');?></a> -->
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section>

  <!-- NYTT Programs Section -->
  <div class="homeContentWrap nytt-programs">
    <h2><?php if (get_field('nytt_message_title')) {
        the_field('nytt_message_title');
      }?>
    </h2>
    <p class="nyttSubtext">
      <?php if (get_field('nytt_message_text')) {
        the_field('nytt_message_text');
      }?>
    </p>
    <div class="nytt-carousel">
      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-200hr-web.jpg" alt="200 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/200-hour-foundation/"><?php the_field('nytt_course_1');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('nytt_course_1_link');?>"><?php the_field('course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-300hr-web.jpg" alt="300 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/300-hour-advanced/"><?php the_field('nytt_course_2');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('nytt_course_2_link');?>"><?php the_field('course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-500hr-web.jpg" alt="500 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/500-hour-certification/"><?php the_field('nytt_course_3');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('nytt_course_3_link');?>"><?php the_field('course_button_text');?></a></p>
      </div>

    </div>

    <?php //if (get_field('nytt_testimonials_title')) {
      // the_field('nytt_testimonials_title');
    //  }?>

    <!-- Tesitmonials Video Embed -->
    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/45218771?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
  </div>


  <!-- Online Courses Section -->
  <section id="onlinecourses" class="module parallax parallax-5">
    <div class="parallaxContent">
      <h2><?php the_field('parallax3_section_title');?></h2>
      <div class="block left">
        <?php the_field('parallax3_left_col');?>
      </div>
      <div class="block right">
        <?php the_field('parallax3_right_col');?>
      </div>
      <div class="clear"></div>
      <p><a class="button orange-button medium" href="/online-yoga-education/"><?php the_field('parallax3_more');?></a></p>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section>

  <!-- Online Course Section -->
  <div class="homeContentWrap">
    <div class="online-carousel">
      <div>
        <div class="courseImage"><img alt="<?php the_field('online_course_1');?>" src="<?php the_field('online_course_1_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('online_course_1_link');?>"><?php the_field('online_course_1');?></a></h2>
          <p><span class="trainer-name"><?php the_field('course_1_faculty_link');?></a></span></p>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('online_course_1_link');?>"><?php the_field('online_course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="<?php the_field('online_course_2');?>" src="<?php the_field('online_course_2_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('online_course_2_link');?>"><?php the_field('online_course_2');?></a></h2>
          <p><span class="trainer-name"><?php the_field('course_2_faculty_link');?></a></span></p>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('online_course_2_link');?>"><?php the_field('online_course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="<?php the_field('online_course_3');?>" src="<?php the_field('online_course_3_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('online_course_3_link');?>"><?php the_field('online_course_3');?></a></h2>
          <p><span class="trainer-name"><?php the_field('course_3_faculty_link');?></a></span></p>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('online_course_3_link');?>"><?php the_field('online_course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="<?php the_field('online_course_4');?>" src="<?php the_field('online_course_4_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('online_course_4_link');?>"><?php the_field('online_course_4');?></a></h2>
          <p><span class="trainer-name"><?php the_field('course_4_faculty_link');?></a></span></p>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('online_course_4_link');?>"><?php the_field('online_course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="<?php the_field('online_course_5');?>" src="<?php the_field('online_course_5_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('online_course_5_link');?>"><?php the_field('online_course_5');?></a></h2>
          <p><span class="trainer-name"><?php the_field('course_5_faculty_link');?></span></p>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('online_course_5_link');?>"><?php the_field('online_course_button_text');?></a></p>
      </div>

    </div>
  </div>

  <!-- Therapeutic Clinic Section -->
  <section class="module parallax parallax-1">
    <div class="parallaxContent">
      <h2><?php the_field('parallax1_section_title');?></h2>
      <div class="block left">
        <?php the_field('parallax1_left_col');?>
      </div>
      <div class="block right">
        <?php the_field('parallax1_right_col');?>
      </div>
      <div class="clear"></div>
      <a class="button orange-button medium" href="/therapeutic-clinic/"><?php the_field('parallax1_more');?></a>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section>

  <div class="homeContentWrap therapy-clinic">
    <div class="clinic-carousel">
      <?php
      // check if the repeater field has rows of data
      if( have_rows('clinic_modalities') ):

       	// loop through the rows of data
          while ( have_rows('clinic_modalities') ) : the_row();?>
          <div>
              <?php
              $therapy_name = get_sub_field('therapy_name');
              $therapy_image = get_sub_field('therapy_image');
              $therapy_link = get_sub_field('therapy_link');
              $is_active = get_sub_field('currently_booking');?>

              <div class="courseImage">
                <img alt="<?php echo $therapy_image['alt'];?>" src="<?php echo $therapy_image['url'];?>"/>
              </div>
              <div class="courseInfo">
                <h2><a href="<?php the_field('carousel_item_1_link');?>"><?php echo $therapy_name;?></a></h2>
              </div>

              <?php if ( $is_active ): ?>
                <p><a class="button orange-button small" href="<?php echo $therapy_link;?>"><?php the_field('book_appointment');?></a></p>
              <?php else : ?>
                <p><a class="button inactive-button small" href="#"><?php the_field('coming_soon');?></a></p>
              <?php endif; ?>
            </div>
          <?php
          endwhile;

      else :

          // no rows found

      endif;?>
    </div>
  </div>


<?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'homepage_Output');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
