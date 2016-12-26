/**
 * Created by Administrator on 2016/1/11.
 */
$("li[name='logoutlink']").click(function (event) {
    delete sessionStorage.blog_username;
    delete sessionStorage.blog_userid;
    delete sessionStorage.blog_logined;
    updataUserinfo();
    testLogin();
});
var dataindex = 1;
$("ul.submenu>li:not(.hover):not(.userinfoli)>a").hover(function () {
    $("ul.submenu>li:last").dequeue();
    var thisindex = $(this).parent().attr("data-index");
    $("ul.submenu>li:last").animate({"top": -360 + $(this).parent().attr("data-index") * 57 + "px"}, 300, "swing", function () {
        dataindex = thisindex;
        $("ul.submenu>li[data-index=" + dataindex + "]").css({color: "white"})
    });
});
$("ul.submenu>li.hover>a").click(function () {
    window.location.href = $("ul.submenu>li[data-index=" + dataindex + "]").attr("data-href");
});
$("div.menu").on("mouseenter", function () {
    event.stopPropagation();
    $(this).next().children("li:not(.hover)").css({
        opacity: 1,
        "-webkit-transform": "rotateY(0deg)",
        "-moz-transform": "rotateY(0deg)",
        "-ms-transform": "rotateY(0deg)",
        "-o-transform": "rotateY(0deg)",
        "transform": "rotateY(0deg)",

        "-webkit-transition-property": "opacity,transform",
        "-moz-transition-property": "opacity,transform",
        "-ms-transition-property": "opacity,transform",
        "-o-transition-property": "opacity,transform",
        "transition-property": "opacity,transform"
    });
    $(this).next().children("li.hover").css({
        "-webkit-transform": "rotateY(0deg)",
        "-moz-transform": "rotateY(0deg)",
        "-ms-transform": "rotateY(0deg)",
        "-o-transform": "rotateY(0deg)",
        "transform": "rotateY(0deg)",

        "-webkit-transition-property": "opacity,transform",
        "-moz-transition-property": "opacity,transform",
        "-ms-transition-property": "opacity,transform",
        "-o-transition-property": "opacity,transform",
        "transition-property": "opacity,transform"
    });
    $(this).next().children("li").each(function (index, b) {
        $(this).css({
            "-webkit-transition-delay": index * 50 + "ms",
            "-moz-transition-delay": index * 50 + "ms",
            "-ms-transition-delay": index * 50 + "ms",
            "-o-transition-delay": index * 50 + "ms",
            "transition-delay": index * 50 + "ms"
        });
    });
});
$("#menudiv").on(
    "mouseleave",
    function () {
        $("div.menu").next().children("li:not(.hover)").css({
            opacity: 0,
            "-webkit-transform": "rotateY(90deg)",
            "-moz-transform": "rotateY(90deg)",
            "-ms-transform": "rotateY(90deg)",
            "-o-transform": "rotateY(90deg)",
            "transform": "rotateY(90deg)",

            "-webkit-transition-property": "opacity,transform",
            "-moz-transition-property": "opacity,transform",
            "-ms-transition-property": "opacity,transform",
            "-o-transition-property": "opacity,transform",
            "transition-property": "opacity,transform"
        });
        $("div.menu").next().children("li.hover").css({
            "-webkit-transform": "rotateY(90deg)",
            "-moz-transform": "rotateY(90deg)",
            "-ms-transform": "rotateY(90deg)",
            "-o-transform": "rotateY(90deg)",
            "transform": "rotateY(90deg)",

            "-webkit-transition-property": "opacity,transform",
            "-moz-transition-property": "opacity,transform",
            "-ms-transition-property": "opacity,transform",
            "-o-transition-property": "opacity,transform",
            "transition-property": "opacity,transform"
        });
        $("div.menu").next().children("li")
            .each(
            function (index, b) {
                var during = 50
                    * ($("div.menu").next().children("li").length - 1) - index
                    * 50;
                $(this).css(
                    {
                        "-webkit-transition-delay": during + "ms",
                        "-moz-transition-delay": during + "ms",
                        "-ms-transition-delay": during + "ms",
                        "-o-transition-delay": during + "ms",
                        "transition-delay": during + "ms"
                    });
            });
    });