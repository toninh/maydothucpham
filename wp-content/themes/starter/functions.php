<?php
/**
 * cactus functions and definitions
 *
 * @package cactus
 */
	include(TEMPLATEPATH . '/inc/breadcrumb.php');
// Changes location to logo admin
	function wpc_url_login(){
	return home_url(); 
	}

	add_filter('login_headerurl', 'wpc_url_login');	
//Redirect after login
 		add_filter( 'login_redirect', 'login_redirect', 10, 3 );
		function login_redirect( $redirect_to, $request, $user ) {
			if ( is_array( $user->roles ) ) {
			if ( is_array( $user->roles ) ) {
				if ( in_array( 'administrator', $user->roles ) )
					return home_url( '/wp-admin/' );
				else
					return home_url();
			}
		} }
//  logo admin wordpress
	function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/logo.css' ); // duong dan den file css moi
	}
	add_action('login_head', 'login_css');
/**
 * Core features
 */
require get_template_directory() . '/inc/core/cactus-core.php';

/**
 * Data functions
 */
require get_template_directory() . '/inc/core/data-functions.php';

/**
 * Uncomment below line in Release mode. theme-options.php is generated using Export feature in Option Tree
 */
require get_template_directory() . '/inc/theme-options.php'; 

/**
 * Add metadata (meta-boxes) for all post types
 */
require get_template_directory() . '/inc/metadata.php'; 

/**
 * Require Shortcode
 */
require get_template_directory() . '/inc/shortcodes/shortcode.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'cactus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cactus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cactus, use a find and replace
	 * to change 'cactus' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cactus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'cactus' ),
		'menu-danhmuc' => __( 'Menu DanhMuc', 'cactus' )
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cactus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // cactus_setup
add_action( 'after_setup_theme', 'cactus_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cactus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'cactus' ),
		'id'            => 'main-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cactus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cactus_scripts() {	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fonts/css/font-awesome.min.css');
	wp_enqueue_style( 'isotop-port', get_template_directory_uri() . '/css/isotop-port.css');
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/megnor/owl.carousel.css');
	wp_enqueue_style( 'shadowbox', get_template_directory_uri() . '/css/megnor/shadowbox.css');
	wp_enqueue_style( 'shortcode_style', get_template_directory_uri() . '/css/megnor/shortcode_style.css');
	wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/css/megnor/animate.min.css');
	wp_enqueue_style( 'tm_flexslider', get_template_directory_uri() . '/css/megnor/tm_flexslider.css');
	wp_enqueue_style( 'tm_elastic_slider', get_template_directory_uri() . '/css/megnor/tm_elastic_slider.css');
	wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css');
	wp_enqueue_style( 'front', get_template_directory_uri() . '/css/front.css');
	wp_enqueue_style( 'front', get_template_directory_uri() . '/fonts/css/font-awesome.css');
	wp_enqueue_style( 'cactus-style', get_stylesheet_uri() );
	/**
	 * Register Google Font
	 */
