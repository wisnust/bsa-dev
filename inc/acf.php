<?php
	
// ACF Blocks

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists('acf') ) {
    $acf_dir = ABSPATH . 'wp-content/plugins/advanced-custom-fields-pro/';
    include_once( $acf_dir . '/acf.php' );
}

/**
 * Register BSA Block Category
 */
function bsa_block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'slug' => 'bsa-acf-blocks',
				'title' => __( 'BSA General Blocks', 'bsa-acf-blocks' ),
				'icon'  => 'admin-multisite',
			),
		),
		$categories
		
	);
}
add_filter( 'block_categories', 'bsa_block_categories', 10, 2 );

function register_acf_block_types() {

    // Block Hero
    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('Used to display Hero block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Hero.php',
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'anchor' => true
        ),
        'category'          => 'bsa-acf-blocks',
        'icon'              => 'align-full-width',
        'keywords'          => array( 'hero' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'hero_component_preview' => get_template_directory_uri() . '/acf-preview-images/hero-component-preview.png',
                )
            )
        )
    ));

    // Block Culture
    acf_register_block_type(array(
        'name'              => 'culture',
        'title'             => __('Culture'),
        'description'       => __('Used to display Culture block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Culture.php',
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'anchor' => true
        ),
        'category'          => 'bsa-acf-blocks',
        'icon'              => 'laptop',
        'keywords'          => array( 'culture' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'culture_component_preview' => get_template_directory_uri() . '/acf-preview-images/culture-component-preview.png',
                )
            )
        )
    ));

    // Block About
    acf_register_block_type(array(
        'name'              => 'about',
        'title'             => __('About'),
        'description'       => __('Used to display About block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/About.php',
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'anchor' => true
        ),
        'category'          => 'bsa-acf-blocks',
        'icon'              => 'align-pull-right',
        'keywords'          => array( 'about' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'about_component_preview' => get_template_directory_uri() . '/acf-preview-images/about-component-preview.png',
                )
            )
        )
    ));

    // Block Openings
    acf_register_block_type(array(
        'name'              => 'openings',
        'title'             => __('Openings'),
        'description'       => __('Used to display Openings block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Openings.php',
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'anchor' => true
        ),
        'category'          => 'bsa-acf-blocks',
        'icon'              => 'list-view',
        'keywords'          => array( 'openings' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'openings_component_preview' => get_template_directory_uri() . '/acf-preview-images/openings-component-preview.png',
                )
            )
        )
    ));

    // Block Testimonials
    acf_register_block_type(array(
        'name'              => 'testimonials',
        'title'             => __('Testimonials'),
        'description'       => __('Used to display Testimonials block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Testimonials.php',
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
            'anchor' => true
        ),
        'category'          => 'bsa-acf-blocks',
        'icon'              => 'testimonial',
        'keywords'          => array( 'testimonials' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonials_component_preview' => get_template_directory_uri() . '/acf-preview-images/testimonials-component-preview.png',
                )
            )
        )
    ));

}
add_action('acf/init', 'register_acf_block_types');

add_filter('acf/settings/load_json', 'register_acf_json_load_point');

function register_acf_json_load_point( $paths ) {

    // Change to Theme
    $path = get_stylesheet_directory() . '/acf-json';

    // append path
    $paths[] = $path;

    // return
    return $paths;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;
}

function enqueue_css_in_admin_block() {
	$current_screen = get_current_screen();
    if ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) {
    	wp_enqueue_style( 'css-block', get_template_directory_uri() . '/dist/css/index.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'enqueue_css_in_admin_block' );


function register_custom_block() {
    acf_register_block_type(array(
        'name' => 'custom-block',
        'title' => 'Custom Block',
        'render_callback' => 'render_custom_block',
        'category' => 'common',
        'attributes' => array(
            'customId' => array(
                'type' => 'string',
                'default' => '',
            ),
        ),
    ));
}
add_action('acf/init', 'register_custom_block');
