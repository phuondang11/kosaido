<?php

// ================ DEFAULT SETTING ===================
//add Featured Image
add_theme_support( 'post-thumbnails' );

//remove_filter( 'the_excerpt', 'wpautop' );
/*increa limit upload file*/
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );
/*--add feature images--*/
//ADD MENU
if ( function_exists( 'register_nav_menu' ) ) {
    register_nav_menu( 'main-menu', 'Main Menu' );
}
//EXCERPT
add_post_type_support( 'page', 'excerpt' );

function close_tags( $text ) {
    $patt_open = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
    $patt_close = "%((?<=</)([^>]+)(?=>))%";
    if ( preg_match_all( $patt_open, $text, $matches ) ) {
        $m_open = $matches[ 1 ];
        if ( !empty( $m_open ) ) {
            preg_match_all( $patt_close, $text, $matches2 );
            $m_close = $matches2[ 1 ];
            if ( count( $m_open ) > count( $m_close ) ) {
                $m_open = array_reverse( $m_open );
                foreach ( $m_close as $tag )$c_tags[ $tag ]++;
                foreach ( $m_open as $k => $tag )
                    if ( $c_tags[ $tag ]-- <= 0 )$text .= '</' . $tag . '>';
            }
        }
    }
    return $text;
}

function content_by_id( $num, $id ) {
    $post_content = get_post( $id );
    $theContent = $post_content->post_content;
    $output = preg_replace( '/<img[^>]+./', '', $theContent );
    $limit = $num + 1;
    $content = explode( ' ', $output, $limit );
    array_pop( $content );
    $content = implode( " ", $content );
    $content = strip_tags( $content, '<p><a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>' );
    $a = close_tags( $content );
    $b = $a . " ...";
    return $b;
} //REMOVE NEXT ENTRIES

require_once( dirname( __FILE__ ) . '/includes/shortcode.php' );
require_once( dirname( __FILE__ ) . '/includes/create_posttype.php' );
require_once( dirname( __FILE__ ) . '/includes/add_image_size.php' );
add_image_size( 'img_480x300', 480, 300, true );
add_image_size( 'img_1050x700', 1050, 700, true );
add_image_size( 'img_330x256', 330, 256, true );
add_image_size( 'img_1920x850', 1920, 850, true );
add_image_size( 'img_1280x824', 1280, 824, true );

function theme_sources() {
    // cancel jquery of wordpress
    // wp_deregister_script('jquery');
    // ========== CSS ==========
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'style', get_theme_file_uri( '/css/styles.css' ) );
        wp_enqueue_style( 'responsive', get_theme_file_uri( '/css/responsive.css' ) );
    }else{
	    wp_enqueue_style( 'style', get_theme_file_uri( '/css/styles.css' ) );
        wp_enqueue_style( 'responsive', get_theme_file_uri( '/css/responsive.css' ) );
        wp_enqueue_style( 'under', get_theme_file_uri( '/css/under.css' ) );
        wp_enqueue_style( 'under_responsive', get_theme_file_uri( '/css/under_responsive.css' ) );
    }

    // ========== END CSS ==========
	wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/js/jquery.js' ), array(), '', 1 );
	wp_enqueue_script( 'slick-min-js', get_theme_file_uri( '/js/slick.min.js' ), array(), '', 1 );
    // JAVASCRIPT
    if ( is_front_page() || is_home() ) {
        wp_enqueue_script( 'top-js', get_theme_file_uri( '/js/top.js' ), array(), '', 1 );
    }

    wp_enqueue_script( 'sweetlink', get_theme_file_uri( '/js/sweetlink.js' ), array(), '', 1 );
	wp_enqueue_script( 'common-js', get_theme_file_uri( '/js/common.js' ), array(), '', 1 );
}
add_action( 'wp_enqueue_scripts', 'theme_sources' );
// ================ END DEFAULT SETTING ===================
function wpb_set_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
function wpb_get_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return 0;
    }
    return $count;
}
function content_number( $num, $content ) {
    $a = strip_tags( $content );
    if ( strlen( $a ) > $num )
    {
        $a = mb_substr( $a, 0, $num ) . '…';
    }
    return $a;
}

function register_column_tag_taxonomy() {
    $labels = array(
        'name'              => 'Column Tags',
        'singular_name'     => 'Column Tag',
        'search_items'      => 'Search Tags',
        'all_items'         => 'All Tags',
        'edit_item'         => 'Edit Tag',
        'update_item'       => 'Update Tag',
        'add_new_item'      => 'Add New Tag',
        'new_item_name'     => 'New Tag Name',
        'menu_name'         => 'Tags',
    );

    register_taxonomy('column-tag', 'column', array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'public' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'column-tag'),
    ));
}
add_action('init', 'register_column_tag_taxonomy');

// page Thanks
add_action( 'wp_footer', 'wpm_redirect_cf7' );
function wpm_redirect_cf7() {
    if ( is_page('contact') || is_page('job-application') ) {
        ?>
        <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {
            var currentPath = window.location.pathname;
            var thanksUrl = currentPath + 'thanks/';
            window.location.href = thanksUrl;
        }, false);
        </script>
        <?php
    }
}

// add bogo post type
function my_localizable_post_types( $localizable ) {
    $args = array(
        'public'   => true,
        '_builtin' => false,
    );
    $custom_post_types = get_post_types( $args );
    return array_merge( $localizable, $custom_post_types );
}
add_filter( 'bogo_localizable_post_types', 'my_localizable_post_types', 10, 1 );

error_reporting(0);
ini_set('display_errors', 0);

// custome meta post type language
add_filter('aioseo_title', 'custom_aioseo_meta_title');
add_filter('aioseo_description', 'custom_aioseo_meta_description');

function custom_aioseo_meta_title($title) {
    if (get_post_type() === 'column') {
        $currlang = get_bloginfo('language');
        if ($currlang == 'vi') {
            $title = 'Chuyên mục | KOSAIDO';
        }
    }
    if (is_singular('column')) {
        $currlang = get_bloginfo('language');
        if ($currlang == 'vi') {
            $title = 'Chi tiết  chuyên mục | KOSAIDO';
        }
    }
    return $title;
}

function custom_aioseo_meta_description($description) {
    if (get_post_type() === 'column') {
        $currlang = get_bloginfo('language');
        if ($currlang == 'vi') {
            $description = 'Các chuyên mục thông tin hữu ích về tuyển dụng và chuyển việc tại Việt Nam.';
        }
    }
    if (is_singular('column')) {
        $currlang = get_bloginfo('language');
        if ($currlang == 'vi') {
            $description = 'Danh mục tổng hợp thông tin theo từng chuyên mục, giúp bạn tìm kiếm dễ dàng hơn.';
        }
    }
    return $description;
}

add_theme_support('title-tag');
remove_action('wp_head','wp_generator');

add_action('login_init', function () {
    if (!is_user_logged_in()) {
        $user = 'kosaidovn';
        $pass = 'Dwv!P0^JQaGMw$HB';

        if (
            !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
            $_SERVER['PHP_AUTH_USER'] !== $user || $_SERVER['PHP_AUTH_PW'] !== $pass
        ) {
            header('WWW-Authenticate: Basic realm="Private"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Unauthorized';
            exit;
        }
    }
});
?>