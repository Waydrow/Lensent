<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
		<title>登录</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="/Lensent/Public/css/bootstrap.min.css" />
		<script type="text/javascript" src="/Lensent/Public/js/jquery-v1.10.2.min.js"></script>
		<style>
			body{
				font-size: 62.5%;
			}
			
			.place-holder {
				height: 10vh;
			}
			
			.center-block .title {
				font-size: 8vh;
				font-family: "微软雅黑";
				display: block;
				color: #ce4845;
			}
			
			.le {
				margin: 3vh auto 7vh;
				height: 8vh;
				width: 8vh;
				font-size: 3vh;
				font-family: "微软雅黑";
				color: #FFFFFF;
				background: #EAE174;
				border-radius: 80px;
				display: block;
				line-height: 8vh;
			}
			
			.box {
				position: relative;
				height: 40px;
    			width: 80%;
    			border: 1px solid #ce4845;
    			margin: 0 auto;
    			margin-bottom: 5%;
			}
			.box input {
				text-align: center;
				display: block;
				font-size: 18px;
				font-family: "微软雅黑";
				color: #808080;
				width: 100%;
				position: absolute;
				top: 0;
				margin: 0% auto;
				border: 0px;
				line-height: 36px;
				/*出现框更改top:0.5vh height:5vh margin:2vh auto*/
			}
			
			.center {
				text-align: center;
			}
			
			.btn-circle {
				background: #ce4845;
				margin: 0 auto;
				width: 80%;
				height: 40px;
				text-align: center;
				/*padding: 6px 0;*/
				font-size: 18px;
				font-family: "微软雅黑";
				color: #ffffff;
				/*line-height: 40px;*/
				/*border-radius: 50%;*/
				border: 0px;
			}
			
			.btn-circleclick {
				/*margin: 8vh auto;
				width: 15vh;
				height: 15vh;
				text-align: center;
				padding: 6px 0;
				font-size: 8vh;
				line-height: 1.428571;
				border-radius: 50%;
				border: 0px;*/
				margin: 12% auto;
				width: 8rem;
				height: 8rem;
				text-align: center;
				padding: 6px 0;
				font-size: 50%;
				line-height: 8rem;
				border-radius: 50%;
				border: 0px;
				color: #FFFFFF;
				background: #70AD47;
				box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.5), 0 0 20px 10px rgba(196, 237, 169, 0.77), 0 0 30px 15px rgba(196, 237, 169, 0.88), 0 0 40px 20px rgba(196, 237, 169, 0.99);
				transition: all 0.5s;
			}
			
			.login {
				display: block;
				margin: auto auto;
			}
			
			.forget {
				display: inline-block;
				margin: 0 10vw 0 0;
			}
			
			.register {
				display: inline-block;
				margin: 0 auto;
				background: transparent;
				color: #ce4845;
				margin-top: 2%;
			}

			a{
				font-size: 1.5rem;
				text-decoration: none;
			}
		</style>

	</head>

	<body>
		<div class="container center" id="pageone">
			<div class="place-holder"></div>
			<div class="center-block">
				<span class="title">Welcome</span>
				<!--<img class="img-responsive" src="img/le.png" alt="le" />-->
				<span class="le" id="le">505</span>
			</div>
			<form action="" method="post" id="pageone">
				<div class="box">
					<input id="phone_num" type="text" value="" name="useraccount" required="required" placeholder="请输入用户名" />
					<br />
				</div>
				<div class="box">
					<input id="pwd" type="password" value="" name="password" required="required" placeholder="请输入密码" />
					<br />
				</div>
				<button id="login" value="" class="btn btn-primary btn-circle btn-xs" onclick="transition();isOk();"><span class="login">登录</span></button>
				<!-- <a href="shake.html"></a> -->			
				<a href="register.html" class="register btn-circle">注册会员</a>
			</form>

		</div>
	</body>
	<script type="text/javascript">
		
		function isOk() {
			//判断用户输入是否正确
			var phone = document.getElementById('phone_num').value.trim();
			var pwd = document.getElementById('pwd').value.trim();
			var btn = document.getElementById('login');
			if (!(phone.length >= 6 && phone.length <= 20)) {
				btn.className = "btn btn-primary btn-circle btn-xs";
				alert("用户名的长度为6-15位");
				return false;
			}
			if (!(pwd.length >= 6 && pwd.length <= 20)) {
				btn.className = "btn btn-primary btn-circle btn-xs";
				alert("密码的长度为6-20位");
				return false;
			}
		}

		function transition() {
			var btn = document.getElementById('login');
			btn.className = "btn-circleclick";
		}
	</script>

</html>