<?php
  //Check that the user is logged in/ has been verified and has cookies set
  if ( isset( $_COOKIE['isAuthorized'] ) ){

    $current_user = $_COOKIE['clientName'];

		echo '<p>Welcome ' . $current_user . ' | <a class="mboLogOut" href="#">Logout</a></p>';

    ?>
    <script>
    jQuery( document ).ready(function( $ ) {
      $('a.mboLogOut').on('click', function(e){
        e.preventDefault();
        Cookies.remove('isAuthorized');
        Cookies.remove('clientName');
        location.reload();
      })
    });
    </script>

  <?php
  }
  else {
    // Post to API to Get Auth Token
  	$userTokenApi = 'https://api.mindbodyonline.com/public/v6/usertoken/issue';

  	$userData = json_encode( array(
      'Username' => '_NaadaYoga',
      //'Password' => '@8C@RmOwc&uxMSJ4'
	  'Password' => 'lL!Qj36IEyyi'
  	) );

  	$args = array(
  		'method'      => 'POST',
      'timeout'     => 45,
      'redirection' => 5,
      'httpversion' => '1.0',
      'blocking'    => true,
  		'headers' => array(
  			'Content-Type' => 'application/json',
  			'SiteId' => '6387',
  			'Api-Key' => '7bba39594b4d460293abdfd64c8eea48'
  		),
  		'body' => $userData,
  		'cookies'     => array()
  	);

  	$request = wp_remote_post($userTokenApi, $args);
  	$responseCode = wp_remote_retrieve_response_code( $request );
  	$body = wp_remote_retrieve_body($request);

  	if ( is_wp_error( $request ) ) {
  		return false; // Bail Early
  	}

  	$pretty = json_decode( $body ); ?>

  	<script type="text/javascript">
      // pass MBO array to a JavaScript variable
      var response = <?php echo $body; ?>; 
	  var userData = <?php echo $userData ?>;
	  var responseCode = <?php echo $responseCode ?>;

		console.log(responseCode);
  		// console.log("Response for access token", response);
  		var token = response.AccessToken;

      jQuery( document ).ready(function( $ ) {

        var tokenPackage = document.getElementById('mbo_token');

        //Check to see if response returned client
        if ( token && token.length > 0 ) {
           // Pass Token to Hidden form field
           tokenPackage.value = token;
        }
        else {
  				console.log('We\'re not getting a token!');
        }

      });

    </script>

    <h3 class="login-leadin">Login with your MindBody email to access Classes on Demand</h3>
    <form name="mbologinform" id="mbologin" action="<?php echo site_url(); ?>/mindbody-auth" method="post">

  			<p class="login-email">
  				<input type="text" name="email" id="mbo_email" class="input" value="" placeholder="Email" size="30" autocomplete="off">
  			</p>

        <input type="hidden" name="access_token" id="mbo_token" class="input" value="" size="20" autocomplete="off">

  			<p class="login-submit">
  				<input type="submit" name="submit" id="submit" class="button button-primary" value="Log In">
  			</p>
        <a href="https://company.mindbodyonline.com"><img src="<?php echo get_stylesheet_directory_uri();?>/images/MB-powered-by-logo-primary-radiance-@2x.png" alt="Powered by Mindbody"/></a>

  		</form>
      <?php
  }
  ?>
