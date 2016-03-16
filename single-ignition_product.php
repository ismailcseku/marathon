<?php
/**
 * The Template for displaying all single projects.
 */
get_header(); ?>

	<?php while ( have_posts() ) : the_post(); 

		$project_id = get_post_meta( $post->ID, 'ign_project_id', true );
		$author = get_user_by( 'id', $post->post_author );
		$updates = html_entity_decode( stripslashes( apply_filters( 'idcf_updates_text', get_post_meta( $post->ID, 'ign_updates', true ) ) ) );
		$faqs = html_entity_decode( stripslashes( get_post_meta( $post->ID, 'ign_faqs', true ) ) );
		$video = get_post_meta( $post->ID, 'ign_product_video', true );
		$img_1 = has_post_thumbnail( $post->ID ) ? wp_get_attachment_url( get_post_thumbnail_id(), 'full' ) : get_post_meta( $post->ID, 'ign_product_image1', true );
		$gallery = array(
			$img_1,
			get_post_meta( $post->ID, 'ign_product_image2', true ),
			get_post_meta( $post->ID, 'ign_product_image3', true ),
			get_post_meta( $post->ID, 'ign_product_image4', true )
		);
		$project_long_desc = get_post_meta( $post->ID, 'ign_project_long_description', true );

		//$retina = krown_retina();

	?>

    <section class="devider" data-bg-color="#1f9b22">
      <div class="container pt-40 pb-40">
        <div class="row">
          <h1 class="text-uppercase font-48 text-center text-white m-0 font-nexa_bold">John Doe’S PAGE</h1>
        </div>
      </div>
    </section>
    <section class="devider" data-bg-color="#0055cc">
      <div class="container pt-20 pb-20">
        <div class="row">
          <h1 class="text-uppercase font-24 text-center text-white m-0 font-nexa_bold">Sponsor John Doe</h1>
        </div>
      </div>
    </section>
    
      <section>
        <div class="container pt-30">
          <div class="section-content">
            <div class="row">
              <div class="col-md-4">
                <div class="runner-thumb">
                  <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/runner.jpg" alt="">
                </div>
                <div class="image-carousel owl-theme mt-10 mb-15">
                  <div class="item"> <img src="<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg" alt=""> </div>
                  <div class="item"> <img src="<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg" alt=""> </div>
                  <div class="item"> <img src="<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg" alt=""> </div>
                  <div class="item"> <img src="<?php echo get_template_directory_uri(); ?>/images/slider-1.jpg" alt=""> </div>
                </div>
                
                <a href="" class="learn-more btn">Learn more about Aleh</a>
              </div>

              <div class="col-md-5">
                <div class="font-28 pull-left" data-text-color="#176e35">RUNNER:</div>
                <span class="#0d0d0d font-28">Yael Portal</span>
                <div class="runner-details">
                  <p><span class="font-nexa_xbold font-16" data-text-color="#269e29">Runner’s Bio : </span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
                </div>
                
              </div>
               <div class="col-md-3">
               <div class="sidebar">
                  <div class="sidebar-widget latest-posts">
                <h4 class="widget-title mt-0 text-uppercase text-white mb-20">Comments</h4>
                <article class="post media-post clearfix pl-15 pr-15 pb-15">
                  <div class="post-right">
                    <h5 class="post-title"><a href="#">Lorem Ipsum is simply dummy text of the printing.</a></h5>
                  </div>
                </article>
              </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-4">
                <h4 class="font-24 font-nexa_bold">Help me out!</h4>
                <div class="sponser-btn">
                  <a href="">sponsor me!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>		

	<?php endwhile; ?>

<?php get_footer(); ?>