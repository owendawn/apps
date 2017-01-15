<?php

/* @var $this yii\web\View */

$this->title = 'dailytalk';
?>
<link rel="stylesheet" type="text/css" href="/apps/web/lib/timeline.css">
<link rel="stylesheet" type="text/css"
      href="/apps/web/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
<style>
    #datepicker, .datetimepicker-inline table {
        width: 100%;
    }

    #datechoiceside {
        right: -300px;
    }

    #datechoicebtn {
        color: #C1BFBF;
    }

    #datechoicebtn:hover {
        color: white;
    }
</style>

<div style="position: fixed; height: 100%; width: 100%;">
    <img src="https://vi1.6rooms.com/live/2017/01/14/19/1002v1484392467024417861_b.jpg" style="width: 100%;">
<!--    <img src="http://d.139.sh/owendawn139/Resource/img/p1.jpg" style="width: 100%;">-->
</div>
<div>&nbsp;</div>
<div id="datechoiceside" data-datechoice-show=false style="heightp: 300px; width: 300px; position: fixed; background-color: #6F6B6B; opacity: .8; top: 100px; z-index: 99999999; padding: 10px; border-radius: 0px 0px 0px 5px;">
    <div style="padding: 5px; padding-left: 10px; font-size: 12pt; width: 50px; height: 30px; background-color: #6F6B6B; border-radius: 5px 0px 0px 5px; border-right: 2px solid greenyellow; margin-left: -60px; margin-top: -10px; border-radius: 5px 0px 0px 5px;">
        <a id="datechoicebtn" style="cursor:pointer;"><i class="glyphicon glyphicon-calendar"></i></a>
    </div>
    <div id="datepicker" data-date="2015-10-28" class="input-group" style="margin-top: -20px;"></div>
    <input type="hidden" id="my_hidden_input">
</div>
<div class="col-xs-12" style="margin-top: 300px; padding-left: 10%; padding-right: 10%; padding-top: 0px;">
    <section style="background-color: rgb(251, 251, 247); padding: 30px; padding-left: 40px; vertical-align: top; border-radius: 5px;">
        <div class="row localpath">
            <div class="col-xs-9">
                <div style="border-left: 4px solid green; padding-left: 10px;">Blog &gt; BlogArticle</div>
            </div>
            <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                <!-- <a href="/blog/webs/blogedit/blogedit.html" data-toggle="tooltip" data-placement="bottom"  title="写博客"> <i class="fa  fa-edit"></i></a>
                <a href="/blog/webs/blogmanager/blogmanager.html" data-toggle="tooltip" data-placement="bottom"  title="博客管理"> <i class="fa fa-th"></i></a>
                <a href="/blog/webs/blogarticle/blogarticle.html" data-toggle="tooltip" data-placement="bottom"  title="博客中心"> <i class="fa  fa-list-ul"></i></a> -->
            </div>
        </div>
        <br>

        <div class="col-xs-12" style="height: 80px;">
            <textarea class="col-xs-9" style="outline: none; resize: none; height: 100%;" placeholder="抒发一下此时的心情，分享个人的情绪，we are friends * ^_^！"></textarea>
            <div id="emotionlist"
                 style="width: 400px; height: 200px; background-color: gray; display: none; position: absolute; right: 25.9%; z-index: 999;"></div>
            <a id="emothionbtn" class="btn btn-default col-xs-1" style="height: 100%; border-radius: 0px 0px 0px 0px; font-size: 30pt;">
                <i class="fa fa-won"></i>
            </a>
            <a class="btn btn-default col-xs-2" style="height: 100%; border-radius: 0px 3px 3px 0px; font-size: 30pt;">
                <i class="fa fa-sign-in"></i>
            </a>
        </div>
        <hr class="col-xs-12">
        <div id="cd-timeline" class="cd-container cssanimations"
             style="margin-top: 100px;">
            <div class="cd-timeline-block">
                <div class="cd-timeline-node">
                    <a class="btn btn-info">today</a>
                </div>
            </div>
            <b></b>

            <div class="cd-timeline-block">
                <div class="cd-timeline-content border-left-3 border-yellow">
                    <h5>Title of section 1</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Iusto, optio, dolorum provident rerum aut hic quasi placeat iure
                        tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus
                        veritatis qui ut.
                    </p>
                    <div class="clearfix">
                        <a class="btn btn-primary pull-right">Read more</a>
                    </div>
                    <span class="cd-date">11:59</span>
                </div>
                <div class="cd-timeline-img cd-picture bg-red">
                    <i class="fa fa-photo fa-2x"></i>
                </div>
            </div>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-movie">
                    <i class="fa fa-video-camera fa-2x"></i>
                </div>
                <div class="cd-timeline-content  border-top-3 border-orange">
                    <h2>Title of section 2</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Iusto, optio, dolorum provident rerum aut hic quasi placeat iure
                        tempora laudantium ipsa ad debitis unde?
                    </p>
                    <div class="clearfix">
                        <a class="btn btn-primary pull-right">Read more</a>
                    </div>
                    <span class="cd-date">15:40</span>
                </div>
            </div>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-photo fa-2x"></i>
                </div>
                <div class="cd-timeline-content">
                    <h2>Title of section 3</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Excepturi, obcaecati, quisquam id molestias eaque asperiores
                        voluptatibus cupiditate error assumenda delectus odit similique
                        earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit,
                        itaque, deserunt corporis vero ipsum nisi eius odio natus ullam
                        provident pariatur temporibus quia eos repellat consequuntur
                        perferendis enim amet quae quasi repudiandae sed quod veniam
                        dolore possimus rem voluptatum eveniet eligendi quis fugiat
                        aliquam sunt similique aut adipisci.
                    </p>
                    <div class="clearfix">
                        <a class="btn btn-primary pull-right">Read more</a>
                    </div>
                    <span class="cd-date">18:12</span>
                </div>
            </div>
            <div class="cd-timeline-block">
                <div class="cd-timeline-node">
                    <a class="btn btn-info">yesterday</a>
                </div>
            </div>
            <b></b>

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                    <i class="fa fa-map-marker fa-2x"></i>
                </div>
                <div class="cd-timeline-content">
                    <h2>Title of section 4</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Iusto, optio, dolorum provident rerum aut hic quasi placeat iure
                        tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus
                        veritatis qui ut.
                    </p>
                    <div class="clearfix">
                        <a class="btn btn-primary pull-right">Read more</a>
                    </div>
                    <span class="cd-date">20:48</span>
                </div>
            </div>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                    <i class="fa fa-map-marker fa-2x"></i>
                </div>
                <div class="cd-timeline-content">
                    <h2>Title of section 5</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Iusto, optio, dolorum provident rerum.
                    </p>
                    <div class="clearfix">
                        <a class="btn btn-primary pull-right">Read more</a>
                    </div>
                    <span class="cd-date">21:22</span>
                </div>
            </div>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-movie">
                    <i class="fa fa-video-camera fa-2x"></i>
                </div>
                <div class="cd-timeline-content">
                    <h2>Final Section</h2>
                    <p>This is the content of the last section</p>
                    <span class="cd-date">23:59</span>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="/apps/web/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="/apps/web/lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/apps/views/dailytalk/index.js"></script>

