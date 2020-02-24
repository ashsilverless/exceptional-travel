<?php

/* ~~~~~~~~~~ Add options page to Wordpress with ACF ~~~~~~~~~ */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => get_bloginfo('name'),
        'menu_title'    => get_bloginfo('name'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Socials',
        'menu_title'    => 'Socials',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Associated',
        'menu_title'    => 'Associated',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Call to action',
        'menu_title'    => 'Call to action',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Newsletter',
        'menu_title'    => 'Newsletter',
        'parent_slug'   => 'theme-general-settings',
    ));

	acf_add_options_page(array(
		'page_title' 	=> 'Month Thumbnails',
		'menu_title'	=> 'Month Thumbnails',
		'menu_slug' 	=> 'month-thumbs',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

 	acf_add_options_page(array(
		'page_title' 	=> 'Destination Thumbnails',
		'menu_title'	=> 'Destination Thumbnails',
		'menu_slug' 	=> 'destination-thumbs',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

 	acf_add_options_page(array(
		'page_title' 	=> 'Type Thumbnails',
		'menu_title'	=> 'Type Thumbnails',
		'menu_slug' 	=> 'type-thumbs',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


/* ~~~~~~~~~~ Add custom Wordpress navigation ~~~~~~~~~~ */

if(function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
            'main_navigation' => 'Main Navigation',
			'main_footer_navigation' => 'Main Footer Navigation'
		)
	);
}


/* ~~~~~~~~~~ Widget areas ~~~~~~~~~~ */

// if ( ! function_exists( 'wpteam_sidebar_widgets' ) ) :
// 	function wpteam_sidebar_widgets() {
// 		register_sidebar(array(
// 	  		'id' => 'sidebar-widgets',
// 	  		'name' => __( 'Sidebar widgets', 'wpteam' ),
// 	  		'description' => __( 'Drag widgets to this sidebar container.', 'wpteam' ),
// 	  		'before_widget' => '<div class="col-md-3"><section id="%1$s" class="widget %2$s">',
// 	  		'after_widget' => '</section></div>',
// 	  		'before_title' => '<h3 class="widget__title">',
// 	  		'after_title' => '</h3>',
// 		));

// 		register_sidebar(array(
// 	  		'id' => 'footer-widgets',
// 	  		'name' => __( 'Footer widgets', 'wpteam' ),
// 	  		'description' => __( 'Drag widgets to this footer container', 'wpteam' ),
// 	  		'before_widget' => '<div class="col-md-3"><section id="%1$s" class="widget %2$s">',
// 	  		'after_widget' => '</section></div>',
// 	  		'before_title' => '<h3 class="widget__title">',
// 	  		'after_title' => '</h3>',
// 		));
// 	}
// 	add_action( 'widgets_init', 'wpteam_sidebar_widgets' );
// endif;


/* ~~~~~~~~~~ MCE Add Button (Shortcodes) ~~~~~~~~~~ */

if ( ! function_exists( 'wpteam_add_mce_button' ) ) {

	/**
	 * Hooks your functions into the correct filters
	 * @return array
	 */

	function wpteam_add_mce_button() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( 'true' === get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', 'wpteam_add_tinymce_plugin' );
			add_filter( 'mce_buttons', 'wpteam_register_mce_button' );
		}
	}

	add_action( 'admin_head', 'wpteam_add_mce_button' );
}

if ( ! function_exists( 'wpteam_add_tinymce_plugin' ) ) {
	/**
	 * Register new button in the editor
	 * @return array
	 */

	function wpteam_add_tinymce_plugin( $plugin_array ) {
		$plugin_array['wpteam_mce_button'] = get_template_directory_uri() . '/assets/scripts/core/mce-button.js';

		return $plugin_array;
	}
}

if ( ! function_exists( 'wpteam_register_mce_button' ) ) {
	/**
	 * Register new button in the editor
	 * @return array
	 */

	function wpteam_register_mce_button( $buttons ) {
		array_push( $buttons, 'wpteam_mce_button' );

		return $buttons;
	}
}


/* ~~~~~~~~~~ Specific image dimensions ~~~~~~~~~~ */

add_image_size( 'gallery-image', '970', '400', true);
add_image_size( 'gallery-image-mobile', '470', '220', true);
add_image_size( 'post-gallery-image', '370', '240', true);


/* ~~~~~~~~~~ Featured Images ~~~~~~~~~~ */

add_theme_support( 'post-thumbnails', array( 'post' ) );
add_theme_support( 'post-thumbnails', array( 'camp' ) );
add_theme_support( 'post-thumbnails', array( 'page' ) );


/* ~~~~~~~~~~ Protection for e-mail addresses in html ~~~~~~~~~~ */

add_filter('acf/load_value', 'eae_encode_emails');


/* ~~~~~~~~~~ OG Image fix ~~~~~~~~~~ */

add_filter('wpseo_pre_analysis_post_content', 'wpteam_opengraph_content');
function wpteam_opengraph_content($val) {
	return preg_replace("/<img[^>]+>/i", "", $val);
}


/* ~~~~~~~~~~ Turning off REST API ~~~~~~~~~~ */

add_filter('rest_authentication_errors', 'disable_rest_api', 99);
function disable_rest_api() {
	return new WP_Error('rest_api_disabled', 'REST API disables', array('status' => 403));
}


/* ~~~~~~~~~~ ACF Google Maps API Key ~~~~~~~~~~ */

function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyAUpwiiq8Z3GvBQcL_QEnvnGB7HvIAL09I');
}

add_action('acf/init', 'my_acf_init');


/* ~~~~~~~~~~ Init Sidebar ~~~~~~~~~~ */

// add_action( 'widgets_init', 'wpteam_widgets_init' );
// function wpteam_widgets_init() {
//     register_sidebar(
//         array(
//             'name' => __( 'Blog', 'wpteam' ),
//             'id' => 'sidebar-blog',
//             'description' => __( 'Widgets in this section are displayed on blog pages.', 'wpteam' ),
//             'before_widget' => '<div id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h2 class="widget__title">',
//         'after_title'   => '</h2>',
//         )
//     );
// }


/* ~~~~~~~~~~ Removing standard posts from WP Admin ~~~~~~~~~~ */

// add_action( 'admin_menu', 'my_remove_menu_pages' );

// function my_remove_menu_pages() {
//     remove_menu_page('edit.php');
// }


/* ~~~~~~~~~~ Hide ACF ~~~~~~~~~~ */

// add_filter('acf/settings/show_admin', '__return_false');


/* ~~~~~~~~~~ Check featured image size ~~~~~~~~~~ */

add_action('transition_post_status', 'check_featured_image_size_after_save', 10, 3);

function check_featured_image_size_after_save($new_status, $old_status, $post){
    $run_on_statuses = array('publish', 'pending', 'future');

    if(!in_array($new_status, $run_on_statuses)) return;

    $post_id = $post->ID;

    if ( wp_is_post_revision( $post_id ) ) return; //not sure about this.. but apparently save is called twice when this happens

    $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "Full" );

    if(!$image_data) return; //separate message if no image at all. (I use a plugin for this)

    $image_width = $image_data[1];
    $image_height = $image_data[2];

    $min_width = 850;
    $min_height = 450;

    if($image_width < $min_width || $image_height < $min_height) {
    // Being safe, honestly $old_status shouldn't be in $run_on_statuses... it wouldn't save the first time!
        $reverted_status = in_array($old_status, $run_on_statuses) ? 'draft' : $old_status;

        wp_update_post(array(
            'ID' => $post_id,
            'post_status' => $reverted_status,
        ));

        $back_link = admin_url("post.php?post=$post_id&action=edit");
        wp_die("Featured Image not large enough, must be at least ${min_width}x$min_height. Reverting status to '$reverted_status'.<br><br><a href='$back_link'>Go Back</a>");
    }
}


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* ~~~~~~~~~~ Required functions ~~~~~~~~~ */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    require_once('inc/enqueue-scripts.php');
    // require_once('inc/required-plugins-init.php');
    require_once('inc/bs4navwalker.php');
    require_once('inc/custom-functions.php');
    require_once('inc/shortcodes.php');

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* ~~~~~~~~~~ Add FIlters To Admin View ~~~~~~~~~ */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */


function filter_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'camp' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'destinations', 'types', 'months');

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_by_taxonomies' , 10, 2);

function so980_sort_terms_alphabetically($a,$b) {
    return $a->slug > $b->slug;//using 'slug' as sorting order
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

//===Add meta to images===

//get attachment meta
if ( !function_exists('wp_get_attachment') ) {
    function wp_get_attachment( $attachment_id )
    {
        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
}

/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	}
}

function add_taxonomy_to_single( $classes ) {
    if ( is_single() ) {
        global $post;
        $my_terms = get_the_terms( $post->ID, 'types' );
        if ( $my_terms && ! is_wp_error( $my_terms ) ) {
            $classes[] = $my_terms[0]->slug;
        }
        return $classes;
    }
}
add_filter( 'body_class', 'add_taxonomy_to_single' );



?>
