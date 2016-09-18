<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>黎松科技-成员展示</title>
    <link rel="shortcut icon" href="/Lensent/Public/images/web_ico.ico">
    <link rel="stylesheet" href="/Lensent/Public/css/index.css">
    <link rel="stylesheet" href="/Lensent/Public/css/nav.css">
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
    <div class="main-member-back">
        <div class="main-member-container">
            <h1>成员展示</h1>
            <h2>Team Member</h2>
            <ul class="member-pres">
                <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Lensent/Public/images/<?php echo ($vo1["image"]); ?>" height="128" width="127" alt="">
                        <div>
                            <h1><?php echo ($vo1["name"]); ?></h1>
                            <p><?php echo ($vo1["identity"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clr"></div>
            </ul>
            <ul class="member-pres member-pres2">
                <?php if(is_array($list2_1)): $i = 0; $__LIST__ = $list2_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2_1): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Lensent/Public/images/<?php echo ($vo2_1["image"]); ?>" height="128" width="127" alt="">
                        <div>
                            <h1><?php echo ($vo2_1["name"]); ?></h1>
                            <p><?php echo ($vo2_1["identity"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clr"></div>
                <?php if(is_array($list2_2)): $i = 0; $__LIST__ = $list2_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2_2): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Lensent/Public/images/<?php echo ($vo2_2["image"]); ?>" height="128" width="127" alt="">
                        <div>
                            <h1><?php echo ($vo2_2["name"]); ?></h1>
                            <p><?php echo ($vo2_2["identity"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clr"></div>
            </ul>
            <ul class="member-pres member-pres3">
                <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Lensent/Public/images/<?php echo ($vo3["image"]); ?>" height="128" width="127" alt="">
                        <div>
                            <h1><?php echo ($vo3["name"]); ?></h1>
                            <p><?php echo ($vo3["identity"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clr"></div>
            </ul>
            <ul class="member-pres member-pres4">
                <?php if(is_array($list4)): $i = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Lensent/Public/images/<?php echo ($vo4["image"]); ?>" height="128" width="127" alt="">
                        <div>
                            <h1><?php echo ($vo4["name"]); ?></h1>
                            <p><?php echo ($vo4["identity"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clr"></div>
            </ul>
        </div>
    </div>
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
    <script type="text/javascript">
    $(".member-pres li div").css('display', 'none');
    $(".member-pres li").mouseenter(function(event) {
        $(this).children('div').slideDown();
    });
    $(".member-pres li").mouseleave(function(event) {
        $(this).children('div').hide();
    });

    </script>
</body>

</html>