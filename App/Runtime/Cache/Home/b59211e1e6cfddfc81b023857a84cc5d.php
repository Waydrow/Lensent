<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="en">

	<head>
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<meta charset="UTF-8">
		<title>纳新表单页面</title>

	</head>

	<style>
		*{
			font-family:"微软雅黑";
		}

		body{
			margin:0px;
			background-color: #ecf0f1;
		}

		.BackGround{
			width:90%;
			margin-left:auto;
			margin-right:auto;
			max-width:500px;
		}

		h1{
			font-family: inherit;
			line-height: 1.1;
			font-size: 40px;
			color: #34495e;
			font-weight: 400;
			text-align:center;
		}

		h2{
			color: #7f8c8d;
			font-size: 22px;
			font-weight:300;
			text-align:center;
		}

		.FormContainer{
			width: 100%;
			border-radius: 5px;
			background-color: white;
			padding-bottom: 20px;

		}

		.FormHeader{
			width: 100%;
			height: 42px;
			border-bottom: 4px solid #34495e;
			border-radius: 5px 5px 0 0;
			line-height: 1.8;
			text-align: center;
			color: #fff;
			background: #34495e;
			font-size: 25px;
			font-weight:400;
			margin-bottom:26px;
		}
		.FormSection{
			height:42px;
			width:80%;
			margin: 0 auto 26px auto;
		}

		.FormText{
			width: 100%;
		    height: 100%;
		    border-radius: 5px;
		    border: 2px solid  #bdc3c7;
		    color:  #bdc3c7;
		    font-size: 15px;
		    text-indent: 10px;
		}

		button{
			border:0px;
			padding:0px;
		}

		.FormDoubleRadio{
			border: 2px solid #bdc3c7;
			background-color: white;
			height: 47px;
			width: 45%;
			float: left;
			color: #34495e;
			border-radius: 5px;
            cursor: pointer;
		}

		.FormDoubleRadio:first-child{
			margin: 0px 10% 0px 0px;
		}

		.BiggerSize{
			height: 126px;
		}

		textarea{
			resize: none;
			font:15px/42px '微软雅黑';
		}
		.FormTripleRadio{
			border: 2px solid #bdc3c7;
			background-color: white;
			height: 47px;
			width: 30%;
			float: left;
			color: #34495e;
			border-radius: 5px;
			margin-left:5%;
            cursor: pointer;
		}
		.FormTripleRadio:first-child{
			margin-left:0px;
		}

		.FormSubmit{
			background-color: #3193c7;
			color: rgb(255, 255, 255);
			max-width: 400px;
			white-space: normal;
			padding: 10px 15px;
			font-size: 15px;
			font-weight: 400;
			line-height: 1.4;
			border: medium none;
			border-radius: 4px;
			transition: border 0.25s linear 0s, color 0.25s linear 0s, background-color 0.25s linear 0s;
			margin-left: auto;
			margin-right: auto;
			display: block;
			width: 100%;
            cursor: pointer;
		}
		.Footer{
			margin-top: 20px;
			display: block;
			margin-right: auto;
			margin-left: auto;
			text-align: center;
			color: #ccc;
			margin-bottom: 20px;
		}

        .logo_top {
            display: block;
            margin: 0 auto;
            margin-top: 30px;
        }
        .logo_top img {
            display: block;
            margin: 0 auto;
            text-align: center;
        }


        .HiddenWarning{
            width: 80%;
            margin: auto;
            line-height: 2;
            position: relative;
            top: -10px;
            color: #d41010;
            display: none;
        }
	
	</style>

	<body>

	<div class = "BackGround"><!-- 背景 -->
		
		<div class = "BriefIntroduction"><!-- 表单外部的叙述文字 -->
            <a href="index.html" class="logo_top"><img src="/Lensent/Public/images/logo_03.png" height="49" width="226" alt="Lensent"></a>
			<h1>黎松科技计算机团队</h1><!-- 主标题 -->

		</div>

		<div class = "FormContainer"><!-- 表单容器 -->
			
			<div class = "FormHeader">招新报名表</div><!-- 表单头 -->
			
			<div class = "FormMain"><!-- 表单正文 -->

				<div class = "FormSection">
					
					<input class = "FormText" type = "text" value = "姓名" id = "name"/>

				</div>

				<div class = "FormSection">
					
					<button class = "FormDoubleRadio" value = "boy">男</button>
					<button class = "FormDoubleRadio" value = "girl">女</button>

				</div>

				<div class = "FormSection">
					
					<input class = "FormText" type = "text" value = "邮箱" id = "mail"/>

				</div>

				<div class = "FormSection">
					
					<input class = "FormText" type = "text" value = "电话" id = "tel"/>

				</div>

                <div class = "HiddenWarning">请输入正确的电话号码</div>

				<div class = "FormSection BiggerSize">
					
					<textarea class = "FormText" type = "text" id = "intro">个人简介</textarea>

				</div>

				<div class = "FormSection">
					
					<button class = "FormTripleRadio" value = "Product">产品研发</button>
					<button class = "FormTripleRadio" value = "Market">市场营销</button>
					<button class = "FormTripleRadio" value = "Safe">系统安全</button>

				</div>

				<div class = "FormSection">
					
					<button class = "FormSubmit">提交申请</button>

				</div>


			</div>
		
		</div>

		<div class = "Footer">©黎松科技</div>

	</div>

	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
	
	<script type="text/javascript">
		var namee = {value:""};
		var mail = {value:""};
		var tel = {value:""};
		var intro = {value:""};
		var sex = {value:""};
		var department = {value:""};
		function TextAreaBind(DOM,SampleString,Controler){
			DOM.on("focus",function(){
				if(DOM[0].value==SampleString){
					DOM[0].value = "";
				}
				DOM.css("border-color","#1abc9c");
				DOM.css("color","#34495e");
				Controler.value = true;
			})
			DOM.on("blur",function(){
				if(DOM[0].value==""){
					DOM[0].value = SampleString;
				}
				if(DOM[0].value==SampleString){
					DOM.css("color","#bdc3c7");
					Controler.value = false;
				}
				DOM.css("border-color","#bdc3c7");
			})
		}
		TextAreaBind($("#name"),"姓名",namee);
		TextAreaBind($("#mail"),"邮箱",mail);
		TextAreaBind($("#tel"),"电话",tel);
		TextAreaBind($("#intro"),"个人简介",intro);
        function RadioBind(DOMGroup,Controler){
            var i;
            for(i = 0;i < DOMGroup.length;i ++){
                $(DOMGroup[i]).on("click",function(){
                    $(this).css("border-color","#3193c7");
                    DOMGroup.not($(this)).css("border-color","#bdc3c7")
                    Controler.value = $(this)[0].value;
                })
            }
        }
        RadioBind($(".FormDoubleRadio"),sex);
        RadioBind($(".FormTripleRadio"),department);

        function ValidationAndSubmit(){
            if(namee.value&&tel.value&&sex.value){
                doAjax();
            }
            else{
                window.alert("需要至少填写姓名性别和电话哦~");
            }
        }


		$(".FormSubmit").on("click",function(){
			ValidationAndSubmit();
		})

        function doAjax(){
            var data = {name:"",mail:"",tel:"",intro:"",sex:"",department:""};
            data.name = $("#name")[0].value;
            data.mail = $("#mail")[0].value;
            data.tel = $("#tel")[0].value;
            data.intro = $("#intro")[0].value;
            data.sex = sex.value;
            data.department = department.value;
            // var data = $("#name")[0].value + "|" + $("#vactor")[0].value + "|" + $("#tel")[0].value + "|" + $("#intro")[0].value + "|" + sex.value + "|" + department.value;
            console.log(data);
//            $.post("test.txt",{data:data},function(){window.alert("提交成功");window.location="";})
            $.ajax({
                    url: '<?php echo U("index.php/home/index/joinAjax");?>',
                    type: 'POST',
                    data: data
                })
                .done(function(dataget) {
                    console.log("success");
                    console.log(dataget);
                    alert(dataget);

                    if(dataget==="您已成功报名!") {
                        window.location = "index.html";
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
        }


        //电话验证部分
        var whethertelephonenumberisfairlyright = false;
        function init(){
            $("#tel").on("focus",function(){
                $(".HiddenWarning").hide();
            })
            $("#tel").on("blur",function(){
                if(! /^\d{11}$/ .test($("#tel")[0].value)){
                    $(".HiddenWarning").show();
                    whethertelephonenumberisfairlyright = false;
                }
                else{
                    whethertelephonenumberisfairlyright = true;
                }
            })
        }
        init();
	</script>

	</body>

</html>