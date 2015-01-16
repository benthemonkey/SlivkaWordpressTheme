<?php

# bootstrap nav
require_once('wp_bootstrap_navwalker.php');

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

$wpcx_cxOptions = get_option('cxOptions');

//add_action('wp_head', 'wpcx_add_margin_header');

//Load JS

//add_action('init', 'wpcx_add_my_scripts');

// Custom Logo Support

add_theme_support( 'custom-header', array('', 'wpcx_admin_header_style' ));

if (function_exists('add_image_size')) {
	add_image_size( 'slideshow', 1024, 576, true ); #480, 210
	add_image_size( 'slideshow_thumb', 100, 75, true );
	add_image_size( 'reference', 250, 130, true );
	add_image_size( 'feat_thumb', 295, 150, true );
}

//add_action('wp_head', 'wpcx_script');
?>

