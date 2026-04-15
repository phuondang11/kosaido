$(window).bind('load', function() {
    "use strict";
    // AOS.init({
    //     once: "true",
    //     duration: 1200,
    //     disable : "mobile"
    // });
    // main visual
    $('.s2_by_content').hide();
    $('.s2_by_content:first').show();
    $('.s2_by_list_col').on('click', function() {
        const target = $(this).data('target');
        $('.s2_by_list_col').removeClass('active');
        $(this).addClass('active');
        $('.s2_by_content').hide();
        $('#' + target).fadeIn(200);
    });
});

// load Iframe
if($('iframe').length){
    var vidDefer_h = $('iframe').offset().top;
    var window_h = $(window).outerHeight();

    function iframe_defer() {
        var vidDefer = document.getElementsByTagName('iframe');
        for (var i=0; i<vidDefer.length; i++) {
            if(vidDefer[i].getAttribute('data-src')) {
                vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
            }
        }
        $(vidDefer).removeAttr('data-src');
    }

    $(window).bind('scroll load',function () {
        if ($(this).scrollTop() > vidDefer_h - window_h / 2) {
            iframe_defer();
        }
    });
}

$(document).ready(function(){
    $('.s2_by_content_left input[type="checkbox"]').on('change', function () {
        const isChecked = $(this).is(':checked');
        const $flex = $(this).closest('.s2_by_content_flex');
        const $rightCheckboxes = $flex.find('.s2_by_content_right input[type="checkbox"]');
        const $rightItems = $flex.find('.input_txt_item_checkbox');
    
        $(this).closest('.s2_by_content_left').toggleClass('active', isChecked);
        $rightCheckboxes.prop('checked', isChecked);
        $rightItems.toggleClass('active', isChecked);
      });
})