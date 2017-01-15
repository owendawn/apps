<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = "Pan 我的地盘，我做主！ -- Pan Blog Zone";

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=2.0,Transition=10)"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/apps/web/yois.ico" type="image/x-icon"/>

<!--    <link rel="stylesheet" href="/apps/web/lib/font-awesome/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">

<!--    <link rel="stylesheet" href="/apps/web/lib/bootstrap-3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="/apps/web/base/base.css">

<!--    <script src="/apps/web/lib/jquery-2.1.4/jquery-2.1.4.min.js"></script>-->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!--    <script src="/apps/web/lib/bootstrap-3.3.5/js/bootstrap.min.js"></script>-->
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/apps/web/base/base.js"></script>


    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body <?php if( $this->context->hasProperty("useDefaultBg")){if($this->context->useDefaultBg==true){print("class='background'");}}?>>
<?php $this->beginBody() ?>

<link rel="stylesheet" href="/apps/views/layouts/main.css">

<div id="toTop"
     style="position: fixed; width: 80px; height: 60px; background-color: black; z-index: 9999; right: 20px; bottom: 30px; opacity: .7; border-radius: 3px 3px 3px 3px; display: none;">
    <a id="toTopBtn" style="display: block; cursor: pointer;">
        <p style="font-size: 60pt; margin: 0px 0px; line-height: 100%; padding: 0px 15px; top: -13px; position: relative;">
            <i class="fa fa-angle-up"></i>
        </p>

        <p style="font-size: 12pt; padding: 0px 4px; position: relative; top: 20px;">Up
            To Top</p>
    </a>
</div>

<div id="menudiv" class="col-xs-2 col-sm-2 col-md-1 col-lg-1 pull-right"
     style="padding: 0px; padding-top: 10px; z-index: 999;position:absolute;right:0px;">
    <div class="menu">
        <img alt="logo" src="/apps/web/img/logo.png">
    </div>
    <ul class="submenu">
        <li name="info" class="userinfoli"><span style="text-align:center;font-size:11pt;overflow:hidden;">未登录</span></li>
        <li name="loginlink" class="userinfoli"><a href="/apps/web/?r=site/login" style="height:27px;">登录</a></li>
        <li name="reglink" class="userinfoli"><a href="/apps/web/?r=site/register" style="height:27px;">注册</a></li>
        <li name="logoutlink" class="userinfoli" style="display:none;"><a href="#" style="color:red;height:27px;">Logout</a></li>
        <li style="height:10px;"></li>
        <li><span style="border-top-left-radius:50%;border-top-right-radius:50%;"></span></li>
        <li data-index=1 data-href="/apps/web/"><a>Home</a></li>
        <li style="height:10px;"><span></span></li>
        <li data-index=2 data-href="/apps/web/?r=blog/index"><a>Blog</a></li>
        <li style="height:10px;"><span></span></li>
        <li data-index=3 data-href="/apps/web/?r=dailytalk/index"><a style="line-height:23.5px;">Daily Talk</a></li>
        <li style="height:10px;"><span></span></li>
        <li data-index=4 data-href="/apps/web/?r=application/index"><a>应用</a></li>
        <li><span style="border-bottom-left-radius:50%;border-bottom-right-radius:50%;"></span></li>
        <li  class="hover" style="margin:auto;width:66%;background-color:rgba(0,0,0,0);opacity:0.3;height:70px;border-bottom-left-radius:27px;border-bottom-right-radius:27px;border-top-left-radius:27px;border-top-right-radius:27px;">
            <a style="background-color:inherit;">&nbsp;</a>
        </li>
    </ul>
</div>

<script rel="script" src="/apps/views/layouts/main.js"></script>
<?= $content ?>

<?php //$this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
