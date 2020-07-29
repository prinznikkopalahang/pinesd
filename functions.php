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
        wp_localize_script('pinesdscript', 'the_ajax_script', array('ajaxurl' =>admin_url('admin-ajax.php')));
        wp_enqueue_script('pinesdscript'); // Enqueue it!
	}
}

function pinesd_admin_script() {

    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'pinesdadminscript', get_stylesheet_directory_uri() . '/src/js/admin-script.js', array('jquery'), null, false );
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
                        // 'editor',
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


function add_custom_fields_meta_box() {
  add_meta_box(
      'post_work', // $id
      'Content', // $title
      'show_custom_post_fields', // $callback
      'works', // $screen
      'normal', // $context
      'high' // $priority
  );
}

function save_post_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( get_post_status( $post->ID ) === 'auto-draft' ) {
        return;
    }
    update_post_meta( $post->ID, "_post_work", sanitize_text_field( $_POST[ "_post_work" ] ) );
    update_post_meta( $post->ID, "_post_headline_title", $_POST[ "_post_headline_title" ] );
    update_post_meta( $post->ID, "_post_banner", sanitize_text_field( $_POST[ "_post_banner" ] ) );
    update_post_meta( $post->ID, "_post_ask", $_POST[ "_post_ask" ]);
    update_post_meta( $post->ID, "_post_engagement", $_POST[ "_post_engagement" ]);
    update_post_meta( $post->ID, "_post_outcome", $_POST[ "_post_outcome" ]);
    update_post_meta( $post->ID, "_post_services", $_POST[ "_post_services" ]);
    update_post_meta( $post->ID, "_post_gallery", $_POST[ "_post_gallery" ]);
    update_post_meta( $post->ID, "_post_framework", $_POST[ "_post_framework" ]);
    update_post_meta( $post->ID, "_post_output", $_POST[ "_post_output" ]);
    update_post_meta( $post->ID, "_post_conclusion", $_POST[ "_post_conclusion" ]);
    update_post_meta( $post->ID, "_post_photo_by", $_POST[ "_post_photo_by" ]);
}

