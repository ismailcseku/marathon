<?php
/**
 * Template Name: Template - Runner Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>

<?php 
	$user_id = $_REQUEST['r'];
	$user_info = get_userdata($user_id);
	$username = $user_info->user_login;
	$first_name = $user_info->first_name;
	$last_name = $user_info->last_name;
	$user_description = $user_info->user_description;
	$runner_profile_photo = get_user_meta($user_id, 'runner_profile_photo', true);
	if($runner_profile_photo=="") {
		$runner_profile_photo = get_template_directory_uri()."/images/no-photo.jpg";
	}
	$runner_funding_goal = get_user_meta($user_id, 'runner_funding_goal', true);
	if( $runner_funding_goal=='' || $runner_funding_goal<0 ) {
		$runner_pledged = 0;
	}
	$runner_pledged = get_user_meta($user_id, 'runner_pledged', true);
	if( $runner_pledged=='' || $runner_pledged<0 ) {
		$runner_pledged = 0;
	}

	
$donation_history = get_field('donation_history',"user_".$user_id );


get_header();
?>

<section id="home" style="height: 390px;" data-bg-img="http://runforaleh.org/wp-content/uploads/2015/09/our-runners.jpg" class="divider home-layer-overlay2 layer-overlay2">
  <div class="reg-setion no-bg">
    <div class="container pt-0 pb-0 text-center">
      <div class="row">
        <div class="col-md-12">
            <h1 class="heading text-uppercase text-white font-nexaregular font-60"><?php echo $first_name;?>’S PAGE</h1>
       </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container pt-30">
    <div class="section-content">
      <div class="row">
        <div class="col-md-4 pl-30 pr-30">
          <div class="runner-thumb"> <img class="img-responsive" src="<?php echo $runner_profile_photo?>" alt=""> </div>
          <div class="image-carousel owl-theme mt-10 mb-15 image-carousel-<?php echo$user_id?>">
            <?php 
				$images = get_field('runner_page_photo_gallery');
				if( $images ): ?>
            <?php foreach( $images as $image ): ?>
            <div class="item"> <a data-lightbox="featured-projects" href="<?php echo $image['sizes']['large']; ?>"><img src="<?php echo $image['sizes']['thumbnail']; ?>" alt=""></a> </div>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
          
          
          <div class="mt-10 mb-15 hidden judith-page-carousel-<?php echo$user_id?>">
            <div class="item"> <a data-lightbox="featured-projects" href="http://runforaleh.org/wp-content/uploads/2016/01/Judith2.jpg"><img src="http://runforaleh.org/wp-content/uploads/2016/01/Judith2.jpg" alt=""></a> </div>
          </div>
          
          
          <a target="_blank" href="http://aleh.org/" class="learn-more btn">Learn more about Aleh</a>
          

<h3>Donation History:</h3>
<marquee width="100%" height="60" style="DIRECTION: ltr" scrolldelay="100" scrollamount="1" onmouseover="this.scrollAmount=0;" onmouseout="this.scrollAmount=1;" direction="up" dir="ltr">   
<?php
if($donation_history)
{
	echo '<ul>';

	foreach($donation_history as $each_history)
	{
		echo '<li>'.$each_history['donation_history_donated_by'].' '.$each_history['donation_history_donated_currency'].' '.$each_history['donation_history_donated_amount_in_currency'].'</li>';
	}

	echo '</ul>';
}
?>
</marquee>
    
        </div>
        <div class="col-md-5">
          <div class="font-28 pull-left" data-text-color="#176e35">RUNNER: <span class="font-28" style="color: #0d0d0d;"><?php echo $first_name.' '.$last_name;?></span></div>
          <div class="clearfix"></div>
          <div class="runner-details">
            <p><span class="font-nexa_xbold font-16" data-text-color="#269e29">Runner’s Bio : </span> <?php echo $user_description;?></p>
          </div>
          <div class="progress-item mt-50">
            <div class="progress">
              <div class="progress-bar" data-goal="<?php echo $runner_funding_goal?>" data-raised="<?php echo $runner_pledged?>"> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mt-170">
              <form id="want_to_sponsor" action="" method="POST" name="DonationForm">
                <div class="form-group hidden">
                  <label for="exampleInputEmail1">What my friends have to say: </label>
                  <br>
                  <textarea class="form-control" name="what_friends_haveto_say" id="what_friends_haveto_say" cols="30" rows="5"><?php echo $what_friends_haveto_say?></textarea>
                </div>
              </form>
              <div class="mb-10" style="margin-top: 10px;">
                <a href="<?php echo esc_url( home_url('/sponsor-me/?r='.$user_id) ); ?>" style="background: transparent none repeat scroll 0% 0%; border: medium none;">
                <img width="290" src="<?php echo get_template_directory_uri(); ?>/images/btn-sponsor-me.jpg" alt="">
                </a>
              </div>
              <h4 class="font-18 font-nexa_bold mt-20">Help me out by sharing on social media</h4>
              <div class="row mt-20">
                <div class="col-sm-12">
                  <div id="fb-root"></div>
                  <script>(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=409125935834772";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
                  <div class="fb-like" data-href="<?php echo esc_url( home_url('/sponsor-me/?r='.$user_id) ); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sidebar runner-page">
            <?php 
							global $wp_query;
							// populate $post with the stub post
							$_linked_fakepost_id = get_user_meta($user_id, '_linked_fakepost_id',true);
							$args = array(
								'post_type'=> 'fake-post',
								'p'    => $_linked_fakepost_id
							);
							query_posts( $args );
							the_post();
							//fool wordpress to think we are on a single post page
							$wp_query->is_single = true;
							//get comments
							$args = array();
							comments_template($args, $_linked_fakepost_id);
							//reset wordpress to ture post
							$wp_query->is_single = false;
						?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.fb_iframe_widget IFRAME
{
transform: scale(1.5);
-ms-transform: scale(1.5);
-webkit-transform: scale(1.5);
-o-transform: scale(1.5);
-moz-transform: scale(1.5);
transform-origin: bottom left;
-ms-transform-origin: bottom left;
-webkit-transform-origin: bottom left;
-moz-transform-origin: bottom left;
-webkit-transform-origin: bottom left;
}
.comment-respond {
	display: none;
}
.no-comments {
	display: none;
}
.image-carousel-65 {
	display: none !important;
}
.judith-page-carousel-65 {
	display: block !important;
	visibility: visible !important;
}
</style>



<?php
get_footer();
