<?php
/**
 * Template Name: Template - playlist
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="main-content">
  <section class="devider clearfix" hidden data-bg-color="#259e29">
    <div class="container pt-20 pb-20">
      <div class="row">
        <h1  class="text-uppercase font-20 text-center text-white m-0 font-nexa_bold">Nothing beats running with music that motivates you<br>
          and gets you in the running tempo!<?php echo $first_name;?></h1>
      </div>
    </div>
  </section>
  <section>
    <div class="container pt-30 pb-0">
      <div class="section-content">
        <div class="row">
          <div class="col-sm-3">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation" class="active"><a data-bg-color="#90c146" class="text-center text-uppercase font-20" href="#" >Playlist</a></li>
            </ul>
            <ul class="list-group">
 						<?php
							$args = array(
								'orderby'   => 'date',
        				'order' => 'DESC',
								'posts_per_page' => 20,
								'post_type' => 'track',
								'tax_query' => array(
									array(
										'taxonomy' => 'dt_playlist',
										'field'    => 'slug',
										'terms'    => 'uploaded-by-runners',
									)
								)
							);
							$the_query = new WP_Query( $args );
						?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li class="list-group-item"><?php echo do_shortcode('[fap_track id="'.get_the_ID().'" layout="simple" enqueue="no" auto_enqueue="no"]');?></li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <li class="list-group-item">
              <?php _e( '' ); ?>
            </li>
            <?php endif; ?>
            </ul>
            <ul class="">
              <li role="" class="text-center"><a  class=" text-uppercase font-14 " href="#" >TOP SONGS</a></li>
              <li role="" class="text-center"><a  class="text-uppercase font-14" href="#" >SONG OF THE DAY</a></li>
            </ul>
          </div>
          <div class="col-sm-9 clearfix">
            <?php
							$args = array(
								'post_type' => 'track',
								'tax_query' => array(
									array(
										'taxonomy' => 'dt_playlist',
										'field'    => 'slug',
										'terms'    => 'admin-playlist',
									)
								)
							);
							$the_query = new WP_Query( $args );
						?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-xs-12 col-sm-6 col-md-4 mb-20 p-10"> <?php echo do_shortcode('[fap_track id="'.get_the_ID().'" layout="interactive-image" enqueue="no" auto_enqueue="no"]');?> </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <p>
              <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="col-sm-12  p-60">
            <div class="row equal-height">
              <div class="col-md-6 p-30 mb-30 text-center" data-bg-color="#EBEBEB">
                <h3 class="mb-20" style="color: #1c1c1c;">You can download a <br>
                  great playlist here:</h3>
                <p class="p-10" data-bg-color="#D7EFB3"><span class="font-15" style="color: #269e29;"><?php echo get_post_meta( $posts[0]->ID, 'video_download_url', true );?></span></p>
                <a target="_blank" href="<?php echo get_post_meta( $posts[0]->ID, 'video_download_url', true );?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/btn-download.png" alt=""> </a> </div>
              <div class="col-md-6 text-center">
                <div class="p-30" data-bg-color="#EBEBEB">
                  <h3 class="mb-20" style="color: #1c1c1c;">Know a great song? <br>
                    Want to share it? Add it here:</h3>
                  <a href="<?php echo esc_url( home_url('/upload-song/') ); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/btn-download-up.png" alt=""> </a>
                  <h2 class="font-28" style="color: #b98f04;">Thanks for sharing!</h2>
                </div>
              </div>
            </div>
            <h2 class="text-center font-36" style="color: #269e29">
            Happy Running!
            </h3>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- end main-content -->

<style>
.nav-pills > li > a {
	border-radius: 0;
}
.list-group-item {
  background-color: #eaeaea;
    padding-left: 30px;	
}
.list-group-item a {
  color: #1b1d25;
}
#fap-wrapper {
	display: none;
}
</style>
<?php
get_footer();


