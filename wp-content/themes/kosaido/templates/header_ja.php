<header>
    <div class="h_box">
        <div class="header_top">
            <div class="h_top_btn">
                <p><a href="<?php bloginfo('url') ?>/job-list/"><span>求人をお探している方へ</span></a></p>
            </div>
            <div class="h_top_btn">
                <p><a href="<?php bloginfo('url') ?>/for-employers/"><span>企業のご担当者様へ</span></a></p>
            </div>
            <div class="h_top_plg">
                <div class="h_language">
                    <ul class="lang-switcher">
                        <?php
                        echo preg_replace(
                            '/^<ul[^>]*>|<\/ul>$/i', '',
                            bogo_language_switcher( array(
                                'type' => 'list',
                                'show_names' => false,
                                'echo' => false,
                            ) )
                        );
                        ?>
                    </ul>
                </div>
                <div class="h_social">
                    <ul>
                        <li><a target="_blank" href="https://web.facebook.com/KosaidoHrVietnamCompanyLimited"><img width="8" height="17" src="<?php bloginfo('template_url') ?>/images/fb_ic.svg" alt="facebook"></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/company/3798456"><img width="13" height="13" src="<?php bloginfo('template_url') ?>/images/link_ic.svg" alt="linked"></a></li>
                        <!-- <li><a target="_blank" href="#"><img width="15" height="11" src="<?php bloginfo('template_url') ?>/images/ytb_ic.svg" alt="youtube"></a></li> -->
                        <li><a href="<?php bloginfo('url') ?>/contact/"><img width="15" height="12" src="<?php bloginfo('template_url') ?>/images/mail_ic.svg" alt="mail"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header_bot">
            <div class="h_logo">
                <h1>
                    <a href="<?php bloginfo('url') ?>/">
                        <img width="381" height="48" src="<?php bloginfo('template_url') ?>/images/logo.png" alt="KOSAIDO HR VIETNAM">
                    </a>
                </h1>
            </div>
            <div class="h_bot_content">
                <div class="h_menu">
                    <nav>
                        <div class="h_menu_box">
                            <ul class="nav_list">
                                <li><a href="<?php bloginfo('url') ?>/">TOP</a></li>
                                <li><a href="<?php bloginfo('url') ?>/job-search/">求人情報検索</a></li>
                                <li class="parent">
                                    <span class="hook">広済堂について</span>
                                    <div class="sub">
                                        <ul>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/company/">会社概要</a></li>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/feature/">弊社が選ばれる理由</a></li>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/flow/">ご就職・転職の流れ</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="<?php bloginfo('url') ?>/user-voice/">成功者の声</a></li>
                                <li><a href="<?php bloginfo('url') ?>/qa/">就職Q&A</a></li>
                                <li><a href="<?php bloginfo('url') ?>/column/">コラム</a></li>
                            </ul>
                        </div>
                        <div class="sp">
                            <div class="header_top">
                                <div class="h_top_btn">
                                    <p><a href="<?php bloginfo('url') ?>/job-list/"><span>求人をお探している方へ</span></a></p>
                                </div>
                                <div class="h_top_btn">
                                    <p><a href="<?php bloginfo('url') ?>/for-employers/"><span>企業のご担当者様へ</span></a></p>
                                </div>
                                <div class="h_top_plg">
                                    <div class="h_language">
                                        <ul class="lang-switcher">
                                            <?php
                                            echo preg_replace(
                                                '/^<ul[^>]*>|<\/ul>$/i', '',
                                                bogo_language_switcher( array(
                                                    'type' => 'list',
                                                    'show_names' => false,
                                                    'echo' => false,
                                                ) )
                                            );
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="h_social">
                                        <ul>
                                            <li><a href="#"><img width="8" height="17" src="<?php bloginfo('template_url') ?>/images/fb_ic.svg" alt="facebook"></a></li>
                                            <li><a href="#"><img width="13" height="13" src="<?php bloginfo('template_url') ?>/images/link_ic.svg" alt="linked"></a></li>
                                            <li><a href="#"><img width="15" height="11" src="<?php bloginfo('template_url') ?>/images/ytb_ic.svg" alt="youtube"></a></li>
                                            <li><a href="<?php bloginfo('url') ?>/contact/"><img width="15" height="12" src="<?php bloginfo('template_url') ?>/images/mail_ic.svg" alt="mail"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="h_contact">
                                <p><a href="<?php bloginfo('url') ?>/contact/"><span>お問い合わせ</span></a></p>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="h_contact">
                    <p><a href="<?php bloginfo('url') ?>/contact/"><span>お問い合わせ</span></a></p>
                </div>
            </div>
            <!-- Hamburger Menu -->
            <div class="hamburger hamburger--3dxy">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
    </div>
</header>