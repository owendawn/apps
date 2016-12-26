jQuery(document).ready(function($) {
    var $timeline_block = $('.cd-timeline-block');
    $timeline_block.each(function() {
        if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
            $(this).find('.cd-timeline-img, .cd-timeline-content,.cd-timeline-node').addClass('is-hidden');
        }
    });
    $(window).on('scroll', function() {
        $timeline_block.each(function() {
            if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden')) {
                $(this).find('.cd-timeline-img, .cd-timeline-content,.cd-timeline-node').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });
});
$(".portrait").each(function(index, el) {
 $(this).parent().append('<a href="/apps/web/?r=image/imagecrop&url='+
     $(this).attr("src")+
     '&belong=hello" class="profile-img img-responsive" style="display:none;background-color:black;position:absolute;opacity:.8;text-align:center;line-height: 110px;font-size: 10pt;color: lightslategray;">点击修改头像</a>')
});
$(".portrait").bind("mouseenter",function(){
    $(this).next("a").fadeIn('fast');
});
$(".portrait").bind("mouseleave",function(){
    $(this).next("a").fadeOut('slow');
});

$("[data-toggle='tooltip']").tooltip();