<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
  
  /* REDUX OPTIONS FRAMEWORK
  ================================================== */ 
  define( 'MASCOT_TEMPLATE_DIR', get_template_directory() );
  define( 'MASCOT_TEMPLATE_URI', get_template_directory_uri() );
  define( 'MASCOT_FRAMEWORK_DIR', MASCOT_TEMPLATE_DIR );
  if ( ! class_exists( 'ReduxFramework' ) && file_exists( MASCOT_FRAMEWORK_DIR . '/redux-framework/ReduxCore/framework.php' ) ) {
	  require_once( MASCOT_FRAMEWORK_DIR . '/redux-framework/ReduxCore/framework.php' );
  }
  if ( file_exists( MASCOT_FRAMEWORK_DIR . '/redux-framework/config.php' ) ) {
	  require_once( MASCOT_FRAMEWORK_DIR . '/redux-framework/config.php' );
  }
 global $redux_demo; // This is your opt_name.
	
  vc_add_param( "vc_row", array(
	  "type" => "dropdown",
	  "heading" => __( "Container Width", "js_composer" ),
	  "param_name" => "container_width",
	  "value" => array(
		  "Fixed Width" => 'fixed',
		  "Full Width" => 'full',
	  ),
	  "description" => __( "Container Width", "js_composer" )
  ));
	
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$query_args = array(
			'family' => urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

// Ismail Runner Custom Post
 

class ismail_walker_nav_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth, $args ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu dropdown-menu ',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item dropdown' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class=" ' . ( $depth > 0 ? 'sub-m' : 'dropdown-toggle' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function add_e2_date_picker(){
//jQuery UI date picker file
wp_enqueue_script('jquery-ui-datepicker');
//jQuery UI theme css file
wp_enqueue_style('marathon-ui-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css',false,"1.9.0",false);
}
add_action('wp_enqueue_scripts', 'add_e2_date_picker'); 


//fake post linked to runner
register_post_type('fake-post',
	array(
		'labels'          => array('name'=>'Fake Posts','singular_name'=>'Fake Post'),
		'public'          => true,
		'show_ui'         => true,
		'rewrite'         => array('slug' => 'fakepost'),
		'hierarchical'    => false,
		//'supports'        => array('title','editor','custom-fields'),

		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	)
);


function asdfsdfsd () {
	$blogusers = get_users(  );
	// Array of WP_User objects.
	foreach ( $blogusers as $user ) {
		//linkFakePostToRunner($user->ID);
	}
}
//add_action( 'init', 'asdfsdfsd' );

function linkFakePostToRunner($user_id) {
  $user = get_userdata($user_id);
	$fakepost_id = wp_insert_post(array(
		'post_type' => 'fake-post',
		'post_status' => 'publish',   // Maybe this should be pending or draft?
		'post_title' => $user->display_name,
	));
	update_user_meta($user_id,'_linked_fakepost_id',$fakepost_id);
	update_post_meta($fakepost_id,'_linked_user_id',$user_id);
}

//redirect user to runner page again
function wpse_58613_comment_redirect( $location ) {
    if ( isset( $_POST['my_redirect_to'] ) ) // Don't use "redirect_to", internal WP var
        $location = $_POST['my_redirect_to'];
     
		$location = home_url('/runner-page/?r='.@$_POST['runner_id']);

    return $location;
}
//add_filter( 'comment_post_redirect', 'wpse_58613_comment_redirect' );

//add hidden field in comment form
add_action( 'comment_form_logged_in_after', 'pmg_comment_tut_fields' );
add_action( 'comment_form_after_fields', 'pmg_comment_tut_fields' );
function pmg_comment_tut_fields()
{
    ?>
        <input type="hidden" name="runner_id" value="<?php echo $_REQUEST['r'];?>"/>
    <?php
}


function encodePaymentProcessingData($string) {
	return base64_encode($string);
}

function decodePaymentProcessingData($encrypted) {
	return base64_decode($encrypted);
}

//payment info storing
add_action('wp_ajax_runner_donation_form', 'runner_donation_form');
add_action('wp_ajax_nopriv_runner_donation_form', 'runner_donation_form');
function runner_donation_form()
{
	//$value consists of userid_wpnonce_amount, here i have added extra = at the end because i am facing problem extra 0 at the end of the decoded string.
	$value = esc_attr($_POST['rid']).'_'.esc_attr($_POST['wn']).'_'.esc_attr($_POST['a']).'_'.esc_attr($_POST['currency_code']).'=';
	//add to database
	delete_user_meta(esc_attr($_POST['rid']), 'sponsoring_request_wpnonce');
	add_user_meta(esc_attr($_POST['rid']), 'sponsoring_request_wpnonce', $value);
	//sponsored comment
	$comment = $_POST['comment'];
	delete_user_meta(esc_attr($_POST['rid']), 'sponsored_comment');
	add_user_meta(esc_attr($_POST['rid']), 'sponsored_comment', $comment);
	//sponsored comment
	$sponsor_name = $_POST['sponsor_fname'].' '.$_POST['sponsor_lname'];
	delete_user_meta(esc_attr($_POST['rid']), 'sponsor_name');
	add_user_meta(esc_attr($_POST['rid']), 'sponsor_name', $sponsor_name);
	//sponsored comment
	$sponsor_email = $_POST['sponsor_email'];
	delete_user_meta(esc_attr($_POST['rid']), 'sponsor_email');
	add_user_meta(esc_attr($_POST['rid']), 'sponsor_email', $sponsor_email);
	
	echo encodePaymentProcessingData($value);
}


