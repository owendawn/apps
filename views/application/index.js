$("#userinfo ul li[name='logoutlink']").click(function(event) {
	testLogin();
});
$("[data-toggle='tooltip']").tooltip();
(function() {

	var infs = null;
	$.ajax({
		type : "POST",
		url : "/apps/web/?r=application/getfavorlist",
		async : false,
		dataType : "json",
		data : {
			id : localStorage.blog_userid
		},
		success : function(msg) {

			infs = msg.data;
			for (var i = 0; i < msg.logs.length; i++) {
				console.warn(msg.logs[i]);
			}
		}
	});
	var imgcontext = "";

	for (var i = 0; i < infs.length; i++) {
		imgcontext += (''
				+ '<div class="item col-xs-6 col-sm-4 col-md-3">'
				+ ' <div class="photo">'

				// + ' <div class="head">'
				// + ' <span class="pull-right"><i class="fa
				// fa-heart"></i></span>'
				// + ' <h4>Ocean</h4>'
				// + ' <span class="desc">My Trips</span>'
				// + ' </div>'

				+ '     <div class="img">'
				+ '         <span class="thumb-meta-time"><i class="fa fa-clock-o"></i>'
				+ infs[i].linktitle + '</span>'
				+'			<div spellcheck="display:inline-block;">'
				+ '         <img class="scrollLoading" data-url="' + infs[i].linknew + '" src="http://i65.tinypic.com/2gt86jc.gif" style="' + infs[i].style + '">'
				//+ '         <img class="scrollLoading" data-url="' + infs[i].linknew + '" src="/apps/web/img/waiting.gif" style="' + infs[i].style + '">'
				+'			</div>'
				+ '         <div class="over">'
				+ '             <div class="func">'
				+ '                 <a href="' + infs[i].link
				+ '" target="_blank"><i class="fa fa-link"></i></a>'
				+ '                 <a href="' + infs[i].linknew
				+ '" class="image-zoom"><i class="fa fa-search"></i></a>'
				+ '             </div>' + '         </div>' + '     </div>'

				+ ' </div>' + '</div>');
	}
	$(".gallery-cont").html(imgcontext);
	$("img").load(function () {
		//图片默认隐藏  
		$(this).hide();
		//使用fadeIn特效  
		$(this).stop().fadeIn("5000");
	});
	// 异步加载图片，实现逐屏加载图片
	$(".scrollLoading").scrollLoading(); 

	$(".image-zoom").magnificPopup({
		type : "image",
		mainClass : "mfp-with-zoom",
		zoom : {
			enabled : !0,
			duration : 300,
			easing : "ease-in-out",
			opener : function(a) {
				var b = $(a);
				return b;
			}
		}
	});
	$(".image-zoom").magnificPopup({
		type : "image",
		mainClass : "mfp-with-zoom",
		zoom : {
			enabled : !0,
			duration : 300,
			easing : "ease-in-out",
			opener : function(a) {
				var b = $(a).parents("div.img");
				return b;
			}
		}
	});

})();
