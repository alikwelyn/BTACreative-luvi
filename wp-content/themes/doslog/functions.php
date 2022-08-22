<?php 

/*
* Theme support
*/
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
        add_theme_support( 'custom-logo', array(
          'height'      => 100,
          'width'       => 200,
          'flex-height' => true,
          'flex-width'  => true,
          'header-text' => array( 'site-title', 'site-description' ),
        ) );
    }
);

/*
* Title and thumbnails
*/
function btax1_title_and_thumbs() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  //add_image_size('index-thumb', 360, 230, true);
  //add_image_size('post-thumb', 751, 400, true);
}
add_action( 'after_setup_theme', 'btax1_title_and_thumbs' );

if (!function_exists( 'wp_render_title_tag' )){
    function btax1_render_title() {
        ?>
        <title><?php wp_title('-', true, 'right'); ?></title>
        <?php
    }
add_action( 'wp_head', 'btax1_render_title' );
}

/*
* Menus
*/
register_nav_menus( array(
    'menu-principal'  => __( 'Menu Principal', 'ab' ),
    'menu-paginas'    => __( 'Menu Páginas', 'ab' )
));

/*
* Call CSS and JS files.
*/
function bta_theme_script_and_style_includer() {
  // css -> head
  wp_enqueue_style( 
    'bootstrap.min',
    get_theme_file_uri( '/assets/css/bootstrap.min.css' )
  );
  wp_enqueue_style( 
    'preloader',
    get_theme_file_uri( '/assets/css/preloader.css' )
  );
	wp_enqueue_style( 
		'main',
		get_theme_file_uri( '/assets/css/main.css' )
  );
	wp_enqueue_style( 
		'responsive',
		get_theme_file_uri( '/assets/css/responsive.css' )
	);

  // js -> footer
  wp_enqueue_script(
		'jquery-slim.min',
		get_template_directory_uri() . '/assets/js/jquery-slim.min.js', array(), false, true 
  );
  wp_enqueue_script(
    'popper.min',
    get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true
  );    
  wp_enqueue_script(
    'bootstrap.min',
    get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true
  );    
  wp_enqueue_script(
    'custom',
    get_template_directory_uri() . '/assets/js/custom.js', array(), false, true
  );    
}
add_action( 'wp_enqueue_scripts', 'bta_theme_script_and_style_includer' );

/*
* Unregister default widgets
*/
function unregister_default_widgets(){
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('WP_Widget_Custom_HTML');
  unregister_widget('WP_Widget_Media_Video');
  unregister_widget('WP_Widget_Media_Image');
  unregister_widget('WP_Widget_Media_Audio');
  unregister_widget('WP_Widget_Media_Gallery');
  unregister_widget('WP_Nav_Menu_Widget');
}
add_action( 'widgets_init', 'unregister_default_widgets' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/*
* Remove dashicons
*/
function bs_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}
add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );

/* 
* Remove comments function
*/

// Removes from admin menu
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'my_remove_admin_menus' );
// Removes from post and pages
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'remove_comment_support', 100 );
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/*
* Blog functions
*/

// Limit characters blog card
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Excerpt readmore change [...] to ...
function excerpt_readmore($more) {
	return '...';
}
add_filter( 'excerpt_more', 'excerpt_readmore' );

// If blog return -> archive, author, category, single, tag and get post
function is_blog () {
  return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Blog pagination
function pagination() {
	global $wp_query;
	if ( $wp_query->max_num_pages <= 1 ) return; 
	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type'  => 'array',
	));
  
	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination-wrap"><ul class="pagination">';
		foreach ( $pages as $page ) {
			echo "<li class='pagination-item'>$page</li>";
		}
		echo '</ul></div>';
	}
}

function custom_pre_get_posts($query)
{
 if ($query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
  $query->set('page_val', get_query_var('paged'));
  $query->set('paged', 0);
 }
}
add_action( 'pre_get_posts', 'custom_pre_get_posts' );

// Blog max tittle length
function max_title_length( $title ) {
  $max = 25;
  if( strlen( $title ) > $max ) {
    return substr( $title, 0, $max ). "&hellip;";
  } else {
    return $title;
  }
}

// Remove <p> from <img> tags
function filter_ptags_on_images( $content ){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'filter_ptags_on_images' );

