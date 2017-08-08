<?php
if (!function_exists('titan_setup')):
    function titan_setup()
    {
        load_theme_textdomain('titan', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'titan'),
            'social' => esc_html__('Social Menu', 'titan'),
            'mobile' => esc_html__('Mobile Menu', 'titan')
        ));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link'
        ));
    }
endif;
add_action('after_setup_theme', 'titan_setup');
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}
function titan_content_width()
{
    $GLOBALS['content_width'] = apply_filters('titan_content_width', 640);
}
add_action('after_setup_theme', 'titan_content_width', 0);
function titan_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'titan'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
// add_action( 'init', 'create_post_type' );
// function create_post_type() {
//   register_post_type( 'ver_1_custom_post',
//     array(
//       'labels' => array(
//         'name' => __( 'Version 1 Posts' ),
//         'singular_name' => __( 'Version 1 Post' ),
//         'add_new_item'          =>   __( 'Add New Custom Post'),
//         'all_items'             =>   __( 'All Custom Posts'),
//         'edit_item'             =>   __( 'Edit Custom Post'),
//         'new_item'              =>   __( 'New Custom Post'),
//         'view_item'             =>   __( 'View Custom Post'),
//         'not_found'             =>   __( 'No Custom Posts Found'),
//         'not_found_in_trash'    =>   __( 'No Custom Posts Found in Trash')
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'rewrite' => array('slug' => 'version_1_posts'),
//     )
//   );
//   register_post_type( 'ver_2_custom_post',
//     array(
//       'labels' => array(
//         'name' => __( 'Version 2 Posts' ),
//         'singular_name' => __( 'Version 2 Post' ),
//         'add_new_item'          =>   __( 'Add New Custom Post'),
//         'all_items'             =>   __( 'All Custom Posts'),
//         'edit_item'             =>   __( 'Edit Custom Post'),
//         'new_item'              =>   __( 'New Custom Post'),
//         'view_item'             =>   __( 'View Custom Post'),
//         'not_found'             =>   __( 'No Custom Posts Found'),
//         'not_found_in_trash'    =>   __( 'No Custom Posts Found in Trash')
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'rewrite' => array('slug' => 'version_2_posts'),
//     )
//   );
//   register_post_type( 'ver_3_custom_post',
//     array(
//       'labels' => array(
//         'name' => __( 'Version 3 Posts' ),
//         'singular_name' => __( 'Version 3 Post' ),
//         'add_new_item'          =>   __( 'Add New Custom Post'),
//         'all_items'             =>   __( 'All Custom Posts'),
//         'edit_item'             =>   __( 'Edit Custom Post'),
//         'new_item'              =>   __( 'New Custom Post'),
//         'view_item'             =>   __( 'View Custom Post'),
//         'not_found'             =>   __( 'No Custom Posts Found'),
//         'not_found_in_trash'    =>   __( 'No Custom Posts Found in Trash')
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'rewrite' => array('slug' => 'version_3_posts'),
//     )
//   );
// }

// create shortcode to for Custom Post Type
add_shortcode( 'custom_posts', 'custom_posts_func' );
function custom_posts_func( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'custom_posts',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'date',
    ) );
    if ( $query->have_posts() ) { ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                  <p><b><?php the_title(); ?></b></p>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 mb2">
                <p><?php
      						the_content( sprintf(
      						) );
                  ?></p>
                </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

add_action('widgets_init', 'titan_widgets_init');
function login_css()
{
    wp_enqueue_style('login_css', get_template_directory_uri() . '/inc/login.css');
}
add_action('login_head', 'login_css');
function titan_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'titan_login_logo_url');
function titan_login_logo_url_title()
{
    return home_url();
}
add_filter('login_headertitle', 'titan_login_logo_url_title');
function the_breadcrumb()
{
    $separator        = '&gt;';
    $breadcrums_id    = 'breadcrumbs';
    $breadcrums_class = 'breadcrumbs';
    $home_title       = 'Homepage';
    $custom_taxonomy  = 'product_cat';
    global $post, $wp_query;
    if (!is_front_page()) {
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
        if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
        } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {
            $post_type = get_post_type();
            if ($post_type != 'post') {
                $post_type_object  = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
        } else if (is_single()) {
            $post_type = get_post_type();
            if ($post_type != 'post') {
                $post_type_object  = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            $category = get_the_category();
            if (!empty($category)) {
                $last_category   = end(array_values($category));
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                $cat_parents     = explode(',', $get_cat_parents);
                $cat_display     = '';
                foreach ($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
            }
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }
            if (!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else if (!empty($cat_id)) {
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
        } else if (is_category()) {
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        } else if (is_page()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $anc = array_reverse($anc);
                foreach ($anc as $ancestor) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                echo $parents;
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if (is_tag()) {
            $term_id       = get_query_var('tag_id');
            $taxonomy      = 'post_tag';
            $args          = 'include=' . $term_id;
            $terms         = get_terms($taxonomy, $args);
            $get_term_id   = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
        } elseif (is_day()) {
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
        } else if (is_month()) {
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if (is_year()) {
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if (get_query_var('paged')) {
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</strong></li>';
        } else if (is_search()) {
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif (is_404()) {
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ul>';
    }
}
// function enqueue_our_required_stylesheets()
// {
  //  wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
// }
// add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');
function my_scripts_enqueue()
{
    wp_register_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(
        'jquery'
    ), NULL, true);
    wp_register_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', false, NULL, 'all');
    wp_register_script('fontawesome-js', 'https://use.fontawesome.com/843cfd4939.js', array(
        'jquery'
    ), NULL, true);
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_script('fontawesome-js');

}
add_action('wp_enqueue_scripts', 'my_scripts_enqueue');
function titan_scripts()
{
    wp_enqueue_style('titan-style', get_stylesheet_uri());
    wp_enqueue_script('titan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
    wp_enqueue_script('titan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'titan_scripts');
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
function themeslug_remove_hentry($classes)
{
    if (is_page()) {
        $classes = array_diff($classes, array(
            'hentry'
        ));
    }
    return $classes;
}
add_filter('post_class', 'themeslug_remove_hentry');
add_filter('post_class', 'remove_hentry_function', 20);
function remove_hentry_function($classes)
{
    if (($key = array_search('hentry', $classes)) !== false)
        unset($classes[$key]);
    return $classes;
}
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() {
// Paste your Google Analytics code here
}

// Gravity Forms Filter
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
add_filter( 'gform_confirmation_anchor', '__return_true' );

// Remove Auto P
function remove_p_on_pages() {
   if ( is_page() ) {
      remove_filter( 'the_content', 'wpautop' );
       remove_filter( 'the_excerpt', 'wpautop' );
   }
}
add_action( 'wp_head', 'remove_p_on_pages' );

// Remove the Visual Editor on Pages
function remove_visual_on_pages($remove) {
 global $post_type;

   if ('page' == $post_type)
       return false;
   return $remove;
}

add_filter( 'user_can_richedit', 'remove_visual_on_pages');
