<?php
/**
 * Template Name: Template - Activate
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section>
  <div class="container pt-70">
    <div class="section-content">
      <div class="row">
      	<div class="col-md-10 col-md-offset-1 text-center">
					<?php
            $user_id = $_REQUEST['user'];
            $activatekey = $_REQUEST['activatekey'];
            $stored_key = get_user_meta( $user_id, 'has_to_be_activated', true );
						if($activatekey == $stored_key){
							update_user_meta( $user_id, 'ja_disable_user', 0 );
							$code = sha1( $user_id . time() );
							update_user_meta( $user_id, 'has_to_be_activated', $code );
							echo '<p style="color: #CC5500; font-weight: bold;">Congratulation! your account has been activated successfully. You can now login from <a href="'.home_url('/login/').'">here</a></p>' ;
						} else {
							echo '<p style="color: #CC5500; font-weight: bold;">Sorry, invalid activation key.</p>';
						}
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();


