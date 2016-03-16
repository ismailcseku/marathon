<?php
/**
 * Template Name: Template - Sponsor Runner Form
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
              <div class="control-label col-sm-5" for="email"> Choose a runner:</div>
              <div class="col-sm-6">
                <select id="choose-runner" name="choose-runner" class="form-control">
                  <option value="">--Choose--</option>
									<?php
                    $runners = get_users();
                    // Array of stdClass objects.
                    foreach ( $runners as $user ) {
                      $user_id = $user->ID;
                  ?>
                                    <option value="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>"><?php  echo esc_html( $user->display_name ); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </form>
          <form class="form-horizontal text-uppercase" role="form">
            <div class="form-group">
              <div class="control-label col-sm-5"> </div>
              <div class="col-sm-6">
                Or
              </div>
            </div>
            <div class="form-group">
              <div class="control-label col-sm-5"> Search by name:</div>
              <div class="col-sm-6">
                <input value="<?php echo @$_REQUEST['runner_name']; ?>" type="text" class="form-control" name="runner_name" placeholder="Type name here">
              </div>
            </div>
            <div class="form-group">
              <div class="control-label col-sm-5"></div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-default text-white" data-bg-color="#1f9b22">Search</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <div class="sidebar">
            <div class="sidebar-widget latest-posts">
              <h4 class="widget-title mt-0 text-uppercase text-white mb-20">Our Runners</h4>
<?php
	if( isset( $_REQUEST['runner_name'] ) &&  $_REQUEST['runner_name'] != '' ) {
		$search_string = esc_attr( trim( $_REQUEST['runner_name'] ) );
		$users = new WP_User_Query( array(
				'search'         => '*'.esc_attr( $search_string ).'*',
				'meta_query' => array(
						'relation' => 'OR',
						array(
								'key'     => 'first_name',
								'value'   => $search_string,
								'compare' => 'LIKE'
						),
						array(
								'key'     => 'last_name',
								'value'   => $search_string,
								'compare' => 'LIKE'
						)
				)
		) );
		$runners = $users->get_results();
	} else {
		$runners = get_users();
	}
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

<script>
    jQuery(function(){
      // bind change event to select
      jQuery('#choose-runner').on('change', function () {
          var url = jQuery(this).val(); // get selected value
          if (url && url !='' ) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>

<?php
get_footer();

