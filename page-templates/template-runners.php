<?php
/**
 * Template Name: Template - Runners
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section data-bg-color="#e8eae8">
  <div class="container">
    <div class="section-content">
      <div class="row">
      
      
<?php
	$runners = get_users();
	// Array of stdClass objects.
	foreach ( $runners as $user ) {
		$user_id = $user->ID;
		$allowed_to_get_fund = get_user_meta($user_id, 'allowed_to_get_fund', true);
		if( $allowed_to_get_fund != true ) {
			continue;
		}
		$runner_funding_goal = get_user_meta($user_id, 'runner_funding_goal', true);
		if($runner_funding_goal=="") {
			$runner_funding_goal = 0;
		}
		$runner_profile_photo = get_user_meta($user_id, 'runner_profile_photo', true);
		if($runner_profile_photo=="") {
			$runner_profile_photo = get_template_directory_uri()."/images/no-photo.jpg";
		}
?>

        <div class="col-xs-12 col-sm-6 col-md-4 mb-10">
          <div class="row equal-height mr-0">
            <div class="col-xs-6 p-0">
              <div class="visit-details text-center">
                <h3 class="text-white"><?php  echo esc_html( $user->display_name ); ?></h3>
                <div class="">
                  <a data-bg-color="#1f9b22" class="btn font-13 text-white" href="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>">Visit My Page</a>
                </div>
                <div class="price">
                  My goal: $<?php  echo number_format($runner_funding_goal); ?>
                </div>
              </div>
            </div>
            <div class="col-xs-6 p-0 runner-bg-img" style="background:url('<?php echo $runner_profile_photo?>') center;">
              <div class="visit-thumb">
              </div>
            </div>
          </div>
        </div>
<?php } ?>

            
        
      </div>
    </div>
  </div>
</section>
<style>
.visit-details, .btn-visit a {
  color: #FFF;
}
.visit-details {
  background: #2a2a2a;
  padding: 27px 10px;
	height: 100%;
}
.btn-visit a {
  padding: 8px 15px;
  background: #1f9b22;
  display: inline-block;
}
.visit-details .price {
  margin: 10px 0;
}
.visit-details h3, .visit-details .price {
  font-size: 18px;
}
.btn-visit a {
  font-size: 13px;
}
.btn-visit {
  margin: 20px 0;
}
</style>
<?php
get_footer();


