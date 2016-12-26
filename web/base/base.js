// function navbarEvent() {
//     setTimeout(function() {
//         var ele = $(".collapse");
//         $(".navbar").bind("mouseenter", function() {
//             ele.slideDown("slow");
//         });
//         $(".navbar").bind("mouseleave", function() {
//             ele.slideUp("slow");
//         });
//     }, 800);
// }
// navbarEvent();

// $(window).resize(function() {
//     if (window.innerWidth <= 768) {
//         $(".navbar").unbind();      
//     } else {
//         navbarEvent();       
//     }
// });

var loadAnimate = function() {
    // $("body").append('<div id="loaddiv" style="position: fixed;width: 100%;height: 100%;top: 0px;background-color: black;opacity: .6;z-index: 999999999999999999;"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div></div>');
    // setTimeout(function() {
    //     $("#loaddiv").remove();
    //     delete loadAnimate;
    // }, 1000);
};

$(function() {
    loadAnimate();
    // 初始化轮播
    $("#myCarousel").carousel('cycle');

    $("#toTopBtn").click(function() {
        $('html,body').animate({
            scrollTop: '0px'
        }, 800);
    });
    updataUserinfo();
});

var active = true;

function listenToHeart() {
    setTimeout(function() {
        listenToHeart();
        console.log("用户" + (active ? "活动" : "休眠"));
    }, 30000);
}
$(window).bind("mousemove keyup", function(e) {
    active = true;
    setTimeout(function() {
        active = false;
    }, 30000);
});

$(window).scroll(function() {
    if (window.scrollY > 100) {
        $(".navbar").fadeOut("slow");
        $("#toTop").fadeIn('slow');
    } else {
        $(".navbar").fadeIn("slow");
        $("#toTop").fadeOut('slow');
    }
    listenToHeart();
});

function testLogin(){
    if(localStorage.blog_username){
            if(localStorage.blog_logined){

            }else{
                console.log("sleep");
            }
        }else{
         window.location.href="/apps/web/?r=site/login"
        }
}

function updataUserinfo(){
    if (localStorage.blog_username) {
        if (localStorage.blog_logined) {
            $("li[name='info'] span").html(localStorage.blog_username);
            $("li[name='loginlink']").css("display", "none");
            $("li[name='reglink']").css("display", "none");
            $("li[name='logoutlink']").css("display", "block");
        } else {
            $("li[name='info'] span").html("未登录");
            $("li[name='loginlink']").css("display", "block");
            $("li[name='reglink']").css("display", "block");
            $("li[name='logoutlink']").css("display", "none");
        }
    } else {
        $("#userinfo li[name='info']").html("未登录");
        $("#userinfo li[name='loginlink']").css("display", "block");
        $("#userinfo li[name='reglink']").css("display", "block");
        $("#userinfo li[name='logoutlink']").css("display", "none");
    }
}





/*自定义方法*/
function convertUrlParams(url) {
    var pstr = url.substring(url.indexOf("?") + 1);
    var parr = pstr.split("&");
    var obj = {};
    for (var i = 0; i < parr.length; i++) {
        var items = parr[i].split("=");
        obj[items[0]] = items[1];
    }
    return obj;
}

function convertUrl(url) {
    var index = url.lastIndexOf("/");
    var obj = {};
    obj["path"] = url.substring(0, index);
    obj["filename"] = url.substring(index + 1);
    return obj;
}

function getObj_vars_num(data) {
    var count = 0;
    for (var i in data) {
        count++;
    }
    return count;
}

function isObjectValueEqual(a, b) {
    // Of course, we can do it use for in 
    // Create arrays of property names
    var aProps = Object.getOwnPropertyNames(a);
    var bProps = Object.getOwnPropertyNames(b);

    // If number of properties is different,
    // objects are not equivalent
    if (aProps.length != bProps.length) {
        return false;
    }

    for (var i = 0; i < aProps.length; i++) {
        var propName = aProps[i];

        // If values of same property are not equal,
        // objects are not equivalent
        if (a[propName] !== b[propName]) {
            return false;
        }
    }

    // If we made it this far, objects
    // are considered equivalent
    return true;
}
