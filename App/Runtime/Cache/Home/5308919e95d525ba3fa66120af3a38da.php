<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>商品详情页</title>
    <link rel="stylesheet" type="text/css" href="/505/Public/css/style.css" /> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <section class="details-head">
    <a href="homepage.html"><img src="/505/Public/images/arrow-left.png" alt="返回"></a>
        <h3>商品详情</h3>
    </section>
    <?php if(is_array($good)): $i = 0; $__LIST__ = $good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?><section class="details-banner">
            <img src="<?php echo ($single["image"]); ?>" alt="banner">
        </section>
        <section class="details-info">
            <h3 class="details-name"><?php echo ($single["name"]); ?></h3>
        </section>
        <section class="details-price">
            <i>¥</i>
            <span><?php echo ($single["price"]); ?></span>
            <p>一口价<span><?php echo ($single["price"]); ?></span></p>
        </section><?php endforeach; endif; else: echo "" ;endif; ?>
    
    <section class="details-categories">
        <h3 class="goods-left">库存: <span>100</span></h3>
        <h3>尺码</h3>
        <div class="categ">
            <?php if(is_array($sizes)): $i = 0; $__LIST__ = $sizes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$size): $mod = ($i % 2 );++$i;?><label data-value="20509:28315" class='<?php echo ($size["checked"]); ?>'><?php echo ($size["size"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <h3>颜色分类</h3>
        <div class="color-choice">
            <?php if(is_array($colors)): $i = 0; $__LIST__ = $colors;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$color): $mod = ($i % 2 );++$i;?><label data-value="20509:28315" class='<?php echo ($color["checked"]); ?>'><?php echo ($color["color"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section>
    <section class="details-pay-btn">
        <?php if(is_array($good)): $i = 0; $__LIST__ = $good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$single): $mod = ($i % 2 );++$i;?><a href="" id='cart' >加入购物车</a><a href="javascript:void(0)" onclick="buynow();" id='buynow'>立即购买</a><?php endforeach; endif; else: echo "" ;endif; ?>  
    </section>
    <script type="text/javascript" src="/505/Public/js/jquery-v1.10.2.min.js"></script>
    <script type="text/javascript">
        $("#cart").click(function(){
            var left = $(".goods-left span").text();
            if(left=='0'){
            }
            else{
              addCart();
            }
        });
    </script>
    <script type="text/javascript">
    updateGoods();	//首次获取库存数量

    /*商品详情页 尺寸及颜色选择*/
    var categLabel = $(".categ label");
    var colorLabel = $(".color-choice label");
    $(categLabel).on("click", function() {
        for (var i = 0; i < $(categLabel).length; i++) {
            $(categLabel).removeClass('checked');
        }
        $(this).addClass('checked');
        updateGoods();	//更新库存
    })
    $(colorLabel).on("click", function() {
        for (var i = 0; i < $(colorLabel).length; i++) {
            $(colorLabel).removeClass('checked');
        }
        $(this).addClass('checked');
        updateGoods();	//更新库存
    });

    /*更新库存函数*/
    function updateGoods() {
    	var name = $(".details-name").text();
	    var size = $(".categ label.checked").text();
	    var color = $(".color-choice label.checked").text();
	    var data = {
	    	name: name,
	    	size: size,
	    	color: color
	    };
	    var leftNum = $(".goods-left span");
    	$.ajax({
	    	url: '<?php echo U("index.php/home/index/goodsajax");?>',
	    	type: 'POST',
	    	data: data
	    })
	    .done(function(dataget) {
	    	console.log("success");
	    	console.log(dataget)
	    	$(leftNum).text(dataget);
            if(dataget=='0'){
                $("#cart").attr('href','<?php echo U("index.php/home/index/goodsinfo?goodsstatus=0");?>');
            }
            else{
                $("#cart").attr('href','<?php echo U("index.php/home/index/goodsinfo?goodsstatus=1");?>');
            }
	    })
	    .fail(function() {
	    	console.log("error");
	    })
	    .always(function() {
	    	console.log("complete");
	    });
    }

    function addCart() {
        var name = $(".details-name").text();
        var size = $(".categ label.checked").text();
        var color = $(".color-choice label.checked").text();
        var data = {
            name: name,
            size: size,
            color: color
        };
        $.ajax({
            url: '<?php echo U("index.php/home/index/goodsajax2");?>',
            type: 'POST',
            data: data
        })
        .done(function(dataget) {
            console.log("success");
            console.log(dataget);
            alert(dataget);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }

    function buynow(){
        var name = $(".details-name").text();
        var size = $(".categ label.checked").text();
        var color = $(".color-choice label.checked").text();
        url="pay.html?name="+name;
        url+="&size="+size;
        url+="&color="+color;
        window.location.href=url;
    }
    </script>
</body>

</html>