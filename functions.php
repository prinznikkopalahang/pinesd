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

function pinesd_nav($location)
{
    wp_nav_menu( array(
      'theme_location' => $location,
      'container_class' => 'pinesd-nav' )
    );
}

function create_pinesd_post_type(){

  register_post_type( 'labs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Pine Labs' ),
                'singular_name' => __( 'Pine Lab' )
            ),
            'public' => true,
            'has_archive' => true,
						'menu_icon' => 'dashicons-book',
						'show_in_nav_menus'     => true,
						'show_in_admin_bar'     => true,
						'query_var'             => true,
						'show_ui'               => true,
            'rewrite' => array(
							'slug' => 'labs',
							'with_front'            => false
						),
						'menu_position'         => 4,
						'show_in_rest' => true,
						'supports'              => array(
                    'title',
                    'editor',
                    'excerpt',
                    'author',
										'category',
                    'thumbnail',
                    'trackbacks',
                    'revisions',
                    'page-attributes',
                    'post-formats',
                ),
        )
    );

		register_taxonomy( 'lab_category', 'labs', array(
					'hierarchical' => false,
					'label' => 'Pine Lab Categories',
					'query_var' => true,
					'label' => __('Categories'),
					'hierarchical' => true,
          'show_in_rest' => true, // Needed for tax to appear in Gutenberg editor
					'show_ui' => true,
					'rewrite' =>  array(
						'slug' => 'labs',
            'with_front'=> false
					)
			) );
  register_post_type( 'works',
      array(
        'labels' => array(
        'name' => __( 'Pine Works' ),
        'singular_name' => __( 'Pine Works' )),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'query_var'             => true,
        'show_ui'               => true,
        'rewrite' => array(
                'slug' => 'works',
                'with_front'  => false
              ),
        'menu_position' => 4,
        'show_in_rest' => true,
        'supports'  => array(
                        'title',
                        'editor',
                        'excerpt',
                        'author',
                        'category',
                        'thumbnail',
                        'trackbacks',
                        'revisions',
                        'page-attributes',
                        'post-formats',
                ),
            )
        );

    register_taxonomy( 'works_category', 'works', array(
    					'hierarchical' => false,
    					'label' => 'Works Categories',
    					'query_var' => true,
    					'label' => __('Categories'),
    					'hierarchical' => true,
              'show_in_rest' => true, // Needed for tax to appear in Gutenberg editor
    					'show_ui' => true,
    					'rewrite' =>  array(
    						'slug' => 'works',
                'with_front'=> false
    					)
    			) );
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'pinesd_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'pinesd_styles'); // Add Theme Stylesheet
add_action( 'init', 'register_pinesd_nav' ); // Add custom navigations
add_action( 'init', 'create_pinesd_post_type' ); //Register Aloi Docs Post Type
//Shortcodes
