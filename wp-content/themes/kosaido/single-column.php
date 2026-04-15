<?php
error_reporting(0);
if ( have_posts() ):
    while ( have_posts() ): the_post();
$post_categories = wp_get_object_terms( get_the_ID(), 'column-cat', '' );
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
$GLOBALS[ 'pageClass' ] = "under column";
$GLOBALS['pageID'] = "column";
get_header();
$current_language = get_locale();
$currlang = get_bloginfo( 'language' );
$top_info = array(
    'ja' => 'コラム',
    'vi' => 'Chuyên mục',
);
$ttl_column_list = array(
    'ja' => '記事一覧へ',
    'vi' => 'Danh sách bài viết',
);
$column_right_ttl = array(
    'ja' => '人気記事３選',
    'vi' => 'Top 3 bài viết nổi bật',
);
$ttl_cate = array(
    'ja' => '注目カテゴリ',
    'vi' => 'Danh mục',
);
$ttl_tag = array(
    'ja' => 'タグ',
    'vi' => 'Tag',
);
$no_tag = array(
    'ja' => '# タグなし',
    'vi' => 'Không có tag',
);
$ttl_column_list01 = array(
    'ja' => 'ベトナム最新動向コラム',
    'vi' => 'Cột xu hướng mới nhất của Việt Nam',
);
$btn_prev = array(
    'ja' => '前の記事',
    'vi' => 'Bài viết trước đó',
);
$btn_next = array(
    'ja' => '次の記事',
    'vi' => 'Bài viết tiếp theo',
);
$ttl_employers = array(
    'ja' => '企業のご担当者様へ',
    'vi' => 'Thông tin dành cho <br>Quý Doanh nghiệp',
);
$ttl_company = array(
    'ja' => '廣済堂についてー会社概要',
    'vi' => 'Giới thiệu về Kosaido  <br>Tổng quan công ty',
);
$path = array(
    'ja' => 'ホーム',
    'vi' => 'HOME',
);
?>
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
                    <li><a href="<?php echo home_url(); ?>"><?php echo $path[$currlang] ?></a></li>
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

                <div class="column_flex">
                    <div class="column_left">
                        <div class="column_detail">
                            <div class="detail_head">
                                <div class="date">
                                    <p><?php echo get_the_date('Y.m.d'); ?></p>
                                </div>
                                <div class="list_tag">
                                    <ul>
                                        <?php
                                        $tags = get_the_terms(get_the_ID(), 'column-tag');
                                        if (!empty($tags) && !is_wp_error($tags)) :
                                            foreach ($tags as $tag) :
                                        ?>
                                            <li>
                                                <a># <?php echo esc_html($tag->name); ?></a>
                                            </li>
                                        <?php
                                            endforeach;
                                        else :
                                        ?>
                                            <li><?php echo $no_tag[$currlang]; ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="column_content fit_post">
                                <div class="column_features">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <p><?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?></p>
                                    <?php else : ?>
                                        <p><img src="<?php bloginfo('template_url'); ?>/images/dummy.jpg" alt="<?php the_title(); ?>"></p>
                                    <?php endif; ?>
                                </div>
                                <div class="column_the_content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="column_detail_foot">
                                <!-- <div class="author">
                                    <p><?php the_author(); ?></p>
                                </div> -->
                                <div class="column_logo">
                                    <p><img src="<?php bloginfo('template_url') ?>/images/column_detail_logo.png" alt="KOSAIDO"></p>
                                </div>
                                <!-- Prev Next -->
                                <?php 
                                    $prev_post = get_previous_post();
                                    $next_post = get_next_post();
                                    $prev_url = $prev_post ? get_permalink($prev_post->ID) : '';
                                    $next_url = $next_post ? get_permalink($next_post->ID) : '';
                                ?>
                                <div class="column_detail_btn">
                                    <div class="column_btn_view">
                                        <p class="btn">
                                            <a href="<?php echo esc_url( home_url('/column/') ); ?>"><?php echo $ttl_column_list[$currlang]; ?></a>
                                        </p>
                                    </div>

                                    <div class="column_btn_prev_next">
                                        <?php if ($prev_post): ?>
                                            <p class="cln_btn prev">
                                                <a href="<?php echo esc_url($prev_url); ?>"><?php echo $btn_prev[$currlang] ?></a>
                                            </p>
                                        <?php endif; ?>

                                        <?php if ($next_post): ?>
                                            <p class="cln_btn next">
                                                <a href="<?php echo esc_url($next_url); ?>"><?php echo $btn_next[$currlang] ?></a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Prev Next -->

                            </div>
                            <div class="column_list_btn">
                                <div class="column_btn">
                                    <p><a href="<?php bloginfo('url') ?>/company/"><span><?php echo $ttl_company[$currlang]; ?></span></a></p>
                                </div>
                                <div class="column_btn">
                                    <p><a href="<?php bloginfo('url') ?>/for-employers/"><span><?php echo $ttl_employers[$currlang] ?></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column_right">
                        <div class="column_right_frame">
                            <div class="column_right_ttl">
                                <p><?php echo $column_right_ttl[$currlang] ?></p>
                            </div>
                            <div class="column_right_post_list">
                                <?php
                                $args = array(
                                    'post_type'      => 'column',
                                    'posts_per_page' => 3,
                                    'post_status'    => 'publish',
                                );
                                $column_query = new WP_Query($args);
                                if ($column_query->have_posts()) :
                                    while ($column_query->have_posts()) : $column_query->the_post();
                                ?>
                                    <div class="column_right_post_row find_a">
                                        <div class="crp_img">
                                            <p>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('thumbnail', ['width' => 72, 'alt' => get_the_title()]); ?>
                                                <?php else : ?>
                                                    <img width="72" src="<?php echo get_template_directory_uri(); ?>/images/dummy.jpg" alt="<?php the_title(); ?>">
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="crp_info">
                                            <div class="crp_info_ttl">
                                                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                            </div>
                                            <div class="crp_info_date">
                                                <p><?php echo get_the_date('Y.m.d'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                ?>
                                    <p>投稿がありません。</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="column_right_frame">
                            <div class="column_right_ttl none_bottom">
                                <p><?php echo $ttl_cate[$currlang]; ?></p>
                            </div>
                            <div class="column_right_cate">
                                <ul>
                                    <?php
                                    $terms = get_terms(array(
                                        'taxonomy'   => 'column-cat',
                                        'hide_empty' => false,
                                        'orderby'    => 'name',
                                        'order'      => 'ASC',
                                    ));

                                    if (!empty($terms) && !is_wp_error($terms)) :
                                        foreach ($terms as $term) :
                                    ?>
                                        <li>
                                        <a href="<?php echo esc_url( home_url('/column-cat/' . $term->slug . '/') ); ?>">
                                            <?php echo esc_html($term->name); ?>
                                        </a>
                                        </li>
                                    <?php
                                        endforeach;
                                    else :
                                    ?>
                                        <li>カテゴリーがありません。</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="column_right_frame_nobg">
                            <div class="column_right_ttl none_bottom">
                                <p><?php $ttl_tag[$currlang] ?></p>
                            </div>
                            <div class="column_right_tag">
                                <ul>
                                    <?php
                                    $tags = get_terms(array(
                                        'taxonomy' => 'column-tag',
                                        'hide_empty' => false,
                                        'public' => true,
                                    ));

                                    if (!empty($tags) && !is_wp_error($tags)) :
                                        foreach ($tags as $tag) :
                                            $tag_link = get_term_link($tag, 'column-tag');
                                    ?>
                                            <li>
                                                <a href="<?php echo esc_url($tag_link); ?>"># <?php echo esc_html($tag->name); ?></a>
                                            </li>
                                    <?php
                                        endforeach;
                                    else :
                                    ?>
                                        <li><?php echo esc_html($no_tag[$currlang]); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- renew -->
                <div class="column_intop">
                    <section class="sec05">
                        <div class="s5_bg">
                            <div class="inner">
                                <div class="s5_head">
                                    <div class="sec_ttl">
                                        <h3>
                                            <span class="ttl01"><?php echo $ttl_column_list01[$currlang] ?></span>
                                            <span class="ttl02">Column</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="s5_content">
                                    <!--  -->
                                    <div class="s5_content_list">
                                        <?php
                                        $current_terms = get_the_terms(get_the_ID(), 'column-cat');
                                        if (!empty($current_terms) && !is_wp_error($current_terms)) :
                                            $current_term_ids = wp_list_pluck($current_terms, 'term_id');
                                            $related_args = array(
                                                'post_type'      => 'column',
                                                'posts_per_page' => 3,
                                                'post__not_in'   => array(get_the_ID()),
                                                'tax_query'      => array(
                                                    array(
                                                        'taxonomy' => 'column-cat',
                                                        'field'    => 'term_id',
                                                        'terms'    => $current_term_ids,
                                                    ),
                                                ),
                                            );
                                            $related_query = new WP_Query($related_args);
                                            if ($related_query->have_posts()) :
                                                while ($related_query->have_posts()) :
                                                    $related_query->the_post();
                                                    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/images/dummy.jpg';
                                        ?>
                                                    <div class="s5_content_col find_a">
                                                        <div class="s5_ct_box">
                                                            <div class="s5_date">
                                                                <div class="month">
                                                                    <p><?php echo get_the_date('Y.m'); ?></p>
                                                                </div>
                                                                <div class="day">
                                                                    <p><?php echo get_the_date('d'); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="s5_img">
                                                                <p>
                                                                    <img loading="lazy" width="392" height="300" src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
                                                                </p>
                                                                <div class="s5_btn_small">
                                                                    <p><a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"></a></p>
                                                                </div>
                                                            </div>
                                                            <div class="s5_info">
                                                                <div class="s5_ttl">
                                                                    <p><?php the_title(); ?></p>
                                                                </div>
                                                                <div class="des">
                                                                    <p><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                endwhile;
                                                wp_reset_postdata();
                                            else :
                                                echo '<p>関連記事がありません。</p>';
                                            endif;
                                        endif;
                                        ?>
                                    </div>
                                    <!--  -->
                                    <div class="s5_btn">
                                        <p class="btn center">
                                            <a href="<?php bloginfo('url') ?>/column/"><?php echo $ttl_column_list[$currlang] ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- renew -->

            </div>
        </div>

    </div>
</main>
<?php
get_footer();
endwhile;
endif;
?>
