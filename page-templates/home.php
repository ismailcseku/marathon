<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    
    <!-- Divider: -->
    <section class="divider parallax countdown-box" data-bg-color="#1f9b22">
      <div class="container pt-40 pb-40">
        <div class="row">
          <div class="icon-box left media"> 
            <a class="media-left pull-left" href="#">
              <img height="180" src="<?php echo get_template_directory_uri(); ?>/images/watch-icon.png" alt="">
            </a>
              <div class="media-body">
                <h1 class="media-heading heading text-uppercase">Berlin marathon </h1>
                <h3 id="clock" class=""></h3>
                <h4 class="">Total Amount Donated Towards Berlin Marathon: <?php ism_total_amount_donated_towards_jerusalem('Berlin Marathon');?></h4>
              </div>
            </div>
        </div>
      </div>
    </section>
    
    <!-- Divider: -->
    <section class="divider parallax countdown-box" data-bg-color="#eee">
      <div class="container pt-40 pb-40">
        <div class="row">
          <div class="col-md-12 text-center"> 
                <p class="">Jerusalem Marathon runners: with nearly $30,000 raised in your honor, together with the children and families of ALEH, we all thank you the runners for making it happen!!! Hope you had an amazing time, and stay tuned for our spots in International marathons over the next several months!!</p>

<p class="">* Up next: Berlin Marathon, Sunday, September 25th ; contact us asap for one of the last available spots!</p>
          </div>
        </div>
      </div>
    </section>

    <section class="choose-run">
      <div class="container pt-0 pb-0">
         <div class="section-title wow fadeInRight" data-wow-delay=".5s" data-wow-duration="1s">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Choose Your Run</h2>
            </div>
          </div>
        </div>
        <div class="section-container">
          <div class="row project">
            <div class="col-md-6 project-1">
		<a href="<?php echo esc_url( home_url( '/register-jerusalem' ) ); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/1.png" alt="">
              <div class="city-name">Jerusalem</div>
              <div class="sm-date" style="bottom: 6px;">Stay tuned for 2017 date</div>
		</a>
            </div>
            <div class="col-md-6">
              <div class="row">

                <div class="col-xs-6 col-md-6 project-2">
    <a href="<?php echo esc_url( home_url( '/register-berlin' ) ); ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/4.png" alt="">
                  <div class="sm-city-name">Berlin</div>
                  <div class="sm-date">9.25.16</div></a>
                </div>

                <div class="col-xs-6 col-md-6 project-3">
		  <a href="<?php echo esc_url( home_url( '/tiberias/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/3.png" alt="">
                    <div class="sm-city-name">Tiberias</div>
                    <div class="sm-date" style="font-size: 13px;">Stay tuned for 2017 date</div>
                  </a>
                </div>
                
                <div class="col-xs-6 col-md-6 project-4">
                  <a>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/2.png" alt="">
                    <div class="sm-city-name">Chicago</div>
                    <div class="sm-date"></div>
                  </a>
                </div>

                <div class="col-xs-6 col-md-6 project-5">
                  <a>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/5.png" alt="">
                    <div class="sm-city-name">New York</div>
                    <div class="sm-date"></div>
                    <div class="sm-date" style="font-size: 13px;">Stay tuned for 2017 date</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <div class="race-btn">
                  <div class="icon-box left media mb-0"> 
                    <span class="media-left pull-left" href="#">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/globe.png" alt="">
                    </span>
                    <div class="media-body">
                       <h3 class="mt-0 mb-0 text-white ml-20">Run Your Own Race for <br>ALEH Anywhere in the World</h3>
                    </div>
                 </div>
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="divider parallax" data-bg-color="#0251d4">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-6 col-md-3 pr-0 pb-15 pr-sm-15">
            <div class="post-area">
              <div class="post-thumb">
                <a href="<?php echo esc_url( home_url( '/watch-our-runners' ) ); ?>"><img class="thumb-pic" src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt=""></a>
                <div class="overlay">
                  <div class="details">
                     <a href="<?php echo esc_url( home_url( '/watch-our-runners' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/player-icon.png" alt="">
                    <h4 class="text-white">Video</h4></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3 pr-0 pb-15 pr-sm-15">
            <div class="post-area">
              <div class="post-thumb">
                <a href="<?php echo esc_url( home_url( '/playlists' ) ); ?>"><img class="thumb-pic" src="<?php echo get_template_directory_uri(); ?>/images/2.jpg" alt=""></a>
                <div class="overlay">
                  <div class="details">
                     <a href="<?php echo esc_url( home_url( '/playlists' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/music-icon.png" alt="">
                    <h4 class="text-white">Music</h4></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3 pr-0 pb-15 pr-sm-15">
            <div class="post-area">
              <div class="post-thumb">
                <a href="<?php echo esc_url( home_url( '/tips-from-our-coaches/' ) ); ?>"><img class="thumb-pic" src="<?php echo get_template_directory_uri(); ?>/images/3.jpg" alt=""></a>
                <div class="overlay">
                  <div class="details">
                    <a href="<?php echo esc_url( home_url( '/tips-from-our-coaches/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/madel-cion.png" alt="">
                    <h4 class="text-white">Coach Jason’s Tips</h4></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3 pr-0 pb-15 pr-sm-15">
            <div class="post-area">
              <div class="post-thumb">
                <a href="<?php echo esc_url( home_url( '/runners-blog/' ) ); ?>"><img class="thumb-pic" src="<?php echo get_template_directory_uri(); ?>/images/4.jpg" alt=""></a>
                <div class="overlay">
                  <div class="details">
                     <a href="<?php echo esc_url( home_url( '/runners-blog/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/shoes-icon.png" alt="">
                    <h4 class="text-white">My Running Thoughts</h4></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
get_footer();
