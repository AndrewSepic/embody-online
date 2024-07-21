<?php /*
Template Name: NYTT Course Page
*/ ?>

<?php
remove_action('genesis_loop', 'genesis_do_loop');
add_action( 'genesis_after_header', 'naada_nytt', 10 );
function naada_nytt() {

// Setup Hero Vars
$heroImage = get_field('hero_image');
$leadIn = get_field('title_lead_in');
$title = get_field('title');
$cert = get_field('certed_yoga_alliance_statement');
$intro = get_field('intro_text');
// Button Vars
$nextSession = get_field('next_session_button');
$downloadPacket = get_field('download_packet_button');
// Curriculum Vars
$curricTitle = get_field('curriculum_title');
$schedule = get_field('show_sched_text');
// Modules Vars
$structuresTitle = get_field('structures_title');
// Bonus
$bonusTitle = get_field('bonus_title');
// Accreditation Vars
$accredTitle = get_field('accreditation_title');
$accredContent = get_field('accreditation_content');
// Tuition Vars
$tuitionTitle = get_field('tuition_title');
$tuitionLeft = get_field('tuition_content_left');
$tuitionRight = get_field('tuition_content_right');
$apply = get_field('apply_button');


  ?>
  <div class="nyttHero">
    <?php if ( $heroImage ): ?>
      <img src="<?php echo $heroImage['url'];?>" alt="<?php echo $heroImage['alt'];?>" />
    <?php endif ?>

    <div class="titleWrap">
      <?php if ( $leadIn ): ?>
      <span class="leadIn"><?php echo $leadIn;?></span>
      <?php endif ?>
      <?php if ( $title ): ?>
      <h2><?php echo $title; ?></h2>
      <?php endif ?>
    </div>
  </div>

  <div class="cert">
    <?php if ( $cert ): ?>
      <h3><?php echo $cert; ?></h3>
    <?php endif ?>
  </div>

  <div class="homeContentWrap">

    <div class="courseShort">
        <p><?php echo $intro;?></p>
    </div>

    <!-- Buttons -->
    <?php if ( $nextSession ): ?>
    <div class="buttonWrap">
      <a class="naada-button green-button large" href="<?php echo $nextSession['url'];?>"><?php echo $nextSession['title'];?></a>
    <?php endif ?>

    <?php if ( $downloadPacket ): ?>
      <a class="naada-button orange-button large" href="<?php echo $downloadPacket['url'];?>"><?php echo $downloadPacket['title'];?></a>
    </div>
    <?php endif ?>
    <hr>
  </div> <!-- / .homeContentWrap -->

  <!-- 50/50 -->
  <?php if ( have_rows ('50-50') ):
    while ( have_rows ('50-50') ): the_row();

    // Vars
    $fiftyTitle = get_sub_field('50-50-title');
    $fiftySubTitle = get_sub_field('50-50-subtitle');
    $fiftyContent = get_sub_field('50-50-content');
    $fiftyImage = get_sub_field('50-50-image');
    $imageSide = get_sub_field('50-50-image_side'); ?>
    <div class="fiftyfiftyWrap">
      <div class="fiftyimage <?php echo $imageSide; ?>">
        <?php if ( $fiftyImage ): ?>
          <img src="<?php echo $fiftyImage['url'];?>" alt="<?php echo $fiftyImage['alt'];?>"/>
        <?php endif ?>
      </div>
      <div class="fiftyContent">

        <?php if ( $fiftyTitle ): ?>
          <h2><?php echo $fiftyTitle; ?></h2>
        <?php endif ?>

        <?php if ( $fiftySubTitle ): ?>
          <h4><?php echo $fiftySubTitle; ?></h4>
        <?php endif ?>

        <?php if ( $fiftyContent ): ?>
          <p><?php echo $fiftyContent; ?></p>
        <?php endif ?>

      </div>
  </div>

<?php endwhile; ?>

<?php endif ?>
<!-- ./ 50-50 -->

<div class="homeContentWrap">
  <!-- Curriculum -->
  <div class="curriculum">
  <?php if ( $curricTitle ): ?>
    <h2><?php echo $curricTitle; ?></h2>
  <?php endif ?>

  <?php
    // Tabs
    if ( have_rows('tabs') ):
      $i = 0; ?>
      <div id="nyttTabs">
        <!-- Setup Tabs Nav -->
        <ul class="">
          <?php while (have_rows('tabs') ): the_row();
            $title = get_sub_field('tabs_title'); ?>
            <li>
              <a href="<?php echo '#tab-' . $i; ?>" class=""><?php echo $title; ?></a>
            </li>
            <?php $i++;?>
          <?php endwhile;?>
        </ul><!-- /.r-tabs-nav -->
    <?php endif ?>

      <!-- Setup Tabs Content -->
      <?php if ( have_rows('tabs') ) : ?>
        <?php $i = 0; ?>
          <?php while ( have_rows('tabs') ) : the_row();
            $content = get_sub_field('tabs_content');
            $scheduleContent = get_sub_field('schedule');?>

            <div id="<?php echo 'tab-' . $i; ?>">
              <?php echo $content; ?>
              <a class="showSchedule" href="#"><?php echo $schedule;?></a>
              <div class="schedule">
                <?php echo $scheduleContent; ?>
              </div>
            </div><!-- /.tab-pane -->
            <?php $i++; ?>
          <?php endwhile; ?>
      <?php endif; ?>
      </div>
    <!-- / #nyttTabs -->
    <?php
    // If second tabs module is toggled TRUE
    if( get_field('add_2nd_tabs_module') == TRUE ) {
      // Tabs
      if ( have_rows('tabs_2') ):
        ?>
        <div id="nyttTabs2">
          <!-- Setup Tabs Nav -->
          <ul class="">
            <?php while (have_rows('tabs_2') ): the_row();
              $title = get_sub_field('tabs_title'); ?>
              <li>
                <a href="<?php echo '#tab-' . $i; ?>" class=""><?php echo $title; ?></a>
              </li>
              <?php $i++;?>
            <?php endwhile;?>
          </ul><!-- /.r-tabs-nav -->
      <?php endif ?>

        <!-- Setup Tabs Content -->
        <?php if ( have_rows('tabs_2') ) : ?>
          <?php $i = 5; ?>
            <?php while ( have_rows('tabs_2') ) : the_row();
              $content = get_sub_field('tabs_content');
              $scheduleContent = get_sub_field('schedule');?>

              <div id="<?php echo 'tab-' . $i; ?>">
                <?php echo $content; ?>
                <a class="showSchedule" href="#"><?php echo $schedule;?></a>
                <div class="schedule">
                  <?php echo $scheduleContent; ?>
                </div>
              </div><!-- /.tab-pane -->
              <?php $i++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    <?php
    } ?>

    <?php// Accordion for Small Screens only ?>
    <!-- Accordion -->
    <div class="curriculumAccordion">
      <?php if ( have_rows('tabs') ): ?>
        <div class="nytt-accordion">
          <?php while (have_rows('tabs')): the_row();
            $accordionHeader = get_sub_field('tabs_title');
            $accordionContent = get_sub_field('tabs_content');
            $accordionSchedule = get_sub_field('schedule');?>

            <h3><?php echo $accordionHeader;?></h3>
            <div> <?php echo $accordionContent;?>
              <div class="schedule">
                <?php echo $accordionSchedule; ?>
              </div>
            </div>

          <?php endwhile ?>
        </div>
      <?php endif ?>
      </div> <!-- /. Module Structure -->
    </div>

    <!-- Module Structure -->
    <div class="structure">
      <?php if ( $structuresTitle ): ?>
        <h2><?php echo $structuresTitle; ?></h2>
      <?php endif ?>

      <?php if ( have_rows('structure_accordion') ): ?>
        <div class="nytt-accordion">
          <?php while (have_rows('structure_accordion')): the_row();
            $accordionHeader = get_sub_field('accordion_header');
            $accordionContent = get_sub_field('accordion_content'); ?>

            <h3><?php echo $accordionHeader;?></h3>
            <div> <?php echo $accordionContent;?></div>
          <?php endwhile ?>
        </div>
      <?php endif ?>
      </div> <!-- /. Module Structure -->
  </div> <!-- /.homeContentWrap -->

  <!-- Bonus! -->
  <div class="bonusFull">
    <div>
      <?php if ( $bonusTitle ): ?>
        <h2> <?php echo $bonusTitle; ?></h2>
      <?php endif ?>

      <?php if ( have_rows('bonus_points')): ?>
        <div class="bonusitems">
          <?php while (have_rows('bonus_points')): the_row();
            $bonus = get_sub_field('bonus_text'); ?>
            <div class="bonusitem"><?php echo $bonus; ?></div>
          <?php endwhile; ?>
        </div>
      <?php endif ?>
    </div>
  </div><!-- /.bonusFull -->

  <div class="homeContentWrap">
    <div class="accred">
      <?php if ( $accredTitle ): ?>
        <h2> <?php echo $accredTitle; ?></h2>
      <?php endif ?>

      <?php if ( $accredContent ): ?>
        <div> <?php echo $accredContent; ?></div>
      <?php endif ?>
    </div>
  </div><!-- /.homeContentWrap -->

  <div class="testimonials">
    <div class="video">
      <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/45218771?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
    </div>

    <?php

    // get Random Testimonial from repeater field (array)
    $repeater = get_field( 'testimonials' );
    $rand = rand(0, (count($repeater) - 1));?>

    <div class="testy">
        <img class="testyPic" src="<?php echo $repeater[$rand]['testimonial_image']['url'];?>" alt="Testimonial Headshot"/>
        <div class="testCopy">
          <p><?php  echo $repeater[$rand]['testimonial_copy'];?></p>
          <span>- <?php echo $repeater[$rand]['testimonial_author'];?></span>
        </div>

    </div>

  </div>

  <div class="tuitionWrap">
    <hr>

      <?php if ( $tuitionTitle ): ?>
        <h2> <?php echo $tuitionTitle; ?></h2>
      <?php endif ?>
      <div class="tuitionFlex">
        <div class="tuitionLeft">
          <?php echo $tuitionLeft;?>
        </div>

        <div class="tuitionRight">
          <?php echo $tuitionRight;?>
        </div>
      </div>

      <a class="naada-button green-button large" href="<?php echo $apply['url'];?>"><?php echo $apply['title'];?></a>

      <!-- Buttons -->
      <?php if ( $nextSession ): ?>
        <div class="buttonWrap">
        <a class="naada-button orange-hollow large" href="<?php echo $nextSession['url'];?>"><?php echo $nextSession['title'];?></a>
      <?php endif ?>

      <?php if ( $downloadPacket ): ?>
        <a class="naada-button orange-button large" href="<?php echo $downloadPacket['url'];?>"><?php echo $downloadPacket['title'];?></a>
      </div>
      <?php endif ?>

    </div><!-- ./tuitionWrap -->

<?php
}

?>

<?php
//* This file handles pages, but only exists for the sake of child theme forward compatibility.
genesis();

?>
