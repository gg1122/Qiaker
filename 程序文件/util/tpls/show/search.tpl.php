<?php include T('show','header');?> 
<div class="main layui-clear">
	<div class="wrap">
		<div class="content">
			<div class="fly-tab fly-tab-index">        
				<span>
					<a>关键词： <b><?=$key?></b> 的搜索结果</a>
				</span>   
			</div>
<?php if(!empty($list)){?>
			<ul class="fly-panel fly-list fly-list-top">
<?php foreach($list as $k=>$v) {
$user=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
?>
				<li class="fly-list-li">
					<a href="/user/<?=$v['userid']?>.html" class="fly-list-avatar"><img src="<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>" alt="头像"></a>
					<h2 class="fly-tip">
						<a href="/product/<?=$v['id']?>.html"><?=$v['title']?></a><?php if($v['top']==1){?><span class="fly-tip-stick">置顶</span><?php }?><?php if($v['jing']==1){?><span class="fly-tip-jing">精帖</span><?php }?>
					</h2>
					<p>
						<span><a href="/user/<?=$v['userid']?>.html" target="_blank"><?=$user['username']?$user['username']:'匿名网友';?></a></span>
						<span><?=formatTime($v['time'])?></span>
						<span class="heart"><i class="iconfont icon-icon3zanpinglunzhuanfaliulan01"></i> <?=$v['zan']?></span>
						<span><i class="iconfont icon-feedback"></i> <?=$v['pl']?></span>
						<span><i class="iconfont icon-liulan"></i> <?=$v['view']?></span>
					</p>
				</li>
<?php }?>
			</ul>
<?php }else{?>
			<div class="layui-textarea" style="line-height:80px;text-align:center;color:#999">
				没找到任何结果 | <a href="/" style="color:#333">返回首页</a>
			</div>
<?php }?>
			<div style="text-align: center;"> 
				<div class="laypage-main"><?=$pagestr?></div>
			</div>
		</div>
		
	</div>
	<div class="edge">
		<div class="fly-panel add_new">
			<a href="<?php if($_userid){?>/send.html<?php }else{?>/login.html<?php }?>"><i class="layui-icon">&#xe654;</i>    发布新话题</a>
		</div>
        <div class="fly-panel">
			<h3 class="fly-panel-title">赞助商为本站提供的内容</h3> 
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 336 -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:336px;height:280px"
				 data-ad-client="ca-pub-3138559351412474"
				 data-ad-slot="3025517326"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
        </div>
        <div class="fly-panel">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 336 -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:336px;height:280px"
				 data-ad-client="ca-pub-3138559351412474"
				 data-ad-slot="3025517326"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
        </div>
    </div>
</div> 
<?php include T('show','footer');?>