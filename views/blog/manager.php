<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 10:13
 */
$this->title = "blog-manager"
?>
<link rel="stylesheet" type="text/css" href="/apps/web/lib/theme_styles.css">
<link rel="stylesheet" href="/apps/web/base/base.css">

<style>
    li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .dd-content {
        padding: .5em;
        margin-top: .5em;
        background-color: #f2f4f8;
        margin-bottom: .5em;
    }

    .dd-list {
        list-style-type: none;
        line-height: 20px;
    }

    .list-unstyled, .list-inline {
        padding-left: 0;
        list-style: none;
    }

    button.dd-handle.pull-left {
        margin-right: .5em;
    }

    .btn-info {
        /*background-clip: border-box;*/
        border-bottom-color: rgb(255, 255, 255);
        border-bottom-left-radius: 2px;
        border: none;
        line-height: 20px;
        /*height: 31px;*/
    }

    .btn-default {
        border: none;
        color: #43494d;
        background-color: #f2f4f8;
        display: block;
        float: left;
    }

    .btn-default:hover, .btn-default:focus {
        color: #43494d;
        background-color: #d1d8e6;
        border-color: #adbcc8;
    }

    .dd-item {
        line-height: 20px;
        font-size: 13px;
    }

    .dd-toggle::before {
        font-family: FontAwesome;
        content: '\f068';
    }

    .dd-toggle.collapsed::before {
        content: '\f067';
    }

    button.dd-handle.pull-left + .dd-toggle {
        margin-right: .5em;
        position: relative;
        left: -0.5em;
        margin-right: 0;
    }

    .badge-primary-lt {
        background: #1f86c7;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(31, 134, 199);
    }

    .badge-warning-lt {
        background: #f7b956;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(247, 185, 86);
    }

    .badge-info-lt {
        background: #25d6d8;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(37, 214, 216);
    }

    .label-success-lt {
        background: #22ba93;
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(34, 186, 147);
    }

    .badge.badge-empty {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        padding-top: 0;
        padding-bottom: 0;
        vertical-align: middle;
    }
</style>

<div style="position: fixed; height: 100%; width: 100%;">
    <img src="http://d.139.sh/owendawn139/Resource/img/p1.jpg" style="width: 100%;">
