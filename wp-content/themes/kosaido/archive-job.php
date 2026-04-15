<?php
error_reporting(0);
$GLOBALS[ 'title' ] = "求人情報一覧| KOSAIDO";
$GLOBALS[ 'keywords' ] = "";
$GLOBALS[ 'description' ] = "最新の求人情報を一覧でチェック。ベトナムでのキャリア形成をKOSAIDOが支援します。";
$GLOBALS[ 'h1' ] = "";
$GLOBALS[ 'pageClass' ] = "under";
$GLOBALS['pageID'] = "job-list";
get_header();

$current_language = function_exists('bogo_get_current_language') ? bogo_get_current_language() : get_locale();
$currlang = get_bloginfo( 'language' );

$top_info = array(
    'ja' => '求人情報一覧<br class=""><span class="color">非公開求人も多数保有しています。</span>',
    'vi' => 'Việc làm mới nhất',
);
$top_path = array(
    'ja' => '新着求人',
    'vi' => 'Việc làm mới nhất',
);
$job_new_des01 = array(
    'ja' => '仕事内容',
    'vi' => 'Mô tả công việc',
);
$job_new_des02 = array(
    'ja' => '希望職種',
    'vi' => 'Công việc',
);
$job_new_des03 = array(
    'ja' => '勤務地',
    'vi' => 'Địa điểm làm việc',
);
$job_new_des04 = array(
    'ja' => '希望業種',
    'vi' => 'Ngành nghề',
);
$job_new_des05 = array(
    'ja' => '給与',
    'vi' => 'Mức lương',
);
$job_new_btn = array(
    'ja' => '応募する',
    'vi' => 'Xin việc',
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
<main id="" class="clearfix">
    
    <div id="content">

        <div id="top_info">
            <div class="inner">
                <h2><?php echo $top_info[ $currlang ]  ?></h2>
            </div>
        </div>
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li><a href="<?php echo esc_url( get_home_url() ); ?>/">HOME</a></li>
                    <li><?php echo esc_html( $top_path[ $currlang ] ); ?></li>
                </ul>
            </div>
        </div>

        <!-- fix 251112 -->
            <?php
                $keyword = isset($_GET['job_keyword']) ? sanitize_text_field($_GET['job_keyword']) : '';
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'      => 'job',
                    'posts_per_page' => 6,
                    'paged'          => $paged,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $tax_query = array(
                    'relation' => 'AND',
                );
                $lang = function_exists('bogo_get_current_locale')
                    ? bogo_get_current_locale()
                    : '';

                if (!empty($lang)) {
                    $tax_query[] = array(
                        'taxonomy' => 'bogo_language',
                        'field'    => 'slug',
                        'terms'    => array($lang),
                    );
                }

                $get_array_safe = function ($key) {
                    if (empty($_GET[$key])) return array();
                    $vals = $_GET[$key];
                    if (!is_array($vals)) $vals = array($vals);
                    return array_map('sanitize_text_field', $vals);
                };

                $by_location = $get_array_safe('by_location');
                $money       = $get_array_safe('money');
                $by_company  = $get_array_safe('by_company');
                $by_job      = $get_array_safe('by_job');

                if (!empty($by_location)) {
                    $tax_query[] = array(
                        'taxonomy' => 'job-cat',
                        'field'    => 'slug',
                        'terms'    => $by_location,
                        'include_children' => false,
                    );
                }

                if (!empty($money)) {
                    $tax_query[] = array(
                        'taxonomy' => 'job-cat',
                        'field'    => 'slug',
                        'terms'    => $money,
                        'include_children' => false,
                    );
                }

                if (!empty($by_company)) {
                    $tax_query[] = array(
                        'taxonomy' => 'job-cat',
                        'field'    => 'slug',
                        'terms'    => $by_company,
                        'include_children' => false,
                    );
                }

                if (!empty($by_job)) {
                    $tax_query[] = array(
                        'taxonomy' => 'job-cat',
                        'field'    => 'slug',
                        'terms'    => $by_job,
                        'include_children' => false,
                    );
                }

                if (count($tax_query) > 1) {
                    $args['tax_query'] = $tax_query;
                }

                if (!empty($keyword)) {
                    $job_code_query = new WP_Query(array(
                        'post_type'      => 'job',
                        'post_status'    => 'publish',
                        'fields'         => 'ids',
                        'posts_per_page' => -1,
                        'meta_query'     => array(
                            array(
                                'key'     => 'job_code',
                                'value'   => $keyword,
                                'compare' => 'LIKE',
                            ),
                        ),
                        'tax_query'      => $tax_query,
                    ));

                    if (!empty($job_code_query->posts)) {
                        $args['post__in'] = $job_code_query->posts;
                    } else {
                        $args['s'] = $keyword;
                    }
                }
                $job_query = new WP_Query($args);
            ?>


            <div class="page_job_new">
                <div class="inner clearfix">
                    <!-- fix  -->
                    <?php
                        $all_filters = array();
                        $filter_groups = array(
                            $get_array_safe('by_location'),
                            $get_array_safe('money'),
                            $get_array_safe('by_company'),
                            $get_array_safe('by_job')
                        );

                        foreach ($filter_groups as $group) {
                            if (!empty($group) && is_array($group)) {
                                foreach ($group as $slug_or_id) {

                                    if (is_numeric($slug_or_id)) {
                                        $term = get_term((int)$slug_or_id, 'job-cat');
                                    } else {
                                        $term = get_term_by('slug', sanitize_text_field($slug_or_id), 'job-cat');
                                    }

                                    if ($term && !is_wp_error($term)) {

                                        if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                            $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));
                                            $filter_name = ($name_vn !== '') ? $name_vn : $term->name;
                                        } else {
                                            $filter_name = $term->name;
                                        }

                                        $all_filters[] = $filter_name;
                                    }
                                }
                            }
                        }

                        $all_filters = array_values(array_filter(array_unique($all_filters)));
                        $show_search_result = (!empty($all_filters) || !empty($keyword));
                        ?>


                    <?php if ($show_search_result) : ?>
                    <?php
                        if ($current_language === 'vi' || $current_language === 'vi_VN') {
                            $txt_search_title = "Tìm kiếm nội dung theo từ khóa";
                            $txt_result_format_before = "Hiển thị";
                            $txt_result_format_middle = "từ";
                            $txt_result_format_after = "kết quả";
                        } else {
                            $txt_search_title = "キーワードでコンテンツを検索";
                            $txt_result_format_before = "";
                            $txt_result_format_middle = "件中の";
                            $txt_result_format_after = "件を表示";
                        }

                        $num_total = (int) $job_query->found_posts;
                        $per_page  = (int) $args['posts_per_page'];
                        $paged     = max(1, (int) $paged);

                        $num_min = ($paged - 1) * $per_page + 1;
                        if ($num_min > $num_total) $num_min = $num_total;

                        $num_max = $paged * $per_page;
                        if ($num_max > $num_total) $num_max = $num_total;
                    ?>

                    <div class="clearfix mb30">
                        <div class="result_text_show_ttl">
                            <p><?php echo esc_html($txt_search_title); ?></p>
                        </div>

                        <div class="clearfix mb15">
                            <div class="result_text_show_des kq">
                                <p>
                                    <?php
                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                        $label_filter  = "Bộ lọc";
                                        $label_keyword = "Từ khóa";
                                    } else {
                                        $label_filter  = "業種";
                                        $label_keyword = "キーワード";
                                    }
                                    ?>
                                    
                                    <?php if (!empty($all_filters)) : ?>
                                        <?php echo esc_html($label_filter); ?>：
                                        <span class="bold">
                                            <?php echo esc_html(implode('、', $all_filters)); ?>
                                        </span>
                                        <br>
                                    <?php endif; ?>

                                    <?php if (!empty($keyword)) : ?>
                                        <?php echo esc_html($label_keyword); ?>：
                                        <span class="bold"><?php echo esc_html($keyword); ?></span>
                                    <?php endif; ?>

                                </p>
                            </div>
                        </div>

                        <div class="result_text_show_des">
                            <p>
                                <?php if ($current_language === 'vi' || $current_language === 'vi_VN') : ?>
                                    <?php echo esc_html($txt_result_format_before); ?> 
                                    <span class="num_total"><?php echo esc_html($num_total); ?></span> 
                                    <?php echo esc_html($txt_result_format_middle); ?> 
                                    <span class="num_min"><?php echo esc_html($num_min); ?></span> 
                                    đến 
                                    <span class="num_max"><?php echo esc_html($num_max); ?></span> 
                                    <?php echo esc_html($txt_result_format_after); ?>
                                <?php else : ?>
                                    <span class="num_total"><?php echo esc_html($num_total); ?></span>
                                    <?php echo esc_html($txt_result_format_middle); ?>
                                    <span class="num_min"><?php echo esc_html($num_min); ?></span>
                                    <span class="num_max">～<?php echo esc_html($num_max); ?></span>
                                    <?php echo esc_html($txt_result_format_after); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <?php endif; ?>
                    <!-- fix  -->

                    <?php if (!empty($keyword)) : ?>
                        <div class="job_result_title">
                        <?php
                            if (empty($job_query) || !$job_query->have_posts()) {

                                if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                    echo '<p>Không tìm thấy bài viết nào với từ khóa bạn đã tìm. Vui lòng thử lại với một từ khóa khác.<br>Nếu bạn gặp bất kỳ khó khăn nào, xin đừng ngần ngại liên hệ với chúng tôi qua trang Liên hệ.</p>';
                                } else {
                                    echo '<p>お探しのキーワードで記事が見つかりませんでした。別のキーワードで再度お探し下さい。<br>お困りのことがございましたら、お問い合わせよりお気軽にご連絡くださいませ。</p>';
                                }

                            } else {
                                // empty
                            }
                        ?>

                        </div>
                    <?php endif; ?>

                    <div class="job_new_list">
                        <?php
                        if ($job_query->have_posts()):
                            while ($job_query->have_posts()): $job_query->the_post();

                                $txt_show02 = get_field('txt_show02');
                                $txt01 = get_field('txt01');
                                $txt02 = get_field('txt02');
                                $txt03 = get_field('txt03');
                                $txt04 = get_field('txt04');
                                $txt05 = get_field('txt05');
                        ?>
                            <div class="job_new_row">
                                <div class="job_new_ttl">
                                    <p><?php the_title(); ?></p>
                                </div>

                                <div class="job_new_info">
                                    <div class="job_new_des">
                                        <dl>
                                            <dt><?php echo esc_html($job_new_des01[$currlang]); ?></dt>
                                            <dd><?php echo wpautop($txt_show02); ?></dd>
                                        </dl>
                                    </div>

                                    <div class="job_new_bot">
                                        <!-- fix -->
                                        <div class="job_new_text">
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'job-cat');
                                            $job_terms = $location_terms = $company_terms = $money_terms = [];
                                            $txt_show04 = get_field('txt_show04');
                                            if (!empty($terms) && !is_wp_error($terms)) {
                                                foreach ($terms as $term) {
                                                    $parent = get_term($term->parent, 'job-cat');
                                                    if (!$parent) continue;

                                                    switch ($parent->slug) {
                                                        case 'by_job':
                                                            $job_terms[] = $term->name;
                                                            break;
                                                        case 'by_location':
                                                            $location_terms[] = $term->name;
                                                            break;
                                                        case 'by_company':
                                                            $company_terms[] = $term->name;
                                                            break;
                                                        case 'money':
                                                            $money_terms[] = $term->name;
                                                            break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <dl>
                                                <dt><?php echo esc_html($job_new_des02[$currlang]); ?></dt>
                                                <dd><?php echo !empty($job_terms) ? wp_kses_post(implode('、', $job_terms)) : '—'; ?></dd>
                                            </dl>
                                            <dl>
                                                <dt><?php echo esc_html($job_new_des03[$currlang]); ?></dt>
                                                <dd><?php echo !empty($location_terms) ? wp_kses_post(implode('、', $location_terms)) : '—'; ?></dd>
                                            </dl>
                                            <dl>
                                                <dt><?php echo esc_html($job_new_des04[$currlang]); ?></dt>
                                                <dd><?php echo !empty($company_terms) ? wp_kses_post(implode('、', $company_terms)) : '—'; ?></dd>
                                            </dl>
                                            <!-- <dl>
                                                <dt><?php echo esc_html($job_new_des05[$currlang]); ?></dt>
                                                <dd><?php echo !empty($money_terms) ? wp_kses_post(implode('、', $money_terms)) : '—'; ?></dd>
                                            </dl> -->
                                            <dl>
                                                <dt><?php echo esc_html($job_new_des05[$currlang]); ?></dt>
                                                <dd><?php echo wpautop(wp_strip_all_tags($txt_show04)); ?></dd>
                                            </dl>
                                        </div>
                                        <!-- fix -->
                                    </div>
                                    <div class="job_new_btn">
                                        <p class="btn">
                                            <a href="<?php bloginfo('url'); ?>/job-application/">
                                                <?php echo esc_html($job_new_btn[$currlang]); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job_new_date">
                                    <div class="year">
                                        <p><?php echo esc_html( get_the_date('Y.m') ); ?></p>
                                    </div>
                                    <div class="date">
                                        <p><?php echo esc_html( get_the_date('d') ); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            ?>

                            <div class="pagination">
                                <?php
                                $add_args = array();
                                foreach ($_GET as $k => $v) {
                                    if ($k === 'paged') continue;
                                    if (is_array($v)) {
                                        $add_args[$k] = array_map('sanitize_text_field', $v);
                                    } else {
                                        $add_args[$k] = sanitize_text_field($v);
                                    }
                                }

                                echo paginate_links(array(
                                    'total'   => $job_query->max_num_pages,
                                    'current' => $paged,
                                    'prev_text' => '«',
                                    'next_text' => '»',
                                    'add_args' => $add_args,
                                ));
                                ?>
                            </div>

                            <?php
                            wp_reset_postdata();
                        else:
                            // echo '<p>現在、求人情報はありません。</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>


        <!-- fix 251112 -->

        <div class="cta_column">
            <div class="inner">
                <div class="cta_column_list">
                    <div class="cta_column_col find_a">
                        <div class="cta_column_box">
                            <div class="cta_ja">
                                <p><a href="<?php bloginfo('url') ?>/about-us/feature/"><?php echo esc_html($cta_ja1[$currlang]) ?></a></p>
                            </div>
                            <div class="cta_en">
                                <p>Why choose us?</p>
                            </div>
                        </div>
                    </div>
                    <div class="cta_column_col find_a">
                        <div class="cta_column_box">
                            <div class="cta_ja">
                                <p><a href="<?php bloginfo('url') ?>/user-voice/"><?php echo esc_html($cta_ja2[$currlang]) ?></a></p>
                            </div>
                            <div class="cta_en">
                                <p>Voices of Success</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta_column_btn">
                    <p class="btn"><a href="<?php bloginfo('url') ?>/job-application/"><?php echo esc_html($cta_btn01[$currlang]) ?></a></p>
                    <p class="btn"><a href="<?php bloginfo('url') ?>/contact/"><?php echo esc_html($cta_btn02[$currlang]) ?></a></p>
                    <p class="btn"><a href="<?php bloginfo('url') ?>/qa/"><?php echo esc_html($cta_btn03[$currlang]) ?></a></p>
                </div>
            </div>
        </div>

    </div>

</main>
<!-- content end -->
<!-- main end -->
<?php get_footer(); ?>