/* 	$google_font = ot_get_option('google_font');
	if($google_font == 'on'){
		$body_font = ot_get_option('body_font',''); // for example, Playfair+Display:900
		if($body_font){
			$font_name = get_google_font_name($body_font);
			wp_enqueue_style( 'google-font-' . $font_name, 'http://fonts.googleapis.com/css?family=' . $body_font);
		}
	} */
	
	/**
	 * Right To Left CSS
	 */
	if(ot_get_option('rtl') == 'on'){
		wp_enqueue_style( 'rtl', get_template_directory_uri() . '/rtl.css');
	}
	
	/* This CSS should be enqueued last */
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css.php');
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/responsive.css');
	
	wp_enqueue_script( 'jquery'); // use default jQuery packed inside WordPress. If newer version is needed, this should be dequeue and enqueue again
	
	//wp_enqueue_script( 'bootstrap', get_template_directory_uri() . 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '', false );
	
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array(), '', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'jquery.jqtransform', get_template_directory_uri() . '/js/megnor/jquery.jqtransform.js', array(), '', true );
	wp_enqueue_script( 'jquery.jqtransform.script', get_template_directory_uri() . '/js/megnor/jquery.jqtransform.script.js', array(), '', true );
	wp_enqueue_script( 'jquery.custom.min', get_template_directory_uri() . '/js/megnor/jquery.custom.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.isotope.min', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '', true );
	wp_enqueue_script( 'megnor.min', get_template_directory_uri() . '/js/megnor/megnor.min.js', array(), '', true );
	wp_enqueue_script( 'carousel.min', get_template_directory_uri() . '/js/megnor/carousel.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.inview', get_template_directory_uri() . '/js/megnor/jquery.inview.js', array(), '', true );
	wp_enqueue_script( 'jquery.easypiechart.min', get_template_directory_uri() . '/js/megnor/jquery.easypiechart.min.js', array(), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/megnor/custom.js', array(), '', true );
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/js/megnor/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.formalize.min', get_template_directory_uri() . '/js/megnor/jquery.formalize.min.js', array(), '', true );
	wp_enqueue_script( 'respond.min', get_template_directory_uri() . '/js/megnor/respond.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.validate', get_template_directory_uri() . '/js/megnor/jquery.validate.js', array(), '', true );
	wp_enqueue_script( 'shadowbox', get_template_directory_uri() . '/js/megnor/shadowbox.js', array(), '', true );
	wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/js/megnor/jquery.flexslider.js', array(), '', true );
	wp_enqueue_script( 'jquery.eislideshow', get_template_directory_uri() . '/js/megnor/jquery.eislideshow.js', array(), '', true );
	wp_enqueue_script( 'waypoints.min', get_template_directory_uri() . '/js/megnor/waypoints.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.megamenu', get_template_directory_uri() . '/js/megnor/jquery.megamenu.js', array(), '', true );
	wp_enqueue_script( 'easyResponsiveTabs', get_template_directory_uri() . '/js/megnor/easyResponsiveTabs.js', array(), '', true );
	wp_enqueue_script( 'jstree.min', get_template_directory_uri() . '/js/megnor/jstree.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/megnor/jquery.easing.1.3.js', array(), '', true );
	//wp_enqueue_script( 'jquery.eislideshow', get_template_directory_uri() . '/js/megnor/jquery.eislideshow.js', array(), '', true );
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '', true );
	
	//wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true );
	
//	wp_enqueue_script( 'cactus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'cactus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// code to embed the java script file that makes the Ajax request
//	wp_enqueue_script( 'ajax-request', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ) );
   
	// main theme javascript code
	//wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/template.js', array( 'jquery' ) );
	
	// code to declare the URL to the file handling the AJAX request <p></p>
	$js_params = array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) );
	global $wp_query, $wp;
	$js_params['query_vars'] = $wp_query->query_vars;
	$js_params['current_url'] =  home_url($wp->request);
	
	wp_localize_script( 'ajax-request', 'cactus', $js_params  );
	
}
add_action( 'wp_enqueue_scripts', 'cactus_scripts' );

/**
 * Style for admin
 */
function cactus_admin_styles() {	
	wp_enqueue_style( 'style', get_template_directory_uri().'/inc/shortcodes/css/style-admin.css');	
}
add_action('admin_print_styles', 'cactus_admin_styles');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom WP Footer
 */
add_action('wp_footer','cactus_wp_foot',100);
if(!function_exists('cactus_wp_foot')){
	function cactus_wp_foot(){
		// write out custom code
		$custom_code = ot_get_option('custom_code','');
		echo $custom_code;
	}
}

/*
 * Get label of an option in Option Tree / Theme Options
 */
function get_setting_label_by_id( $id ) {
  if ( empty( $id ) )
    return false;
  $settings = get_option( 'option_tree_settings' );
  if ( empty( $settings['settings'] ) )
    return false;
  foreach( $settings['settings'] as $setting ) {
    if ( $setting['id'] == $id && isset( $setting['label'] ) ) {
      return $setting['label'];
    }
  }
}

/**
 * Print out social accounts link.
 */
