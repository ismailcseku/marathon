<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->


<!-- Stylesheet -->
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- CSS | Theme css -->
<link href="c<?php echo get_template_directory_uri(); ?>/ss/theme-css/css-construction.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo get_template_directory_uri(); ?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet" type="text/css">



	<?php wp_head(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script> 
<!-- JS | Necessary jQuery Collection for this theme --> 
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-plugin-collection.js"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.countdown.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.equalheights.min.js?v=3"></script>
</head>

<body <?php body_class(); ?>>

<div id="wrapper"> 
  <!-- preloader -->
  <div id="preloader" class="hidden">
    <div id="spinner"></div>
  </div>
  <?php 
		$header_fixed_top = get_post_meta( $posts[0]->ID, 'header_fixed_top', true );
		if(is_single()) {
			$header_fixed_top = "not-fixed-top";
		}
	?>
 <!-- Header -->
  <header class="header fixed-top <?php echo $header_fixed_top; ?>">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-3 col-md-offset-6">
            <div class="header-widget">
            </div>
          </div>
          <div class="col-md-3">
            <div class="top-accout text-right">
             <ul class="list-inline mr-30">
              <?php
              	if ( is_user_logged_in() ) {
			  ?>
              <li><a href="<?php echo esc_url( home_url( '/profile' ) ); ?>">Profile</a></li>
              <li><a href="<?php echo wp_logout_url( home_url( '/login' ) ); ?>">Logout</a></li>
              <?php
				} else {
			  ?>
              <li><a href="<?php echo esc_url( home_url( '/login' ) ); ?>">Login</a></li>
              <li><a href="<?php echo esc_url( home_url( '/register' ) ); ?>">Sign Up</a></li>
              <?php
				}
			  ?>
              <li><a href="<?php echo esc_url( home_url( '/contact-israel' ) ); ?>"><img style="width:25px;" src="http://runforaleh.org/wp-content/uploads/2015/10/Israel_flag_300.png" alt=""></a></li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <!-- logo --> 
                <a id="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><img  src="<?php echo get_template_directory_uri(); ?>/images/logo6.png" alt=""></a> </div>
              <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" role="menu" style="height: 1px;">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id'  => '', 'container' => '', 'container_class'   => '','menu_class' => 'nav navbar-nav pull-right', 'menu_id' => 'primary-menu', 'walker'  => new ismail_walker_nav_menu() ) ); ?>
              </div>
              <!--/.nav-collapse --></div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  
  <!-- Start main-content -->
  <div class="main-content">
  
  
    
    <?php if( is_front_page() ):?>
    <!-- Section: home -->
    <section class="divider home-layer-overlay"style="<?php if(isset($ism_background_image_max_height)) echo "max-height: $ism_background_image_max_height;" ?>" id="home">
      <div class="maximage-slider">
        <div id="maximage"> 
              	<?php 
									$ism_photo_gallery = get_field('ism_home_gallery');
									if( $ism_photo_gallery ): 
									foreach( $ism_photo_gallery as $each_photo ): 
								?>
        	<img src="<?php echo $each_photo['url']; ?>" alt=""/>
								<?php endforeach; endif; ?>
        </div>
        <div class="fullscreen-controls"> <a class="img-prev"><i class="pe-7s-angle-left"></i></a> <a class="img-next"><i class="pe-7s-angle-right"></i></a> </div>
      </div>
    	<?php echo $ism_header_image_background_section = get_post_meta( $posts[0]->ID, 'ism_header_image_background_section', true ); ?>
    </section>
    <?php else: ?>
    
      <?php 
        $ism_show_backgoround_image = get_post_meta( $posts[0]->ID, 'ism_show_backgoround_image', true );
        $ism_header_height = get_post_meta( $posts[0]->ID, 'ism_header_height', true );
				if($ism_header_height=='') $ism_header_height = 550;
        $ism_layer_overlay = get_post_meta( $posts[0]->ID, 'ism_layer_overlay', true );
				if($ism_layer_overlay=='Yes') $ism_layer_overlay = '2 layer-overlay '; else $ism_layer_overlay ='-';
        if( $ism_show_backgoround_image != 'No' ):
      ?>
      <!-- Section: home -->
      <section class="divider home-layer-overlay<?php echo $ism_layer_overlay;?>" data-bg-img="<?php echo the_field('ism_header_background_image') ?>" style="<?php if(isset($ism_background_image_max_height)) echo "max-height: $ism_header_height; px" ?>" id="home">
        <?php echo $ism_header_image_background_section = get_post_meta( $posts[0]->ID, 'ism_header_image_background_section', true ); ?>
      </section>
      <style>
      	#home {
					height: <?php  echo $ism_header_height?>px !important;
				}
      </style>
      <?php endif; ?>
    <?php endif; ?>