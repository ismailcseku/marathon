<?php
/**
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section>
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-md-7">
          <form class="form-horizontal text-uppercase" role="form">
            <div class="form-group">
              <div class="control-label col-sm-5" for="email"> Find a runner:</div>
              <div class="col-sm-6">
                <select id="choose-runner" name="choose-runner" class="form-control">
<?php
	$runners = get_users();
	// Array of stdClass objects.
	foreach ( $runners as $user ) {
		$user_id = $user->ID;
?>
                  <option value="<?php  echo $user_id; ?>"><?php  echo esc_html( $user->display_name ); ?></option>
<?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="control-label col-sm-5" for="email"> </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="runner_name" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> Choose MARATHON</div>
              </div>
              <div class="col-sm-6">
                <select id="" name="" class="form-control">
                  <option value="Berlin Marathon">Berlin Marathon</option>
                  <option value="Chicago Marathon">Chicago Marathon</option>
                  <option value="Jerusalem Marathon">Jerusalem Marathon</option>
                  <option value="NYC Marathon">NYC Marathon</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> AMOUNT :</div>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="amount" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> NAME :</div>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="name" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> EMAIL :</div>
              </div>
              <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> PHONE :</div>
              </div>
              <div class="col-sm-6">
                <input type="tel" class="form-control" id="tel" placeholder="">
              </div>
            </div>
            <div class="form-group text-left"><input type="radio" value="yes" name="sendme_information"> Please send me information about ALEH.
            </div>
            <div class="form-group text-left"><input type="radio" value="no" name="sendme_information"> Please do not send me future emails.
            </div>
            <div class="form-group">
              <div class="control-label col-sm-5 text-left text-capitalize" for="MARATHON">How did you hear about us?</div>
              <div class="col-sm-7">
                <textarea class="control-label" name="" id="" cols="31" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-default text-white" data-bg-color="#1f9b22">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <div class="sidebar">
            <div class="sidebar-widget latest-posts">
              <h4 class="widget-title mt-0 text-uppercase text-white mb-20">Our Runners</h4>
<?php
	$runners = get_users();
	// Array of stdClass objects.
	foreach ( $runners as $user ) {
		$user_id = $user->ID;
		$runner_funding_goal = get_user_meta($user_id, 'runner_funding_goal', true);
		if($runner_funding_goal=="") {
			$runner_funding_goal = 0;
		}
		$runner_profile_photo = get_user_meta($user_id, 'runner_profile_photo', true);
		if($runner_profile_photo=="") {
			$runner_profile_photo = get_template_directory_uri()."/images/no-photo.jpg";
		}
?>
              <article class="post media-post clearfix pl-15 pr-15 pb-15">
              	<a href="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>" class="post-thumb mr-15 pull-left">
                	<img width="70" alt="" src="<?php echo $runner_profile_photo?>">
                </a>
                <div class="pull-left">
                  <h5 class="post-title"><a class="text-black" href="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>"><?php  echo esc_html( $user->display_name ); ?></a></h5>
                </div>
              </article>
<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();

