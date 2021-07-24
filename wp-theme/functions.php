<?php

if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/includes/back-compat.php';
}

function nsi_theme_dependencies() {
    if ( ! class_exists( 'Classic_Editor' ) ) {
        $class = 'notice notice-warning';
        $message = 'Currently this theme needs the following plugins: <a href="https://wordpress.org/plugins/classic-editor/" target="_blank">Classic Editor</a>. This is important for displaying Gallery correctly.';

        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), $message );
    }
}
add_action( 'admin_notices', 'nsi_theme_dependencies' );

function nsi_setup() {

    // Make it ready for translation
    load_theme_textdomain( 'nsi', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Add excerpts to WordPress pages
	add_post_type_support( 'page', 'excerpt' );

    // Add post-formats support
    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );

    // Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Add support for custom line height controls.
    add_theme_support( 'custom-line-height' );

    // Add support for experimental cover block spacing.
    add_theme_support( 'custom-spacing' );

    // Add support for custom units.
    // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
    add_theme_support( 'custom-units' );

    // Add support for custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
            'class'                => 'w-11 h-auto',
        )
    );

    /** Register menu area */
    register_nav_menus(
        array(
            'main_menu'  => esc_html__( 'Main Menu', 'nsi' ),
            'extra_menu' => esc_html__( 'Extra Menu at Top', 'nsi' ),
        )
    );

}

if ( is_customize_preview() ) {
    require get_template_directory() . '/includes/starter-content.php';
    add_theme_support( 'starter-content', nsi_get_starter_content() );
}

add_action( 'after_setup_theme', 'nsi_setup' );

/** Register widget area */
function nsi_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'nsi' ),
			'id'            => 'main_sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'nsi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="font-black leading-none uppercase border-l-2 border-white pl-2">',
			'after_title'   => '</p>',
		)
	);

}
add_action( 'widgets_init', 'nsi_widgets_init' );

/** Enqueues scripts and styles */
function nsi_scripts() {
	// Main stylesheet
    wp_enqueue_style(
        'nsia-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        wp_get_theme()->get( 'Version' ) );

    wp_enqueue_script(
		'nsia-script',
		get_template_directory_uri() . '/assets/js/script.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nsi_scripts' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

// Customizer additions.
require get_template_directory() . '/classes/class-customizer.php';
new NSI_Customizer();

// Custom walker nav
require get_template_directory() . '/classes/class-walker-nav.php';

// SVG Icons class.
require get_template_directory() . '/classes/class-svg-icons.php';

// Custom post types
require get_template_directory() . '/extras/post-types/post-type-product.php';

// Widget About
require get_template_directory() . '/extras/widgets/widget-about-company.php';

// Widget Products
require get_template_directory() . '/extras/widgets/widget-products.php';

// Widget Contact
require get_template_directory() . '/extras/widgets/widget-support.php';

// Widget Map
require get_template_directory() . '/extras/widgets/widget-map.php';

// Custom Widget
require get_template_directory() . '/extras/widgets/widget-custom.php';

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/includes/template-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/includes/template-tags.php';
