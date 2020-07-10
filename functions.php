<?php

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

function pinesd_styles()
{
    wp_register_style('pinesd', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('pinesd'); // Enqueue it!
}

function pinesd_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('pinesdscript', get_template_directory_uri() . '/src/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('pinesdscript'); // Enqueue it!
	}
}

function register_pinesd_nav()
{
  register_nav_menus(
    array(
      'pinesd-header' => __( 'Header' )
    )
  );
}

function pinesd_nav($location){
    wp_nav_menu( array(
      'theme_location' => $location,
      'container_class' => 'pinesd-nav' )
    );
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'pinesd_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'pinesd_styles'); // Add Theme Stylesheet
add_action( 'init', 'register_pinesd_nav' ); // Add custom navigations
