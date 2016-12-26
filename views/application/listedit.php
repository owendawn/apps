<?php
$this->title = "application-listedit"
?>
<!--<link rel="stylesheet" href="/apps/web/lib/bootstrap-datatables/dataTables.bootstrap.css">-->
<link rel="stylesheet" href="//cdn.bootcss.com/datatables/1.10.12/css/dataTables.bootstrap.min.css">
<!--<script src="/apps/web/lib/bootstrap-datatables/jquery.dataTables.js"></script>-->
<script src="//cdn.bootcss.com/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<!--<script src="/apps/web/lib/bootstrap-datatables/dataTables.bootstrap.js"></script>-->
<script src="//cdn.bootcss.com/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="/apps/web/lib/dataTables.extends.js"></script>
<style>
    .tabs-left > .nav-tabs {
        top: auto;
        margin-bottom: 0;
        float: left;
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
    }

    .tabs-left > .nav-tabs > li {
        float: none;
    }

    .nav-tabs > li {
        margin-bottom: -2px;
    }

    .tabs-left > .nav-tabs > li > a, .tabs-right > .nav-tabs > li > a {
        min-width: 60px;
    }

    .tabs-left > .nav-tabs > li > a, .tabs-left > .nav-tabs > li > a:focus, .tabs-left > .nav-tabs > li > a:hover {
        margin: 0 -1px 0 0;
    }

    .nav-tabs > li:first-child > a {
        margin-left: 0;
        border-left: 1px solid #fbfbfb;
    }

    .tabs-left .tab-content, .tabs-right .tab-content {
        overflow: auto;
    }

    .tab-content {
        background-color: #fbfbfb;
        padding: 16px 12px;
        position: relative;
        -webkit-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        -moz-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    }

    .tabs-left > .nav-tabs > li.active > a, .tabs-left > .nav-tabs > li.active > a:focus,
    .tabs-left > .nav-tabs > li.active > a:hover {
        border: 0;
        border-left: 2px solid #5db2ff;
        border-right-color: transparent;
        margin: 0 -1px 0 -1px;
        margin-top: 0px;
        margin-right: -1px;
        margin-bottom: 0px;
        margin-left: -1px;
        -webkit-box-shadow: -2px 0 3px 0 rgba(0, 0, 0, .3);
        -moz-box-shadow: -2px 0 3px 0 rgba(0, 0, 0, .3);
        box-shadow: -2px 0 3px 0 rgba(0, 0, 0, .3);
    }

    .nav-tabs > li > a, .nav-tabs > li > a:focus {
        border-radius: 0 !important;
        color: #777;
        margin-right: -1px;
        line-height: 12px;
        position: relative;
        z-index: 11;
    }

    .nav-tabs > li.active > a:active, .nav-tabs > li.active > a:focus {
        background-color: #FBFBF7;
    }
</style>
<script>
    testLogin();
</script>

<div style="position: fixed; height: 100%; width: 100%;">
    <img src="http://d.139.sh/owendawn139/Resource/img/p3.jpg" style="width: 100%;">
</div>
<div>&nbsp;</div>
<div class="col-xs-12"
     style="margin-top: 300px; padding-left: 10%; padding-right: 10%; padding-top: 0px;">
    <div class="tabbable tabs-left">
        <ul class="nav nav-tabs" id="myTab3">
            <li class="tab-sky active"><a data-toggle="tab" href="#home3">
                    <i class="glyphicon glyphicon-home"></i>
                </a></li>
            <li class="tab-red"><a data-toggle="tab" href="#profile3">
                    <i class="glyphicon glyphicon-trash"></i>
                </a></li>
        </ul>
        <div class="tab-content">
            <div id="home3" class="tab-pane active col-xs-12">
                <div class="row localpath">
                    <div class="col-xs-9">
                        <div style="border-left: 4px solid green; padding-left: 10px;">Favor
                            &gt; FavorEdit
                        </div>
                    </div>
                    <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                        <a href="/apps/web/?r=application/index" data-toggle="tooltip" data-placement="bottom"
                           title="博客中心">
                            <i class="fa  fa-list-ul"></i>
                        </a>
                    </div>
                </div>
                <br>

                <div class="col-xs-12">
                    <button id="editabledatatable_new" class="btn-info btn">新增行</button>
                </div>
                <div class="col-xs-12">
                    <table id="editabledatatable"
                           class="table table-bordered table-striped table-condensed flip-content"></table>
                </div>
            </div>
            <div id="profile3" class="tab-pane col-xs-12">

                <div class="row localpath">
                    <div class="col-xs-9">
                        <div style="border-left: 4px solid green; padding-left: 10px;">Favor &gt; FavorEdit &gt; 回收站</div>
                    </div>
                    <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                        <a href="/apps/web/?r=application/index" data-toggle="tooltip" data-placement="bottom"
                           title="博客中心">
                            <i class="fa  fa-list-ul"></i>
                        </a>
                    </div>
                </div>
                <br>

                <div class="col-xs-12">
                    <table id="trashdatatable" class="table table-bordered table-striped table-condensed flip-content"
                           style="width: 100%;"></table>
                </div>

            </div>
            <div class="horizontal-space"></div>
        </div>

        <script src="/apps/views/application/listedit.js"></script>

