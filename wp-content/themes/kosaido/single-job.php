<?php
error_reporting(0);
if ( have_posts() ):
    while ( have_posts() ): the_post();
$post_categories = wp_get_object_terms( get_the_ID(), 'job-cat', '' );
$post_categories_name = $post_categories[ 0 ]->name;
// title
$meta_title = get_field( 'title' );
if ( $meta_title == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'title' ] = $title_post . "｜";
} else {
    $GLOBALS[ 'title' ] = $meta_title;
}
// keywords
$meta_keywords = get_field( 'keywords' );
if ( $meta_keywords == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'keywords' ] = "";
} else {
    $GLOBALS[ 'keywords' ] = $meta_keywords;
}
//  description
$meta_description = get_field( 'description' );
if ( $meta_description == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'description' ] = "";
} else {
    $GLOBALS[ 'description' ] = $meta_description;
}
// H1 
$meta_h1 = get_field( 'h1' );
if ( $meta_h1 == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'h1' ] = '';
} else {
    $GLOBALS[ 'h1' ] = $meta_h1;
}
// H2
$GLOBALS[ 'h2' ] = 'テストタイトル';
$GLOBALS[ 'pageClass' ] = "under job";
$GLOBALS['pageID'] = "job";
get_header();

$current_language = get_locale();
$currlang = get_bloginfo( 'language' );
$top_info = array(
    'ja' => '新着求人',
    'vi' => 'Việc làm',
);

$txt_sho01_ttl = array(
    'ja' => '求人タイトル',
    'vi' => 'Vị trí công việc',
);
$txt_sho02_ttl = array(
    'ja' => '仕事内容',
    'vi' => 'Mô tả công việc',
);
$txt_sho03_ttl = array(
    'ja' => '勤務地',
    'vi' => 'Địa điểm làm việc',
);
$txt_sho04_ttl = array(
    'ja' => '給与',
    'vi' => 'Mức lương',
);
$txt_sho05_ttl = array(
    'ja' => 'こんな方に<br>おすすめ',
    'vi' => 'Đề xuất',
);

$txt_show01 = get_field('txt_show01');
$txt_show02 = get_field('txt_show02');
$txt_show03 = get_field('txt_show03');
$txt_show04 = get_field('txt_show04');
$txt_show05 = get_field('txt_show05');
$post_date = get_the_date('Y.m.d');
$post_link = get_permalink();
?>
<main class="clearfix">
    
<main class="clearfix">
    <div id="content" class="clearfix">
        <div id="top_info">
            <div class="inner">
                <h2><?php echo $top_info[$currlang] ?></h2>
            </div>
        </div>
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/column/"><?php echo $top_info[$currlang] ?></a></li>
                    <!-- <?php
                    $post_categories = wp_get_object_terms(get_the_ID(), 'column-cat', array());
                    if (!empty($post_categories) && !is_wp_error($post_categories)) {
                        $first_cat = $post_categories[0];
                        echo '<li><a href="' . esc_url(get_term_link($first_cat)) . '">' . esc_html($first_cat->name) . '</a></li>';
                    }
                    ?> -->
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>

        <div class="page_column">
            <div class="inner clearfix">

                <div class="job_section">
                    <div class="job_list">
                        <div class="job_col find_a">
                            <div class="job_box">
                                <div class="job_number_date">
                                    <div class="job_date"><p><?php echo esc_html($post_date); ?></p></div>
                                </div>
                                <div class="job_detail">
                                    <dl>
                                        <dt><?php echo $txt_sho01_ttl[$currlang] ?></dt>
                                        <dd><?php echo get_the_title(); ?></dd>
                                    </dl>
                                    <dl>
                                        <dt><?php echo $txt_sho02_ttl[$currlang] ?></dt>
                                        <dd><?php echo wp_strip_all_tags($txt_show02); ?></dd>
                                    </dl>
                                    <dl>
                                        <dt><?php echo $txt_sho03_ttl[$currlang] ?></dt>
                                        <dd><?php echo wp_strip_all_tags($txt_show03); ?></dd>
                                    </dl>
                                    <dl>
                                        <dt><?php echo $txt_sho04_ttl[$currlang] ?></dt>
                                        <dd><?php echo wp_strip_all_tags($txt_show04); ?></dd>
                                    </dl>
                                    <dl class="normal">
                                        <dt><?php echo $txt_sho05_ttl[$currlang] ?></dt>
                                        <dd><?php echo wp_strip_all_tags($txt_show05); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

</main>
<?php
get_footer();
endwhile;
endif;
?>
