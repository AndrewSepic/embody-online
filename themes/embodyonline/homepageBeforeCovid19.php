<?php /*
Template Name: Homepage Before Covid
*/ ?>

<?php
add_action( 'genesis_after_header', 'naada_videoBanner', 10 );
function naada_videoBanner() {
  ?>
  <div class="videoBanner">

    <!-- Calls our Call out Widget -->
    <?php dynamic_sidebar("video_callout"); ?>

    <!-- Video -->
    <video id="naadaFootage" autoplay="autoplay" muted loop poster="http://naada.staging.wpengine.com/wp-content/themes/naada2016/vid/still.jpg">
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
    <h3 class="schedule"><?php the_field('todays_schedule');?></h3>
    <a class="fullSched" href="/schedule"><?php the_field('full_schedule');?></a>
    <div class="horz-sched"><?php echo do_shortcode( '[hc-hmw snippet="Homepage-Horizontal-Schedule"]');?></div>
    <div class="sell">
      <div class="greenbox first">
        <h3><?php the_field('sell_box_1_title'); ?></h3>
      </div>
      <p>
        <a class="naada-button orange-button medium" href="/infrared-sauna"><?php the_field('sell_btn_text1');?></a>
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

  <!-- Therapeutic Clinic Section -->
  <div class="homeContentWrap therapy-clinic">
    <div class="clinic-carousel">
      <div>
        <div class="courseImage"><img alt="osteopathy" src="<?php the_field('carousel_item_1_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_1_link');?>"><?php the_field('carousel_item_1');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('carousel_item_1_link');?>"><?php the_field('book_appointment');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="yoga therapy" src="<?php the_field('carousel_item_2_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_2_link');?>"><?php the_field('carousel_item_2');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('carousel_item_2_link');?>"><?php the_field('book_appointment');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="Massage Therapy" src="<?php the_field('carousel_item_3_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_3_link');?>"><?php the_field('carousel_item_3');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('carousel_item_3_link');?>"><?php the_field('book_appointment');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img alt="Massage Therapy" src="<?php the_field('carousel_item_4_pic');?>"/></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_4_link');?>"><?php the_field('carousel_item_4');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="<?php the_field('carousel_item_4_link');?>"><?php the_field('book_appointment');?></a></p>
      </div>

    </div>
  </div>

  <!-- NYTT Parallax Section -->
  <section class="module parallax parallax-2">
    <div class="parallaxContent">
    <h2><?php the_field('parallax2_section_title');?></h2>
      <div class="block left">
        <?php the_field('parallax2_left_col');?>
      </div>
      <div class="block right">
        <?php the_field('parallax2_right_col');?>
      </div>
      <div class="clear"></div>
      <a class="button orange-button medium" href="/yoga-teacher-training"><?php the_field('parallax2_more');?></a>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section>

  <!-- NYTT Programs Section -->
  <div class="homeContentWrap nytt-programs">
    <div class="nytt-carousel">
      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-200hr-web.jpg" alt="200 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/200-hour-foundation/"><?php the_field('nytt_course_1');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="/yoga-teacher-training/200-hour-foundation/"><?php the_field('course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-300hr-web.jpg" alt="300 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/300-hour-advanced/"><?php the_field('nytt_course_2');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="/yoga-teacher-training/300-hour-advanced/"><?php the_field('course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-500hr-web.jpg" alt="500 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/500-hour-certification/"><?php the_field('nytt_course_3');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="/yoga-teacher-training/500-hour-certification/"><?php the_field('course_button_text');?></a></p>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-1000hr-web.jpg" alt="Mentorship Program" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/graduate-mentorship-program/"><?php the_field('nytt_course_4');?></a></h2>
        </div>
        <p><a class="button orange-button small" href="/yoga-teacher-training/graduate-mentorship-program/"><?php the_field('course_button_text');?></a></p>
      </div>
    </div>
  </div>

  <section class="module parallax parallax-5">
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
<?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'homepage_Output');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
