<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>黎松科技-团队介绍</title>
    <link rel="shortcut icon" href="/Lensent/Public/images/web_ico.ico">
    <link rel="stylesheet" href="/Lensent/Public/css/index.css">
    <link rel="stylesheet" href="/Lensent/Public/css/nav.css">
    <link href="/Lensent/Public/css/timeline.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Lensent/Public/js/modernizr.js"></script>
    <script src="/Lensent/Public/js/jquery-1.11.2.min.js"></script>
    <script>
    $(document).ready(function() {

        $(".contact-hide").css('display', 'none');
        $(".mask").css('display', 'none');

        $(".footer-container ul:nth-child(3) li:nth-child(3) a").click(function(event) {
            $(this).siblings('div.mask').show();
            $(".contact-hide").slideDown();
        });
        $(".close-btn").click(function(event) {
            $(".mask").hide();
            $(".contact-hide").slideUp();
        });
    });
    </script>
</head>

<body>
    <div class="to-top">
        <a href="#"></a>
    </div>
    <div class="header-back">
        <div class="header-container">
            <a href="index.html">
                <img src="/Lensent/Public/images/logo_03.png" height="49" width="226" alt="Lensent">
                <span>创新就是黎松</span>
            </a>
            <nav class="navbar navbar-default">
                <div class="container">
                    <span class="menu"> Menu</span>
                    <div class="banner-top">
                        <ul class="nav banner-nav">
                            <li><a class="" href="index.html">首页</a></li>
                            <li><a class="down-scroll" href="introduction.html">团队介绍</a></li>
                            <li><a class="down-scroll" href="project.html">项目展示</a></li>
                            <li><a class="down-scroll" href="member.html">成员展示</a></li>
                            <li><a class="down-scroll" href="join.html">加入我们</a></li>
                        </ul>
                        <script>
                        $("span.menu").click(function() {
                            $(" ul.nav").slideToggle("slow", function() {});
                        });
                        </script>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
            <div style="clear: both"></div>
        </div>
    </div>
    <header>
        <h1>团队介绍</h1>
        <h2>Team Introduction</h2>
    </header>
    <section id="cd-timeline" class="cd-container">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                    <img src="/Lensent/Public/images/cd-icon-location.svg" alt="Location">
                </div>
                <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                    <h2><?php echo ($vo["title"]); ?></h2>
                    <h3><?php echo ($vo["place"]); ?></h3>
                    <h4>Complete</h4>
                    <h5><?php echo ($vo["time"]); ?></h5>
                    <p><?php echo ($vo["content"]); ?></p>
                    <!-- <span class="cd-date">2012-09</span> -->
                </div>
                <!-- cd-timeline-content -->
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- cd-timeline-block -->
    </section>
    <!-- cd-timeline -->
    <div class="footer-back">
        <div class="footer-container">
            <ul>
                <li>友情链接</li>
                <li><a href="http://www.luogu.org/" target="_blank">洛谷OJ</a></li>
                <li><a href="http://tianhai.info/" target="_blank">天海信息科技</a></li>
                <li><a href="http://www.oiinhand.info/" target="_blank">OI in Hand</a></li>
                <li><a href="http://www.haidairen.com/" target="_blank">海代人</a></li>
            </ul>
            <ul>
                <li>法律相关</li>
                <li><a href="#">法律声明</a></li>
            </ul>
            <ul>
                <li>关于我们</li>
                <li><a href="http://www.mikecrm.com/f.php?t=CCnAeS" target="_blank">加入我们</a></li>
                <li>
                    <a>联系我们</a>
                    <div class="mask"></div>
                    <div class="contact-hide">
                        <img src="/Lensent/Public/images/contact-us.png" alt="">
                        <div class="close-btn"></div>
                    </div>
                </li>
            </ul>
            <ul>
                <li>关注我们</li>
                <li><a href="http://weibo.com/u/5285149630" target="_blank">新浪微博</a></li>
                <li><a href="#">官方微信</a></li>
                <li><a href="http://tieba.baidu.com/f?ie=utf-8&kw=%E9%BB%8E%E6%9D%BE%E7%A7%91%E6%8A%80&fr=search&qq-pf-to=pcqq.c2c" target="_blank">官方贴吧</a></li>
            </ul>
            <div style="clear: both"></div>
            <address>Copyright&copy;2015 <span>Lensent</span> All rights reserved</address>
        </div>
    </div>
    <script>
    $(function() {
        var $timeline_block = $('.cd-timeline-block');
        //hide timeline blocks which are outside the viewport
        $timeline_block.each(function() {
            if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
                $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
            }
        });
        //on scolling, show/animate timeline blocks when enter the viewport
        $(window).on('scroll', function() {
            $timeline_block.each(function() {
                if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden')) {
                    $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                }
            });
        });
    });
    jQuery(document).ready(function($) {
        //返回顶部
        $(".to-top a").click(function(event) {
            $('html,body').animate({
                scrollTop: $('.header-back').offset().top
            }, 800);
        });
    });
    </script>
</body>

</html>