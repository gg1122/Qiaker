<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?=$title?></title>
<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$dsp?>">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/layui/css/layui.css">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="/layui/layui.js" type="text/javascript"></script>
<link rel="stylesheet" href="/static/css/global.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_dgmkr0u7xdgc766r.css">
<link rel="stylesheet" href="/static/css/base.css?t=3452">
<link rel="stylesheet" href="//at.alicdn.com/t/font_459713_6f30aofzgar79zfr.css">
</head>
<body>
<nav>
	<a href="/">
		<img src="/static/uploadfile/2017/0915/20170915230548_102.png" width="100px">
	</a>
	<div class="nav_right">
		<ul>
			<a href="<?php if($_userid){?>/send.html<?php }else{?>/login.html<?php }?>">
				<li class="active">					
					<span><i class="layui-icon">&#xe654;</i> 我要推荐</span>
				</li>
			</a>
			<a href="/">
				<li>					
					<span><i class="iconfont icon-shouye"></i> 首页</span>
				</li>
			</a>
			<a class="aboutUs">
				<li>
					<span><i class="iconfont icon-guanyu"></i> 关于我们</span>
					<div style="background:url('/static/images/nav_popUps.jpg') no-repeat">
						恰客网 是一个快速发现、分享和讨论新产品的社区。<br/>在这里，你可以第一时间发现国内外最新、最酷、最好玩的互联网产品，也可分享自己最喜爱的产品，参与圈内人士的讨论。
					</div>
				</li>
			</a>
			<?php if($_userid>0){?>
			<a href="/?m=admin&a=system">
				<li>					
					<span><i class="iconfont icon-iconshezhi01"></i> 设置</span>
				</li>
			</a>
			<?php }?>
		</ul>		
		<a href="/?m=admin">
			<div class="myHeader" style="background: url('<?=$uc['face']?$uc['face']:'https://qiaker.cn/static/images/avatar.svg';?>') no-repeat center;background-size: cover"></div>
		</a>
	</div>
</nav>