if(!function_exists('cactus_print_social_accounts')){
	function cactus_print_social_accounts(){
		/* below are default supported social networks. To support more, add the name of theme option in the array */
		$accounts = array('facebook','youtube','twitter','linkedin','tumblr','google-plus','pinterest','flickr','envelope','rss');
		/* this HTML uses Font Awesome icons */
		?>
		<ul class='social-accounts'>
		<?php
		foreach($accounts as $account){
			$url = ot_get_option($account,'');
			$label = get_setting_label_by_id($account);
			if($url){
				if($account == 'envelope'){
					// this is email account, so use mailto protocol
					$url = 'mailto:' . $url;
				}
			?>
				<li><a <?php echo ($account == 'envelope' ? '' : "target='_blank'");?> href="<?php echo $url;?>" title='<?php echo $label;?>'><i class="fa fa-<?php echo $account;?>"></i></a></li>
			<?php }?>
			<?php
		}
		?>
		</ul>
		<?php
	}
}


/**
 * Display Social Share buttons for FaceBook, Twitter, LinkedIn, Google+, Thumblr, Pinterest, Email
 */
if(!function_exists('cactus_print_social_share')){
function cactus_print_social_share($id = false){ 
	if(!$id){ 
		$id = get_the_ID(); 
	}
?>
  		<?php if(ot_get_option('sharing_facebook')=='on'){ ?>
	  		<li>
	  		 	<a class="trasition-all" title="<?php _e('Share on Facebook','cactusthemes');?>" href="#" target="_blank" rel="nofollow" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+'<?php echo urlencode(get_permalink($id)); ?>','facebook-share-dialog','width=626,height=436');return false;"><i class="fa fa-facebook"></i>
	  		 	</a>
	  		</li>
    	<?php }
		
		if(ot_get_option('sharing_twitter')=='on'){ ?>
	    	<li>
		    	<a class="trasition-all" href="#" title="<?php _e('Share on Twitter','cactusthemes');?>" rel="nofollow" target="_blank" onclick="window.open('http://twitter.com/share?text=<?php echo urlencode(get_the_title($id)); ?>&url=<?php echo urlencode(get_permalink($id)); ?>','twitter-share-dialog','width=626,height=436');return false;"><i class="fa fa-twitter"></i>
		    	</a>
	    	</li>
    	<?php }
		
		if(ot_get_option('sharing_linkedIn')=='on'){ ?>
			   	<li>
			   	 	<a class="trasition-all" href="#" title="<?php _e('Share on LinkedIn','cactusthemes');?>" rel="nofollow" target="_blank" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink($id)); ?>&title=<?php echo urlencode(get_the_title($id)); ?>&source=<?php echo urlencode(get_bloginfo('name')); ?>','linkedin-share-dialog','width=626,height=436');return false;"><i class="fa fa-linkedin"></i>
			   	 	</a>
			   	</li>
	   	<?php }
		
		if(ot_get_option('sharing_tumblr')=='on'){ ?>
		   	<li>
		   	   <a class="trasition-all" href="#" title="<?php _e('Share on Tumblr','cactusthemes');?>" rel="nofollow" target="_blank" onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink($id)); ?>&name=<?php echo urlencode(get_the_title($id)); ?>','tumblr-share-dialog','width=626,height=436');return false;"><i class="fa fa-tumblr"></i>
		   	   </a>
		   	</li>
    	<?php }
		
		if(ot_get_option('sharing_google')=='on'){ ?>
	    	 <li>
	    	 	<a class="trasition-all" href="#" title="<?php _e('Share on Google Plus','cactusthemes');?>" rel="nofollow" target="_blank" onclick="window.open('https://plus.google.com/share?url=<?php echo urlencode(get_permalink($id)); ?>','googleplus-share-dialog','width=626,height=436');return false;"><i class="fa fa-google-plus"></i>
	    	 	</a>
	    	 </li>
    	 <?php }
		 
		 if(ot_get_option('sharing_pinterest')=='on'){ ?>
	    	 <li>
	    	 	<a class="trasition-all" href="#" title="<?php _e('Pin this','cactusthemes');?>" rel="nofollow" target="_blank" onclick="window.open('//pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($id)) ?>&media=<?php echo urlencode(wp_get_attachment_url( get_post_thumbnail_id($id))); ?>&description=<?php echo urlencode(get_the_title($id)) ?>','pin-share-dialog','width=626,height=436');return false;"><i class="fa fa-pinterest"></i>
	    	 	</a>
	    	 </li>
    	 <?php }
		 
		 if(ot_get_option('sharing_email')=='on'){ ?>
	    	<li>
		    	<a class="trasition-all" href="mailto:?subject=<?php echo get_the_title($id) ?>&body=<?php echo urlencode(get_permalink($id)) ?>" title="<?php _e('Email this','cactusthemes');?>"><i class="fa fa-envelope"></i>
		    	</a>
		   	</li>
	   	<?php }
	} 
}

