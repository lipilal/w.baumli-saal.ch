<?php 
/**
 * phnewsbulletin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phnewsbulletin
 */

if ( ! defined( '_phnewsbulletin_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_phnewsbulletin_VERSION', '1.0' );
}

if ( ! function_exists( 'phnewsbulletin_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function phnewsbulletin_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on phnewsbulletin, use a find and replace
		 * to change 'ph-news-bulletin' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ph-news-bulletin', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Align wide support
		add_theme_support( 'align-wide' );

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
				'menu-1' => esc_html__( 'Primary', 'ph-news-bulletin' ),
				'menu-top' => esc_html__( 'Top', 'ph-news-bulletin' ),
				'mobile' => esc_html__( 'Mobile Menu', 'ph-news-bulletin' ),
				'social' => esc_html__( 'Social Networks', 'ph-news-bulletin' ),
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
				'phnewsbulletin_custom_background_args',
				array(
					'default-color' => '#edf6fc',
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
		
		add_image_size( 'phnewsbulletin-thumbnail-4x3', '600', '450', true );
		add_image_size( 'phnewsbulletin-thumbnail-4x4', '600', '600', true );
		
	}
endif;
add_action( 'after_setup_theme', 'phnewsbulletin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phnewsbulletin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'phnewsbulletin_content_width', 768 );
}
add_action( 'after_setup_theme', 'phnewsbulletin_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phnewsbulletin_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ph-news-bulletin' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ph-news-bulletin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 1', 'ph-news-bulletin' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'ph-news-bulletin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 2', 'ph-news-bulletin' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'ph-news-bulletin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 3', 'ph-news-bulletin' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'ph-news-bulletin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'phnewsbulletin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function phnewsbulletin_scripts() {
	wp_enqueue_style( 'phnewsbulletin-style', get_stylesheet_uri(), array(), _phnewsbulletin_VERSION );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.css'); 
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/lib/font-awesome/css/all.min.css'); 
	wp_enqueue_style('acme-ticker-css', get_template_directory_uri() . '/lib/acmeticker/css/style.min.css'); 
	wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/lib/owl-carousel/dist/assets/owl.carousel.min.css'); 
	wp_enqueue_style('owl-carousel-theme-css', get_template_directory_uri() . '/lib/owl-carousel/dist/assets/owl.theme.default.min.css'); 
	wp_enqueue_style('sidr-dark-css', get_template_directory_uri() . '/lib/sidr/stylesheets/jquery.sidr.dark.min.css'); 
	wp_enqueue_style('phnewsbulletin-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Roboto:400,400i,700|Montserrat:400,400i,700|Lato:400,400i,700|Oswald:400,400i,700|Source+Sans+Pro:400,400i,700|Raleway:400,400i,700|PT+Sans:400,400i,700|Merriweather:400,400i,700|Ubuntu:400,400i,700', array(), null );
	wp_enqueue_style('phnewsbulletin-core', get_template_directory_uri() . '/design-files/core/core.css'); 
	wp_enqueue_style('phnewsbulletin-header', get_template_directory_uri() . '/design-files/header/'.esc_html(get_theme_mod('phnewsbulletin-header-style','style5')).'/header.css'); 
	wp_enqueue_style('phnewsbulletin-blog-style1', get_template_directory_uri() . '/design-files/blog-style/blog-style1.css'); 
	wp_enqueue_style('phnewsbulletin-single', get_template_directory_uri() . '/design-files/single/single.css');
	wp_enqueue_style('phnewsbulletin-sidebar', get_template_directory_uri() . '/design-files/sidebar/sidebar.css'); 
	wp_enqueue_style('phnewsbulletin-footer', get_template_directory_uri() . '/design-files/footer/footer.css'); 
	wp_enqueue_style('phnewsbulletin-featured-modules', get_template_directory_uri() . '/design-files/featured-modules/featured-modules.css'); 

	wp_enqueue_script( 'phnewsbulletin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _phnewsbulletin_VERSION, true );
	wp_enqueue_script( 'acme-ticker', get_template_directory_uri() . '/lib/acmeticker/js/acmeticker.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/lib/owl-carousel/dist/owl.carousel.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/lib/sidr/jquery.sidr.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'phnewsbulletin-theme-js', get_template_directory_uri() . '/js/theme.js', array('sidr','owl-carousel'), _phnewsbulletin_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'phnewsbulletin_scripts' );

/**
 * Filter the excerpt length to 50 words.
 *
 * @param int $length Excerpt length.
 * @return int 
 */
function phnewsbulletin_excerpt_length( $length ) {
		if (!is_admin() ) { 
			return 30; 
		} 
		return $length;

}
add_filter( 'excerpt_length', 'phnewsbulletin_excerpt_length', 999 );

function phnewsbulletin_excerpt_more( $more ) {
	if (!is_admin() ) {
		return '....'; 
	} 
	return $more;

}
add_filter( 'excerpt_more', 'phnewsbulletin_excerpt_more' );

/**
 * Function to wrap the entire site in a container and bootstrap row.
 *
 */
function phnewsbulletin_after_header_divs() {
	?><div class="container">
		<div class="row"><?php
}
add_action('phnewsbulletin_after_header','phnewsbulletin_after_header_divs'); 

function phnewsbulletin_before_footer_divs() {
	?></div><!--#.row-->
	</div><!--.container--><?php
}
add_action( 'phnewsbulletin_before_footer', 'phnewsbulletin_before_footer_divs' );

/**
 * Function to wrap the entire site in a container and bootstrap row.
 *
 */
function phnewsbulletin_before_loop_divs() {
	$layout = "grid-".phnewsbulletin_blog_layout_setting();
	?>
		<div class="row grid-row <?php echo esc_attr($layout); ?>"><?php
}
add_action('phnewsbulletin_before_loop','phnewsbulletin_before_loop_divs'); 

function phnewsbulletin_after_loop_divs() {
	?></div><!--#.grid-row--><?php
}
add_action( 'phnewsbulletin_after_loop', 'phnewsbulletin_after_loop_divs' );

/**
 * Featured Ticker, Carousel & Other Modules
 */
function phnewsbulletin_insert_ticker() {
		get_template_part( 'template-parts/featured-modules/acme-ticker' );
}
add_action('phnewsbulletin_after_header','phnewsbulletin_insert_ticker'); 
 
function phnewsbulletin_insert_carousel() {
	if (is_home())
		get_template_part( 'template-parts/featured-modules/owl-carousel' );
}
add_action('phnewsbulletin_after_header','phnewsbulletin_insert_carousel'); 

function phnewsbulletin_insert_featured_modules() {
	if (is_home()) :
		$i = 0;
		for ($i = 1; $i < 8; $i++) :
			phnewsbulletin_display_featured_module( get_theme_mod( 'phnewsbulletin-fa-style-'.$i, 'style7' ), get_theme_mod('phnewsbulletin-fa-enable-'.$i, 0) ,get_theme_mod( 'phnewsbulletin-fa-cat-'.$i, 0 ), get_theme_mod( 'phnewsbulletin-fa-show-title-'.$i, true ));
		endfor;
	endif;	
}
add_action('phnewsbulletin_after_header','phnewsbulletin_insert_featured_modules'); 


/**
 * Function to alter the width of sidebar and content area based on diff pages.
 *
 */
function phnewsbulletin_sidebar_setting() {
	if (is_search())	
		$setting = get_theme_mod('phnewsbulletin-primary-width-search', 'no-sidebar-narrow-primary');
	if (is_single())
		$setting = get_theme_mod('phnewsbulletin-primary-width-single-post', 'no-sidebar-narrow-primary');
	if (is_page())
		$setting = get_theme_mod('phnewsbulletin-primary-width-page', 'no-sidebar-narrow-primary');
	if (is_archive())
		$setting = get_theme_mod('phnewsbulletin-primary-width-archives', 'no-sidebar-narrow-primary');
	if (is_home())
		$setting = get_theme_mod('phnewsbulletin-primary-width-home', 'no-sidebar');	 
	return $setting;
}
	
function phnewsbulletin_primary_width() {
	$setting = phnewsbulletin_sidebar_setting();
		
	switch ($setting) {
		case 'no-sidebar':
			$class = 'col-md-12';
			break;
		case 'right-sidebar':
			$class = 'col-md-8';
			break;
		case 'right-sidebar-narrow':
			$class = 'col-md-9';
			break;
		case 'no-sidebar-narrow-primary':
			$class = 'col-md-8 offset-md-2 offset-sm-0 offset-lg-2';
			break;	
		default:
			$class = 'col-md-8 offset-md-2 offset-sm-0 offset-lg-2';
			break;					
	}
	echo esc_html($class); 
}
add_action('phnewsbulletin_primary_width_class','phnewsbulletin_primary_width');

function phnewsbulletin_secondary_width() {
	$setting = phnewsbulletin_sidebar_setting();
	
	switch ($setting) {
		case 'no-sidebar':
			$class = 'd-none';
			break;
		case 'no-sidebar-narrow-primary':
			$class = 'd-none';
			break;	
		case 'right-sidebar':
			$class = 'col-md-4';
			break;
		case 'right-sidebar-narrow':
			$class = 'col-md-3';
			break;
		default:
			$class = 'd-none';
			break;					
	}
	echo esc_html($class); 
}
add_action('phnewsbulletin_secondary_width_class','phnewsbulletin_secondary_width');


/**
 * LessCSS PHP Color Darken/Lighten
 */
function phnewsbulletin_darken_color($color_code,$percentage_adjuster = 0) {
	$percentage_adjuster = round($percentage_adjuster/100,2);
	if(preg_match("/#/",$color_code)) {
		$hex = str_replace("#","",$color_code);
		$r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
		$g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
		$b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
		$r = round($r - ($r*$percentage_adjuster));
		$g = round($g - ($g*$percentage_adjuster));
		$b = round($b - ($b*$percentage_adjuster));
 
		return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
			.str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
			.str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);
	}
}

/**
 * Implement the Custom Colors feature.
 */
function phnewsbulletin_colors_override(){ ?>
 <style>
 	:root {
		 --phnewsbulletin-primary: <?php echo esc_html(get_theme_mod('phnewsbulletin-primary-color','#f37e7e')); ?>;
		 --phnewsbulletin-primary-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-primary-text-color','#f9ffe7')); ?>;
		 --phnewsbulletin-background-main: <?php echo esc_html(get_theme_mod('background_color','#edf6fc')); ?>;
		 --phnewsbulletin-background-plain: <?php echo esc_html(get_theme_mod('phnewsbulletin-bg-plain-color','#ffff')); ?>;

		 --phnewsbulletin-background-darker: <?php echo esc_html(get_theme_mod('phnewsbulletin-background-darker-color','#eeeeee')); ?>;
		 
		 --phnewsbulletin-secondary: <?php echo esc_html(get_theme_mod('phnewsbulletin-secondary-color','#747474')); ?>;
		 --phnewsbulletin-secondary-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-secondary-text-color','#FFFFFF')); ?>;
		 --phnewsbulletin-secondary-dark: <?php echo esc_html(get_theme_mod('phnewsbulletin-secondary-dark-color','#E9C864')); ?>;
		 
		 --phnewsbulletin-text-dark: <?php echo esc_html(get_theme_mod('phnewsbulletin-text-dark-color','#111')); ?>;
		 --phnewsbulletin-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-text-color','#555')); ?>;
		 --phnewsbulletin-text-light: <?php echo esc_html(get_theme_mod('phnewsbulletin-text-light-color','#777')); ?>;
		 --phnewsbulletin-menu-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-menu-text-color','#232323')); ?>;
		 
		 --phnewsbulletin-header-background: <?php echo esc_html(get_theme_mod('phnewsbulletin-header-bg-color','#fff')); ?>;
		 --phnewsbulletin-header-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-header-content-color','#FFFFFF')); ?>;
		 --phnewsbulletin-header-lighter: <?php echo esc_html(get_theme_mod('phnewsbulletin-header-bg-lighter-color','#222222')); ?>;
		 --phnewsbulletin-top-bar-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-top-bar-text-color','#FFFDEC')); ?>;
		 --phnewsbulletin-top-bar-background: <?php echo esc_html(get_theme_mod('phnewsbulletin-top-bar-bg-color','#3a3a3a')); ?>;
		 
		 --phnewsbulletin-mobile-header-background: <?php echo esc_html(get_theme_mod('phnewsbulletin-header-mobile-bg-color','#000000')); ?>;
		 --phnewsbulletin-mobile-header-text: <?php echo esc_html(get_theme_mod('phnewsbulletin-header-mobile-text-color','#222222')); ?>;
	 }
	 
 </style>
<?php 
}
add_action( 'wp_head', 'phnewsbulletin_colors_override' );

/**
 * Implement Some Additional CSS based on theme mods.
 */
function phnewsbulletin_custom_css() {
	
	if (get_theme_mod('phnewsbulletin-enable-header-gradient', true)) {
		?><style>
			#masthead.style3 #middle-bar {
				background: linear-gradient(90deg, 
					<?php echo esc_attr(get_theme_mod('phnewsbulletin-header-gradient-left','#c90000'))?>,
					<?php echo esc_attr(get_theme_mod('phnewsbulletin-header-gradient-right','#8158ff'))?>
				 );
			}
		</style><?php
	}
	
	if (get_theme_mod('phnewsbulletin-enable-top-bar')) {
		?><style>
			#masthead.style2 #top-bar, #masthead.style3 #top-bar {
				background: <?php echo esc_attr(get_theme_mod('phnewsbulletin-top-bar-bg-color','#000000')); ?>;
			}
		</style><?php
	}
}
add_action( 'wp_head', 'phnewsbulletin_custom_css' );

/**
 * Implement Logo Max Height Limiter
 */
function phnewsbulletin_logo_max_height(){ ?>
 <style>
	 #masthead #site-branding .custom-logo {
		 max-height: <?php echo esc_attr(get_theme_mod('phnewsbulletin-logo-max-height', 90))."px"; ?> !important;
	 }
 </style>
<?php 
}
add_action( 'wp_head', 'phnewsbulletin_logo_max_height' );


/*
* Get Blog Posts Layout for Archive, Home & Tax Pages
*
*/ 
function phnewsbulletin_blog_layout_setting() {
	if (is_search())	
		$setting = get_theme_mod('phnewsbulletin-search-results-layout', 'style4');
	if (is_archive())
		$setting = get_theme_mod('phnewsbulletin-archives-layout', 'style1');
	if (is_home())
		$setting = get_theme_mod('phnewsbulletin-home-layout', 'style3');	
	
	return $setting;
}

function phnewsbulletin_blog_layout_display() {
	$layout = phnewsbulletin_blog_layout_setting();
	
	get_template_part( 'template-parts/blog-style/content', $layout );
}
add_action('phnewsbulletin_blog_layout','phnewsbulletin_blog_layout_display');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Featured Modules
 */
require get_template_directory() . '/inc/display-featured-modules.php';

/**
 * Implement the Multiple Masthead Styles
 */
require get_template_directory() . '/inc/display-masthead.php';


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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


	
// Breadcrumbs
function phnewsbulletin_get_breadcrumbs() {
    echo '<a href="' . esc_url(home_url()) . '" rel="nofollow">' . esc_html__('Home', 'ph-news-bulletin') . '</a>';
    ?>
    <img id="greater-than" src="<?php echo esc_url(get_template_directory_uri() . '/template-parts/single-post/images/greater-than.png'); ?>" />

    <?php if (is_category() || is_single()) {
        echo "<span class='space'></span>";
        echo '<span>' . esc_html__('Category:', 'ph-news-bulletin') . '</span>';
        the_category(' &bull;');
        if (is_single()) { ?>
            <img id="greater-than" src="<?php echo esc_url(get_template_directory_uri() . '/template-parts/single-post/images/greater-than.png'); ?>" />
            <span><?php the_title(); ?></span>
        <?php }
    } elseif (is_page()) {
        echo "<span class='space'></span>";
        echo '<span>' . esc_html__('Page:', 'ph-news-bulletin') . '</span>';
        echo '<span>' . esc_html(get_the_title()) . '</span>';
    } elseif (is_search()) {
        echo "; " . esc_html__('Search Results for...', 'ph-news-bulletin') . " ";
        echo '<em>' . esc_html(get_search_query()) . '</em>';
    }
}


