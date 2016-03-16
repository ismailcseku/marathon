<?php
/**
 * Template Name: Template - Coach Tips
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section>
  <div class="container">
    <div class="section-content">
      <div class="">
        <div class="">
          <div class="row">
          
						<?php
							$args = array(
								'post_type' => 'post',
								'category_name' => 'coach-tips'
							);
							$the_query = new WP_Query( $args );
						?>
            
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="col-sm-4 col-md-4 mb-20 pl-10 pr-10">
				<article class="post clearfix">
                <h4 class="entry-title font-18"><a href="<?php echo esc_url( get_permalink() ); ?>"> <?php the_title(); ?></a></h4>
                <div class="entry-header">
                  <div class="post-thumb"><?php the_post_thumbnail('medium'); ?></div>
                </div>
                <div class="entry-content pt-10 pb-15 pl-15 pr-15"  data-bg-color="#e8eae8">
                  <p><?php the_content(); ?> <a class="read-more hidden" href="#">Read more >> </a></p>
                </div>
              </article>
			</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>     
          </div>
          <div class="row">
			<div class="col-md-12 mt-60 text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/happy-running.jpg" alt="">
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
	.entry-title {
		text-transform: uppercase;
		font-size: 24px;
		letter-spacing: 5px;
		font-family: 'nexa_boldregular';
		font-weight: normal;
	}
	.entry-title a,.read-more {
	    color: #176d34;
	}

</style>
<?php
get_footer();

