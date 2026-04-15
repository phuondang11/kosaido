<?php
// title
$meta_title = get_field( 'title' );
$GLOBALS[ 'title' ] = $meta_title ?  $meta_title : "求人情報検索| KOSAIDO";
// keywords
$meta_keywords = get_field( 'keywords' );
$GLOBALS[ 'keywords' ] = $meta_keywords;
// description
$meta_description = get_field( 'description' );
$GLOBALS[ 'description' ] = $meta_description ? $meta_description : "各求人の仕事内容や条件を詳しくご紹介。応募から採用までKOSAIDOがサポート。";
// h1
$GLOBALS['h1'] = get_post_meta($post->ID, 'h1', true) ? get_post_meta($post->ID, 'h1', true) : "";
// h2
$GLOBALS[ 'h2' ] = get_the_title();
$GLOBALS[ 'pageClass' ] = "under";
$GLOBALS[ 'pageID' ] = $post->post_name;
$GLOBALS['bodyID'] = $post->post_name;
$GLOBALS['bodyClass'] = "under";
get_header();
$current_language = get_locale();
$currlang = get_bloginfo( 'language' );
$top_info = array(
    'ja' => '求人情報検索<br><span class="color">非公開求人も多数保有<br class="sp">しています。</span>',
    'vi' => 'Tìm kiếm thông tin việc làm tại đây!<br><span class="color">Chúng tôi hiện có rất nhiều cơ hội việc làm hấp dẫn dành cho bạn.</span>',
);
$top_path = array(
    'ja' => '求人情 報検索',
    'vi' => 'Tìm kiếm thông tin việc làm tại đây!',
);
$job_ds01_ttl_location = array(
    'ja' => '希望勤務地',
    'vi' => 'Địa điểm',
);
$job_ds01_ttl_money = array(
    'ja' => '希望月収',
    'vi' => 'Thu nhập theo tháng',
);
$job_ds01_ttl_company = array(
    'ja' => '希望業種',
    'vi' => 'Ngành nghề',
);
$job_ds01_ttl_job = array(
    'ja' => '希望職種',
    'vi' => 'Công việc',
);
$all = array(
    'ja' => '全選択',
    'vi' => 'Tất cả',
);
$search = array(
    'ja' => '検索',
    'vi' => 'Tìm kiếm',
);
$ttl01 = array(
    'ja' => '新着求人',
    'vi' => 'Việc làm mới nhất',
);
$ttl02 = array(
    'ja' => '非公開求人も多数保有しています。',
    'vi' => 'Chúng tôi cũng có nhiều việc làm chưa được quảng cáo.',
);
$job_detail01 = array(
    'ja' => '求人タイトル',
    'vi' => 'Vị trí công việc',
);
$job_detail02 = array(
    'ja' => '仕事内容',
    'vi' => 'Mô tả công việc',
);
$job_detail03 = array(
    'ja' => '勤務地',
    'vi' => 'Địa điểm làm việc',
);
$job_detail04 = array(
    'ja' => '給与',
    'vi' => 'Mức lương',
);
$job_detail05 = array(
    'ja' => 'こんな方に<br>おすすめ',
    'vi' => 'Đề xuất',
);
$job_detail06 = array(
    'ja' => 'Job code',
    'vi' => 'Mã công việc',
);
$job_list = array(
    'ja' => '求人情報一覧',
    'vi' => 'Danh sách việc làm',
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
$no_search = array(
    'ja' => '<p>カテゴリーが見つかりません。</p>',
    'vi' => '<p>Không tìm thấy danh mục.</p>',
);
$no_post = array(
    'ja' => '<p>カテゴリーが存在しません。</p>',
    'vi' => '<p>Danh mục không tồn tại.</p>',
);
$placeholder = array(
    'ja' => 'キーワードを入力',
    'vi' => 'Nhập từ khóa',
);
?>

<main>
    <!-- content start -->
    <div id="content">
        <div id="top_info">
            <div class="inner">
                <h2><?php echo $top_info[$currlang] ?></h2>
            </div>
        </div>
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li><a href="<?php bloginfo('url') ?>/">HOME</a></li>
                    <li><?php echo $top_path[$currlang] ?></li>
                </ul>
            </div>
        </div>
        <div class="job_search_page">
            <div class="inner clearfix">
                <form method="get" action="<?php echo esc_url( get_post_type_archive_link('job') ); ?>">
                    <section class="clearfix">
                        <div class="job_search_ds01">
                            <div class="job_ds01_head">
                                <div class="job_ds01_ttl">
                                    <h3>
                                        <span class="ja"><?php echo $job_ds01_ttl_location[$currlang] ?></span>
                                        <span class="en">by work location</span>
                                    </h3>
                                </div>
                                <div class="job_ds01_full">
                                    <div class="job_ds01_full_checkbox">
                                        <input type="checkbox" id="myCheckbox01" name="option1" value="value1">
                                        <label for="myCheckbox01"><?php echo $all[$currlang] ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="job_ds01_all_item">
                                <!-- fix -->
                                <div class="job_ds01_all_item_list">
                                    <?php
                                    $parent_term = get_term_by('slug', 'by_location', 'job-cat');

                                    if ($parent_term) {
                                        $child_terms = get_terms(array(
                                            'taxonomy'   => 'job-cat',
                                            'hide_empty' => false,
                                            'suppress_filters' => false,
                                            'lang' => $current_language,
                                            'parent'     => $parent_term->term_id
                                        ));

                                        if (!empty($child_terms) && !is_wp_error($child_terms)) :
                                            foreach ($child_terms as $index => $term) :
                                                $checkbox_id = 'myCheckbox01' . $index;

                                                $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                    $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                } else {
                                                    $term_name = $term->name;
                                                }
                                                ?>
                                                <div class="job_ds01_item <?php echo (isset($_GET['by_location']) && in_array($term->slug, (array) $_GET['by_location'], true)) ? 'active' : ''; ?>">
                                                    <input type="checkbox" 
                                                        id="<?php echo esc_attr($checkbox_id); ?>" 
                                                        name="by_location[]" 
                                                        value="<?php echo esc_attr($term->slug); ?>">
                                                    <label for="<?php echo esc_attr($checkbox_id); ?>">
                                                        <?php echo esc_html($term_name); ?>
                                                    </label>
                                                </div>
                                            <?php
                                            endforeach;
                                        else :
                                            echo $no_search[$currlang] ?? '';
                                        endif;
                                    } else {
                                        echo $no_post[$currlang] ?? '';
                                    }
                                    ?>
                                </div>

                                <!-- fix -->
                            </div>
                        </div>
                        <div class="job_search_ds01">
                            <div class="job_ds01_head">
                                <div class="job_ds01_ttl">
                                    <h3>
                                        <span class="ja"><?php echo $job_ds01_ttl_money[$currlang] ?></span>
                                        <span class="en">BY MONTHLY INCOME</span>
                                    </h3>
                                </div>
                                <div class="job_ds01_full">
                                    <div class="job_ds01_full_checkbox">
                                        <input type="checkbox" id="myCheckbox02" name="option1" value="value1">
                                        <label for="myCheckbox02"><?php echo $all[$currlang] ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="job_ds01_all_item">
                                <!-- fix -->
                                <div class="job_ds01_all_item_list col5">
                                    <?php
                                    $parent_term = get_term_by('slug', 'money', 'job-cat');

                                    if ($parent_term) {
                                        $child_terms = get_terms(array(
                                            'taxonomy'   => 'job-cat',
                                            'hide_empty' => false,
                                            'suppress_filters' => false,
                                            'lang' => $current_language,
                                            'parent'     => $parent_term->term_id
                                        ));

                                        if (!empty($child_terms) && !is_wp_error($child_terms)) :
                                            foreach ($child_terms as $index => $term) :
                                                $checkbox_id = 'myCheckbox02' . $index;

                                                $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                    $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                } else {
                                                    $term_name = $term->name;
                                                }
                                                ?>
                                                <div class="job_ds01_item <?php echo (isset($_GET['money']) && in_array($term->slug, (array) $_GET['money'], true)) ? 'active' : ''; ?>">
                                                    <input type="checkbox" 
                                                        id="<?php echo esc_attr($checkbox_id); ?>" 
                                                        name="money[]" 
                                                        value="<?php echo esc_attr($term->slug); ?>">
                                                    <label for="<?php echo esc_attr($checkbox_id); ?>">
                                                        <?php echo esc_html($term_name); ?>
                                                    </label>
                                                </div>
                                            <?php
                                            endforeach;
                                        else :
                                            echo $no_search[$currlang] ?? '';
                                        endif;
                                    } else {
                                        echo $no_post[$currlang] ?? '';
                                    }
                                    ?>
                                </div>
                                <!-- fix -->
                            </div>
                        </div>
                    </section>
                    <section class="clearfix">
                        <div class="job_search_ds02_list">
                            <div class="job_search_ds02_col">
                                <div class="job_search_ds02_head">
                                    <div class="job_search_ds02_ttl">
                                        <h3>
                                            <span class="ja"><?php echo $job_ds01_ttl_company[$currlang] ?></span>
                                            <span class="en">by company</span>
                                        </h3>
                                    </div>
                                    <div class="job_search_ds02_all">
                                        <div class="job_ds02_full_checkbox">
                                            <input type="checkbox" id="myCheckbox03" name="option1" value="value1">
                                            <label for="myCheckbox03"><?php echo $all[$currlang] ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_search_ds02_content">
                                    <!-- fix -->
                                    <div class="job_search_ds02_content_list">
                                        <?php
                                        $parent_term = get_term_by('slug', 'by_company', 'job-cat');
                                        if ($parent_term) {
                                            $child_terms = get_terms(array(
                                                'taxonomy'   => 'job-cat',
                                                'hide_empty' => false,
                                                'parent'     => $parent_term->term_id,
                                                'orderby'    => 'name',
                                                'order'      => 'ASC',
                                                'suppress_filters' => false,
                                                'lang' => $current_language,
                                            ));

                                            if (!empty($child_terms) && !is_wp_error($child_terms)) :
                                                foreach ($child_terms as $index => $term) :
                                                    $checkbox_id = 'myCheckbox03' . $index;
                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                    } else {
                                                        $term_name = $term->name;
                                                    }
                                                    ?>
                                                    <div class="job_ds01_item <?php echo (isset($_GET['by_company']) && in_array($term->slug, $_GET['by_company'])) ? 'active' : ''; ?>">
                                                        <input type="checkbox" 
                                                            id="<?php echo esc_attr($checkbox_id); ?>" 
                                                            name="by_company[]" 
                                                            value="<?php echo esc_attr($term->slug); ?>">
                                                        <label for="<?php echo esc_attr($checkbox_id); ?>">
                                                            <?php echo esc_html($term_name); ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                endforeach;
                                            else :
                                                echo $no_search[$currlang];
                                            endif;
                                        } else {
                                            echo $no_post[$currlang];
                                        }
                                        ?>
                                    </div>
                                    <!-- fix -->
                                </div>
                            </div>
                            <div class="job_search_ds02_col">
                                <div class="job_search_ds02_head">
                                    <div class="job_search_ds02_ttl">
                                        <h3>
                                            <span class="ja"><?php echo $job_ds01_ttl_job[$currlang] ?></span>
                                            <span class="en">by job type</span>
                                        </h3>
                                    </div>
                                    <div class="job_search_ds02_all">
                                        <div class="job_ds02_full_checkbox">
                                            <input type="checkbox" id="myCheckbox04" name="option1" value="value1">
                                            <label for="myCheckbox04"><?php echo $all[$currlang] ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="job_search_ds02_content">
                                    <!-- fix -->
                                    <div class="job_search_ds02_content_list">
                                        <?php
                                        $parent_term = get_term_by('slug', 'by_job', 'job-cat');
                                        if ($parent_term) {
                                            $child_terms = get_terms(array(
                                                'taxonomy'   => 'job-cat',
                                                'hide_empty' => false,
                                                'parent'     => $parent_term->term_id,
                                                'orderby'    => 'name',
                                                'order'      => 'ASC',
                                                'suppress_filters' => false,
                                                'lang' => $current_language,
                                            ));

                                            if (!empty($child_terms) && !is_wp_error($child_terms)) :
                                                foreach ($child_terms as $index => $term) :
                                                    $checkbox_id = 'myCheckbox04' . $index;
                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                    } else {
                                                        $term_name = $term->name;
                                                    }
                                                    ?>
                                                    <div class="job_ds01_item <?php echo (isset($_GET['by_job']) && in_array($term->slug, $_GET['by_job'])) ? 'active' : ''; ?>">
                                                        <input type="checkbox" 
                                                            id="<?php echo esc_attr($checkbox_id); ?>" 
                                                            name="by_job[]" 
                                                            value="<?php echo esc_attr($term->slug); ?>">
                                                        <label for="<?php echo esc_attr($checkbox_id); ?>">
                                                            <?php echo esc_html($term_name); ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                endforeach;
                                            else :
                                                echo $no_search[$currlang];
                                            endif;
                                        } else {
                                            echo $no_post[$currlang];
                                        }
                                        ?>
                                    </div>
                                    <!-- fix -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- delete -->
                        <div class="job_search_intext none">
                            <div class="job_search_intext_box">
                                <input type="text" placeholder="<?php echo $placeholder[$currlang] ?>" name="job_keyword" value="<?php echo isset($_GET['job_keyword']) ? esc_attr($_GET['job_keyword']) : ''; ?>">
                                <div class="job_search_intext_btn">
                                    <button type="submit"><?php echo $search[$currlang] ?></button>
                                </div>
                            </div>
                        </div>
                        <!-- delete -->

                        <!-- fix 251112 -->
                        <div class="job_search_intext">
                            <div class="job_search_intext_box">
                                <form action="<?php echo get_post_type_archive_link('job'); ?>" method="get">
                                    <input type="text" 
                                        placeholder="<?php echo $placeholder[$currlang]; ?>" 
                                        name="job_keyword" 
                                        value="<?php echo isset($_GET['job_keyword']) ? esc_attr($_GET['job_keyword']) : ''; ?>">
                                    <div class="job_search_intext_btn">
                                        <button type="submit"><?php echo $search[$currlang]; ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- fix 251112 -->

                    </section>
                </form>
            </div>
        </div>
        <div class="under_intop">
            <section class="sec02">
                <div class="s2_content01" id="job_search_ttl01">
                    <div class="inner">
                        <div class="s2_ct01_head">
                            <div class="sec_ttl">
                                <h3>
                                    <span class="ttl01"><?php echo $ttl01[$currlang] ?></span>
                                    <span class="ttl02"><?php echo $ttl02[$currlang] ?></span>
                                </h3>
                            </div>
                        </div>
                        <div class="s2_ct01_body">
                    <div class="job_section">
                        <!-- fix -->
                        <div class="job_list">
                            <?php
                            $args = array(
                                'post_type'      => 'job',
                                'posts_per_page' => 6,
                                'post_status'    => 'publish',
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                                'suppress_filters' => false,
                                'lang' => $current_language,
                            );
                            $job_query = new WP_Query($args);
                            if ($job_query->have_posts()) :
                                $count = 1;
                                while ($job_query->have_posts()) : $job_query->the_post();

                                    $txt_show01 = get_field('txt_show01');
                                    $txt_show02 = get_field('txt_show02');
                                    $txt_show03 = get_field('txt_show03');
                                    $txt_show04 = get_field('txt_show04');
                                    $txt_show05 = get_field('txt_show05');
                                    $job_code = get_field('job_code');
                                    $post_date = get_the_date('Y.m.d');
                                    $post_link = get_permalink();
                                    ?>
                                    <div class="job_col find_a">
                                        <div class="job_box">
                                            <div class="job_number_date">
                                                <div class="job_number"><p><?php echo sprintf('%02d', $count); ?></p></div>
                                                <div class="job_date"><p><?php echo esc_html($post_date); ?></p></div>
                                            </div>
                                            <div class="job_detail">
                                                <dl class="title">
                                                    <dt><?php echo $job_detail01[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(get_the_title()); ?></dd>
                                                </dl>

                                                <?php if (!empty($txt_show02)) : ?>
                                                <dl>
                                                    <dt><?php echo $job_detail02[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(wp_strip_all_tags($txt_show02)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show03)) : ?>
                                                <dl>
                                                    <dt><?php echo $job_detail03[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(wp_strip_all_tags($txt_show03)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show04)) : ?>
                                                <dl>
                                                    <dt><?php echo $job_detail04[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(wp_strip_all_tags($txt_show04)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show05)) : ?>
                                                <dl class="normal">
                                                    <dt><?php echo $job_detail05[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(wp_strip_all_tags($txt_show05)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($job_code)) : ?>
                                                <dl>
                                                    <dt><?php echo $job_detail06[$currlang] ?></dt>
                                                    <dd><?php echo wpautop(wp_strip_all_tags($job_code)); ?></dd>
                                                </dl>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <a href="<?php bloginfo('url') ?>/job-application/"></a>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>現在求人情報はありません。</p>';
                            endif;
                            ?>
                        </div>
                        <!-- fix -->
                    </div>
                    <?php if ($current_language === 'vi' || $current_language === 'vi_VN') { ?>

                    <?php }else{ ?>
                        <div class="job_btn">
                            <p class="btn center"><a href="<?php bloginfo('url') ?>/job-list/">求人情報一覧</a></p>
                        </div>
                    <?php } ?>
                    
                </div>
                        <!-- <div class="s2_ct02_btn">
                            <p class="btn center">
                                <a href="<?php bloginfo('url') ?>/job-list/"><?php echo $job_list[$currlang] ?></a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>
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
                                <?php if ($current_language === 'vi' || $current_language === 'vi_VN') { ?>
                                    <p><a href="#"><?php echo $cta_ja2[$currlang] ?></a></p>
                                <?php }else{ ?>
                                    <p><a href="<?php bloginfo('url') ?>/user-voice/"><?php echo $cta_ja2[$currlang] ?></a></p>
                                <?php } ?>
                            </div>
                            <div class="cta_en">
                                <p>Voices of Success</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta_column_btn">
                    <p class="btn"><a href="<?php bloginfo('url') ?>/job-application/"><?php echo $cta_btn01[$currlang] ?></a></p>
                    <p class="btn"><a href="<?php bloginfo('url') ?>/contact/"><?php echo $cta_btn02[$currlang] ?></a></p>
                    
                    <?php if ($current_language === 'vi' || $current_language === 'vi_VN') { ?>
                        <p class="btn"><a href="#"><?php echo $cta_btn03[$currlang] ?></a></p>
                    <?php }else{ ?>
                        <p class="btn"><a href="<?php bloginfo('url') ?>/qa/"><?php echo $cta_btn03[$currlang] ?></a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->
</main>

<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {

    // 01. 希望勤務地 (by_location)
    $('#myCheckbox01').on('change', function() {
        const isChecked = $(this).is(':checked');
        const container = $(this).closest('.job_search_ds01');
        container.find('.job_ds01_all_item_list input[type="checkbox"]')
            .prop('checked', isChecked);
        container.find('.job_ds01_item').toggleClass('active', isChecked);
    });
    $('.job_ds01_all_item_list').on('change', 'input[type="checkbox"]', function() {
        $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
    });

    // 02. 希望年収 (money)
    $('#myCheckbox02').on('change', function() {
        const isChecked = $(this).is(':checked');
        const container = $(this).closest('.job_search_ds01');
        container.find('.job_ds01_all_item_list input[type="checkbox"]')
            .prop('checked', isChecked);
        container.find('.job_ds01_item').toggleClass('active', isChecked);
    });
    $('.job_ds01_all_item_list').on('change', 'input[type="checkbox"]', function() {
        $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
    });

    // 03. 希望業種 (by_company)
    $('#myCheckbox03').on('change', function() {
        const isChecked = $(this).is(':checked');
        const container = $(this).closest('.job_search_ds02_col');
        container.find('.job_search_ds02_content_list input[type="checkbox"]')
            .prop('checked', isChecked);
        container.find('.job_ds01_item').toggleClass('active', isChecked);
    });
    $('.job_search_ds02_content_list').on('change', 'input[type="checkbox"]', function() {
        $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
    });

    // 04. 希望職種 (by_job)
    $('#myCheckbox04').on('change', function() {
        const isChecked = $(this).is(':checked');
        const container = $(this).closest('.job_search_ds02_col');
        container.find('.job_search_ds02_content_list input[type="checkbox"]')
            .prop('checked', isChecked);
        container.find('.job_ds01_item').toggleClass('active', isChecked);
    });
    $('.job_search_ds02_content_list').on('change', 'input[type="checkbox"]', function() {
        $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
    });

    function setupSelectAll(mainCheckboxId, containerClass) {
        $('#' + mainCheckboxId).on('change', function() {
            const isChecked = $(this).is(':checked');
            const container = $(this).closest(containerClass);

            container.find('input[type="checkbox"]').prop('checked', isChecked);

            container.find('input[type="checkbox"]').each(function() {
                $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
            });
        });

        $(containerClass).on('change', 'input[type="checkbox"]', function() {
            $(this).closest('.job_ds01_item').toggleClass('active', $(this).is(':checked'));
        });
    }
    setupSelectAll('myCheckbox01', '.job_search_ds01'); // by_location
    setupSelectAll('myCheckbox02', '.job_search_ds01'); // money
    setupSelectAll('myCheckbox03', '.job_search_ds02_content'); // by_company
    setupSelectAll('myCheckbox04', '.job_search_ds02_content'); // by_job
    $('.job_ds01_item input[type="checkbox"]:checked').closest('.job_ds01_item').addClass('active');
});
</script>