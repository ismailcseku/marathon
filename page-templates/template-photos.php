<?php
/**
 * Template Name: Template - Photo Gallery
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="main-content mt-30">
    <section>
      <div class="container pt-0 pb-0">
        <div class="section-content">
          <div class="row">
          	<div class="col-md-12">
              <!-- protfolio items -->
              <div class="megafolio-container" data-padding="15" data-layoutarray="[5,6]">
              
              	<?php 
									$ism_photo_gallery = get_field('ism_photo_gallery');
									if( $ism_photo_gallery ): 
									foreach( $ism_photo_gallery as $each_photo ): 
								?>
                          
                <div class="mega-entry cat-all cat-print" id="mega-entry-2" data-src="<?php echo $each_photo['url']; ?>" data-width="504" data-height="400">
                  <a data-lightbox="gallery" href="<?php echo $each_photo['url']; ?>">
                    <div class="mega-hover">
                      <div class="mega-hovertitle"><?php echo $each_photo['alt']; ?>
                      </div>
                    </div>
                  </a>
                </div>
                
                          
								<?php endforeach; endif; ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content --> 

<?php
get_footer();

