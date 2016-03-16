<?php
/**
 * Template Name: Template - Blog
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section data-bg-color="#e8eae8">
  <div class="container">
    <div class="section-content">
      <div class="">
        <div class="">
          <div class="row">
          	<div class="masonry-items" data-maxitemwidth="390">
          
						<?php
							$args = array(
								'post_type' => 'post',
								'category_name' => 'blog'
							);
							$the_query = new WP_Query( $args );
						?>
            
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-xs-12 col-sm-6 col-md-4 masonry-item mb-20 pl-10 pr-10">
              <article class="post clearfix">
                <div class="entry-header">
                  <div class="post-thumb"><?php the_post_thumbnail('full'); ?></div>
                </div>
                <div class="entry-content p-15">
                  <div class="entry-date"><?php the_date(); ?></div>
                  <h4 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"> <?php the_title(); ?></a></h4>
                  <p class="mb-30"><?php the_excerpt(); ?> <a href="<?php echo esc_url( get_permalink() ); ?>">read more</a></p>
                </div>
              </article>
            </div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

            
          	</div>
          </div>
          <div class="row" data-bg-color="#91c146">
          	<div class="col-sm-6 col-sm-offset-3 p-30 hidden">
             	<h3 class="light text-white">Share your thoughts</h3>
              <form role="form" class="form-share-thoughts">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="f_name">Name: <span class="red-star">*</span></label>
                      <input type="text" value="" placeholder="Your Name Here" id="passport_or_israeli_id" name="passport_or_israeli_id" required="" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="f_name">Email: <span class="red-star">*</span></label>
                      <input type="text" value="" placeholder="Enter Your Email" id="passport_or_israeli_id" name="passport_or_israeli_id" required="" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="runner_description">Share your thoughts!</label>
                  <textarea rows="5" cols="20" id="runner_description" class="form-control" name="runner_description"></textarea>
                </div>
                <div class="form-group">
                  <button data-bg-color="#1f9b22" class="btn btn-default btn-lg btn-colored mt-sm-10" type="submit">Post</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.masonry-items  .entry-header img {
	width: 100%;
	height:auto;
}
.masonry-items article {
	background: #fff;
}
.isotope .isotope-item {
	min-width: 311px !important;
}
.form-share-thoughts .form-control  {
  background: transparent none repeat scroll 0 0;
  border: 1px solid #fff;
  border-radius: 0;
  color: #fff;
}
.form-share-thoughts .form-control::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #fff;
}
.form-share-thoughts .form-control:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    #fff;
   opacity:  1;
}
.form-share-thoughts .form-control::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    #fff;
   opacity:  1;
}
.form-share-thoughts .form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #fff;
}
</style>
<?php
get_footer();

