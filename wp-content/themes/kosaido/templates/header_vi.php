<header>
    <div class="h_box">
        <div class="header_top">
            <div class="h_top_btn">
                <p><a href="<?php bloginfo('url') ?>/job-list/"><span>Dành cho người tìm việc</span></a></p>
            </div>
            <div class="h_top_btn">
                <p><a href="<?php bloginfo('url') ?>/for-employers/"><span>Dành cho đại diện công ty</span></a></p>
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
                        <li><a target="_blank" href=" https://web.facebook.com/KosaidoHrVietnamCompanyLimited"><img width="8" height="17" src="<?php bloginfo('template_url') ?>/images/fb_ic.svg" alt="facebook"></a></li>
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
                                <li><a href="<?php bloginfo('url') ?>/job-search/">Tìm kiếm việc làm</a></li>
                                <li class="parent">
                                    <span class="hook">Giới thiệu về Kosaido</span>
                                    <div class="sub">
                                        <ul>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/company/">Tổng quan công ty</a></li>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/feature/">Lý do nên chọn chúng tôi</a></li>
                                            <li><a href="<?php bloginfo('url') ?>/about-us/flow/">Quy trình tìm việc - chuyển việc</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="not_yet" ><a href="<?php bloginfo('url') ?>/user-voice/">Chia sẻ từ những người thành đạt</a></li>
                                <li class="not_yet"><a href="<?php bloginfo('url') ?>/qa/">Hỏi & đáp về việc làm</a></li>
                                <li><a href="<?php bloginfo('url') ?>/column/">Chuyên mục</a></li>
                            </ul>
                        </div>
                        <div class="sp">
                            <div class="header_top">
                                <div class="h_top_btn">
                                    <p><a href="<?php bloginfo('url') ?>/job-list/"><span>Dành cho người tìm việc</span></a></p>
                                </div>
                                <div class="h_top_btn">
                                    <p><a href="<?php bloginfo('url') ?>/for-employers/"><span>Dành cho đại diện công ty</span></a></p>
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
                                <p><a href="<?php bloginfo('url') ?>/contact/"><span>Liên hệ</span></a></p>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="h_contact">
                    <p><a href="<?php bloginfo('url') ?>/contact/"><span>Liên hệ</span></a></p>
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