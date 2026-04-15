<?php
$current_language = get_locale();
$currlang = get_bloginfo( 'language' );
$path_flow = array(
    'ja' => 'ご就職・転職の流れ',
    'vi' => 'Quy trình tìm việc và chuyển việc',
);
$path_feature = array(
    'ja' => '弊社が選ばれる理由',
    'vi' => 'Lý do chọn Kosaido HR Vietnam',
);
$path_company = array(
    'ja' => '会社概要',
    'vi' => 'Giới thiệu công ty',
);
?>
<div id="topic_path">
    <div class="inner clearfix">
    <ul>
        <li><a href="<?php bloginfo('url'); ?>">HOME</a></li>
        <?php if (is_page('flow')) { ?>
            <li><?php echo $path_flow[$currlang] ?></li>
        <?php } elseif (is_page('feature')) { ?>
            <li><?php echo $path_feature[$currlang] ?></li>
        <?php } elseif (is_page('company')) { ?>
            <li><?php echo $path_company[$currlang] ?></li>
        <?php } elseif (is_page('job-search')) { ?>
            <li>求人情 報検索</li>
        <?php } elseif (is_page('thanks')) { ?>
            <?php if ( $post->post_parent ) { ?>
                <li><a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></li>
            <?php } ?>
            <li><?php echo get_the_title() ?></li>
        <?php } else { ?>
            <li><?php echo get_the_title(); ?></li>
        <?php } ?>
    </ul>
    </div>
</div>