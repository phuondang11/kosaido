<!doctype html>
<html lang="ja">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D3Z3JLXY98"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-D3Z3JLXY98');
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" >
<!-- SPEED -->
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="cache-control" max-age=86400 content="private, no-cache">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="<?php if(isset($GLOBALS['keywords'])){echo $GLOBALS['keywords'];} ?>" >

<link rel="preload" href="<?php echo get_theme_file_uri("css/slick.css"); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<?php if ( is_front_page() || is_home() ) { ?>
<link rel="preload" href="<?php echo get_theme_file_uri("css/aos.css"); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<?php } ?>

<?php wp_head(); ?>
<!-- FAVICON -->
<link rel="icon" href="<?php echo get_theme_file_uri('') ?>/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri('') ?>/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_file_uri('') ?>/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_file_uri('') ?>/favicon/favicon-16x16.png">
<link rel="manifest" crossorigin="use-credentials" href="<?php echo get_theme_file_uri('') ?>/favicon/site.webmanifest">
<meta property="og:image" content="<?php echo get_theme_file_uri('') ?>/images/ogp.jpg">

<?php $current_language = get_locale(); ?>
</head>


<body id="<?php if(isset($GLOBALS['pageID'])){echo $GLOBALS['pageID']; } ?>" class="<?php if(isset($GLOBALS['pageClass'])){echo $GLOBALS['pageClass'];} ?> <?php echo esc_attr( substr( get_locale(), 0, 2 ) ); ?> ">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3NGH9TV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper">
    <?php
        $current_language = get_locale();
        if ($current_language === 'vi' || $current_language === 'vi_VN') {
            include('templates/header_vi.php');
        } elseif ($current_language === 'ja' || $current_language === 'ja_JP') {
            include('templates/header_ja.php');
        } else {
            include('templates/header_ja.php');
        }
    ?>