// Share post social media
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function sharing_post($content) {
  global $post;
  if(is_single()){
    $sb_url = urlencode(get_permalink());
    $sb_title = str_replace( ' ', '%20', get_the_title());
    $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());
    
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;
    $whatsappURL = 'https://api.whatsapp.com/send?text='.$sb_title.' - '.$sb_url.'';
 
    $content .= '<div class="share">';
    $content .= '<h5 class="pull-left">Compartilhe:</h5>';
    $content .= '<ul class="styled-icons">';

    $content .= '<li><a href="'.$facebookURL.'" target="_new" alt="Compartilhar no Facebook"><i class="fa fa-facebook"></i></a></li>';
    $content .= '<li><a href="'. $linkedInURL .'" target="_new" alt="Compartilhar no Facebook"><i class="fa fa-linkedin"></i></a></li>';
    $content .= '<li><a href="'. $whatsappURL .'" target="_new" alt="Compartilhar no Facebook"><i class="fa fa-whatsapp"></i></a></li>';
		$content .= '</ul>';
		$content .= '</div>';
        
    return $content;
    }else{
      return $content;
    }
};
//add_filter( 'the_content', 'sharing_post' );
add_shortcode( 'sharing_post','sharing_post');

// Load more posts listing
function load_more_script() {
  if(!is_front_page()){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'load-more-posts-list', get_stylesheet_directory_uri() . '/assets/js/load-more-posts-list.js', array('jquery') );
  }
}
add_action( 'wp_enqueue_scripts', 'load_more_script' );

function load_more_posts(){
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';
 
  query_posts( $args );
  if( have_posts() ) :
    while( have_posts() ): the_post();
      get_template_part( 'template-parts/blog/list-blog-post', get_post_format() ); 
    endwhile;
  endif;
  die();
}
add_action('wp_ajax_loadmore', 'load_more_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_more_posts');

// Previous and Next Post
function blog_posts_nav(){
  $next_post = get_next_post();
  $prev_post = get_previous_post();
   
  if ( $next_post || $prev_post ) : ?>
   
      <div class="blog-posts-nav">
          <div>
              <?php if (!empty( $prev_post )) : ?>
                  <a href="<?php echo get_permalink( $prev_post ); ?>">
                      <div>
                          <strong>
                              <svg viewBox="0 0 24 24" width="24" height="24">
                                <path d="M13.775,18.707,8.482,13.414a2,2,0,0,1,0-2.828l5.293-5.293,1.414,1.414L9.9,12l5.293,5.293Z"/>
                              </svg>
                              <?php _e( 'Postagem Anterior', 'textdomain' ) ?>
                          </strong>
                          <h4><?php echo get_the_title( $prev_post ); ?></h4>
                      </div>
                  </a>
              <?php endif; ?>
          </div>
          <div>
              <?php if (!empty( $next_post )) : ?>
                  <a href="<?php echo get_permalink( $next_post ); ?>">
                      <div>
                          <strong>
                              <?php _e( 'Próxima postagem', 'textdomain' ) ?>
                              <svg viewBox="0 0 24 24" width="24" height="24">
                                <path d="M10.811,18.707,9.4,17.293,14.689,12,9.4,6.707l1.415-1.414L16.1,10.586a2,2,0,0,1,0,2.828Z"/>
                              </svg>
                          </strong>
                          <h4><?php echo get_the_title( $next_post ); ?></h4>
                      </div>
                  </a>
              <?php endif; ?>
          </div>
      </div>
   
  <?php endif;
}

// Read time
function display_read_time() {
  $content = get_post_field( 'post_content', $post->ID );
  $count_words = str_word_count( strip_tags( $content ) );

  $read_time = ceil($count_words / 250);

  $suffix = " min";
  $read_time_output = $read_time . $suffix;

  return $read_time_output;
}

/*
* Search
*/

// Rewrite url
function search_url_rewrite_rule() {
	if ( is_search() && !empty($_GET['s'])) {
		wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
		exit();
	}	
}
add_action( 'template_redirect', 'search_url_rewrite_rule' );

// Search only posts
function search_only_posts($query) {
  if ($query->is_search) {
      $query->set('post_type', 'post');
  }
  return $query;
}
add_filter( 'pre_get_posts', 'search_only_posts' );