function addCommentBySponsor($user_id, $comment_content, $sponsor_name, $sponsor_email) {
	$time = current_time('mysql');
	$_linked_fakepost_id = get_user_meta($user_id, '_linked_fakepost_id',true);
	$data = array(
			'comment_post_ID' => $_linked_fakepost_id,
			'user_id' => 1,
			'comment_author' => $sponsor_name,
			'comment_author_email' => $sponsor_email,
			'comment_date' => $time,
			'comment_content' => $comment_content,
			'comment_approved' => 1,
	);
	$new_comment_id = wp_insert_comment($data);
}

/* Custom Columns Edit
==================================================
add_filter('manage_edit-track_columns', 'manage_edit_track_columns');
function manage_edit_track_columns($columns) {
    $columns['category'] = 'Category';
    return $columns;
}

add_action( 'manage_track_posts_custom_column', 'mascot_track_columns_content', 10, 2 );
function mascot_track_columns_content( $columns, $post_id ) {
	global $post;
	switch( $columns ) {
		case 'category' :
      echo get_the_term_list($post->ID, 'dt_playlist', '', ', ','');
			break;
	}
}*/



//shortcode for testing purpose...
function ism_shortcode_ism_send_email( $atts, $content = null ) {
	
	$attachments = array( 
		WP_CONTENT_DIR . '/uploads/2015/11/Fundraising-letter-for-ALEH-Ascend-UPDATED.docx',
		WP_CONTENT_DIR . '/uploads/2015/11/Welcome-Letter-to-ALEH-Ascend-UPDATED.docx');
		
	$headers = 'From: ALEH Ascend <info@runforaleh.org>' . "\r\n";
	$multiple_recipients = array(
			'ismailcseku@gmail.com',
			'ismailcseku2@gmail.com'
	);
	$subj = 'Test subject | Aleh Ascend';
	$body = 'This is the body of the email';
	wp_mail( $multiple_recipients, $subj, $body, $headers, $attachments  );
	
  return true;
}
remove_shortcode( 'ism_send_email' );
add_shortcode( 'ism_send_email', 'ism_shortcode_ism_send_email' );



//currency converter
function truncate_number( $number, $precision = 2) {
    // Are we negative?
    $negative = $number / abs($number);
    // Cast the number to a positive to solve rounding
    $number = abs($number);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}


//now not needed....
add_action('wp_ajax_ism_currency_converter', 'ism_currency_converter');
add_action('wp_ajax_nopriv_ism_currency_converter', 'ism_currency_converter');
function ism_currency_converter()
{
	$responseTxt = '';
	//convert
	if(isset($_POST['from_currency'])){
		$from   = $_POST['from_currency']; /*change it to your required currencies */
		$to     = $_POST['to_currency'];
		$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
		$handle = @fopen($url, 'r');
		 
		if ($handle) {
			$result = fgets($handle, 4096);
			fclose($handle);
		}
		$allData = explode(',',$result); /* Get all the contents to an array */
		$currencyValue = $allData[1];
		 
		$responseTxt = $currencyValue;
		//$responseTxt = sprintf("%01.2f", $responseTxt);
		//$responseTxtFinal = truncate_number($responseTxt);
		
	}
	echo $responseTxt;
}

// total amount donated
function ism_total_amount_donated_towards_jerusalem($venue)
{
	$args = array( 
	  'meta_query' => array(
	    array(
	        'key' => 'what_marathon_like_to_participate',
	        'value' => $venue,
	        'compare' => '='
	    ),
	  ) 
	);
	$runners = get_users($args);
	$runner_pledged = 0;
	// Array of stdClass objects.
	foreach ( $runners as $user ) {
		$user_id = $user->ID;
		$runner_pledged += get_user_meta($user_id, 'runner_pledged', true);
	}
	echo '$'.$runner_pledged;
}



//How to Avoid No Thumbnail Issue While Sharing Post on Facebook
function insert_image_src_rel_in_head($runner_profile_photo) {
  $runner_profile_photo; //replace this with a default image on your server or an image in your media library
  //echo '<meta property="og:image" content="' . $runner_profile_photo . '"/>';
  echo '<meta property="og:image" content="http://runforaleh.org/wp-content/themes/marathon/images/logo6.png"/>';
}
add_action('wp_head', 'insert_image_src_rel_in_head', 10,1);