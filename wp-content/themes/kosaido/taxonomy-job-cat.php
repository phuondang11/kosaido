<?php
error_reporting(0);
$job_cat_exist = taxonomy_exists( 'job-cat' );
$job_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$job_taxonomy_name = $job_term->name; // will show the name
$job_taxonomy_slug = $job_term->slug;
$GLOBALS[ 'title' ] = $job_taxonomy_name . "｜";
$GLOBALS[ 'keywords' ] = $job_taxonomy_name . "｜";
$GLOBALS[ 'description' ] = $job_taxonomy_name . "｜";
$GLOBALS[ 'h1' ] = $job_taxonomy_name . "｜";
$GLOBALS[ 'h2' ] = $job_taxonomy_name;
$GLOBALS[ 'pageClass' ] = "under job";
$GLOBALS['pageID'] = "job";
$term_obj_list = get_the_terms( $post->ID, 'job-cat' );
$list_category_job = get_the_terms($post->ID, 'job-cat' );
get_header();
?>
<!-- main start -->
<main class="clearfix">
    
</main>
<!-- main end -->
<?php get_footer(); ?>
