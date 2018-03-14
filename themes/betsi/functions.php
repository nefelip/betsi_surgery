<?php
/**
 * _tk functions and definitions
 *
 * @package _tk
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _tk_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', '_tk' ),
	) );

}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'Side Contact Form', '_tk' ),
		'id'            => 'side-contact',
		'before_widget' => '<div id="side-form-container" class="side-wid %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<a class="side-title-form">',
		'after_title'   => '</a>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {

	// Import the necessary TK Bootstrap WP CSS additions
	wp_enqueue_style( '_tk-bootstrap-wp', get_template_directory_uri() . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( '_tk-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

    // Import the stellarnav css
	wp_enqueue_style( 'stellarnavcss', get_template_directory_uri() . '/includes/css/stellarnav.min.css' );

	// load Font Awesome css
	wp_enqueue_style( '_tk-font-awesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load _tk styles
	wp_enqueue_style( '_tk-style', get_stylesheet_uri() );

	// load bootstrap js
	wp_enqueue_script('_tk-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

    // load stellarnav js
	wp_enqueue_script( 'stellarnavjs', get_template_directory_uri() . '/includes/js/stellarnav.min.js', array(), '14032018', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

    // load script js
	wp_enqueue_script('_tk-scriptjs', get_template_directory_uri() . '/includes/js/scripts.js', array('jquery'), '07032018', true  );

}
add_action( 'wp_enqueue_scripts', '_tk_scripts' );


function betsi_post_type_custom(){

    // Actions post type
    register_post_type('surgery', array(
        "labels" => array(
            "name"          => _x( 'Surgery posts', '_tk' ),
            "singular_name" => _x( 'Surgery post', '_tk' ),
            'menu_name'     => __( 'All surgery posts', '_tk' ),
            "view_item"     => __( 'View surgery post', '_tk' ),
            "edit_item"     => __( 'Edit surgery post', '_tk' ),
            "add_new"       => __( 'Add a new surgery post', '_tk' ),
        ),
        "public" => true,
        "menu_icon" => 'dashicons-hammer',
        "supports" => array(
            "title",
            "thumbnail",
            "editor",
            "custom-fields"
    ),
        'taxonomies' => array('post_tag')
    ));

    register_taxonomy('surgery_categories', array('surgery'), array(
        "hierarchical" => true,
        "labels" => array(
            "name"          => __( 'Surgery post categories' ),
            "singular_name" => __( 'Surgery post category' ),
            "view_item"     => __( 'View surgery post category' ),
            "edit_item"     => __( 'Edit surgery post category' ),
            "add_new_item"  => __( 'Add a new surgery post category' ),
        ),
        "query_var" => true,
        "rewrite" => array( 'slug' => 'surgery_categories')
    ));
}
add_action('init', 'betsi_post_type_custom');

function fontawesome_dashboard() {
   wp_enqueue_style('fontawesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css', '', '4.5.0', 'all');
}

add_action('admin_init', 'fontawesome_dashboard');

function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
       #adminmenu .menu-icon-surgery div.wp-menu-image:before {
            font-family: Fontawesome !important;
            content: '\\f0f0';
            color: #bf9e59;
        }
     </style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';
