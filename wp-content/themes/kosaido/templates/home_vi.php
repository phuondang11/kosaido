<main>
    <section class="sec01">
        <div class="s1_bg">
            <div class="s1_flex">
                <div class="s1_img">
                    <p>
                        <img width="1354" height="810" src="<?php bloginfo('template_url') ?>/images/s01_img01.jpg" alt="KOSAIDO HR VIETNAM">
                    </p>
                </div>
                <div class="s1_content">
                    <div class="ttl">
                        <h2 class="big_ttl">KOSAIDO <span class="color">HR</span> VIETNAM </h2>
                    </div>
                    <div class="des">
                        <p>Hãy để chúng tôi hỗ trợ sự nghiệp của bạn <br class="">tại Việt Nam.</p>
                    </div>
                    <div class="btn_all">
                        <p class="btn"><a href="<?php bloginfo('url') ?>/job-search/">Tìm kiếm việc làm</a></p>
                        <p class="btn"><a href="<?php bloginfo('url') ?>/contact/">Gửi hồ sơ</a></p>
                    </div>
                </div>
            </div>
            <div class="s1_slide_txt">
                <p>KOSAiDO HR vietnam・KOSAiDO HR vietnam・</p>
            </div>
        </div>
        <div class="s1_scroll">
            <p><a href="#idx_ttl01">Scroll</a></p>
        </div>
    </section>

    <section class="sec02">
        <div class="s2_content01" id="idx_ttl01">
            <div class="inner">
                <div class="s2_ct01_head">
                    <div class="sec_ttl">
                        <h3>
                            <span class="ttl01">Việc làm mới</span>
                            <span class="ttl02">Chúng tôi cũng có nhiều việc làm chưa được quảng cáo.</span>
                        </h3>
                    </div>
                    <div class="s2_ct02_btn">
                        <p class="btn">
                            <a href="<?php bloginfo('url') ?>/job-search/">Tìm kiếm việc làm</a>
                        </p>
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
                                                    <dt>Vị trí công việc</dt>
                                                    <dd><?php echo esc_html(get_the_title()); ?></dd>
                                                </dl>

                                                <?php if (!empty($txt_show02)) : ?>
                                                <dl>
                                                    <dt>Mô tả công việc</dt>
                                                    <dd><?php echo wpautop(($txt_show02)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show03)) : ?>
                                                <dl>
                                                    <dt>Địa điểm làm việc</dt>
                                                    <dd><?php echo wpautop(($txt_show03)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show04)) : ?>
                                                <dl>
                                                    <dt>Mức lương</dt>
                                                    <dd><?php echo wpautop(($txt_show04)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show05)) : ?>
                                                <dl class="normal">
                                                    <dt>Đề xuất</dt>
                                                    <dd><?php echo wpautop(($txt_show05)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($job_code)) : ?>
                                                <dl>
                                                    <dt>Mã công việc</dt>
                                                    <dd><?php echo wpautop(($job_code)); ?></dd>
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
                    <div class="job_btn">
                        <p class="btn center"><a href="<?php bloginfo('url') ?>/job-list/">Danh sách việc làm</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="s2_content02">
            <div class="inner">
                <div class="s2_ct02_box">
                    <div class="s2_ct02_head">
                        <div class="sec_ttl">
                            <h3>
                                <span class="ttl01">Tìm kiếm việc làm</span>
                                <span class="ttl02">search</span>
                            </h3>
                        </div>
                    </div>
                    <div class="s2_ct02_body">
                        <div class="s2_ct02_form">
                            <div class="s2_form_search">
                                <!-- fix -->
                                <form action="<?php echo get_post_type_archive_link('job'); ?>" method="get" class="s2_form_flex">
                                    <div class="s2_form_search_ttl">
                                        <p>Tìm kiếm từ khóa</p>
                                    </div>
                                    <div class="s2_form_search_text">
                                        <div class="s2_form_search_box">
                                            <input type="text" name="job_keyword" placeholder="Nhập từ khóa"
                                                value="<?php echo isset($_GET['job_keyword']) ? esc_attr($_GET['job_keyword']) : ''; ?>">
                                        </div>
                                        <div class="s2_form_search_button">
                                            <button type="submit"></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- fix -->
                            </div>
                            <div class="s2_form_list">
                                <div class="s2_by_list">
                                    <div data-target="s2_tab01" class="s2_by_list_col active">
                                        <div class="s2_by_list_box">
                                            <div class="icon">
                                                <p><img loading="lazy" width="18" height="23" src="<?php bloginfo('template_url') ?>/images/s2_ic01.svg" alt="Địa điểm"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>Địa điểm</p>
                                                </div>
                                                <div class="txt02">
                                                    <p>By work location</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-target="s2_tab02" class="s2_by_list_col">
                                        <div class="s2_by_list_box">
                                            <div class="icon">
                                                <p><img loading="lazy" width="19" height="23" src="<?php bloginfo('template_url') ?>/images/s2_ic02.svg" alt="Công việc"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>Công việc</p>
                                                </div>
                                                <div class="txt02">
                                                    <p>By industry</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-target="s2_tab03" class="s2_by_list_col">
                                        <div class="s2_by_list_box">
                                            <div class="icon">
                                                <p><img loading="lazy" width="21" height="17" src="<?php bloginfo('template_url') ?>/images/s2_ic03.svg" alt="Ngành nghề"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>Ngành nghề</p>
                                                </div>
                                                <div class="txt02">
                                                    <p>By job type</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-target="s2_tab04" class="s2_by_list_col">
                                        <div class="s2_by_list_box">
                                            <div class="icon">
                                                <p><img loading="lazy" width="22" height="22" src="<?php bloginfo('template_url') ?>/images/s2_ic04.svg" alt="Thu nhập theo tháng"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>Thu nhập <br class="sp">theo tháng</p>
                                                </div>
                                                <div class="txt02">
                                                    <p>BY MONTHLY INCOME</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fix -->
                                <!-- refix -->
                                <form action="<?php echo home_url('/job-search/#job_search_ttl01'); ?>" method="get" class="s2_by_content" id="s2_tab01">
                                    <div class="s2_by_content_box">
                                        <div class="s2_by_content_flex">
                                            <div class="s2_by_content_left">
                                                <div class="ttl"><p>Địa điểm :</p></div>
                                                <div class="input_txt">
                                                    <div class="input_txt_check">
                                                        <input type="checkbox" id="select_all_tab01" name="select_all_tab01" value="Tất cả">
                                                        <label for="select_all_tab01">Tất cả</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="s2_by_content_right">
                                                <div class="input_txt_items">
                                                    <!-- fix -->
                                                    <div class="input_txt_items_list">
                                                        <?php
                                                        $parent_term = get_term_by('slug', 'by_location', 'job-cat');

                                                        if ($parent_term) {
                                                            $by_location_terms = get_terms([
                                                                'taxonomy'   => 'job-cat',
                                                                'parent'     => $parent_term->term_id,
                                                                'hide_empty' => false,
                                                                'number'     => 4,
                                                                'orderby'    => 'term_order',
                                                                'order'      => 'ASC',
                                                            ]);

                                                            if (!empty($by_location_terms) && !is_wp_error($by_location_terms)) {
                                                                $i = 1;
                                                                foreach ($by_location_terms as $term) {
                                                                    $id = 'tab01_loc' . $i;

                                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                                    } else {
                                                                        $term_name = $term->name;
                                                                    }
                                                                    ?>
                                                                    <div class="input_txt_item_checkbox">
                                                                        <input id="<?php echo esc_attr($id); ?>" 
                                                                            type="checkbox" 
                                                                            name="by_location[]" 
                                                                            value="<?php echo esc_attr($term->slug); ?>">
                                                                        <label for="<?php echo esc_attr($id); ?>">
                                                                            <?php echo esc_html($term_name); ?>
                                                                        </label>
                                                                    </div>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <!-- fix -->
                                                </div>

                                                <div class="s2_right_button_search">
                                                    <button type="submit"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="<?php echo home_url('/job-search/#job_search_ttl01'); ?>" method="get" class="s2_by_content" id="s2_tab02">
                                    <div class="s2_by_content_box">
                                        <div class="s2_by_content_flex">
                                            <div class="s2_by_content_left">
                                                <div class="ttl"><p>Công việc :</p></div>
                                                <div class="input_txt">
                                                    <div class="input_txt_check">
                                                        <input type="checkbox" id="select_all_tab02" name="select_all_tab02" value="Tất cả">
                                                        <label for="select_all_tab02">Tất cả</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="s2_by_content_right">
                                                <div class="input_txt_items">
                                                    <div class="input_txt_items_list">
                                                        <?php
                                                        $parent_term = get_term_by('slug', 'by_company', 'job-cat');
                                                        if ($parent_term) {
                                                            $by_company_terms = get_terms([
                                                                'taxonomy'   => 'job-cat',
                                                                'parent'     => $parent_term->term_id,
                                                                'hide_empty' => false,
                                                                'number'     => 4,
                                                                'orderby'    => 'term_order',
                                                                'order'      => 'ASC',
                                                            ]);

                                                            if (!empty($by_company_terms) && !is_wp_error($by_company_terms)) {
                                                                $i = 1;
                                                                foreach ($by_company_terms as $term) {
                                                                    $id = 'tab02_com' . $i;
                                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                                    } else {
                                                                        $term_name = $term->name;
                                                                    }
                                                                    ?>
                                                                    <div class="input_txt_item_checkbox">
                                                                        <input id="<?php echo esc_attr($id); ?>" 
                                                                            type="checkbox" 
                                                                            name="by_company[]" 
                                                                            value="<?php echo esc_attr($term->slug); ?>">
                                                                        <label for="<?php echo esc_attr($id); ?>">
                                                                            <?php echo esc_html($term_name); ?>
                                                                        </label>
                                                                    </div>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="s2_right_button_search">
                                                    <button type="submit"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="<?php echo home_url('/job-search/#job_search_ttl01');  ?>" method="get">
                                    <div id="s2_tab03" class="s2_by_content">
                                        <div class="s2_by_content_box">
                                            <div class="s2_by_content_flex">
                                                <div class="s2_by_content_left">
                                                    <div class="ttl"><p>Ngành nghề :</p></div>
                                                    <div class="input_txt">
                                                        <div class="input_txt_check">
                                                            <input type="checkbox" id="select_all_tab03" name="Tất cả" value="Tất cả">
                                                            <label for="select_all_tab03">Tất cả</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="s2_by_content_right">
                                                    <div class="input_txt_items">
                                                        <div class="input_txt_items_list">
                                                            <?php
                                                            $by_job_terms = get_terms([
                                                                'taxonomy'   => 'job-cat',
                                                                'parent'     => get_term_by('slug', 'by_job', 'job-cat')->term_id,
                                                                'hide_empty' => false,
                                                                'number'     => 4,
                                                                'orderby'    => 'term_order',
                                                                'order'      => 'ASC',
                                                            ]);
                                                            if (!empty($by_job_terms) && !is_wp_error($by_job_terms)) {
                                                                $i = 1;
                                                                foreach ($by_job_terms as $term) {
                                                                    $id = 'tab03_loc' . $i;
                                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                                    } else {
                                                                        $term_name = $term->name;
                                                                    }
                                                                ?>
                                                                   <div class="input_txt_item_checkbox">
                                                                        <input id="<?php echo esc_attr($id); ?>" 
                                                                            type="checkbox" 
                                                                            name="by_job[]" 
                                                                            value="<?php echo esc_attr($term->slug); ?>">
                                                                        <label for="<?php echo esc_attr($id); ?>">
                                                                            <?php echo esc_html($term_name); ?>
                                                                        </label>
                                                                    </div>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="s2_right_button_search">
                                                        <button type="submit"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="<?php echo home_url('/job-search/#job_search_ttl01'); ?>" method="get">
                                    <div id="s2_tab04" class="s2_by_content">
                                        <div class="s2_by_content_box">
                                            <div class="s2_by_content_flex">
                                                <div class="s2_by_content_left">
                                                    <div class="ttl"><p>Thu nhập :</p></div>
                                                    <div class="input_txt">
                                                        <div class="input_txt_check">
                                                            <input type="checkbox" id="select_all_tab04" name="Tất cả" value="Tất cả">
                                                            <label for="select_all_tab04">Tất cả</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="s2_by_content_right">
                                                    <div class="input_txt_items">
                                                        <div class="input_txt_items_list">
                                                            <?php
                                                            $money_terms = get_terms([
                                                                'taxonomy'   => 'job-cat',
                                                                'parent'     => get_term_by('slug', 'money', 'job-cat')->term_id,
                                                                'hide_empty' => false,
                                                                'number'     => 4,
                                                                'orderby'    => 'term_order',
                                                                'order'      => 'ASC',
                                                            ]);
                                                            if (!empty($money_terms) && !is_wp_error($money_terms)) {
                                                                $i = 1;
                                                                foreach ($money_terms as $term) {
                                                                    $id = 'tab04_loc' . $i;
                                                                    $name_vn = trim((string) get_term_meta($term->term_id, 'name_category_vn', true));

                                                                    if ($current_language === 'vi' || $current_language === 'vi_VN') {
                                                                        $term_name = ($name_vn !== '') ? $name_vn : $term->name;
                                                                    } else {
                                                                        $term_name = $term->name;
                                                                    }
                                                                    ?>
                                                                    <div class="input_txt_item_checkbox">
                                                                         <input id="<?php echo esc_attr($id); ?>" 
                                                                             type="checkbox" 
                                                                             name="money[]" 
                                                                             value="<?php echo esc_attr($term->slug); ?>">
                                                                         <label for="<?php echo esc_attr($id); ?>">
                                                                             <?php echo esc_html($term_name); ?>
                                                                         </label>
                                                                     </div>
                                                                     <?php
                                                                     $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="s2_right_button_search">
                                                        <button type="submit"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- refix -->
                                <!-- fix -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec03">
        <div class="s3_bg">
            <div class="inner">
                <div class="s3_head">
                    <div class="sec_ttl">
                        <h3>
                            <span class="ttl01">Ứng viên có nguyện vọng chuyển việc</span>
                            <span class="ttl02">Career change</span>
                        </h3>
                    </div>
                    <div class="s3_des_all">
                        <p>
                        Đối với ứng viên có nguyện vọng chuyển việc tại Việt Nam,<br class="pc">
                        chúng tôi cung cấp hướng dẫn dễ hiểu về hệ thống hỗ trợ,<br class="pc">
                        quy trình, chia sẻ trải nghiệm thực tế, và các câu hỏi thường gặp.<br>
                        Trước hết, xin hãy tham khảo thông tin tại đây.
                        </p>
                    </div>
                </div>
                <div class="s3_body">
                    <div class="s3_content">
                        <div class="s3_list">
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img01_fix.jpg" alt="Lý do nên chọn chúng tôi"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">Lý do nên chọn chúng tôi</p>
                                            <p class="en">Why choose us?</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>KOSAIDO HR VIETNAM là công ty cung cấp dịch vụ nhân sự toàn diện (one-stop provider) tại Việt Nam.<br class="">Chúng tôi hỗ trợ hỗ trợ toàn diện để giải quyết các vấn đề mà các doanh nghiệp Nhật Bản gặp phải, từ tuyển dụng nhân sự, đào tạo – bồi dưỡng, cho đến chế độ phúc lợi.</p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/about-us/feature/">Xem thêm</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img02_fix.jpg" alt="Quy trình tìm việc - chuyển việc"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">Quy trình tìm việc - <br class="sp">chuyển việc</p>
                                            <p class="en">The process</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>KOSAIDO HR VIETNAM cung cấp dịch vụ hỗ trợ toàn diện cho quá trình tìm việc và chuyển việc tại Việt Nam. Từ tư vấn cho đến khi nhận kết quả trúng tuyển và chính thức gia nhập công ty, chúng tôi luôn đồng hành tận tâm cùng con đường sự nghiệp của bạn.</p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/about-us/flow/">Xem thêm</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img03_fix.jpg" alt="Chia sẻ từ những người thành đạt"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">Chia sẻ từ những người thành đạt</p>
                                            <p class="en">USER VOICE?</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>
                                            Giới thiệu những chia sẻ thực tế từ những người đã thành công tìm được việc làm tại Việt Nam.<br>
                                            Chúng tôi giúp bạn chỉnh sửa hồ sơ ứng tuyển và hỗ trợ tận tình, mang đến cho bạn cảm giác an tâm mà không nơi nào khác có được.
                                            </p>
                                        </div>
                                        <!-- <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/user-voice/">Xem thêm</a></p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img04_fix.jpg" alt="Câu hỏi thường gặp"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">Câu hỏi thường gặp</p>
                                            <p class="en">faq</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>Cung cấp các câu trả lời dưới dạng Hỏi & Đáp dễ hiểu cho những thắc mắc về chuyển việc tại Việt Nam. Từ khâu chuẩn bị trước khi sang Việt Nam cho đến cuộc sống thực tế tại địa phương, chúng tôi trả lời cặn kẽ những câu hỏi thường gặp để bạn yên tâm bắt đầu hành trình mới.</p>
                                        </div>
                                        <!-- <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/qa/">Xem thêm</a></p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec04">
        <div class="s4_bg">
            <div class="inner">
                <div class="s4_head">
                    <div class="sec_ttl">
                        <h3>
                            <span class="ttl01">VỀ KOSAIDO</span>
                            <span class="ttl02">about us</span>
                        </h3>
                    </div>
                </div>
                <div class="s4_body">
                    <div class="s4_left">
                        <div class="s4_img">
                            <p><img loading="lazy" width="639" height="523" src="<?php bloginfo('template_url') ?>/images/s4_img01.png" alt="KOSAIDOについて"></p>
                        </div>
                    </div>
                    <div class="s4_right">
                        <div class="s4_des">
                            <p>
                                <span class="color">KOSAIDO HR VIETNAM</span>là công ty cung cấp dịch vụ nhân sự trọn gói (One-Stop Provider) tại Việt Nam.<br>
                                CÔNG TY TNHH KOSAIDO HR VIỆT NAM là công ty nhân sự nước ngoài đầu tiên của Tập đoàn Kosaido Holdings (niêm yết trên Sàn giao dịch Chứng khoán Tokyo Prime, mã chứng khoán 7868).<br>
                                Kế thừa hơn 70 năm kinh nghiệm của Kosaido trong các lĩnh vực dịch vụ nhân sự, in ấn và quảng cáo, chúng tôi mang đến cho các doanh nghiệp Nhật Bản tại Việt Nam những giải pháp toàn diện về nhân sự.<br>
                                Các dịch vụ chính bao gồm: hỗ trợ tuyển dụng, kiểm tra năng lực & phân tích tổ chức, đào tạo nhân sự, tư vấn phúc lợi doanh nghiệp, và đào tạo ngôn ngữ. Với vai trò là đối tác cung cấp dịch vụ nhân sự trọn gói, Kosaido HR Vietnam cam kết đóng góp vào việc phát triển hoạt động kinh doanh của Quý Doanh nghiệp.
                            </p>
                            <!-- <ul class="s4_list">
                                <li>人材採用支援</li>
                                <li>適性検査・組織分析</li>
                                <li>人材教育研修</li>
                                <li>福利厚生コンサルティング</li>
                                <li>語学学校事業にも進出</li>
                            </ul>
                            <p>
                                人材サービスのワンストップ・プロバイダーとして 貴社事業のス<br class="pc">ピードアップに貢献をいたします。
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="s4_list_logo">
                    <div class="s4_logo_col find_out">
                        <p><img loading="lazy" width="201" height="113" src="<?php bloginfo('template_url') ?>/images/s4_logo01.png" alt="JAPAN KOSAIDO GROUP YUKI"></p>
                        <a target="_blank" href="https://www.yukicenter.com/?srsltid=AfmBOoox0CV9-u9-oAkWTncY8ypt9a7fnuPu3Psr2MQTQ2XMNeiROzRE" arial-label="JAPAN KOSAIDO GROUP YUKI"></a>
                    </div>
                    <div class="s4_logo_col find_out">
                        <p><img loading="lazy" width="190" height="134" src="<?php bloginfo('template_url') ?>/images/s4_logo02.png" alt="KOSAIDO GROUP ZEN"></p>
                        <a target="_blank" href="https://zen.kosaidovn.com/" arial-label="KOSAIDO GROUP ZEN"></a>
                    </div>
                    <div class="s4_logo_col find_out">
                        <p><img loading="lazy" width="238" height="112" src="<?php bloginfo('template_url') ?>/images/s4_logo03.png" alt="KOSAIDO HOLDINGS"></p>
                        <a href="https://www.kosaido.co.jp/" arial-label="KOSAIDO HOLDINGS"></a>
                    </div>
                    <div class="s4_logo_col find_out">
                        <p><img loading="lazy" width="264" height="124" src="<?php bloginfo('template_url') ?>/images/s4_logo04.png" alt="KOSAIDO BUSINESS SUPPORT"></p>
                        <a target="_blank" href="https://www.kosaido-biz.co.jp/" arial-label="KOSAIDO BUSINESS SUPPORT"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec05">
        <div class="s5_bg">
            <div class="inner">
                <div class="s5_head">
                    <div class="sec_ttl">
                        <h3>
                            <span class="ttl01">Chuyên mục của Việt Nam</span>
                            <span class="ttl02">Column</span>
                        </h3>
                    </div>
                </div>
                <div class="s5_content">
                    <div class="s5_content_list">
                        <?php
                        $args = array(
                            'post_type'      => 'column',
                            'posts_per_page' => 3,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'suppress_filters' => false,
                            'lang' => $current_language,
                        );
                        $column_query = new WP_Query($args);
                        if ($column_query->have_posts()) :
                            while ($column_query->have_posts()) : $column_query->the_post();
                                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/images/dummy.jpg';
                                $date_y = get_the_date('Y.m');
                                $date_d = get_the_date('d');
                        ?>
                            <div class="s5_content_col find_a">
                                <div class="s5_ct_box">
                                    <div class="s5_date">
                                        <div class="month">
                                            <p><?php echo esc_html($date_y); ?></p>
                                        </div>
                                        <div class="day">
                                            <p><?php echo esc_html($date_d); ?></p>
                                        </div>
                                    </div>
                                    <div class="s5_img">
                                        <p>
                                            <a href="<?php the_permalink(); ?>">
                                                <img loading="lazy" width="392" height="300"
                                                    src="<?php echo esc_url($thumb); ?>"
                                                    alt="<?php the_title(); ?>">
                                            </a>
                                        </p>
                                        <div class="s5_btn_small">
                                            <p>
                                                <a href="<?php the_permalink(); ?>"
                                                aria-label="<?php the_title(); ?>"></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="s5_info">
                                        <div class="s5_ttl">
                                            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                        </div>
                                        <div class="des">
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>コラム記事はまだありません。</p>';
                        endif;
                        ?>
                    </div>
                    <div class="s5_btn">
                        <p class="btn center">
                            <a href="<?php bloginfo('url') ?>/column/">Danh sách chuyên mục</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_contact">
        <div class="inner">
            <div class="s_contact_flex">
                <div class="s_contact_left">
                    <div class="s_contact_ttl">
                        <div class="sec_ttl">
                            <h3>
                                <span class="ttl01">Liên hệ</span>
                                <span class="ttl02">contact Us</span>
                            </h3>
                        </div>
                    </div>
                    <div class="s_contact_des">
                        <p>Hãy liên hệ với chúng tôi để được tư vấn.</p>
                    </div>
                </div>
                <div class="s_contact_right">
                    <div class="contact_btn">
                        <p><a href="<?php bloginfo('url') ?>/contact/">
                            <span class="icon_mail"></span>
                            <span class="txt">Liên hệ</span>
                            <span class="icon_btn"></span>
                        </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>