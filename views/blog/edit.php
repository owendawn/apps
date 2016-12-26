<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 10:13
 */
$this->title = "blog-edit"
?>
<style>
    #leftsection {
        background-color: white;
        width: 65%;
        display: inline-block;
        padding: 30px;
        padding-left: 40px;
        vertical-align: top;
    }

    #rightsection {
        background-color: white;
        margin-left: 3%;
        width: 29%;
        padding: 30px;
        padding-left: 40px;
        margin-top: 0px;
        vertical-align: top;
        display: inline-block;
    }

    @media ( max-width: 900px) {
        #rightsection {
            display: none;
        }

        #leftsection {
            width: 100%;
        }
    }
</style>
<!--<script type="text/javascript" charset="utf-8" src="/apps/web/lib/ueditor-utf8-1.4.3.1/ueditor.config.js"></script>-->
<script type="text/javascript" charset="utf-8" src="http://ueditor.baidu.com/ueditor/ueditor.config.js"></script>
<!--<script type="text/javascript" charset="utf-8" src="/apps/web/lib/ueditor-utf8-1.4.3.1/ueditor.all.min.js"></script>-->
<script type="text/javascript" charset="utf-8" src="http://ueditor.baidu.com/ueditor/ueditor.all.min.js"></script>
<!--<script type="text/javascript" charset="utf-8" src="/apps/web/lib/ueditor-utf8-1.4.3.1/lang/zh-cn/zh-cn.js"></script>-->
<script type="text/javascript" charset="utf-8" src="http://ueditor.baidu.com/ueditor/lang/zh-cn/zh-cn.js"></script>

<div style="position: fixed; height: 100%; width: 100%;">
    <img src="http://d.139.sh/owendawn139/Resource/img/p1.jpg" style="width: 100%;">
</div>
<div>&nbsp;</div>
<div class="col-xs-12" style="margin-top: 300px; padding-left: 10%; padding-right: 10%; padding-top: 0px;">
    <section id="leftsection">
        <div class="row localpath">
            <div class="col-xs-9">
                <div style="border-left: 4px solid green; padding-left: 10px;">Blog &gt; BlogEdit</div>
            </div>
            <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                <a href="/apps/web/?r=blog/manager" data-toggle="tooltip" data-placement="bottom" title="博客管理">
                    <i class="fa fa-th"></i>
                </a>
                <a href="/apps/web/?r=blog/index" data-toggle="tooltip" data-placement="bottom" title="博客中心">
                    <i class="fa  fa-list-ul"></i>
                </a>
            </div>
        </div>
        <br>
        <script id="editor" type="text/plain" style="width: 100%; height: 400px;"></script>
        <hr>
        <a id="submit" class="btn btn-info col-xs-2 col-xs-offset-5">保存</a>
    </section>
    <section id="rightsection">
        <div>
            <img src="/apps/web/img/favicon.ico" style="width: 100%;">
        </div>
        <hr>
        fiksjpfsk;dfnl<br> dhsfhsl<br>
        <hr>
    </section>
</div>

<script src="/apps/views/blog/edit.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>

