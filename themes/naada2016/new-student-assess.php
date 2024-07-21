<?php
//
// New Student Assessment Function
// March 2013 by Andrew Sepic @ Think Up! Design
// www.thinkupdesign.ca
//


// * Create a shortcode to insert content of a page of specified ID
// *
// * @param    array        attributes of shortcode
 // @return     string        $output        Content of page specified, if no page id specified output = null
 //
function pa_insertPage($atts, $content = null) {
   // Default output if no pageid given
   $output = NULL;
   // extract atts and assign to array
   extract(shortcode_atts(array(
     "page" => '2404' // Value for Course Descriptions page
     ), $atts));
   // if a page id is specified, then run query
   if (!empty($page)) {
     $pageContent = new WP_query();
     $pageContent->query(array('page_id' => $page));
       while ($pageContent->have_posts()) : $pageContent->the_post();
       // assign the content to $output
       $output = apply_filters( 'the_content', get_the_content() );
       endwhile;
     }
   return $output;
}


// add_shortcode('naada_classes_insert', 'pa_insertPage');


add_shortcode('naada_student_assess','naada_assessment');
function naada_assessment(){
    global $wpdb;
     $this_page = $_SERVER['REQUEST_URI'];
     if (isset($_POST['page'])) $page = $_POST['page'];

    //  if ( $page == NULL ) {
     if ( !isset($page) ) {
        echo '<div class ="assessment">
        <form method="post" action="' . $this_page .'">

        <p>Naada Yoga offers a wide variety of complimentary classes to best support a healthy and balanced yoga practice. Take a look at which classes we recommend for you by taking our online assessment now.</p>

        <!-- first question -->
        <div class="naada-question">
        <h5>How would you describe your level of experience in yoga?</h5>
        <input type="radio" name="experience" value="1">Complete beginner<br>
        <input type="radio" name="experience" value="2">Less then a year experience<br>
        <input type="radio" name="experience" value="3">1-3 years of practice<br>
        <input type="radio" name="experience" value="4">3 years and more
        </div>

        <!-- second Question -->
        <div class="naada-question">
        <h5>What are your reasons for choosing to practice at Naada Yoga?</h5>
        <input type="radio" name="reason" value="1">Relaxation, de-stress, deal with injury, chronic pain, or medical condition<br>
        <input type="radio" name="reason" value="2">Learn the basics of a physical practice<br>
        <input type="radio" name="reason" value="3">Develop strength, cardio, lose weight<br>
        <input type="radio" name="reason" value="4">Deepen my experience in meditation, pranayama, and asana
        </div>

        <!-- Third Question -->
        <div class="naada-question">
        <h5>How would you describe your overall health?</h5>
        <input type="radio" name="health" value="1">Poor<br>
        <input type="radio" name="health" value="2">Fluctuates<br>
        <input type="radio" name="health" value="3">Moderate<br>
        <input type="radio" name="health" value="4">Good
        </div>

        <!-- Fourth Question -->
        <div class="naada-question">
        <h5>What is your overall energy level?</h5>
        <input type="radio" name="energy" value="1">Poor<br>
        <input type="radio" name="energy" value="2">Fluctuates<br>
        <input type="radio" name="energy" value="3">Moderate<br>
        <input type="radio" name="energy" value="4">Good
        </div>


        <!-- Fifth Question -->
        <div class="naada-question">
        <h5>What do you do for exercise?</h5>
        <input type="radio" name="exercise" value="1">Don’t exercise at all or exercise causes pain<br>
        <input type="radio" name="exercise" value="2">Gentle exercise such as walking or swimming<br>
        <input type="radio" name="exercise" value="3">Occasionally exercise but intensely when done. (running biking)<br>
        <input type="radio" name="exercise" value="4">Consistent exercise
        </div>


        <!-- Sixth Question -->
        <div class="naada-question">
        <h5>How would you describe your mental clarity?</h5>
        <input type="radio" name="mental" value="1">Poor<br>
        <input type="radio" name="mental" value="2">Fluctuates<br>
        <input type="radio" name="mental" value="3">Moderate<br>
        <input type="radio" name="mental" value="4">Good
        </div>


        <!-- Seventh Question -->
        <div class="naada-question">
        <h5>How would you describe the quality of your sleep.</h5>
        <input type="radio" name="sleep" value="1">Interrupted and disturbed<br>
        <input type="radio" name="sleep" value="2">Light and awaken easily<br>
        <input type="radio" name="sleep" value="3">Sound sleep with few disruption<br>
        <input type="radio" name="sleep" value="4">Deep sleep with no disruptions
        </div>

        <!-- Eighth Question -->
        <div class="naada-question">
        <h5>Are you pregnant?</h5>
        <input type="radio" name="pregnant" value="0">Yes<br>
        <input type="radio" name="pregnant" value="0">No
        </div>


        <!-- Ninth question -->
        <div class="naada-question">
        <h5>If you answered YES to the question above how often do you practice yoga? (optional) </h5>
        <input type="radio" name="oftenmom" value="1">Once and while<br>
        <input type="radio" name="oftenmom" value="2">1-2 times a week<br>
        <input type="radio" name="oftenmom" value="3">3 or more time a week
        </div>

        <!-- Tenth Question -->
        <div class="naada-question">
        <h5>Do you practice Inversions?</h5>
        <input type="radio" name="inversions" value="3">Yes<br>
        <input type="radio" name="inversions" value="0">No
        </div>


        <!-- Eleventh Question -->
        <div class="naada-question">
        <h5>If you answered NO to the question above are interested in practicing Inversions?</h5>
        <input type="radio" name="learninversions" value="3">Yes<br>
        <input type="radio" name="learninversions" value="1">No
        </div>


        <input type="hidden" value="1" name="page" />
        <br>
        <input type="submit" />
          </form>
          </div>';

    } //End Page 1 of Form

    elseif ( $page == 1 ) {

      // sets recClasses to data input by insertPage Function above
      $recClasses =  pa_insertPage($atts, $content = null);
      // vars for each Q
      $experience =       (isset($_POST['experience']) ? (int) $_POST['experience'] : 0);
      $reason =           (isset($_POST['reason']) ? (int) $_POST['reason'] : 0);
      $health =           (isset($_POST['health']) ? (int) $_POST['health'] : 0);
      $energy =           (isset($_POST['energy']) ? (int) $_POST['energy'] : 0);
      $exercise =         (isset($_POST['exercise']) ? (int) $_POST['exercise'] : 0);
      $mental =           (isset($_POST['mental']) ? (int) $_POST['mental'] : 0);
      $sleep =            (isset($_POST['sleep']) ? (int) $_POST['sleep'] : 0);
      $oftenmom =         (isset($_POST['oftenmom']) ? (int) $_POST['oftenmom'] : 0);
      $inversions =       (isset($_POST['inversions']) ? (int) $_POST['inversions'] : 0);
      $learninversions =  (isset($_POST['learninversions']) ? (int) $_POST['learninversions'] : 0);

      $total = $experience + $reason + $health + $energy + $exercise + $mental + $sleep + $oftenmom + $inversions + $learninversions;

       if ($total <= 12) {
        // Show the first thing
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Therapeutic classes. </strong>';

        echo '<div class="theraRec">' . $recClasses . '</div>';

      }

      elseif ($total > 12 && $total <= 15) {
        // Show the first thing
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Therapeutic or Beginner classes. </strong>';

        echo '<div class="begtheraRec">' . $recClasses . '</div>';

      }

       elseif ($total > 15 && $total <= 19) {
        // Show the first thing
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Beginner classes. </strong>';

        echo '<div class="begRec">' . $recClasses . '</div>';

      }

      elseif ($total > 19 && $total <= 22) {
        // Show the first thing
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Beginner or Intermediate classes. </strong>';

        echo '<div class="beginterRec">' . $recClasses . '</div>';

      }

      elseif ($total > 22 && $total <= 26) {
        // Show thing two
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Intermediate classes. </strong>';

        echo '<div class="interRec">' . $recClasses . '</div>';
      }

      elseif ($total > 26 && $total <= 30) {
        // Show thing two
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Intermediate or Advanced classes. </strong>';

        echo '<div class="interadvRec">' . $recClasses . '</div>';
      }

      else {
        // Show thing three
        echo '<h4>Thank you!</h4>
              <strong>Based on your results we would like to recommend that you try our Advanced classes.</strong>';

         echo '<div class="advRec">' . $recClasses . '</div>';
      }

      echo '<div class="getStarted"><p>To achieve the full benefits of yoga we recommend aiming to practice 3 times per week. If you are new to Naada Yoga the best place to start is with our one time introductory offer of <strong>3 month\'s unlimited for $150.</strong> Once registered you can begin to schedule your recommended classes right away.  We look forward to supporting you in developing a healthy and habitual yoga practice. </p>
      <p><a class="naada-button orange-button medium" href="http://clients.mindbodyonline.com/ws.asp?studioid=6387&stype=41&prodid=155"><span>Get Started Now</span></a></p>
      <p>This student assessment is aimed at helping you get the most out of your practice with us by directing you to the appropriate group classes.  If you would like more personalized instruction accompanied with a tailor made program we suggest contacting the studio at 514-510-3274 and scheduling a private consultation with one of our instructors.</p></div>';

    } //End Page 2 of Form
 };// End FUnction

?>
