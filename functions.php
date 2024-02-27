<?php
/**
 * Class Medical functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Class_Medical
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'med_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function med_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Class Medical, use a find and replace
		 * to change 'med' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'med', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'med' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'med_custom_background_args',
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
add_action( 'after_setup_theme', 'med_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function med_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'med_content_width', 640 );
}
add_action( 'after_setup_theme', 'med_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function med_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'med' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'med' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar( array(
		'name'          => esc_html__( 'Latest_News', 'med' ),
		'id'            => 'latest_news',
		'description'   => esc_html__( 'Latest News Posts.', 'med' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Social_Links', 'med' ),
		'id'            => 'social_links',
		'description'   => esc_html__( 'Social Links Posts.', 'med' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

}
add_action( 'widgets_init', 'med_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function med_scripts() {
	wp_enqueue_style( 'med-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'med-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'med-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'med_scripts' );

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

// Site Option 
require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
// Site Option 
// 

/** Remove empty p tags from content and excerpt */
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');

/** add default Jquery **/
wp_enqueue_script("jquery"); 

/** add excerpt for Pages **/
add_post_type_support( 'page', 'excerpt' );

/** get first image from content **/
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

/** get first pragraph from content **/
function get_first_paragraph(){
    global $post, $posts;
    $post_content = $post->post_content;
    $post_content = apply_filters('the_content', $post_content);
    $post_content = str_replace('</p>', '', $post_content);
    $paras = explode('<p>', $post_content);
    array_shift($paras);
    return $paras[0]; 
}

/*------------ Excerpt Length ----------------*/


// Hook For converting Gravity Form submit input to Button
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    $formID = 'submitIDarw'.$form['id'];
    $arrowHTML = '<span class="arrowIcon"><svg viewBox="0 0 55 55" version="1.1" height="55" width="55" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><defs><mask id="'.$formID.'"><path transform="translate(0.000000, -0.805443)" d="M0.61384,1.56259302 C12.8982633,13.7875859 29.147553,30.0329294 49.3617089,50.2986233 C45.2447981,42.1633 42.6012642,35.4055475 41.4311073,30.0253656 C39.6758718,21.9550929 42.3161064,9.11081066 43.556567,4.97518359 C44.7970276,0.83955651 52.7707887,-5.01656182 52.7707887,0.218989163 C52.7707887,3.70935648 52.7401709,21.5496784 52.6789352,53.739955 L0.61384,53.2324435 C-11.6705833,6.56088358 -11.6705833,-10.6623999 0.61384,1.56259302 Z" stroke="#ffffff" stroke-width="4" stroke-linejoin="round" class="mask"></path></mask></defs> <g fill="#fff" fill-rule="nonzero" mask="url(#'.$formID.')" class="arrow-thin"><polygon points="53.67518 0.75715 53.717 53.86178 0.61384 53.81848 0.6149 51.4874 49.73851 51.52698 1.4953 2.9774 3.14855 1.33461 51.38367 49.87752 51.34409 0.75821"></polygon></g></g></g></svg></span>';
    
    return "<button class='button themeButton gformButton' id='gform_submit_button_{$form['id']}'><span class='text upcase'>{$form['button']['text']}</span>".$arrowHTML."</button>";
}