/**
 * Ajax page navigation
 */

// when the request action is 'load_more', the cactus_ajax_load_next_page() will be called
add_action( 'wp_ajax_load_more', 'cactus_ajax_load_next_page' );
add_action( 'wp_ajax_nopriv_load_more', 'cactus_ajax_load_next_page' );

function cactus_ajax_load_next_page() {
    // Get current page
	$page = $_POST['page'];
	
	// number of published sticky posts
	$sticky_posts = get_sticky_posts_count();
	
	// current query vars
	$vars = $_POST['vars'];
	
	// convert string value into corresponding data types
	foreach($vars as $key=>$value){
		if(is_numeric($value)) $vars[$key] = intval($value);
		if($value == 'false') $vars[$key] = false;
		if($value == 'true') $vars[$key] = true;
	}
	
	// item template file
	$template = $_POST['template'];

	// Return next page
	$page = intval($page) + 1;
	
	$posts_per_page = get_option('posts_per_page');
	
	if($page == 0) $page = 1;
	$offset = ($page - 1) * $posts_per_page;
	/*
	 * This is confusing. Just leave it here to later reference
	 *
	 
	if(!$vars['ignore_sticky_posts']){
		$offset += $sticky_posts;
	}
	 *
	 */

	
	// get more posts per page than necessary to detect if there are more posts 
	$args = array('post_status'=>'publish','posts_per_page' => $posts_per_page + 1,'offset' => $offset);
	$args = array_merge($vars,$args);
	
	// remove unnecessary variables
	unset($args['paged']);
	unset($args['p']);
	unset($args['page']);
	unset($args['pagename']); // this is neccessary in case Posts Page is set to a static page

	$query = new WP_Query($args);
	

	$idx = 0;
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$idx = $idx + 1;
			if($idx < $posts_per_page + 1)
				get_template_part( $template, get_post_format() );
		}
		
		if($query->post_count <= $posts_per_page){
			// there are no more posts
			// print a flag to detect
			echo '<div class="invi no-posts"><!-- --></div>';
		}
	} else {
		// no posts found
	}

	/* Restore original Post Data */
	wp_reset_postdata();
	
	die('');
}
// Get and Set post view count
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function pagination($pages = '', $range = 12)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
		//<span>Page ".$paged." of ".$pages."</span>
         echo "<ul class=\"page-numbers\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&larr; First</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a class=\"prev page-numbers\" href='".get_pagenum_link($paged - 1)."'>&larr;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"page-numbers current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a class=\"next page-numbers\" href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
         echo "</ul>\n";
     }
}
function paginations($pages = '', $range = 12)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
		//<span>Page ".$paged." of ".$pages."</span>
        // echo "<ul class=\"page-numbers\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&larr; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class=\"prev page-numbers\" href='".get_pagenum_link($paged - 1)."'><i class=\"fa fa-angle-left\"></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"page-numbers current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a class=\"next page-numbers\" href=\"".get_pagenum_link($paged + 1)."\"><i class=\"fa fa-angle-right\"></i></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        // echo "</ul>\n";
     }
}
add_post_type_support( 'san_pham', 'comments' );
?>