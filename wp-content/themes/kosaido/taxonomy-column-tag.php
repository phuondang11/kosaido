<?php
error_reporting(0);

$column_tag_exist = taxonomy_exists('column-tag');
$column_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$column_taxonomy_name = $column_term->name;
$column_taxonomy_slug = $column_term->slug;

$GLOBALS['title'] = $column_taxonomy_name . "｜";
$GLOBALS['keywords'] = $column_taxonomy_name . "｜";
$GLOBALS['description'] = $column_taxonomy_name . "｜";
$GLOBALS['h1'] = $column_taxonomy_name . "｜";
$GLOBALS['h2'] = $column_taxonomy_name;
$GLOBALS['pageClass'] = "under column";
$GLOBALS['pageID'] = "column";

get_header();

$current_language = get_locale();
$currlang = get_bloginfo('language');

$top_info = array(
    'ja' => 'コラム',
    'vi' => 'Chuyên mục',
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
$no_post_in_tag = array(
    'ja' => 'このタグには記事がありません。',
    'vi' => 'Không có bài viết nào trong tag này.',
);
$no_tag = array(
    'ja' => '# タグなし',
    'vi' => 'Không có tag',
);
$no_cate = array(
    'ja' => 'カテゴリーがありません。',
    'vi' => 'Không có danh mục nào',
);
$ttl_employers = array(
    'ja' => '企業のご担当者様へ',
    'vi' => 'Thông tin dành cho <br>Quý Doanh nghiệp',
);
$ttl_company = array(
    'ja' => '廣済堂についてー会社概要',
    'vi' => 'Giới thiệu về Kosaido  <br>Tổng quan công ty',
);
$cta_ja1 = array(
    'ja' => '弊社が選ばれる理由',
    'vi' => 'Lý do chọn chúng tôi',
);
$cta_ja2 = array(
    'ja' => '成功者の声',
    'vi' => 'Chia sẻ từ người thành đạt',
);
$cta_btn01 = array(
    'ja' => 'エントリー',
    'vi' => 'Gửi hồ sơ',
);
$cta_btn02 = array(
    'ja' => 'お問い合わせ',
    'vi' => 'Liên hệ',
);
$cta_btn03 = array(
    'ja' => 'ベトナム就職Q&A',
    'vi' => 'Hỏi & đáp việc làm  <br>tại Việt Nam',
);
?>

<!-- main start -->
<main class="clearfix">
    <div id="content" class="clearfix">

        <!-- top info -->
        <div id="top_info">
            <div class="inner">
                <h2><?php echo esc_html($column_taxonomy_name); ?></h2>
            </div>
        </div>

        <!-- breadcrumb -->
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">HOME</a></li>
                    <li><a href="<?php echo home_url(); ?>/column/"><?php echo $top_info[$currlang]; ?></a></li>
                    <li><?php echo esc_html($column_taxonomy_name); ?></li>
                </ul>
            </div>
        </div>

        <div class="page_column">
            <div class="inner clearfix">
                <div class="column_flex">
                    <!-- left -->
                    <div class="column_left">
                        <div class="column_list">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php 
                                        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/images/dummy.jpg';
                                    ?>
                                    <div class="column_row find_a">
                                        <div class="column_box">
                                            <div class="column_img">
                                                <p>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="column_info">
                                                <div class="column_date">
                                                    <p><?php echo get_the_date('Y.m.d'); ?></p>
                                                </div>
                                                <div class="column_ttl">
                                                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                                </div>
                                                <div class="column_des">
                                                    <p><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <p><?php echo $no_post_in_tag[$currlang]; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="column_list_btn">
                            <div class="column_btn">
                                <p><a href="<?php bloginfo('url') ?>/company/"><span><?php echo $ttl_company[$currlang]; ?></span></a></p>
                            </div>
                            <div class="column_btn">
                                <p><a href="<?php bloginfo('url') ?>/for-employers/"><span><?php echo $ttl_employers[$currlang]; ?></span></a></p>
                            </div>
                        </div>
                    </div>

                    <!-- right -->
                    <div class="column_right">
                        <div class="column_right_frame">
                            <div class="column_right_ttl">
                                <p><?php echo $column_right_ttl[$currlang]; ?></p>
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

                        <!-- Category list -->
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
                                            <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                                <?php echo esc_html($term->name); ?>
                                            </a>
                                        </li>
                                    <?php
                                        endforeach;
                                    else :
                                    ?>
                                        <li><?php echo $no_cate[$currlang]; ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Tag list -->
                        <div class="column_right_frame_nobg">
                            <div class="column_right_ttl none_bottom">
                                <p><?php echo $ttl_tag[$currlang]; ?></p>
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
                                        <li><?php echo $no_tag[$currlang]; ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- /column_right -->
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta_column">
            <div class="inner">
                <div class="cta_column_list">
                    <div class="cta_column_col find_a">
                        <div class="cta_column_box">
                            <div class="cta_ja">
                                <p><a href="<?php bloginfo('url') ?>/about-us/feature/"><?php echo $cta_ja1[$currlang] ?></a></p>
                            </div>
                            <div class="cta_en">
                                <p>Why choose us?</p>
                            </div>
                        </div>
                    </div>
                    <div class="cta_column_col find_a">
                        <div class="cta_column_box">
                            <div class="cta_ja">
                                <p><a href="<?php bloginfo('url') ?>/user-voice/"><?php echo $cta_ja2[$currlang] ?></a></p>
                            </div>
                            <div class="cta_en">
                                <p>Voices of Success</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta_column_btn">
                    <p class="btn"><a href="<?php bloginfo('url') ?>/job-application/"><?php echo $cta_btn01[$currlang]; ?></a></p>
                    <p class="btn"><a href="<?php bloginfo('url') ?>/contact/"><?php echo $cta_btn02[$currlang]; ?></a></p>
                    <p class="btn"><a href="<?php bloginfo('url') ?>/qa/"><?php echo $cta_btn03[$currlang]; ?></a></p>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- main end -->
<?php get_footer(); ?>