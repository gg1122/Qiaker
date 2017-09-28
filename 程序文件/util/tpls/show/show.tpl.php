<?php include T('show','header');?>
<div class="main layui-clear">	
    <div class="wrap">
		<div class="bdsharebuttonbox">
		<a href="#" class="bds_tsina1 bds_ico" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_weixin1 bds_ico" data-cmd="weixin" title="分享到微信"></a>
		<a href="#" class="bds_qzone1 bds_ico" style="border-bottom: 0px" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#cmt" class="bds_pin bds_ico2" style="margin-top: 30px;border-bottom: 0px">评论</a>
		</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
        <div class="content detail">
            <div class="fly-panel detail-box">
                <h1><?=$info['title']?></h1>
                <div class="fly-tip fly-detail-hint">
					<?php if($info['top']==1){?><span class="fly-tip-stick">置顶</span><?php }?><?php if($info['jing']==1){?><span class="fly-tip-jing">精帖</span><?php }?>
				</div>
				<div class="detail-about">
                    <a class="jie-user" href="/user/<?=$info['userid']?>.html">
                        <img src="<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>" alt="">
                        <cite><?=$user['username']?> <em><?=formatTime($info['time'])?>发布  · <?=$info['view']?>人阅读  · <?=$info['pl']?>人评论</em></cite>
                    </a>
                    <div class="detail-hits" data-id="{{rows.id}}">
                        <span>共推荐过 <i style="color:#FF7200"><?=$tj?></i> 次产品</span>
						<?php if($_userid==$info['userid']){?>
						<span><a href="/send.html?c=edit&id=<?=$id?>"><i class="layui-icon">&#xe642;</i>  编辑</a></span>
						<?php }?>
						<span class="layui-btn layui-btn-mini jie-admin " <?php if(empty($old_fav)){?>onclick="fav(<?=$id?>)"<?php }?>>收藏</span>
                    </div>
                </div>
				<div style="clear:both"></div>
                <div class="detail-body">
                    <p><?=$info['dsp']?></p>
                </div>
				<div class="detail-body" >
                    <?=$info['content']?>
                </div>
				<div class="p-content" >
					<a <?php if(empty($old_zan)){?>onclick="zan(<?=$id?>)" <?php }?>class="layui-btn layui-btn-primary"><i class="iconfont icon-icon3zanpinglunzhuanfaliulan01"></i> <?=$zan_num?$zan_num:'';?></a>	
					<?php if(!empty($info['url'])){?>
					<a href="/url.html?id=<?=$id?>" target="_blank" class="layui-btn layui-btn-primary" style="float:right"><i class="layui-icon">&#xe64c;</i>  直达链接</a><?php }?><br/>
				</div>
				<div class="zan_user">
<?php foreach($all_zan as $k=>$v) {
$this_user=$db->get_One('select * from `ucenter` where userid ='.$v['userid']);
?>
					<a href="/user/<?=$v['userid']?>.html" title="<?=$this_user['username']?>">
						<div class="zan_avater">
							<img src="<?=$this_user['face']?$this_user['face']:'/static/images/avatar.svg';?>" alt="<?=$this_user['username']?>" />
						</div>
					</a>
<?php }?>
				</div>
			</div>
			<div class="fly-panel detail-box" style="padding-top: 10px;">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<ins class="adsbygoogle"
					 style="display:block; text-align:center;"
					 data-ad-format="fluid"
					 data-ad-layout="in-article"
					 data-ad-client="ca-pub-3138559351412474"
					 data-ad-slot="5231018923"></ins>
				<script>
					 (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<a id="cmt"></a>
			<div class="fly-panel detail-box" style="padding-top: 10px;">
				<ul class="jieda photos" id="jieda">
<?php if(!empty($comment)){foreach($comment as $k=>$v) {
$who=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
$my_zan=$db->get_One('select * from `zan_log` where userid='.$v['userid'].' and infoid='.$v['id'].' and tp=3');
?>
					<li>
						<div class="detail-about detail-about-reply">
							<a class="jie-user" href="/user/<?=$v['userid']?>.html">
								<img src="<?=$who['face']?$who['face']:'/static/images/avatar.svg';?>" alt="<?=$who['username']?>" layer-index="0">
								<cite><i><?=$who['username']?></i></cite>
							</a>
							<div class="detail-hits"><span><?=date('Y-m-d H:i',$v['time'])?></span></div>
						</div>
						<div class="detail-body jieda-body">
							<?=$v['content']?>
						</div>
						<div class="jieda-reply">            
							<span class="jieda-zan" <?php if(!empty($my_zan)){?> style="color:#007fff" <?php }else{?>onclick="zan_pl(<?=$v['id']?>)"<?php }?>>              
								<i class="iconfont icon-icon3zanpinglunzhuanfaliulan01"></i> <em><?=$v['zan']?></em>           
							</span>            
							<!--<span type="reply">              
								<i class="iconfont icon-feedback"></i> 回复
							</span>-->                        
						</div>
					</li>
<?php }}else{?>
					<li class="fly-none">还没有任何回复</li>
<?php }?>
				</ul>
<?php if(!empty($_userid)){?>
				<div class="layui-form layui-form-pane">
					<form method="post">
						<input type="hidden" name="c" value="comment"/>
						<input type="hidden" name="infoid" value="<?=$id?>">
						<div class="layui-form-item layui-form-text">
							<div class="layui-input-block">
								<textarea id="L_content" name="content"></textarea>
							</div>
						</div>
						<div class="layui-form-item">
							<a class="layui-btn" id="sendbtn" lay-filter="cmt" lay-submit>发布评论</a>
						</div>
					</form>
				</div>
<?php }else{?>
				<div class="layui-form layui-form-pane" style="clear:both;">
					<div class="layui-form-item layui-form-text">
						<div class="layui-input-block">
							<div class="layui-textarea" style="line-height:80px;text-align:center;color:#8590a6">
								登录后才可发表评论 | <a href="/login.html" style="color:#007fff">登录</a>
							</div>
						</div>
					</div>
                </div>
<?php }?>
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
		<dl class="fly-panel fly-list-one">      
			<dt class="fly-panel-title">最近热帖</dt> 
<?php foreach($hot as $k=>$v) {?>
			<dd>        
				<a href="/product/<?=$v['id']?>.html"><?=$v['title']?></a>        
				<span><i class="iconfont icon-liulan"></i><?=$v['view']?></span>      
			</dd> 
<?php }?>
		</dl>
    </div>
</div>
<script type="text/javascript">
layui.use(['form','layedit','upload'], function(){
	var form = layui.form();
	layedit = layui.layedit;
	layedit.set({
		uploadImage: {
			url: '/?m=admin&a=up' //接口url
			,type: 'post' //默认post
		}
	});
	var txt = layedit.build('L_content',{
		height: 150,
		//tool: [ 'strong', 'italic', 'underline','del', '|','face','link', '|','left', 'center', 'right']
	});
	$('#sendbtn').click(function(){
		layedit.sync(txt);	
		form.on('submit(cmt)', function(data){
			$.post('/show.html',data.field,function(res){
				if(res=='ok'){
					layer.msg('发布评论成功！');
					setTimeout(function(){
						window.location.reload();
					},1000)
				}else{
					layer.msg(res);
				}
			});
			return false;
		});
	});
});
function zan(id){
	<?php if(!$_userid){?>
	layer.msg('您还没有登陆哦！');
	return;
	<?php }?>
	$.ajax({
		type:'post',
		url:'/product/<?=$id?>.html?c=zan',
		data:{'infoid':id},
		success:function(r){
			if(r=='ok'){
				layer.msg('感谢支持！');
			}else{
				layer.msg(r);
			}
			setTimeout(function(){window.location.reload(true);},1200);
		}
	});
}
function zan_pl(id){
	<?php if(!$_userid){?>
	layer.msg('您还没有登陆哦！');
	return;
	<?php }?>
	$.ajax({
		type:'post',
		url:'/product/<?=$id?>.html?c=zanpl',
		data:{'infoid':id},
		success:function(r){
			if(r=='ok'){
				layer.msg('感谢支持！');
			}else{
				layer.msg(r);
			}
			setTimeout(function(){window.location.reload(true);},1200);
		}
	});
}
function fav(id){
	<?php if(!$_userid){?>
	layer.msg('您还没有登陆哦！');
	return;
	<?php }?>
	$.ajax({
		type:'post',
		url:'/product/<?=$id?>.html?c=fav',
		data:{'infoid':id},
		success:function(r){
			if(r=='ok'){
				layer.msg('收藏成功！');
			}else{
				layer.msg(r);
			}
			setTimeout(function(){window.location.reload(true);},1200);
		}
	});
}
</script>
<?php include T('show','footer');?>