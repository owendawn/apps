<?php
$this->title = "application"
?>
<link href="/apps/web/lib/jquery.magnific-popup/magnific-popup.css" rel="stylesheet">
<script src="/apps/web/lib/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/apps/web/lib/jQuery.scrollLoading.js"></script>
<style>
    .data tr td img {
        width: 80px;
        height: 80px;
    }

    .data tr td {
        height: 150px;
    }

    #left p, #right p {
        font-size: 10pt;
        color: #CAF5F1;
    }

    img {
        text-align: center;
        display: block;
        margin: auto;
    }

    #baidu {
        text-decoration: none;
        color: gray;
    }

    #fm {
        text-decoration: none;
        color: purple;
        display: block;
        margin: auto;
    }

    .gallery-cont {
        /*background-color: #f6f6f6;*/
        color: rgb(85, 85, 85);
        font-size: 13px;
        font-weight: 200;
        line-height: 21px;
        padding: 15px 30px 30px 30px;
        margin-top: 0;
    }

    .gallery-cont .item {
        margin-bottom: 20px;
        padding-right: 10px;
        padding-left: 10px;
    }

    .gallery-cont .item .head {
        padding: 10px 10px;
        /*background: #fff;*/
        background-color: #F6F6F6;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        /*background-color: rgb(255, 255, 255);*/
    }

    .gallery-cont .item .over {
        top: 0;
        opacity: 0;
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(36, 148, 242, 0.8);
        transition: opacity 300ms ease;
        -webkit-transition: opacity 300ms ease;
    }

    .gallery-cont .img {
        height: 228px;
        overflow: hidden;
    }

    .gallery-cont .img img {
        width: auto;
        height: 228px;
    }

    .gallery-cont .img .over .func {
        margin-top: -80px;
        position: relative;
        top: 50%;
        text-align: center;
        transition: margin-top 200ms ease-in-out;
    }

    .gallery-cont .img .over .func a {
        display: inline-block;
        height: 50px;
        margin-right: 2px;
        width: 50px;
        margin-right: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
    }

    .gallery-cont .img .over .func i {
        font-size: 20px;
        color: #fff;
        line-height: 2.4;
    }

    .gallery-cont .img .over .func a:hover {
        background: rgba(255, 255, 255, 0.3)
    }

    .gallery-cont .img .over .func i {
        font-size: 20px;
        color: #fff;
        line-height: 2.4
    }

    .gallery-cont .item .img:hover .over {
        opacity: 1
    }

    .gallery-cont .item .img:hover .over .func {
        margin-top: -25px
    }

    .thumb-meta-time {
        position: absolute;
        margin-top: 200px;
        margin-left: 10px;
        color: cyan;
        z-index: 99;
        width:100%;
        text-align: center;;
    }

    .linkbtn1 > div > a {
        color: #D6CECE;
    }

    .linkbtn1 > div > a:hover {
        color: white;
    }
</style>
<script>
    testLogin();
</script>


<div >
    <div class="row linkbtn1 col-xs-12">
        <div class="col-xs-9" style="font-size: 16pt; top: 10px; left: 10px;">
            <a href="/apps/web/?r=application/listedit" data-toggle="tooltip" data-placement="bottom" title="应用管理">
                <i class="fa fa-th"></i>
            </a>
        </div>
    </div>
    <section class="col-xs-12" style="margin-top: 35px; position: relative; padding: 50px;" id="main">
        <div style="width: 100%; height: 10%; text-align: center; font-size: x-large;">
            <a id="baidu" href="http://www.baidu.com" target="_blank">baidu</a>
        </div>
        <div class="row">
            <div class="col-xs-2" id="left">
                <p>
                    “人生若只如初见，何事秋风悲画扇”如果人生的很多事，很多的境遇，很多的人，都还如初见时的模样该多好呀！若只是初见，一切美好都不会遗失。很多时候，初见，惊艳；蓦然回首，却已是物是人非,沧海桑田。。。</p>

                <p>
                    “执子之手，与子偕老”简简单单一句话，道尽了古今多少人的愿望。就像那首歌，“我能想到最浪漫的事，就是和你一起慢慢变老。。。”其实啊，人生在世，求什么呢，若有一个人，愿意与你生死相随，这一生，也就够了。</p>

                <p>
                    “曾经沧海难为水，除却巫山不是云”永远是这样，人的心啊，看过辽阔的大海，就看不上寻常的小溪小河了，去看过巫山的云，就不觉得其他地方的云是云了。所以其实不要太早遇见好男人/好女人，因为万一捉不住他/她，你会一辈子都活在这句诗句里。</p>

                <p>“此情可待成追忆
                    只是当时已惘然”现在回想，旧情难忘，犹可追忆，只是一切都恍如隔世了。一个“已”字，可怕至极。若非当初年少无知，何至如此!</p>

                <p>“纵使相逢应不识，尘满面，鬓如霜”这是我最害怕的一句，若是不见也就罢了，若是相见，却互不认识，就这样在岁月里蹉跎地擦肩而过，那该是多么令人心碎的一幕。。。</p>
            </div>
            <div class="col-xs-8">
                <div class="gallery-cont col-xs-12 row"></div>
            </div>
            <div class="col-xs-2" id="right">
                <p>
                    The furthest distance in the world <br/>
                    &nbsp;&nbsp;---Rabindranath Tagore
                </p>
                <br/>

                <p>The furthest distance in the world Is not between life and
                    death But when I stand in front of you Yet you don’t know that I
                    love you</p>

                <p>The furthest distance in the world Is not when i stand in
                    font of you Yet you can’t see my love But when undoubtedly knowing
                    the love from both Yet cannot Be togehter</p>

                <p>The furthest distance in the world Is not being apart while
                    being in love But when plainly can not resist the yearning Yet
                    pretending You have never been in my heart</p>

                <P>The furthest distance in the world Is not But using one’s
                    indifferent heart To dig an uncrossable river For the one who loves
                    you</p>
            </div>
        </div>
    </section>
</div>
<script src="/apps/views/application/index.js"></script>

