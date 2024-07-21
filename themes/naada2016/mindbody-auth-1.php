<?php /*
Template Name: Mindbody Auth 1
*/ ?>

<?php

// Membership ID's
// Staff Membership = 31
// Monthly Active = 3

function my_custom_stuff(){
//

  // calling single client based on email
  $apiUrl = 'https://api.mindbodyonline.com/public/v6/client/clients?SearchText=' . $_POST['email'];

  $args = array(
    'headers' => array(
      'Content-Type' => 'application/json',
      'SiteId' => '6387',
      'Api-Key' => '7bba39594b4d460293abdfd64c8eea48',
      'Authorization' => $_POST['access_token']
    )
  );

  $request = wp_remote_get($apiUrl, $args);
  $responseCode = wp_remote_retrieve_response_code( $request );
  $body = wp_remote_retrieve_body($request);

  if ( is_wp_error( $request ) ) {
    return false; // Bail Early
  }

  $pretty = json_decode( $body );?>

  <script type="text/javascript">
    // pass MBO array to a JavaScript variable
    var response = <?php echo $body; ?>;
	var responseCode = <?php echo $responseCode; ?>;
	console.log("ResponseCode is", responseCode);
    console.log(response);

    jQuery( document ).ready(function( $ ) {

      var client = response.Clients;
      var msgText = document.getElementById('clientMsg');
      var msgMsg = document.getElementById('clientMsgContent');
      var idPackage = document.getElementById('mbo_client_id');

      // Check to see if response returned client
      if ( client.length > 0 ) {
        console.log('We\'ve got a client!');
        msgText.textContent = "Hi " + client[0].FirstName;
        // Set name to localstorage for call on 2nd auth page
        localStorage.setItem('clientName', client[0].FirstName);
        msgMsg.textContent = 'We are checking on the status of your MindBody membership.';
        idPackage.value = client[0].Id;


        window.setTimeout(function(){
           // Load the second phase auth with ID parameter for user in the MBO API call
           document.forms['hiddenMBO'].submit();

         }, 3000);

      }
      else {
        msgText.textContent = "We're sorry, we cannot find a Mindbody user account with that email.";
        msgMsg.textContent = 'If you believe this is in error, contact info@naada.ca for help.';
        $('img.loader').hide();
      }

    });

  </script>

<h4>Mindbody Authentication</h4>
 <?php
// if ( $responseCode = 200) {
//     echo $responseCode . ' We\'ve got the array successfully';
//   }
//   elseif ( $responseCode > 399 ) {
//     echo $responseCode . ' <span style="color: red;">Houston, there\'s been a problem</span>';
//   }

  ?>

  <div class="responseWrap">
    <h3 id="clientMsg"></h3>
    <p id="clientMsgContent"></p>
    <img class="loader" src="<?php echo get_stylesheet_directory_uri();?>/images/loading.svg"/>
    <a class="mbo" href="https://company.mindbodyonline.com"><img src="<?php echo get_stylesheet_directory_uri();?>/images/MB-powered-by-logo-primary-radiance-@2x.png" alt="Powered by Mindbody"/></a>

  </div>

  <form name="mbologinform" id="hiddenMBO" action="<?php echo site_url(); ?>/mindbody-auth-2" method="post">

    <input type="text" name="client_id" id="mbo_client_id" class="input" value="" size="20" autocomplete="off">
    <input type="hidden" name="access_token" id="mbo_token" class="input" value="<?php echo $_POST['access_token']; ?>" size="20" autocomplete="off">
    <input type="submit" name="btnsubmit" id="btnsubmit" class="button button-primary" value="Log In">

  </form>

  <?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'my_custom_stuff');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
