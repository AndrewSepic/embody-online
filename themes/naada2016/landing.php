<?php /*
Template Name: Landing Page
*/ ?>

<?php
add_action( 'genesis_after_header', 'naada_LandingPage', 10 );
function naada_LandingPage() {

  // Gets the product id based on the custom field input
    $courseID = get_field('course_id');
    //$_product = wc_get_product('8010');
    $_product = wc_get_product($courseID);
    // Get's the price of the product
    $course_price = $_product->get_regular_price();

  ?>
  <div class="LandingHero" style="background-image: url('<?php the_field('hero_image');?>')">

    <!-- Calls our Call outOver Hero Image-->
    <div class="callOut">
      <h4 class="naadaPresents"><?php the_field('naada_presents');?></h4>
      <h2><?php echo get_the_title(); ?></h2>
    </div>

  </div>
  <div class="courseShort">
    <div>
      <p><?php the_field('course_short_description');?></p>
    </div>
  </div>
  <div class="homeContentWrap">
    <div class="hardSell">
      <div class="one-half first">
        <h2><?php the_field('course_cta');?></h2>
      </div>
      <div class="one-fourth">
        <span class="coursePrice">$<?php echo $course_price;?></span>
      </div>
      <div class="one-fourth">
        <a class="naada-button orange-button large courseBuy" href="http://naada.ca/checkout/?add-to-cart=<?php the_field('course_id');?>">Purchase</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <hr/>
    <?php // check to see if there's a testimonial
    $testimonial = get_field( "testimonial" );

      if( $testimonial ) { ?>

      <div class="testimonial">
        <p> <?php the_field('testimonial');?> </p>
        <p class="author"><?php the_field('testimonial_author'); ?> </p>
      </div>
      <hr/>
      <?php
      } else {
        // no testimonial output
      }
      ?>
    <div class="one-half first">
      <?php the_field('vimeo_embed');?>
    </div>
    <div class="one-half">
      <h2 class="underline">What You'll Receive</h2>
      <ul class="checkMarks">
        <?php the_field('receive');?>
      </ul>
    </div>
    <div class="clearfix"></div>
    <hr />
    <div class="centerWrap"><h2 class="underline">Curriculum</h2></div>
    <?php
      if (is_page(8013)) {
        ?>
        <div class="dropdownContainer closed">
          <div class="one-half first">
            <ul class="greenDots">
            <?php the_field('curriculum1');?>
            </ul>
          </div>
          <div class="one-half">
            <ul class="greenDots">
              <?php the_field('curriculum2');?>
            </ul>
          </div>
        </div>
      <div class="centerWrap"><a id="dropdownOpen" href="#" class="naada-button">See the entire curriculum</a></div>
        <?php
      }
      else {
      ?>
        <div class="one-half first">
          <ul class="greenDots">
          <?php the_field('curriculum1');?>
          </ul>
        </div>
        <div class="one-half">
          <ul class="greenDots">
            <?php the_field('curriculum2');?>
          </ul>
        </div>
      <?php
      }
      ?>

    <div class="clearfix"></div>
  </div>
  <!-- .homeContentWrap -->

  <div class="courseShort ceu">
    <span><?php the_field('ceu_message');?></span>
  </div>
  <!-- .homeContentWrap -->
  <div class="homeContentWrap">
    <div class="one-fourth first">
      <img class="instructorPic" src="<?php the_field('instructor_pic');?>" alt="Instructor Bio Pic"/>
    </div>
    <div class="three-fourths intructorBio">
      <?php the_field('instructor_bio');?>
    </div>
    <div class="clearfix"></div>

    <hr class="buy" />
    <a class="naada-button orange-button large centered" href="http://naada.ca/checkout/?add-to-cart=<?php the_field('course_id');?>">Purchase</a>
  </div>

  <?php
}

?>

<?php
//* This file handles pages, but only exists for the sake of child theme forward compatibility.
genesis();

?>
