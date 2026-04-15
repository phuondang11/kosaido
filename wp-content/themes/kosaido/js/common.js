// Varial GLOBAL
var windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
var minWidthWrapper = $('#wrapper').css('min-width') ? $('#wrapper').css('min-width').slice(0, -2) : 1260;

var h_pc = 250;
var h_sp = 100;

$(window).bind('load resize',function(){
    windowWidth = $(window).width();
    if(windowWidth > 750){
        if(!$('.hamburger').hasClass('is_active')){
            $('nav').css('display','');
        }
    }

    if(windowWidth < 751){
        if($('.s5_content_list').length){
            $('.s5_content_list').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: true,
                variableWidth: true,
                arrows: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            });
        }
        $('.features_row').each(function() {
            const box = $(this).find('.features_box');
            const ttl = box.find('.ttl');
            const img = box.find('.features_img');
            ttl.insertBefore(img);
        });
        $('.flow_row').each(function() {
            const box = $(this).find('.flow_box');
            const ttl = box.find('.flow_ttl');
            const number = box.find('.flow_number');
            ttl.insertAfter(number);
        });
        
    }

    $("nav ul li a[href]:not(.sweetlink)").click(function() {
        if(windowWidth <= 750){
            $('.hamburger').removeClass('is_active');
            $('nav').css('display', 'none');
        }
    });
    // swap Image for PC & SP
    var $setElem = $('.swap'),
    pcName = '_pc',
    spName = '_sp';
    $setElem.each(function(){
        var $this = $(this);
        if (windowWidth > 750) {
            $this.attr('src', $this.attr('src').replace(spName, pcName)).css({ visibility: 'visible' });
        } else{
            $this.attr('src', $this.attr('src').replace(pcName, spName)).css({ visibility: 'visible' });
        }
    });
});
$(window).bind('load scroll',function(){
    $('.h_box').css('left', (windowWidth > 750 && windowWidth < minWidthWrapper) ? `-${$(this).scrollLeft()}px` : 'unset');
    $('body').toggleClass('is_scroll', $(this).scrollTop() >= 1);
    $('.to_top,.sp_contact').toggleClass('show', $(this).scrollTop() >= 500);
})
window.onpageshow = function (event) {
    if (performance.navigation.type != 2 ) {
        $('body').removeClass('is_nav');
    }
};
$(window).bind('load',function () {
    // check mac
    if (("standalone" in window.navigator) && window.navigator.standalone) { $("body").addClass("mac");}
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) { $('body').addClass('mac'); }

    function scroll_anchor(p) {
        if (windowWidth > 750) {
            $('html,body').animate({ scrollTop: p.top - h_pc }, 300);
        }else{
            $('html,body').animate({ scrollTop: p.top - h_sp }, 300);
        }
    }
    // anchor in page
    $('a[href^="#"]:not(.sweetlink)').click(function() {
        $('body').removeClass('is_nav');
        if($(this).attr('href').length > 1){
            if ($($(this).attr('href')).length) {
                var p = $($(this).attr('href')).offset();
                scroll_anchor(p);
            }
        }
        return false;
    });
    // anchor top to page #
    var hash = location.hash;
    if (hash) {
        var p = $(hash).offset();
        scroll_anchor(p);
    }
});

$(document).ready(function(){
    // setting menu
    $(".hamburger").click(function() {
        $(this).toggleClass("is_active");
        $('nav').fadeToggle(100);
        $('body').toggleClass('is_nav');
    });
    // nav
    $("nav .hook").click(function() {
        if (windowWidth <= 750) {
            $(this).toggleClass("open");
            $(this).next().stop(1, 0).slideToggle(400);
        } else {
            $(this).removeClass("open");
            $(this).next().removeAttr("style");
        }
    });
    // totop
    $('.to_top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
    // click item bind a href
    $('.find_a').on('click', function (e) {
        e.preventDefault();
        var href = $(this).find('a').attr('href');
        location.href = href;
    });
    $('.find_out').on('click', function (e) {
        e.preventDefault();
        var href = $(this).find('a').attr('href');
        window.open(href);
    });
    $('.find_a,.find_out').on('mouseenter', function () {
        $(this).find('a').addClass('hv');
    }).on('mouseleave', function () {
        $(this).find('a').removeClass('hv');
    });
    // Custom 
    $('.input_txt').on('click', function(e) {
        const checkbox = $(this).find('input[type="checkbox"]');
        if ($(e.target).is('input, label')) return;
        checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');
    });
    $('input[type="checkbox"]').on('change', function() {
        const parent = $(this).closest('.input_txt');
        parent.toggleClass('active', $(this).is(':checked'));
    });
    $('.input_txt_item_checkbox').on('click', function(e) {
        const checkbox = $(this).find('input[type="checkbox"]');
        if ($(e.target).is('input, label')) return;
        checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');
    });
    $('input[type="checkbox"]').on('change', function() {
        const parent = $(this).closest('.input_txt_item_checkbox');
        parent.toggleClass('active', $(this).is(':checked'));
    });
    $('.job_ds01_full_checkbox input[type="checkbox"]').on('change', function() {
        $(this).closest('.job_ds01_full_checkbox')
               .toggleClass('active', $(this).is(':checked'));
    });
    $('.job_ds02_full_checkbox input[type="checkbox"]').on('change', function() {
        $(this).closest('.job_ds02_full_checkbox')
               .toggleClass('active', $(this).is(':checked'));
    });
    $('.job_ds01_item input[type="checkbox"]').on('change', function() {
        $(this).closest('.job_ds01_item')
               .toggleClass('active', $(this).is(':checked'));
    });
    
    $('.faq_section').each(function() {
        const section = $(this);
        section.find('.faq_box').on('click', function() {
            const isActive = $(this).hasClass('active');
            section.find('.faq_box').removeClass('active');
            if (!isActive) {
                $(this).addClass('active');
            }
        });
    });
    if (windowWidth < 750) {
        $('.fe_box').each(function() {
            const box = $(this);
            const feImg = box.find('.fe_img');
            const feInfoTtl = box.find('.fe_info_ttl');
            feImg.insertAfter(feInfoTtl);
        });
    }

    const siteUrl = '<?php echo esc_url( home_url() ); ?>';
    $('.box_checkpoli.p01 .wpcf7-list-item-label').each(function() {
        const currentText = $(this).text();
        $(this).empty().append(
        '<a href="https://vietrytest.xsrv.jp/kosaido/wp/privacy-policy/" target="_blank">プライバシーポリシー</a>' + currentText
        );
    });
    
    $('.box_checkpoli.p02 .wpcf7-list-item-label').each(function() {
        let html = $(this).html();
        html = html.replace('入力した情報を再度ご確認ください。', '<br>入力した情報を再度ご確認ください。');
        $(this).html(html);
    });

})