<?php
/**
 * Template Name: Template - Sponsor Runner Page
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
                    <div class="control-label col-sm-5" for="email"> <img class="pr-10" src="<?php echo get_template_directory_uri(); ?>/images/form-icon.png" alt=""> Choose a runner:</div>
                    <div class="col-sm-6">
                      <select id="" name="" class="form-control">
                        <option value="yeal">John Doe (RBS)</option>
                        <option value="yeal">Mark Doe</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="control-label col-sm-12"><img class="pr-10" src="<?php echo get_template_directory_uri(); ?>/images/form-icon.png" alt=""> I WANT TO DONATE $ <input type="text" style="border-width: medium medium 1px; border-style: none none solid; border-image: none; width: 116px;     border-color: #444;"> TO THE ALEH MARATHON.
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5 text-right">
                    	<div class="" for="MARATHON"> Choose MARATHON</div>
                    </div>
                    <div class="col-sm-6">          
                      <select id="" name="" class="form-control">
                        <option value="yeal">JERUSLEM </option>
                        <option value="yeal">JERUSLEM </option>
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
                  <div class="form-group">
                    <div class="control-label col-sm-12 text-left" for="MARATHON"><img class="pr-10" src="<?php echo get_template_directory_uri(); ?>/images/form-icon.png" alt=""> Please send me information about ALEH.</div>
                  </div>
                   <div class="form-group">
                    <div class="control-label col-sm-12 text-left" for="MARATHON"><img class="pr-10" src="<?php echo get_template_directory_uri(); ?>/images/form-icon.png" alt=""> Please do not send me future emails.</div>
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
                <article class="post media-post clearfix pl-15 pr-15 pb-15">
                  <a href="#" class="post-thumb mr-15"><img width="" alt="" src="<?php echo get_template_directory_uri(); ?>/images/post-thumb-img.jpg"></a>
                  <div class="pull-right">
                    <h5 class="post-title"><a href="#">John Doe. (RBS)</a></h5>
                  </div>
                </article>
                <article class="post media-post clearfix pl-15 pr-15 pb-15">
                  <a href="#" class="post-thumb mr-15"><img width="" alt="" src="<?php echo get_template_directory_uri(); ?>/images/post-thumb-img.jpg"></a>
                  <div class="pull-right">
                    <h5 class="post-title"><a href="#">Mark Doe. (RBS)</a></h5>
                  </div>
                </article>
                <article class="post media-post clearfix pl-15 pr-15 pb-15">
                  <a href="#" class="post-thumb mr-15"><img width="" alt="" src="<?php echo get_template_directory_uri(); ?>/images/post-thumb-img.jpg"></a>
                  <div class="pull-right">
                    <h5 class="post-title"><a href="#">Mark Doe. (RBS)</a></h5>
                  </div>
                </article>
                <article class="post media-post clearfix pl-15 pr-15 pb-15">
                  <a href="#" class="post-thumb mr-15"><img width="" alt="" src="<?php echo get_template_directory_uri(); ?>/images/post-thumb-img.jpg"></a>
                  <div class="pull-right">
                    <h5 class="post-title"><a href="#">Mark Doe. (RBS)</a></h5>
                  </div>
                </article>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php
get_footer();
