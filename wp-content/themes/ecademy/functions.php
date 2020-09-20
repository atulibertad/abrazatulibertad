<?php
/**
 * eCademy functions and definitions
 * @package eCademy
 */

/**
 * Shorthand contents for theme assets url
 */
define('ECADEMY_VERSION', time());
define('ECADEMY_THEME_URI', get_template_directory_uri());
define('ECADEMY_THEME_DIR', get_template_directory());
define('ECADEMY_IMG',ECADEMY_THEME_URI . '/assets/img');
define('ECADEMY_CSS',ECADEMY_THEME_URI . '/assets/css');
define('ECADEMY_JS',ECADEMY_THEME_URI . '/assets/js');
if( !defined('ECADEMY_FRAMEWORK_VAR') ) define('ECADEMY_FRAMEWORK_VAR', 'ecademy_opt');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'ecademy_setup' ) ) :

	function ecademy_setup() {
		
		// Make theme available for translation.
		load_theme_textdomain( 'ecademy', ECADEMY_THEME_DIR. '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add theme support yost seo plugin breadcrumbs
		add_theme_support( 'yoast-seo-breadcrumbs' );

		// eCademy image size
		add_image_size( 'ecademy_default_thumb', 750, 500, true );
		add_image_size( 'ecademy_advisor_thumb_one', 545, 820, true );
		add_image_size( 'ecademy_advisor_thumb_two', 590, 570, true );
		add_image_size( 'ecademy_blog_thumb', 900, 500, true );
		add_image_size( 'ecademy_400x400', 400, 400, true );
		add_image_size( 'ecademy_810x545', 810, 545, true );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'ecademy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function ecademy_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'ecademy_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecademy_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'ecademy_scripts' ) ) :

	function ecademy_scripts() {
        global $ecademy_opt;
        $is_cursor      = !empty($ecademy_opt['is_cursor']) ? $ecademy_opt['is_cursor'] : '';

		wp_enqueue_style( 'ecademy-style', get_stylesheet_uri() );
		wp_style_add_data( 'ecademy-style', 'rtl', 'replace' );

		wp_enqueue_style( 'vendor', 				ECADEMY_CSS . '/vendor.min.css', null, ECADEMY_VERSION );
		// Video CSS
		if( is_singular('lp_course') ):
			wp_enqueue_style( 'video', 				ECADEMY_CSS . '/video.min.css', null, ECADEMY_VERSION );
		endif;

		// WooCommerce CSS
		if ( class_exists( 'WooCommerce' ) ):
			wp_enqueue_style( 'ecademy-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
		endif;
		wp_enqueue_style( 'ecademy-main-style', 	ECADEMY_CSS . '/style.css', null, ECADEMY_VERSION );
		wp_enqueue_style( 'ecademy-responsive', 	ECADEMY_CSS . '/responsive.css', null, ECADEMY_VERSION );

		// RTL CSS
		if( ecademy_rtl() == true ):
			wp_enqueue_style( 'ecademy-rtl', get_template_directory_uri() . '/rtl.css' );
		endif;

		wp_enqueue_script( 'vendor', 		ECADEMY_JS . '/vendor.min.js', array('jquery'), ECADEMY_VERSION );

		// Video JS
		if( is_singular('lp_course') ):
			wp_enqueue_style( 'videojs', 			ECADEMY_JS . '/videojs.min.js', null, ECADEMY_VERSION );
		endif;
		wp_enqueue_script( 'jquery-cookie', 		ECADEMY_JS . '/jquery.cookie.min.js', array('jquery'), ECADEMY_VERSION );
        if( $is_cursor == '1' ):
            wp_enqueue_script( 'ecademy-cursor', 		ECADEMY_JS . '/cursor.min.js', array('jquery'), ECADEMY_VERSION );
        endif;
		wp_enqueue_script( 'ecademy-main', 			ECADEMY_JS . '/main.js', array('jquery'), ECADEMY_VERSION );

		wp_deregister_style( 'wpems-fronted-css' );
		wp_deregister_style( 'wpems-owl-carousel-css' );
		wp_deregister_script( 'wpems-owl-carousel-js' );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'ecademy_scripts' );

if ( ! function_exists( 'ecademy_fonts' ) ) {
	function ecademy_fonts() {
		wp_enqueue_style( 'ecademy-fonts', "//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&display=swap", '', '1.0.0', 'screen' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecademy_fonts' );

/**
 * Custom template tags for this theme.
 */
require ECADEMY_THEME_DIR. '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ECADEMY_THEME_DIR. '/inc/template-functions.php';

/**
 * Acf meta
 */
require ECADEMY_THEME_DIR. '/inc/acf.php';

/**
 * Customizer additions.
 */
require ECADEMY_THEME_DIR. '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require ECADEMY_THEME_DIR. '/inc/jetpack.php';
}

/**
 * Load bootstrap navwalker 
 */
require ECADEMY_THEME_DIR. '/inc/bootstrap-navwalker.php';

/**
 * Load theme widgets
 */
require ECADEMY_THEME_DIR. '/inc/widget.php';

/**
 * Custom style
 */
require ECADEMY_THEME_DIR. '/inc/custom-style.php';

/**
 * Social link
 */
require ECADEMY_THEME_DIR. '/inc/social-link.php';

/**
 * Demo data import
 */
require ECADEMY_THEME_DIR. '/lib/demo-import.php';

/**
 * Recommended plugin
 */
require ECADEMY_THEME_DIR. '/lib/recommended-plugin.php';

/**
 * Custom functions for LearnPress
 */
if ( class_exists( 'LearnPress' ) ) {
	require ECADEMY_THEME_DIR. '/inc/learnpress.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * eCademy Menus
 */
if ( ! function_exists( 'ecademy_register_menus' ) ) :
	function ecademy_register_menus(){
		register_nav_menus(
			array(
				'primary' 		=> esc_html__('Primary Menu', 'ecademy'),
				'footer-menu' 	=> esc_html__( 'Footer Menu', 'ecademy' ),
			
			)
		);
	}
endif;
add_action('init', 'ecademy_register_menus');

/**
 * Filter the categories archive widget to add a span around post count
 */
if ( ! function_exists( 'ecademy_cat_count_span' ) ) {
	function ecademy_cat_count_span( $links ) {
		$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'wp_list_categories', 'ecademy_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
if ( ! function_exists( 'ecademy_archive_count_span' ) ) {
	function ecademy_archive_count_span( $links ) {
		$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'ecademy_archive_count_span' );

/**
 * Excerpt more text
 */
if ( ! function_exists( 'ecademy_excerpt_more' ) ) :
	function ecademy_excerpt_more( $more ) {
		return ' ';
	}
endif;
add_filter('excerpt_more', 'ecademy_excerpt_more');

/**
 * Remove pages from search result
 */
if ( ! function_exists( 'ecademy_remove_pages_from_search' ) ) :
    function ecademy_remove_pages_from_search() {
		global $ecademy_opt;
		global $wp_post_types;

		if( isset( $ecademy_opt['ecademy_search_page'] ) ):
			if( $ecademy_opt['ecademy_search_page'] != true ):
				$wp_post_types['page']->exclude_from_search = true;
			else:
				$wp_post_types['page']->exclude_from_search = false;
			endif;
		else:
			$wp_post_types['page']->exclude_from_search = false;
		endif;
		if ( post_type_exists( 'events' ) ) {
			// exclude from search results
			$wp_post_types['events']->exclude_from_search = true;
		}
		if ( post_type_exists( 'product' ) ) {
			// exclude from search results
			$wp_post_types['product']->exclude_from_search = true;
		}
	}
endif;
add_action('init', 'ecademy_remove_pages_from_search');

/**
 * If page edited by elementor
 */
if ( ! function_exists( 'ecademy_is_elementor' ) ) :
	function ecademy_is_elementor(){
		if ( function_exists( 'elementor_load_plugin_textdomain' ) ):
			global $post;
			if( $post != '' ):
				return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
			endif;
		endif;
	}
endif;