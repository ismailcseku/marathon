<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $container_width = $parallax = $bg_overlay = '';
extract(shortcode_atts(array(
    'el_id'        => '',
    'el_class'        => '',
    'parallax'        => '',
    'bg_overlay'		=> '',
    'container_width' => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => ''
), $atts));

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
// wp_enqueue_style('js_composer_custom_css');

if(!$el_id) $el_id = rand(1,9999);

if($container_width == 'full') { $container_class = "container-fluid"; }
else { $container_class = "container"; }

// Parallax Effect
$parallax_class = '';
if($parallax == 'yes') {
	$parallax_class = ' parallax';
}	
	
// Background Overlay Effect
if($bg_overlay == 'dark') {
	$bg_overlay_class = ' soft-black-bg';
}elseif($bg_overlay == 'darker') {
	$bg_overlay_class = ' soft-black-bg';
}elseif($bg_overlay == 'light') {
	$bg_overlay_class = ' soft-white-bg';
}elseif($bg_overlay == 'dots_dark') {
	$bg_overlay_class = ' pattern-black soft-black-bg';
}elseif($bg_overlay == 'dots_white') {
	$bg_overlay_class = ' pattern-white';
}


$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
$output .= '<section data-stellar-background-ratio="0.4"  id="'.$el_id.'" class="'.$css_class.'" '.$style.'>';
$output .= '<div class="'.$bg_overlay_class.$parallax_class.'"><div class="'.$container_class.'"><div class="row">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div></div></div>';
$output .= '</section>'.$this->endBlockComment('row');

echo $output;