function show_custom_post_fields(){
    global $post;
    $custom = get_post_custom( $post->ID );
    //var_dump($custom);
    $headline = $custom[ "_post_headline_title" ][ 0 ];
    $banner = $custom[ "_post_banner" ][ 0 ];
    $ask = $custom[ "_post_ask" ][ 0 ];
    $engagement = $custom[ "_post_engagement" ][ 0 ];
    $outcome = $custom[ "_post_outcome" ][ 0 ];
    $services = $custom[ "_post_services" ][ 0 ];
    $gallery = $custom[ "_post_gallery" ][ 0 ];
    $framework = $custom[ "_post_framework" ][ 0 ];
    $output = $custom[ "_post_output" ][ 0 ];
    $conclusion = $custom[ "_post_conclusion" ][ 0 ];
    $photoBy = $custom[ "_post_photo_by" ][ 0 ];

    $headlineHtml = '<label class="custom-label">Headline</label>';
    echo $headlineHtml;
    wp_editor(
        htmlspecialchars_decode( $headline ),
        '_post_headline_title',
        $settings = array(
            'textarea_name' => '_post_headline_title',
        )
    );

    $bannerHtml = '<div class="field-group">';
      $bannerHtml .= '<label class="custom-label">Banner Image</label>';
      $bannerHtml .= '<a href="#" class="pinesd_upload_image_button custom-btn">Upload Media</a>';
      $bannerHtml .= '<img src="'.$banner.'" class="banner-preview">';
      $bannerHtml .= '<input class="field upload" type="hidden" id="post_banner" name="_post_banner" value="'.$banner.'" />';
    $bannerHtml .= '</div>';
    echo $bannerHtml;

    $askHtml = '<label class="custom-label">Ask Copy</label>';
    echo $askHtml;
    wp_editor(
        htmlspecialchars_decode( $ask ),
        '_post_ask',
        $settings = array(
            'textarea_name' => '_post_ask',
        )
    );
    $engagementHtml = '<label class="custom-label">Engagment Copy</label>';
    echo $engagementHtml;
    wp_editor(
        htmlspecialchars_decode( $engagement ),
        '_post_engagement',
        $settings = array(
            'textarea_name' => '_post_engagement',
        )
    );
    $outcomeHtml = '<label class="custom-label">Outcome Copy</label>';
    echo $outcomeHtml;
    wp_editor(
        htmlspecialchars_decode( $outcome ),
        '_post_outcome',
        $settings = array(
            'textarea_name' => '_post_outcome',
        )
    );
    $servicesHtml = '<label class="custom-label">Services Copy</label>';
    echo $servicesHtml;
    wp_editor(
        htmlspecialchars_decode( $services ),
        '_post_services',
        $settings = array(
            'textarea_name' => '_post_services',
        )
    );
    $galleryHtml = '<div class="field-group">';
      $galleryHtml .= '<label class="custom-label">Featured Work Image</label>';
      $galleryHtml .= '<a href="#" class="pinesd_upload_image_button_gallery custom-btn">Upload Media</a>';
      $galleryHtml .= '<img src="'.$gallery.'" class="banner-preview">';
      $galleryHtml .= '<input class="field upload" type="hidden" id="post_gallery" name="_post_gallery" value="'.$gallery.'" />';
    $galleryHtml .= '</div>';
    echo $galleryHtml;

    $frameworkHtml = '<label class="custom-label">Framework</label>';
    echo $frameworkHtml;
    wp_editor(
        htmlspecialchars_decode( $framework ),
        '_post_framework',
        $settings = array(
            'textarea_name' => '_post_framework',
        )
    );

    $outputHtml = '<label class="custom-label">Output</label>';
    echo $outputHtml;
    wp_editor(
        htmlspecialchars_decode( $output ),
        '_post_output',
        $settings = array(
            'textarea_name' => '_post_output',
        )
    );

    $conclusionHtml = '<label class="custom-label">Conclusion</label>';
    echo $conclusionHtml;
    wp_editor(
        htmlspecialchars_decode( $conclusion ),
        '_post_conclusion',
        $settings = array(
            'textarea_name' => '_post_conclusion',
        )
    );

    $photoByHtml = '<label class="custom-label">Photo Credits</label>';
    echo $photoByHtml;
    wp_editor(
        htmlspecialchars_decode( $photoBy ),
        '_post_photo_by',
        $settings = array(
            'textarea_name' => '_post_photo_by',
        )
    );
}

/**
 * Function Shortcode
 *
 */

function display_post_list_shortcode( $attr, $content = null ) {
    ob_start();
    include dirname( __FILE__ ) . '/templates/shortcode-posts.php';
    return ob_get_clean();
}

/**
 * Searchable Post Type.
 *
 */
 function search_post_ajax() {
	 $args = array("post_type" => "post", "s" => $_POST["terms"]);
	 $query = get_posts( $args );

	 die( json_encode( $query  ) );
}



function admin_css() {
  echo '<style>
    .field-group{
      overflow: auto;

    }
    label.custom-label{
      display: block;
      margin: 15px 0px;
      font-weight: bold;
    }
    .field {
      width: 100%;
      margin: 0px 0px 15px;
    }
    .field.upload {
      padding: 10px !important;
      border: 1px solid #dbdbdb;
      background: #f2f2f2;
    }

    .mce-tinymce iframe {
        height: 100px !important;
    }
    .banner-preview {
        width: 200px;
        display: block;
        margin: 10px 0;
    }
    .custom-btn {
        display: block;
        padding: 10px 20px;
        background: #007cba;
        width: 100px;
        text-align: center;
        text-decoration: none;
        color: #fff;
        border-radius: 2px;
    }
  </style>';
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'pinesd_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'pinesd_styles'); // Add Theme Stylesheet
add_action( 'init', 'register_pinesd_nav' ); // Add custom navigations
add_action( 'init', 'create_pinesd_post_type' ); //Register PineSD Docs Post Type
add_action( 'add_meta_boxes', 'add_custom_fields_meta_box' ); //Register PineSD Post Type MetaBoxes
add_action( 'save_post', 'save_post_meta_boxes' );
add_action('admin_head', 'admin_css'); // Admin Field Styling
add_action( 'admin_enqueue_scripts', 'pinesd_admin_script' );
add_shortcode( 'display-posts', 'display_post_list_shortcode' ); // Custom Shortcode
add_action('wp_ajax_nopriv_search_post_ajax', 'search_post_ajax');
//Shortcodes
