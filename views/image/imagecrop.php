<?php
$this->title = "imageCrop"
?>
<link rel="stylesheet" href="/apps/web/lib/dropzone/dropzone.css">
<link rel="stylesheet" type="text/css"
      href="/apps/web/lib/Jcrop-0.9.12/css/jquery.Jcrop.css">
<script src="/apps/web/lib/dropzone/dropzone.js"></script>
<style type="text/css">
    #rightsection {
        background-color: white;
        width: 65%;
        margin-left: 3%;
        display: inline-block;
        border-radius: 3px 3px 3px 3px;
        vertical-align: top;
    }

    #leftsection {
        background-color: white;
        width: 29%;
        padding: 30px;
        padding-left: 40px;
        margin-top: 0px;
        vertical-align: top;
        display: inline-block;
    }

    @media ( max-width: 900px) {
        #leftsection {
            display: none;
        }

        #rightsection {
            width: 100%;
        }
    }

    .nav-tabs {
        margin-bottom: 0;
        margin-left: 0;
        border: 0;
        top: 2px;
        background-color: #eee;
        -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        border-radius: 3px 3px 3px 3px;
        /*border-bottom: 1px solid #ddd;*/
    }

    .nav-tabs > li {
        margin-bottom: -3px;
    }

    .nav-tabs > li > a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: #262626;
        border: 0;
        border-top: 2px solid #2dc3e8;
        border-bottom-color: transparent;
        background-color: #fbfbfb;
        z-index: 12;
        line-height: 16px;
        margin-top: -2px;
        box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, .15);
    }

    .tab-content {
        background-color: #fbfbfb;
        padding: 16px 12px;
        position: relative;
        -webkit-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        -moz-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    }

    .nav-tabs > li.active.tab-red > a {
        border-color: #df5138 !important;
        border-top-color: rgb(223, 81, 56);
        border-right-color: rgb(223, 81, 56);
        border-bottom-color: rgb(223, 81, 56);
        border-left-color: rgb(223, 81, 56);
    }

    .dropzone .dz-preview .dz-remove {
        opacity: .6;
        color: white;
        text-decoration: none;
        border-radius: 3px 3px 3px 3px;
        background-color: silver;
    }

    .dropzone .dz-preview .dz-remove:hover {
        background-color: black;
        text-decoration: none;
    }

    /* Apply these styles only when #preview-pane has
       been placed within the Jcrop widget */
    .jcrop-holder #preview-pane {
        display: block;
        position: absolute;
        z-index: 2000;
        top: 10px;
        right: -280px;
        padding: 6px;
        border: 1px rgba(0, 0, 0, .4) solid;
        background-color: white;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
    }

    /* The Javascript code will set the aspect ratio of the crop
       area based on the size of the thumbnail preview,
       specified here */
    #preview-pane .preview-container {
        overflow: hidden;
        padding: 0px;
    }
</style>


<div style="position: fixed; height: 100%; width: 100%;">
    <img src="https://vi1.6rooms.com/live/2017/01/14/19/1002v1484392467024417861_b.jpg" style="width: 100%;">
<!--    <img src="http://d.139.sh/owendawn139/Resource/img/p1.jpg" style="width: 100%;">-->
</div>
<div>&nbsp;</div>
<div class="col-xs-12" style="margin-top: 300px; padding-left: 10%; padding-right: 10%; padding-top: 0px;">
    <section id="leftsection">
        <br>
        <div><img id="portrait" src="/apps/web/img/favicon.ico" style="width: 100%;"></div>
        <hr>
        fiksjpfsk;dfnl <br> dhsfhsl <br>
        <hr>
    </section>
    <section id="rightsection" class="tabbable">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a data-toggle="tab" href="#home">图片上传</a></li>
            <li class="tab-red"><a data-toggle="tab" href="#profile">图片处理</a></li>
        </ul>
        <div class="tab-content col-xs-12" style="padding: 15px; padding-left: 20px;">
            <div id="home" class="tab-pane in active">
                <div class="row localpath">
                    <div class="col-xs-9">
                        <div style="border-left: 4px solid green; padding-left: 10px;">
                            Blog &gt; BlogManager &gt; 图片上传
                        </div>
                    </div>
                    <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                        <a href="/apps/web/?r=blog/manager" data-toggle="tooltip" data-placement="bottom" title="博客管理">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                </div>
                <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>

                <div id="dropzone">
                    <form id="dropzoneform" action="" class="dropzone"
                          enctype="multipart/form-data" method="post">
                        <div class="dz-message needsclick">
                            Drop files here or click to upload. <br/>
                            <span class="note needsclick">
                                (This is just a demo dropzone.Selected files are <strong>not</strong> actually uploaded.)
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div id="profile" class="tab-pane">
                <div class="row localpath">
                    <div class="col-xs-9">
                        <div style="border-left: 4px solid green; padding-left: 10px;">
                            Blog &gt; BlogManager &gt; 截图处理
                        </div>
                    </div>
                    <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                        <a href="/apps/web/?r=blog/manager" data-toggle="tooltip" data-placement="bottom" title="博客管理">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12" stype="padding:20px;">
                    <div class="row">
                        <div class="col-xs-12  col-md-8">
                            <h4>上传图片</h4>
                            <hr>
                            <img id="handleImg" src="" class="col-xs-12" style="height: auto;">
                        </div>
                        <div id="preview-pane" class="col-xs-12 col-md-4">
                            <h4>截图预览</h4>
                            <hr>
                            <div class="preview-container col-xs-12"><img id="portrait" src="" style="width: 100%;"></div>
                            <div class="col-xs-12" style="margin-top: 20px;">
                                <input type="hidden" id="x1">
                                <input type="hidden" id="x2">
                                <input type="hidden" id="y1">
                                <input type="hidden" id="y2">
                                <input type="hidden" id="temppath">
                                <input type="hidden" id="tempname">
                                <button class="btn btn-info col-xs-offset-3 col-xs-4" id="subcrop">截图</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<script src="/apps/web/lib/Jcrop-0.9.12/js/jquery.Jcrop.js" type="text/javascript"></script>
<script src="/apps/views/image/imagecrop.js"></script>
</html>
