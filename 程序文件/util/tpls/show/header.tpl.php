<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
<meta name="renderer" content="webkit">
<title><?=$title?></title>
<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$dsp?>">
<link rel="stylesheet" href="/layui/css/layui.css">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="/layui/layui.js" type="text/javascript"></script>
<link rel="stylesheet" href="/static/css/global.css?t=<?=TIME?>">
<link rel="stylesheet" href="//at.alicdn.com/t/font_dgmkr0u7xdgc766r.css">
<link href='http://cdn.webfont.youziku.com/webfonts/nomal/26113/46723/5927c3e9f629d807a43fe42d.css' rel='stylesheet' type='text/css' />
<body class="fly-full">
<div class="header">
	<div class="main">
		<a class="logo" href="/" title="恰客"><img src="http://qiaker.cn/static/uploadfile/2017/0915/20170915230548_102.png" height="100%"/></a>
		<div class="nav nav_case">
			<a href="/">首页</a>
			<!--<a href="/showcase.html">站秀频道</a>-->
		</div>
		<div class="nav search">
			<form action="/search.html" class="fly-search">          
				<i class="iconfont icon-sousuo1"></i>          
				<input class="layui-input" autocomplete="off" placeholder="输入后回车搜索..." type="text" name="key">        
			</form>
		</div>
		<div class="nav-user">			
<?php if(empty($_userid)){?>			
			<span><a href="/login.html">登陆</a><a href="/reg.html" class="reg">注册</a></span>
		</div>
<?php }else{?>
			<a class="avatar" href="/?m=admin">                
				<img src="<?=$uc['face']?$uc['face']:'/static/images/avatar.svg';?>">
				<!--<cite><?=$_username?></cite>-->              
			</a>      
			<div class="nav">        
				<a href="/?m=admin&a=system"><i class="iconfont icon-shezhi"></i>设置</a>        
				<a href="/logout.html"><i class="iconfont icon-logout"></i>退出</a>    
			</div>  
		</div>
<?php }?>
	</div>
</div>
  