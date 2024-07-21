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
function pa_insertPage_fr($atts, $content = null) {
   // Default output if no pageid given
   $output = NULL;
   // extract atts and assign to array
   extract(shortcode_atts(array(
     "page" => '3046' // Value for Course Descriptions page
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


add_shortcode('naada_student_assess_fr','naada_assessment_fr');
function naada_assessment_fr (){
    global $wpdb;
     $this_page = $_SERVER['REQUEST_URI'];
     if (isset($_POST['page'])) $page = $_POST['page'];

    //  if ( $page == NULL ) {
     if ( !isset($page) ) {
        echo '<div class ="assessment">
        <form method="post" action="' . $this_page .'">

        <p>Naada Yoga offre une grande variété de cours complémentaires afin de mieux accompagner une pratique de yoga saine et équilibrée. Apprenez quels cours nous vous recommandons en répondant à notre évaluation en ligne.</p>

        <!-- first question -->
        <div class="naada-question">
        <h4>Comment décririez-vous votre niveau d\'expérience de yoga?</h4>
        <input type="radio" name="experience" value="1">Complètement novice<br>
        <input type="radio" name="experience" value="2">Moins d\'un an d\'expérience<br>
        <input type="radio" name="experience" value="3">1 à 3 ans de pratique<br>
        <input type="radio" name="experience" value="4">Plus de 3 ans de pratique
        </div>

        <!-- second Question -->
        <div class="naada-question">
        <h4>Quelles sont vos raisons d\'avoir choisi de pratiquer chez Naada Yoga?</h4>
        <input type="radio" name="reason" value="1">Relaxation, réduction de stress, traiter une blessure, douleur chronique ou condition médicale<br>
        <input type="radio" name="reason" value="2">Apprendre les principes fondamentaux d\'une pratique physique<br>
        <input type="radio" name="reason" value="3">Développer de la force, le cardio, perdre du poids<br>
        <input type="radio" name="reason" value="4">Approfondir mon expérience de méditation, pranayama et asana
        </div>

        <!-- Third Question -->
        <div class="naada-question">
        <h4>Comment décririez-vous votre état de santé global? </h4>
        <input type="radio" name="health" value="1">Mauvais<br>
        <input type="radio" name="health" value="2">Variable<br>
        <input type="radio" name="health" value="3">Moyen<br>
        <input type="radio" name="health" value="4">Bon
        </div>

        <!-- Fourth Question -->
        <div class="naada-question">
        <h4>Quel est votre niveau d\'énergie en général?</h4>
        <input type="radio" name="energy" value="1">Mauvais<br>
        <input type="radio" name="energy" value="2">Variable<br>
        <input type="radio" name="energy" value="3">Moyen<br>
        <input type="radio" name="energy" value="4">Bon
        </div>


        <!-- Fifth Question -->
        <div class="naada-question">
        <h4>Que faites-vous comme exercice?</h4>
        <input type="radio" name="exercise" value="1">Aucune forme d\'exercice ou l\'exercice cause de la douleur<br>
        <input type="radio" name="exercise" value="2">Exercice calme tel que la marche ou la natation<br>
        <input type="radio" name="exercise" value="3">Exercice occasionnel, mais avec intensité (course, vélo)<br>
        <input type="radio" name="exercise" value="4">Exercice constant
        </div>


        <!-- Sixth Question -->
        <div class="naada-question">
        <h4>Comment décririez-vous votre clarté mentale? </h4>
        <input type="radio" name="mental" value="1">Mauvaise<br>
        <input type="radio" name="mental" value="2">Variable<br>
        <input type="radio" name="mental" value="3">Moyen<br>
        <input type="radio" name="mental" value="4">Bon
        </div>


        <!-- Seventh Question -->
        <div class="naada-question">
        <h4>Comment décririez-vous la qualité de votre sommeil?</h4>
        <input type="radio" name="sleep" value="1">Intermittente et perturbée<br>
        <input type="radio" name="sleep" value="2">Légère et au réveil facile<br>
        <input type="radio" name="sleep" value="3">Sommeil tranquille avec peu de perturbations<br>
        <input type="radio" name="sleep" value="4">Sommeil profond sans interruptions
        </div>

        <!-- Eighth Question -->
        <div class="naada-question">
        <h4>Êtes-vous enceinte?</h4>
        <input type="radio" name="pregnant" value="0">Oui<br>
        <input type="radio" name="pregnant" value="0">Non
        </div>


        <!-- Ninth question -->
        <div class="naada-question">
        <h4>Si vous avez répondu OUI à la question précédente, quelle est la fréquence de votre pratique de yoga? (optionnel)</h4>
        <input type="radio" name="oftenmom" value="1">Sporadique<br>
        <input type="radio" name="oftenmom" value="2">1 à 2 fois par semaine<br>
        <input type="radio" name="oftenmom" value="3">3 fois par semaine ou plus
        </div>

        <!-- Tenth Question -->
        <div class="naada-question">
        <h4>Pratiquez-vous des inversions?</h4>
        <input type="radio" name="inversions" value="3">Oui<br>
        <input type="radio" name="inversions" value="0">Non
        </div>


        <!-- Eleventh Question -->
        <div class="naada-question">
        <h4>Si vous avez répondu NON à la question précédente, êtes-vous intéressé à pratiquer des inversions?</h4>
        <input type="radio" name="learninversions" value="3">Oui<br>
        <input type="radio" name="learninversions" value="1">Non
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
        echo '<h3>Merci!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Thérapeutique. </strong>';

        echo '<div class="theraRec">' . $recClasses . '</div>';

      }

      elseif ($total > 12 && $total <= 15) {
        // Show the first thing
        echo '<h3>Thank you!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Débutant ou Thérapeutique. </strong>';

        echo '<div class="begtheraRec">' . $recClasses . '</div>';

      }

       elseif ($total > 15 && $total <= 19) {
        // Show the first thing
        echo '<h3>Thank you!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Débutant. </strong>';

        echo '<div class="begRec">' . $recClasses . '</div>';

      }

      elseif ($total > 19 && $total <= 22) {
        // Show the first thing
        echo '<h3>Thank you!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Débutant ou Intermédiaire. </strong>';

        echo '<div class="beginterRec">' . $recClasses . '</div>';

      }

      elseif ($total > 22 && $total <= 26) {
        // Show thing two
        echo '<h3>Merci!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Intermédiaire. </strong>';

        echo '<div class="interRec">' . $recClasses . '</div>';
      }

      elseif ($total > 26 && $total <= 30) {
        // Show thing two
        echo '<h3>Merci!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Intermédiaire ou avancée. </strong>';

        echo '<div class="interadvRec">' . $recClasses . '</div>';
      }

      else {
        // Show thing three
        echo '<h3>Merci!</h3>
              <strong>À partir de vos résultats, nous aimerions vous recommander d\'essayer notre classes Avancé.</strong>';

         echo '<div class="advRec">' . $recClasses . '</div>';
      }

      echo '<div class="getStarted"><p>Afin de parvenir aux bienfaits complets du yoga, nous recommandons que vous envisagiez une pratique hebdomadaire de 3 cours. Si Naada Yoga vous est complètement nouveau, <strong>notre spécial d\'introduction de 3 mois illimité pour 150$</strong> serait un excellent début. Vous pourrez choisir vos cours recommandés du moment que vous êtes inscrit(e). Nous avons hâte de vous accompagner dans le développement de votre pratique saine et habituelle.</p>
      <p><a class="button" href="http://clients.mindbodyonline.com/ws.asp?studioid=6387&stype=41&prodid=155"><span>COMMENCEZ DÈS MAINTENANT</span></a></p>
      <p>Cette évaluation d\'élève est conçue pour vous aider à profiter au maximum de votre pratique avec nous en vous guidant vers les cours de groupe appropriés. Si vous aimeriez une éducation plus personnalisée dans le cadre d\'un programme fait sur mesure, nous vous suggérons de contacter le studio au 514-510-3274 et de prendre rendez-vous pour une consultation privée avec un de nos professeurs.</p></div>';

    } //End Page 2 of Form
 };// End FUnction

?>
