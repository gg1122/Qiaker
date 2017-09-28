<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录</title>
<link rel="stylesheet" href="/static/css/uikit.min.css">
<link media="all" type="text/css" rel="stylesheet" href="/static/css/notify.min.css">
<link rel="stylesheet" href="/static/css/square.css">
<link rel="stylesheet" href="/static/css/style.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_dgmkr0u7xdgc766r.css">
<!--[if lt IE 9]>
<script src="/assets/js/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="/assets/js/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="scroll"></div>
<div class="background-cover-img img-login"></div>
<div class="background-cover"></div>
<div class="login-wrapper">
	<a href="/" class="login-logo">
		<i class="iconfont icon-minilogo"></i>会员登录</a>
	<form class="uk-form uc-form" id="login-form">
		<div class="uk-form-row">
			<div class="uk-form-controls">
				<input type="text" placeholder="邮箱地址" name="email" required="" data-parsley-required-message="邮箱不能为空" data-parsley-type="email" data-parsley-type-message="邮箱地址错误！请重新输入" autocomplete="off"></div>
		</div>
		<div class="uk-form-row">
			<div class="uk-form-controls">
				<input type="password" placeholder="密码" name="password" required="" data-parsley-required-message="密码不能为空" minlength="3" data-parsley-minlength-message="密码不能小于3位" autocomplete="off"></div>
		</div>
		<div class="uk-form-row">
			<label for="">
				<input type="checkbox" class="ichecks" name="remember" value="1">记住密码</label></div>
		<div class="uk-form-row">
			<input type="hidden" name="_token" value="Ma0YagxpvkYulMGGJkTXbbbuwHTYXyoMbw5ozAod">
			<button type="submit" name="button" class="uk-button button-signup">登 录</button></div>
		<div class="uk-form-row">
			<div class="findreg">
				还没有账户？
				<a href="/reg.html">立即注册</a></div>
		</div>
		<div class="uk-form-row">
			<div class="login-socal">
				<span>合作登录：</span>
				<a href="/wblogin.html" class="uk-button">
					<i class="iconfont icon-qq"></i>
				</a>
				<a href="/qqlogin.html" class="uk-button">
					<i class="iconfont icon-weibo"></i>
				</a>
			</div>
		</div>
	</form>
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="/static/js/icheck.min.js"></script>
</body>
</html>