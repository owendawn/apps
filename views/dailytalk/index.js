$(window).scroll(function() {
    if (window.scrollY > 100) {
        $(".navbar").fadeOut("slow");
    } else {
        $(".navbar").fadeIn("slow");
    }
});

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

$("#emothionbtn").click(function(e) {
    $("#emotionlist").fadeToggle("slow", "linear");
});

$('#datepicker').datetimepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    showMeridian: true,
    todayBtn: "linked",
    minView: 2,
    minuteStep: 10,
    pickerPosition: "bottom-left",
    showMeridian: true,
    language: 'zh-CN'
}).on("changeDate", function() {
    alert($('#datepicker').datetimepicker('getFormattedDate'));
    $('#my_hidden_input').val(
        $('#datepicker').datetimepicker('getFormattedDate')
    );
});

$("#datechoicebtn").click(function(e) {
    var obj = $(this).parent().parent();
    if (obj.attr("data-datechoice-show") == "false") {
        obj.animate({
            "right": "0px"
        }, 1000, "swing", function() {
            obj.attr("data-datechoice-show", true);
        });

    } else if (obj.attr("data-datechoice-show") == "true") {
        obj.animate({
            "right": "-300px"
        }, 1000, "swing", function() {
            obj.attr("data-datechoice-show", false);
        });
    }
});

$("[data-toggle='tooltip']").tooltip();