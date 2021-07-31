<?php
/**
 * filancy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package filancy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'filancy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function filancy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on filancy, use a find and replace
		 * to change 'filancy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'filancy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'filancy' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'filancy_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'filancy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function filancy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'filancy_content_width', 640 );
}
add_action( 'after_setup_theme', 'filancy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function filancy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'filancy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'filancy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'filancy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function filancy_scripts() {
	wp_enqueue_style( 'filancy-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'filancy-style', 'rtl', 'replace' );

	wp_enqueue_script( 'filancy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'filancy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action( 'wp_enqueue_scripts', 'custom_js_and_css');

function custom_js_and_css() {


wp_enqueue_style( 'bootstr', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), null );
wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), null );

wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), null );

wp_enqueue_script('jq', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), null );
wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), null );

}

register_nav_menus( array(
	'head_menu' => 'Menu'
));

add_theme_support( 'custom-logo' );

// function custom_posts_type() {
// 	register_post_type('room', array(
// 		'capability_type' => 'room',
// 		'map_meta_cap' => true,
// 		'has_archive' => true,
// 		'public' => true,
// 		'supports' => array('title', 'editor'),
// 		'show_in_rest' => true,
// 		'rewrite' => array('slug' => 'rooms'),
// 		'labels' => array(
// 			'name' => 'Номера',
// 			'add_new_item' => 'Добавить номер',
// 			'all_items' => 'Все номера',
// 			'singular_name' => 'Номер'
// 		),
// 		'menu_icon' => 'dashicons-tag',
// 		'show_in_admin_bar' => true,
// 		'show_in_menu' => true,
// 	));
// 	register_taxonomy('service-rooms', array('roons'), array(
// 		'name' => 'Rooms',
// 		'singular_name' => 'Room',
// 		'menu_name' => 'Rooms'
// 	));
// }

// add_action('init', 'custom_posts_type');

function custom_post_type_rooms() {
    
    $labels = array(
        'name'                  => 'Номера',
        'singular_name'         => 'Номер',
        'menu_name'             => 'Номера',
    
        'add_new_item'          => 'Добавить номер',
        'add_new'               => 'Добавить номер',
        'new_item'              => 'Довый номер',
        'edit_item'             => 'Редактировать',
        'update_item'           => 'Обновить',
        'view_item'             => 'Просмотреть все',
        'view_items'            => 'Просмотр',
        'search_items'          => 'Поиск',
        'not_found'             => 'Не найдено',
        'not_found_in_trash'    => 'Не найдено в удаленных',
    
    );
    $rewrite = array(
        'slug'                  => 'rooms',
        'with_front'            => true,
        'pages'                 => false,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Номера',
        'description'           => 'Post Type Description',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-tag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'query_var'             => 'foto',
        'publicly_queryable'    => true,
		'show_in_rest' 			=> true,
        'rewrite'               => $rewrite,
        
    );
    register_post_type( 'rooms', $args );
    $labels = array(
        'name'                    => 'Рубрики Номера',
        'singular_name'            => 'Рубрика',
        'menu_name'                => 'Рубрика Номера',
        );
    
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => false,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
        );
    
    register_taxonomy( 'service-room', array( 'rooms' ), $args );
}
add_action( 'init', 'custom_post_type_rooms', 0 );