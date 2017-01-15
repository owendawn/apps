<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<link rel="stylesheet" href="/apps/web/index.css">
<div>
    <div style="z-index: 1;">
        <div id="myCarousel" class="carousel slide">
            <!-- ÂÖ²¥£¨Carousel£©Ö¸?? -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- ÂÖ²¥£¨Carousel£©Ïî?? -->
            <div class="carousel-inner ">
                <div class="item active">
                    <img src="https://vi0.6rooms.com/live/2017/01/14/19/1002v1484392485289091878_b.jpg" alt="First slide">
<!--                    <img src="http://d.139.sh/owendawn139/Resource/img/slide1.jpg" alt="First slide">-->
                    <div class="carousel-caption item-desc">
                        <p style="font-size: 50pt;">The best preparation for tomorrow</p>
                        <br>
                        <p style="font-size: 40pt;">is doing your best today</p>
                        <br
                        <p style="font-size: 20pt;">-- about Daily</p>
                    </div>
                </div>
                <div class="item">
                    <img src="https://vi3.6rooms.com/live/2017/01/14/19/1002v1484392492527275932_b.jpg" alt="Second slide">
<!--                    <img src="http://d.139.sh/owendawn139/Resource/img/slide2.jpg" alt="Second slide">-->
                    <div class="carousel-caption item-desc">
                        <p style="font-size: 50pt;">The greatest test of courage on earth</p>
                        <p style="font-size: 30pt;">is to bear defeat without losing heart.</p>
                        <br>
                        <p style="font-size: 20pt;">-- about Heart</p>
                    </div>
                </div>
                <div class="item">
                    <img src="https://vi3.6rooms.com/live/2017/01/14/19/1002v1484392497606232544_b.jpg" alt="Third slide">
<!--                    <img src="http://d.139.sh/owendawn139/Resource/img/slide3.jpg" alt="Third slide">-->
                    <div class="carousel-caption item-desc">
                        <p style="font-size: 40pt;">Don't aim for success if you want it;</p>
                        <br>
                        <p style="font-size: 25pt;">just do what you love and believe in, and it will come naturally.</p>
                        <br>
                        <p style="font-size: 20pt;">-- about Attitude</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="width: 100%; padding: 20px; border-top: 2px solid rgb(221, 221, 221); border-bottom: 2px solid rgb(230, 230, 230); margin-top: 4px; margin-bottom: 10px;">
        <div class="col-xs-offset-1 col-xs-3" style="border-right: 1px dashed gray;">
            <a class="btn btn-default index-link" style="font-size: 16pt; border-style: dashed; border-color: #DBB0F5; font-family: STLiti;" href="/apps/web/?r=application/index">
            <span style="text-shadow: 2px 1px 6px #F114D5, 0px -1px #F2F2F3, 1px -1px #93B957;">My - Favor</span>
                <span class="topline"></span>
                <span class="rightline"></span>
                <span class="bottomline"></span>
                <span class="leftline"></span>
            </a>
        </div>
        <div class="col-xs-offset-1 col-xs-3" style="border-right: 1px dashed gray;">
            <a class="btn btn-default index-link" style="font-size: 16pt; border-style: dashed; border-color: #DBB0F5; font-family: STLiti;" href="/apps/web/?r=dailytalk/index">
            <span style="text-shadow: 2px 1px 6px #F114D5, 0px -1px #F2F2F3, 1px -1px #93B957;">Daily Talk</span>
                <span class="topline"></span>
                <span class="rightline"></span>
                <span class="bottomline"></span>
                <span class="leftline"></span>
            </a>
        </div>
        <div class="col-xs-offset-1 col-xs-3">
            <a class="btn btn-default index-link"
               style="font-size: 16pt; border-style: dashed; border-color: #DBB0F5; font-family: STLiti;"
               href="/apps/web/?r=blog/index">
                <span style="text-shadow: 2px 1px 6px #F114D5, 0px -1px #F2F2F3, 1px -1px #93B957;">Micro-Blog</span>
                <span class="topline"></span>
                <span class="rightline"></span>
                <span class="bottomline"></span>
                <span class="leftline"></span>
            </a>
        </div>
    </div>
</div>