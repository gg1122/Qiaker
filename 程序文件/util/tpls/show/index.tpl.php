<?php include T('show','header');?> 
<div class="main layui-clear">
	<div class="wrap">
		<div class="content">
		<ul class="fly-list fly-list-top"> 
			<?php foreach($top_post as $k=>$v) {
$user=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
?>
				<li class="fly-list-li">
					<a href="/user/<?=$v['userid']?>.html" class="fly-list-avatar"><img src="<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>" alt="头像"></a>
					<h2 class="fly-tip">
						<a href="/product/<?=$v['id']?>.html" target="_blank"><?=$v['title']?></a><?php if($v['top']==1){?><span class="fly-tip-stick">置顶</span><?php }?><?php if($v['jing']==1){?><span class="fly-tip-jing">精帖</span><?php }?>
					</h2>
					<p>
						<span><a href="/user/<?=$v['userid']?>.html" target="_blank"><?=$user['username']?$user['username']:'匿名网友';?></a></span>
						<span><?=formatTime($v['time'])?></span>
						<span class="fly-list-hint">
							<i class="iconfont icon-feedback"></i> <?=$v['pl']?>
							<i class="iconfont icon-liulan"></i> <?=$v['view']?>
						</span>
					</p>
				</li>
<?php }?>
			</ul>
			<ul class="fly-list fly-list-top">
<?php foreach($list as $k=>$v) {
$user=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
?>
				<li class="fly-list-li">
					<span class="cat"><?=$cat_arr[$v['catid']]?></span>
					<a href="/user/<?=$v['userid']?>.html" class="fly-list-avatar"><img src="<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>" alt="头像"></a>
					<h2 class="fly-tip">
						<a href="/product/<?=$v['id']?>.html"  target="_blank"><?=$v['title']?></a><?php if($v['top']==1){?><span class="fly-tip-stick">置顶</span><?php }?><?php if($v['jing']==1){?><span class="fly-tip-jing">精帖</span><?php }?>
					</h2>
					<p>
						<span><a href="/user/<?=$v['userid']?>.html" target="_blank"><?=$user['username']?$user['username']:'匿名网友';?></a></span>
						<span><?=formatTime($v['time'])?></span>
						<span class="fly-list-hint">
							<i class="iconfont icon-feedback"></i> <?=$v['pl']?>
							<i class="iconfont icon-liulan"></i> <?=$v['view']?>
						</span>
					</p>
				</li>
<?php }?>
			</ul>
			<div style="text-align: center;"> 
				<div class="laypage-main"><?=$pagestr?></div>
			</div>
		</div>
		
	</div>
	<div class="edge">
		<div class="fly-panel add_new">
			<a href="<?php if($_userid){?>/send.html<?php }else{?>/login.html<?php }?>"><i class="layui-icon">&#xe654;</i>    发布新主题</a>
		</div>
		<div class="fly-panel">
			<h3 class="fly-panel-title">赞助商为本站提供的内容</h3>  
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
				 style="display:inline-block;width:336px;height:280px"
				 data-ad-client="ca-pub-3138559351412474"
				 data-ad-slot="3025517326"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
        </div>
		<div class="fly-panel leifeng-rank">      
			<h3 class="fly-panel-title">话题榜 - TOP 12</h3>      
			<dl> 
<?php foreach($tj_user as $k=>$v) {
$this_user=$db->get_One('select * from `ucenter` where userid ='.$v['userid']);
?>
				<dd>          
					<a href="/user/<?=$v['userid']?>.html">            
						<img src="<?=$this_user['face']?$this_user['face']:'/static/images/avatar.svg';?>">            
						<cite><?=$this_user['username']?></cite>            
						<i><?=$v['num']?>个推荐</i>          
					</a>       
				</dd> 
<?php }?>
			</dl>    
		</div>
        
		<dl class="fly-panel fly-list-one">      
			<dt class="fly-panel-title">最近热帖</dt> 
<?php foreach($hot as $k=>$v) {?>
			<dd>        
				<a href="/product/<?=$v['id']?>.html"><?=$v['title']?></a>        
				<span><i class="iconfont icon-liulan"></i><?=$v['view']?></span>      
			</dd> 
<?php }?>
		</dl>
        <div class="fly-panel fly-link">      
			<h3 class="fly-panel-title">友情链接</h3>      
			<dl>
				<dd><a href="http://fly.layui.com/" target="_blank">layui社区</a></dd>
				<dd><a href="/product/160.html">本站源码下载</a></dd>
				<dd><a href="http://blog.qiaker.cn/" target="_blank">千里草</a></dd>
				<dd><a href="http://app.qiaker.cn/" target="_blank">微信小程序</a></dd>
				<dd><a href="http://www.xiaoduotech.com/" target="_blank">晓多智能客服</a></dd>
			</dl>    
		</div>
    </div>	
</div> 
<?php include T('show','footer');?>