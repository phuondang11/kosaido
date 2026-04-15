<?php
error_reporting(0);
// title
$meta_title = get_field( 'title' );
$GLOBALS[ 'title' ] = $meta_title;
// keywords
$meta_keywords = get_field( 'keywords' );
$GLOBALS[ 'keywords' ] = $meta_keywords;
// description
$meta_description = get_field( 'description' );
$GLOBALS[ 'description' ] = $meta_description;
// h1
$meta_h1 = get_field( 'h1' );
$GLOBALS[ 'h1' ] = $meta_h1;
$GLOBALS[ 'pageID' ] = "index";
get_header();
/* Template Name: Index */
$current_language = get_locale();
?>

    <?php
        $current_language = get_locale();
        if ($current_language === 'vi' || $current_language === 'vi_VN') {
            include('templates/home_vi.php');
        } elseif ($current_language === 'ja' || $current_language === 'ja_JP') {
            include('templates/home_ja.php');
        } else {
            include('templates/home_ja.php');
        }
    ?>

<?php get_footer(); ?>