</div>
<div>&nbsp;</div>
<div class="col-xs-12"
     style="margin-top: 300px; padding-left: 10%; padding-right: 10%; padding-top: 0px;">
    <section
        style="background-color: rgb(251, 251, 247); padding: 30px; padding-left: 40px; vertical-align: top; border-radius: 5px;">
        <div class="row localpath">
            <div class="col-xs-9">
                <div style="border-left: 4px solid green; padding-left: 10px;">Blog &gt; BlogManager
                </div>
            </div>
            <div class="link-buttons col-xs-3" style="font-size: 16pt;">
                <a href="/apps/web/?r=blog/edit" data-toggle="tooltip" data-placement="bottom" title="写博客">
                    <i class="fa  fa-edit"></i>
                </a>
                <a href="/apps/web/?r=blog/index" data-toggle="tooltip" data-placement="bottom" title="博客中心">
                    <i class="fa  fa-list-ul"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group1.jpg" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>Angelina Jolie</h2>

                            <div class="job-position">Actress</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> New York</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="1b7a757c7e7772757a5b717477727e35787476">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e311' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (329) 239-3342</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">783</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">912</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">83</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group2.jpg" alt="" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>Robert Downey</h2>

                            <div class="job-position">Actor</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> Chicago</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="96e4f9f4f3e4e2d6f2f9e1f8f3efb8f5f9fb">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e312' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (942) 834-9382</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">92</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">127</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">361</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group3.jpg" alt="" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>Mila Kunis</h2>

                            <div class="job-position">Actress</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> San Francisco</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="83eeeaefe2c3e8f6edeaf0ade0ecee">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e313' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (823) 321-0192</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">44</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">91</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">3</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group4.jpg" alt="" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>Ryan Gosling</h2>

                            <div class="job-position">Actor</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> Los Angeles</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="f98b809897b99e968a9590979ed79a9694">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e314' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (829) 101-9499</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">192</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">99</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">20</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group5.jpg" alt="" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>S. Johansson</h2>

                            <div class="job-position">Actress</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> Paris</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="295a6943464148475a5a4647074a4644">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e315' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (901) 482-9010</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">1,293</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">439</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">290</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="main-box clearfix profile-box-contact">
                    <div class="main-box-body clearfix">
                        <div class="profile-box-header gray-bg clearfix">
                            <div style="z-index: 99;">
                                <img src="/apps/web/img/group6.jpg" alt="" class="profile-img img-responsive portrait"/>
                            </div>
                            <h2>Emma Watson</h2>

                            <div class="job-position">Actress</div>
                            <ul class="contact-details">
                                <li><i class="fa fa-map-marker"></i> London</li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a class="__cf_email__" href="/cdn-cgi/l/email-protection"
                                       data-cfemail="86e3ebebe7c6f1e7f2f5e9e8a8e5e9eb">
                                        [email&#160;protected]
                                    </a>
                                    <script data-cfhash='f9e316' type="text/javascript">
                                        /* <![CDATA[ */
                                        !function () {
                                            try {
                                                var t = "currentScript" in document ? document.currentScript : function () {
                                                    for (var t = document.getElementsByTagName("script"), e = t.length; e--;)
                                                        if (t[e].getAttribute("data-cfhash")) return t[e]
                                                }();
                                                if (t && t.previousSibling) {
                                                    var e, r, n, i, c = t.previousSibling.previousSibling,
                                                        a = c.getAttribute("data-cfemail");
                                                    if (a) {
                                                        for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                                        e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                                    }
                                                    t.parentNode.removeChild(t);
                                                }
                                            } catch (u) {
                                            }
                                        }()
                                        /* ]]> */
                                    </script>
                                </li>
                                <li><i class="fa fa-phone"></i> (303) 958-1009</li>
                            </ul>
                        </div>
                        <div class="profile-box-footer clearfix">
                            <a href="#"> <span class="value">28</span> <span class="label">Messages</span></a>
                            <a href="#"> <span class="value">9</span> <span class="label">Sales</span></a>
                            <a href="#"> <span class="value">33</span> <span class="label">Projects</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body-collapse collapse in">
            <div class="panel-body ">
                <ol class='nestable dd-list list-unstyled'>
                    <li class="dd-item">
                        <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                        <div class="dd-content">
                            <strong>Eligendi</strong>
                            <small>quidem qui dolores reiciendis et
                            </small>
                        </div>
                    </li>
                    <li class="dd-item">
                        <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                        <div class="dd-content">
                            <strong>Quae</strong>
                            <small>maxime provident odit mollitia omnis
                            </small>
                            <a href="#" class="badge badge-primary-lt badge-rounded badge-empty badge-grow pull-right"></a>
                        </div>
                    </li>
                    <li class="dd-item">
                        <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                        <button class="btn btn-default dd-toggle" data-toggle="collapse" data-target="#uidbe9b81134b2c5bf54bfca8bc3b2a234b"></button>
                        <div class="dd-content">
                            <strong>Ipsam</strong>
                            <small>aperiam soluta sunt voluptatem similique</small>
                        </div>
                        <ol class="dd-list collapse in"
                            id="uidbe9b81134b2c5bf54bfca8bc3b2a234b">
                            <li class="dd-item">
                                <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                                <div class="dd-content">
                                    <strong>Qui</strong>
                                    <small>ipsa vitae repudiandae maxime maiores</small>
                                    <a href="#" class="badge badge-warning-lt badge-rounded badge-empty badge-grow pull-right"></a>
                                </div>
                            </li>
                            <li class="dd-item">
                                <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                                <div class="dd-content">
                                    <strong>Aut</strong>
                                    <small>qui quo dolor exercitationem et</small>
                                    <a href="#" class="badge badge-primary-lt badge-rounded badge-empty badge-grow pull-right"></a>
                                </div>
                            </li>
                            <li class="dd-item">
                                <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                                <button class="btn btn-default dd-toggle" data-toggle="collapse" data-target="#uid9f4e67c5ea0c6b5e331723d43cf1e54c"></button>
                                <div class="dd-content">
                                    <strong>Nihil</strong>
                                    <small>blanditiis quasi deserunt expedita quia
                                    </small>
                                </div>
                                <ol class="dd-list collapse in" id="uid9f4e67c5ea0c6b5e331723d43cf1e54c">
                                    <li class="dd-item">
                                        <button class="btn btn-info dd-handle pull-left">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="dd-content">
                                            <strong>Est</strong>
                                            <small>omnis rerum voluptas nulla dolorum</small>
                                            <a href="#" class="badge badge-info-lt badge-grow pull-right">22</a>
                                        </div>
                                    </li>
                                    <li class="dd-item">
                                        <button class="btn btn-info dd-handle pull-left">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="dd-content">
                                            <strong>Vel</strong>
                                            <small>dicta tempore optio quo a</small>
                                        </div>
                                    </li>
                                    <li class="dd-item">
                                        <button class="btn btn-info dd-handle pull-left">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="dd-content">
                                            <strong>Odit</strong>
                                            <small>ut nostrum doloremque doloremque quia</small>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item">
                                <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                                <div class="dd-content">
                                    <strong>Consequatur</strong>
                                    <small>maiores et earum aut aliquid</small>
                                    <a href="#" class="label label-success-lt pull-right">Lexi Sinclair</a>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li class="dd-item">
                        <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                        <div class="dd-content">
                            <strong>Nesciunt</strong>
                            <small>molestiae et quo sit iure</small>
                        </div>
                    </li>
                    <li class="dd-item">
                        <button class="btn btn-info dd-handle pull-left"><i class="fa fa-bars"></i></button>
                        <div class="dd-content">
                            <strong>Nihil</strong>
                            <small>ducimus possimus amet totam nihil</small>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </section>
</div>

<script src="/apps/views/blog/manager.js"></script>


