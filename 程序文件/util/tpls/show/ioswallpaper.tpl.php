<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
<meta name="renderer" content="webkit">
<title>iOS</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="/static/layui/css/layui.css">
<link rel="stylesheet" href="/static/css/global.css">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="/static/layui/layui.js" type="text/javascript"></script>
</head>
<body class="fly-full">
<div class="header">
	<div class="main">
		<a class="logo cssae87e90a56601" href="/" title="恰客">恰客</a>
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
  
<div class="main">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>常规时间线</legend>
</fieldset>
<ul class="layui-timeline">
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
		<h3 class="layui-timeline-title">8月18日</h3>
		<ul class="site-doc-icon">
		<li>
			<img src="http://via.placeholder.com/200x100"/>
		</li>
		<li>
			<img src="http://via.placeholder.com/200x100"/>
		</li>
		<li>
			<img src="http://via.placeholder.com/200x100"/>
		</li>
		<li>
			<img src="http://via.placeholder.com/200x100"/>
		</li>
		</ul>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">8月16日</h3>
      <p>杜甫的思想核心是儒家的仁政思想，他有<em>“致君尧舜上，再使风俗淳”</em>的宏伟抱负。个人最爱的名篇有：</p>
      <ul>
        <li>《登高》</li>
        <li>《茅屋为秋风所破歌》</li>
      </ul>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">8月15日</h3>
      <p>
        中国人民抗日战争胜利72周年
        <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
        <br>铭记、感恩
        <br>所有为中华民族浴血奋战的英雄将士
        <br>永垂不朽
      </p>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <div class="layui-timeline-title">过去</div>
    </div>
  </li>
</ul>  
 

</div>
<?php include T('show','footer');?>