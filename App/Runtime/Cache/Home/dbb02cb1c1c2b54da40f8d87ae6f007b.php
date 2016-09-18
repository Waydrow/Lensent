<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="/505/Public/css/bootstrap.min.css" /> 
		<link rel="stylesheet" href="/505/Public/css/style.css">
		<title>注册</title>
		<style>		
			.header {
				font-size: 20px;
				color: #ce4845;
				font-weight: bold;
				margin: 4% 0;
			}
			input {
				display: inline-block;
				height: 30px;
				font-size: 100%;
				font-family: "微软雅黑";
				/*margin: 4% auto;*/
				border: 0px;
				color: #2F2F2F;
				text-align: left;
				/*border: 1px solid #CECECE;*/
				/*border-radius: 3px;*/
				margin: 2.5% 0;
				width: 78%;
				outline: none;
			}
			button {
				display: block;
				margin: 4vh auto;
			}
			
			span {
				font-size: 4vh;
			}
			
			.header {
				height: 4vh;
			}
			
			.box {
				position: relative;
				height: 0%;
				width: 100%;
				border: 1px solid #E8E8E8;
				background-color: #fff;
				padding-left: 8px;
				margin-bottom: 6px;
			}
			.box p {
				color: #616161;
				display: inline-block;
				width: 20%;
				text-align: left;
			}
			
			.beans {
				background: #74B04D;
				border-radius: 50%;
				height: 2.2vh;
				width: 2.2vh;
				margin: 1vh auto;
			}
			
			.getCaptcha {
				margin: 2vh auto;
				border: 0px;
				background: #FFFFFF;
				color: #5B9BD5;
				font-size: 3vh;
				font-family: "微软雅黑";
			}
			
			.register,.returnBtn {
				border: 0px;
				width: 99%;
				height: 40px;
				text-align: center;
				display: block;
				font-size: 18px;
				background-color: #ce4845;
			}
			.returnBtn {
				margin-top: 15px;
			}

			.center {
				text-align: center;
			}
			
			.drop {
				height: 6vh;
				width: 6vh;
			}
			
			img.captha {
				width: 40%;
				float: right;
			}


			:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
			    color: #D2D2D2;  
			}

			::-moz-placeholder { /* Mozilla Firefox 19+ */
			    color: #D2D2D2;
			}

			input:-ms-input-placeholder,
			textarea:-ms-input-placeholder {
			    color: #D2D2D2;
			}

			input::-webkit-input-placeholder,
			textarea::-webkit-input-placeholder {
			    color: #D2D2D2;
			}
			.clearfix:before,.clearfix:after {
				content: "";
				display: table;
			}
			.clearfix:after {
				clear: both;
			}
			.clearfix {
				*zoom: 1;	/*IE/7/6*/
			}

		</style>
	</head>

	<body>
		<div class="container center">
			<div class="header">注册新用户</div>
			<form action="" method="post" onsubmit="return validate();">
				<div class="box">
					<p>昵称</p>
					<input id="name" name="name" type="text" value="" placeholder="请输入昵称" required="required"/>
				</div>
				<div class="box">
					<p>账号</p>
					<input id="account" name="account" type="text" value="" placeholder="请输入账号" required="required"/>
				</div>
				<div class="box">
					<p>密码</p>
					<input id="password1" name="password1" type="password" value="" placeholder="请输入密码" required="required"/>
				</div>
				<div class="box">
					<p>确认密码</p>
					<input id="password2" name="password2" type="password" value="" placeholder="请确认密码" required="required"/>
				</div>
				<div class="box">
					<p>邮箱</p>
					<input id="email" name="email" type="text" value="" placeholder="请输入邮箱" required="required"/>
				</div>
				<div class="box">
					<p>手机</p>
					<input id="phone" name="phone" type="text" value="" placeholder="请输入手机号" required="required"/>
				</div>
				<div class="box">
					<p>地址</p>
					<input id="address" name="address" type="text" value="" placeholder="请输入您的地址" required="required"/>
				</div>
				<div class="box">
					<p>验证码</p>
					<input id="verify" name="verify" type="text" value="" placeholder="请输入验证码" required="required"/>
				</div>
				<!-- 生成验证码，src部署时需要更改，点击验证码图片会局部刷新 -->
				<img src="<?php echo U('index.php/home/Index/verify');?>" alt="验证码" class="captha" onclick="this.src=this.src+'?'+Math.random()">
				<div style="clear:both"></div>
				<button class="btn btn-primary register" onclick="validate();">注册</button>
				<a href="login.html" class="btn btn-primary returnBtn" >返回</a>
			</form>
		</div>
		
	</body>
	<script type="text/javascript">
		function validate(){
		var name=document.getElementById('name').value.trim();
		var account=document.getElementById('account').value.trim();
		var password1=document.getElementById('password1').value.trim();
		var password2=document.getElementById('password2').value.trim();
		var email=document.getElementById('email').value.trim();
		var phone=document.getElementById('phone').value.trim();
		if(name.length>15){
			alert("昵称不能超过15位");
			return false;
		}
		if(account.length<6||account.length>15){
			alert("账号长度为6-15位");
			return false;
		}
		if(!(password2==password1)){
			alert("两次输入的密码不一致");
			return false;
		}
		if(password1.length<6||password1.length>20){
			alert("密码的长度为6-20位");
			return false;
		}
		var regEmail=/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
		if(!regEmail.test(email)){
			alert("邮箱格式不正确");
			return false;
		}
		var regPhone=/1[0-9]{10}/;
		if(!regPhone.test(phone)){
			alert("手机格式不正确");
			return false;
		}
	}
	</script>

</html>