/*
* Wordpress
*/

// Security - Protect from malicious request
global $user_ID; if($user_ID) {
  if(!current_user_can('administrator')) {
      if (strlen($_SERVER['REQUEST_URI']) > 255 ||
          stripos($_SERVER['REQUEST_URI'], "eval(") ||
          stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
          stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
          stripos($_SERVER['REQUEST_URI'], "base64")) {
              @header("HTTP/1.1 414 Request-URI Too Long");
              @header("Status: 414 Request-URI Too Long");
              @header("Connection: Close");
              @exit;
      }
  }
}

// Security - remove wordpress version
function wpbeginner_remove_version() {
  return '';
}
add_filter( 'the_generator', 'wpbeginner_remove_version' );

// Wordpress - Remove comment URL field
function remove_comment_fields($fields) {
  unset($fields['url']);
  return $fields;
}
add_filter( 'comment_form_default_fields','remove_comment_fields' );

// Wordpress - Customize login logo
function custom_login_logo() { 
  echo '<style type="text/css"> 
  h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/imgs/logo.png) !important; width: 200px !important; background-size: 200px !important; } 
  </style>'; 
} 
add_action( 'login_head', 'custom_login_logo' ); 

function custom_admin_logo() { 
  echo '<style type="text/css"> 
  #header-logo { background-image: url('.get_bloginfo('template_directory').'/assets/imgs/logo.png) !important; } 
  </style>'; 
  } 
add_action( 'admin_head', 'custom_admin_logo' ); 

// Wordpress - Change footer text
function remove_footer_admin () { 
  echo 'By <a href="https://btacreative.com.br" target="_new">BTA Creative</a> made with <a href="http://wordpress.org" target="_new">WordPress</a>.'; 
  } 
add_filter( 'admin_footer_text', 'remove_footer_admin' ); 

// Wordpress - Limit to post revisions
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', false);

// Wordpress - Empty trash in 15 days
//define('EMPTY_TRASH_DAYS', 15);

// Wordpress - Autosave interval set to 5 minutes
//define('AUTOSAVE_INTERVAL', 300); 

/*
* Theme Options
*/

// Hide Gutenberg on Theme Options Page
function disable_gutenberg_on_settings_page($can, $post){
  if($post){
    if($post->post_name === "opcoes-do-tema"){
      return false;
    }
  }
  return $can;
}
add_filter( 'use_block_editor_for_post', 'disable_gutenberg_on_settings_page', 5, 2 );

// Hide Theme Options Page From Page Section
function hide_settings_page($query) {
  if ( !is_admin() && !is_main_query() ) {
      return;
  }    
  global $typenow;
  if ($typenow === "page") {
      $settings_page = get_page_by_path("opcoes-do-tema", NULL, "page")->ID;
      $query->set( 'post__not_in', array($settings_page) );    
  }
  return;

}
add_action( 'pre_get_posts', 'hide_settings_page' );

// Add Theme Options Page To Menu
function add_site_settings_to_menu(){
  add_menu_page(  'Opções do Tema', 'Opções do Tema', 'manage_options', 'post.php?post='.get_page_by_path("opcoes-do-tema", NULL, "page")->ID.'&action=edit', '', 'dashicons-admin-tools', 20 );
}
add_action( 'admin_menu', 'add_site_settings_to_menu' );

// Change the active menu item
function higlight_custom_settings_page($file) {
  global $parent_file;
  global $pagenow;
  global $typenow, $self;

  $settings_page = get_page_by_path("opcoes-do-tema", NULL, "page")->ID;

  if ($pagenow === "post.php" && (int)$_GET["post"] === $settings_page) {
      $file = "post.php?post=$settings_page&action=edit";
  }
  return $file;
}
add_filter('parent_file', 'higlight_custom_settings_page');

function edit_site_settings_title() {
  global $post, $title, $action, $current_screen;
  if( isset( $current_screen->post_type ) && $current_screen->post_type === 'page' && $action == 'edit' && $post->post_name === "opcoes-do-tema") {
      $title = $post->post_title.' - '.get_bloginfo('name');           
  }
  return $title;  
}

add_action( 'admin_title', 'edit_site_settings_title' );