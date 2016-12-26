$("#portrait").attr("src", convertUrlParams(window.location.href).url);


Dropzone.autoDiscover = false;
Dropzone.options.myAwesomeDropzone = false;
var dropz = new Dropzone("#dropzoneform", {
    url: "/apps/web/?r=image/cropimage",
    paramName: "file",
    acceptedFiles: ".gif,.jpeg,.jpg,.png",
    autoProcessQueue: true,
    addRemoveLinks: true,
    // uploadMultiple: true,
    //每次上传的最多文件数，经测试默认为2，坑啊记得修改web.config 限制上传文件大小的节
    parallelUploads: 100,
    thumbnailHeight: 120,
    thumbnailWidth: 120,
    maxFilesize: 30000,
    filesizeBase: 1000,
    params: {targetpath:"/apps/upload/",filename:convertUrl(convertUrlParams(window.location.href).url).filename},
    // previewTemplate: document.querySelector('#preview-template').innerHTML,
    init: function() {
        // var submitButton = document.querySelector("#submit-all");
        // myDropzone = this; // closure

        // //为上传按钮添加点击事件
        // submitButton.addEventListener("click", function() {
        //     //手动上传所有图片
        //     myDropzone.processQueue();
        // });

        // //当添加图片后的事件，上传按钮恢复可用
        // this.on("addedfile", function() {
        //     $("#submit-all").removeAttr("disabled");
        // });

        //当上传完成后的事件，接受的数据为JSON格式
        this.on("complete", function(data) {
            console.log(data);
            if (data.status == "success" && this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                $("[href='#profile']").click();
                var res=eval("("+data.xhr.responseText+")");
                console.log(res);
                $("#handleImg").attr('src', '/apps/upload/'+res.tempname);
                $("#tempname").val(res.tempname);
                $("#temppath").val("/apps/upload/");
                $(".preview-container img").attr('src', '/apps/upload/'+res.tempname);
                var scale = $(".preview-container").width() / $("#portrait").width();
                $(".preview-container").css({
                    width: $("#portrait").width() * scale,
                    height: $("#portrait").height() * scale
                });
                activeJcrop();
            }
        });

        // //删除图片的事件，当上传的图片为空时，使上传按钮不可用状态
        // this.on("removedfile", function() {
        //     if (this.getAcceptedFiles().length === 0) {
        //         $("#submit-all").attr("disabled", true);
        //     }
        // });
        // this.on("complete", function(file) {
        //     myDropzone.removeFile(file);
        // });
    }
});

$("#subcrop").click(function() {
    $.post("/apps/web/?r=image/crop", {
        "x1": $("#x1").val(),
        "x2": $("#x2").val(),
        "y1": $("#y1").val(),
        "y2": $("#y2").val(),
        "temppath":$("#temppath").val(),
        "tempname":$("#tempname").val(),
        "displaywidth":$('#handleImg').width()
    }, function(data) {
        if(data.success){
            alert("截图成功,将刷新页面");
            window.location.reload();
        }
    }, "json");
});


function activeJcrop() {
    // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,
        scale,
        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
        scale=xsize / ysize;
        console.log(xsize+"  "+ysize);

    $('#handleImg').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        bgColor: 'black',
        setSelect:   [ 0, 0, 100*scale, 100 ],
        aspectRatio: xsize / ysize
    }, function() {
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;

        // Move the preview into the jcrop container for css positioning
        // $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c) {
        if (parseInt(c.w) > 0) {
            var rx = xsize / c.w;
            var ry = ysize / c.h;

            $pimg.css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
            $("#x1").val(c.x);
            $("#x2").val(c.x2);
            $("#y1").val(c.y);
            $("#y2").val(c.y2);
        }
    }
}
