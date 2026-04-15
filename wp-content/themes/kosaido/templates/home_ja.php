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
                        <p>ベトナムでの新たなキャリアを。</p>
                    </div>
                    <div class="btn_all">
                        <p class="btn"><a href="<?php bloginfo('url') ?>/job-search/">求人検索</a></p>
                        <p class="btn"><a href="<?php bloginfo('url') ?>/contact/">お問い合わせ</a></p>
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
                            <span class="ttl01">新着求人</span>
                            <span class="ttl02">非公開求人も多数保有しています。</span>
                        </h3>
                    </div>
                    <div class="s2_ct02_btn">
                        <p class="btn">
                            <a href="<?php bloginfo('url') ?>/job-search/">求人検索</a>
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
                                                    <dt>求人タイトル</dt>
                                                    <dd><?php echo esc_html(get_the_title()); ?></dd>
                                                </dl>

                                                <?php if (!empty($txt_show02)) : ?>
                                                <dl>
                                                    <dt>仕事内容</dt>
                                                    <dd><?php echo wpautop($txt_show02); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show03)) : ?>
                                                <dl>
                                                    <dt>勤務地</dt>
                                                    <dd><?php echo wpautop(($txt_show03)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show04)) : ?>
                                                <dl>
                                                    <dt>給与</dt>
                                                    <dd><?php echo wpautop(($txt_show04)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($txt_show05)) : ?>
                                                <dl class="normal">
                                                    <dt>こんな方に<br>おすすめ</dt>
                                                    <dd><?php echo wpautop(($txt_show05)); ?></dd>
                                                </dl>
                                                <?php endif; ?>

                                                <?php if (!empty($job_code)) : ?>
                                                <dl>
                                                    <dt>Job code</dt>
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
                        <p class="btn center"><a href="<?php bloginfo('url') ?>/job-list/">求人情報一覧</a></p>
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
                                <span class="ttl01">求人検索</span>
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
                                        <p>キーワード検索</p>
                                    </div>
                                    <div class="s2_form_search_text">
                                        <div class="s2_form_search_box">
                                            <input type="text" name="job_keyword" placeholder="キーワードを入力"
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
                                                <p><img loading="lazy" width="18" height="23" src="<?php bloginfo('template_url') ?>/images/s2_ic01.svg" alt="勤務地から探す"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>勤務地<br class="sp">から探す</p>
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
                                                <p><img loading="lazy" width="19" height="23" src="<?php bloginfo('template_url') ?>/images/s2_ic02.svg" alt="業種から探す"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>業種<br class="sp">から探す</p>
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
                                                <p><img loading="lazy" width="21" height="17" src="<?php bloginfo('template_url') ?>/images/s2_ic03.svg" alt="職種から探す"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>職種<br class="sp">から探す</p>
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
                                                <p><img loading="lazy" width="22" height="22" src="<?php bloginfo('template_url') ?>/images/s2_ic04.svg" alt="月収から探す"></p>
                                            </div>
                                            <div class="info">
                                                <div class="txt01">
                                                    <p>月収か<br class="sp">ら探す</p>
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
                                                <div class="ttl"><p>勤務地 :</p></div>
                                                <div class="input_txt">
                                                    <div class="input_txt_check">
                                                        <input type="checkbox" id="select_all_tab01" name="select_all_tab01" value="全選択">
                                                        <label for="select_all_tab01">全選択</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="s2_by_content_right">
                                                <div class="input_txt_items">
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
                                                                    ?>
                                                                    <div class="input_txt_item_checkbox">
                                                                        <input id="<?php echo esc_attr($id); ?>" type="checkbox" name="by_location[]" value="<?php echo esc_attr($term->slug); ?>">
                                                                        <label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($term->name); ?></label>
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

                                <form action="<?php echo home_url('/job-search/#job_search_ttl01'); ?>" method="get" class="s2_by_content" id="s2_tab02">
                                    <div class="s2_by_content_box">
                                        <div class="s2_by_content_flex">
                                            <div class="s2_by_content_left">
                                                <div class="ttl"><p>会社 :</p></div>
                                                <div class="input_txt">
                                                    <div class="input_txt_check">
                                                        <input type="checkbox" id="select_all_tab02" name="select_all_tab02" value="全選択">
                                                        <label for="select_all_tab02">全選択</label>
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
                                                                    ?>
                                                                    <div class="input_txt_item_checkbox">
                                                                        <input id="<?php echo esc_attr($id); ?>" type="checkbox" name="by_company[]" value="<?php echo esc_attr($term->slug); ?>">
                                                                        <label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($term->name); ?></label>
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
                                                    <div class="ttl"><p>職種 :</p></div>
                                                    <div class="input_txt">
                                                        <div class="input_txt_check">
                                                            <input type="checkbox" id="select_all_tab03" name="全選択" value="全選択">
                                                            <label for="select_all_tab03">全選択</label>
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
                                                                    echo '<div class="input_txt_item_checkbox">';
                                                                    echo '<input id="' . esc_attr($id) . '" type="checkbox" name="by_job[]" value="' . esc_attr($term->slug) . '">';
                                                                    echo '<label for="' . esc_attr($id) . '">' . esc_html($term->name) . '</label>';
                                                                    echo '</div>';
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
                                                    <div class="ttl"><p>給与 :</p></div>
                                                    <div class="input_txt">
                                                        <div class="input_txt_check">
                                                            <input type="checkbox" id="select_all_tab04" name="全選択" value="全選択">
                                                            <label for="select_all_tab04">全選択</label>
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
                                                                    echo '<div class="input_txt_item_checkbox">';
                                                                    echo '<input id="' . esc_attr($id) . '" type="checkbox" name="money[]" value="' . esc_attr($term->slug) . '">';
                                                                    echo '<label for="' . esc_attr($id) . '">' . esc_html($term->name) . '</label>';
                                                                    echo '</div>';
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
                            <span class="ttl01">転職希望の方へ</span>
                            <span class="ttl02">Career change</span>
                        </h3>
                    </div>
                    <div class="s3_des_all">
                        <p>
                            ベトナムでの転職をお考えの方へ、サポート体制・流れ・体験談・よくある質問まで、<br class="pc"> 必要な情報をわかりやすくご案内しています。まずはこちらをご覧ください。
                        </p>
                    </div>
                </div>
                <div class="s3_body">
                    <div class="s3_content">
                        <div class="s3_list">
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img01_fix.jpg" alt="弊社が選ばれる理由"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">弊社が選ばれる理由</p>
                                            <p class="en">Why choose us?</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>KOSAIDO HR VIETNAMは、ベトナムにおける人材サービスのワンストップ・プロバイダーです。<br>採用支援から教育研修、福利厚生まで、日系企業様の課題解決をトータルでサポートします。</p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/about-us/feature/">詳しくはこちら</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img02_fix.jpg" alt="ご就職・転職の流れ"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">ご就職・転職の流れ</p>
                                            <p class="en">The process</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>KOSAIDO HR VIETNAMでは、ベトナムでの就職・転職を一貫してサポート。<br>
                                            ご相談から内定・入社まで、あなたのキャリアを丁寧に伴走します。</p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/about-us/flow/">詳しくはこちら</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img03_fix.jpg" alt="成功者の声"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">成功者の声</p>
                                            <p class="en">USER VOICE?</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>
                                                実際にベトナム就職を果たした方の声をご紹介。<br>
                                                履歴書添削や親身なサポートで、他にはない安心感をお届けしています。
                                            </p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/user-voice/">詳しくはこちら</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s3_row">
                                <div class="s3_box">
                                    <div class="s3_img">
                                        <p><img loading="lazy" width="1078" height="580" src="<?php bloginfo('template_url') ?>/images/s3_img04_fix.jpg" alt="よくある質問"></p>
                                    </div>
                                    <div class="s3_info">
                                        <div class="s3_info_ttl">
                                            <p class="ja">よくある質問</p>
                                            <p class="en">faq</p>
                                        </div>
                                        <div class="s3_info_des">
                                            <p>ベトナム転職に関する疑問をQ&A形式でわかりやすく解説。 渡航前の準備から現地生活まで、よくある質問に丁寧にお答えします。</p>
                                        </div>
                                        <div class="s3_info_btn">
                                            <p class="btn"><a href="<?php bloginfo('url') ?>/qa/">詳しくはこちら</a></p>
                                        </div>
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
                            <span class="ttl01">KOSAIDOについて</span>
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
                                <span class="color">KOSAIDO HR VIETNAM</span>ベトナムにおける人材サービスのワンストップ・プロバイダーです。 KOSAIDO HR VIETNAM COMPANY LIMITEDは、広済堂ホールディングス (東証プライム上場証券コード7868)グループ初の海外人材事業会社です。
                            </p>
                            <p>
                                創業以来70年以上の長きにわたり 人材サービス・印刷・広告の分<br class="pc">野で培った広済堂の幅広いノウハウ、 中でも人材サービスに関する事業をペトナムの日系企業様に提供しています。
                            </p>
                            <ul class="s4_list">
                                <li>人材採用支援</li>
                                <li>適性検査・組織分析</li>
                                <li>人材教育研修</li>
                                <li>福利厚生コンサルティング</li>
                                <li>語学学校事業にも進出</li>
                            </ul>
                            <p>
                                人材サービスのワンストップ・プロバイダーとして 貴社事業のス<br class="pc">ピードアップに貢献をいたします。
                            </p>
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
                            <span class="ttl01">ベトナム最新動向コラム</span>
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
                            <a href="<?php bloginfo('url') ?>/column/">コラム一覧</a>
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
                                <span class="ttl01">お問い合わせ</span>
                                <span class="ttl02">contact Us</span>
                            </h3>
                        </div>
                    </div>
                    <div class="s_contact_des">
                        <p>お気軽にご相談、<br class="sp">お問合わせお願い致します。</p>
                    </div>
                </div>
                <div class="s_contact_right">
                    <div class="contact_btn">
                        <p><a href="<?php bloginfo('url') ?>/contact/">
                            <span class="icon_mail"></span>
                            <span class="txt">お問い合わせ</span>
                            <span class="icon_btn"></span>
                        </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>