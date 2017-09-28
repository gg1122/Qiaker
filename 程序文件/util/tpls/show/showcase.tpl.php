<?php include T('show','header');?> 
<link href='http://cdn.webfont.youziku.com/webfonts/nomal/26113/45894/596d7ec0f629da05c0298756.css' rel='stylesheet' type='text/css' />
<style type="text/css">
.fly-home{background: url(/static/images/case.jpg);margin-bottom:30px;}
h2.section-title {
    font-size: 36px;
    color: #3d3d3d;
    height: 50px;
    line-height: 50px;
    font-weight: 400;
    text-align: center;
}
.contact-us {
    display: block;
    width: 200px;
    height: 48px;
    line-height: 48px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    border-radius: 3px;
    background-color: #007fff;
    box-shadow: 0 3px 0 0 #2c71d2;
    font-size: 18px;
    font-weight: 300;
    text-align: center;
    color: #fff;
}
a.contact-us:hover {
	color:#fff
}
.contact-text {
    margin-top: 20px;
    color: #666;
}
._align-center {
    text-align: center;
}
</style>
<div class="fly-home">
	<h2 class="section-title cssbf8e069d36601">站秀频道，让世界看到</h2>
	<div>
		<a class="contact-us" id="footer-link" target="_blank" rel="nofollow" href="javascript:tijiao()">提交网站</a>
	</div>
	<!--<p class="contact-text _align-center">或发送邮件到：<a href="mailto:"></a></p>-->
</div>
<script type="text/javascript">
function tijiao(){
	<?php if(!$_userid){?>
	layer.msg('登陆才能提交哦！');
	return;
	<?php }?>
	layer.open({
		type: 1,
		area: '660px',
		title: '提交网站',
		shadeClose: true, //点击遮罩关闭
		content: $('#LAY_pushcase')
	});
}
</script>
<style type="text/css">
#LAY_pushcase{display:none}	
</style>
<div class="main" style="overflow: hidden;">
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li <?php if(empty($org)){?>class="layui-this"<?php }?>><a href="/showcase.html">按提交时间</a></li>
            <li <?php if(!empty($org)){?>class="layui-this"<?php }?>><a href="/showcase.html?org=zan">按点赞排行</a></li>
        </ul>
    </div>
    <ul class="fly-case-list">
<?php foreach($list as $k=>$v){
$user=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
$old_zan=$db->get_One('select * from `zan_log` where userid='.$_userid.' and infoid='.$v['id'].' and tp=2');
?>
        <li>
            <a class="fly-case-img" href="<?=$v['link']?>" target="_blank">
                <img src="<?=$v['thumb']?$v['thumb']:'/static/images/case_def.jpg';?>" alt="<?=$v['title']?>">
                <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite></a>
            <h2>
            <a href="<?=$v['link']?>" target="_blank"><?=$v['title']?></a></h2>
            <p class="fly-case-desc"><?=$v['dsp']?></p>
            <div class="fly-case-info">
                <a href="/user/<?=$v['userid']?>.html" class="fly-case-user" target="_blank"><img src="<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>"></a>
				<p class="layui-elip" style="font-size: 12px;"><span style="color: #666;"><?=$user['username']?$user['username']:'匿名网友';?></span> <?=formatTime($v['addtime'])?></p>
				<p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;"><?=$v['vote']?></a>个赞</p>
<?php if(empty($old_zan)){?>
                <a class="layui-btn layui-btn-primary fly-case-active" href="javascript:zan(<?=$v['id']?>)">点赞</a>
<?php }else{?>
				<a class="layui-btn layui-btn-normal fly-case-active">已赞</a>
<?php }?>
			</div>
        </li>
<?php }?>
    </ul>
    <div style="text-align: center;">
        <div class="laypage-main"><?=$pagestr?></div>
    </div>
</div> 
<div id="LAY_pushcase">
<form method="post">
	<input type="hidden" name="c" value="save"/>
    <ul class="layui-form" style="margin: 20px;">
        <li class="layui-form-item">
            <label class="layui-form-label">站点名称</label>
            <div class="layui-input-block">
                <input required="" name="title" lay-verify="required" placeholder="一般为网站名称" value="" class="layui-input"></div>
        </li>
        <li class="layui-form-item">
            <label class="layui-form-label">网址</label>
            <div class="layui-input-block">
                <input required="" name="link" lay-verify="link" placeholder="必须是自己或自己参与过的项目" value="" class="layui-input"></div>
        </li>
        <li class="layui-form-item layui-form-text">
            <label class="layui-form-label">站点描述</label>
            <div class="layui-input-block layui-form-text">
                <textarea required="" name="dsp" lay-verify="required" autocomplete="off" placeholder="可以大致阐，10-60个字" class="layui-textarea" style="height: 40px;"></textarea>
            </div>
        </li>
		<li class="layui-form-item">
			<label class="layui-form-label">封面图片</label>
			<div class="layui-input-block">
				<input type="file" name="file" id="thumb" class="layui-upload-file" lay-title="点击上传"> 
				<input type="hidden" name="thumb" id="chk_thumb" />
				<div id="img_thumb" style="margin-top:10px"></div>
			</div>
		</li>
        <li class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-block">
                <input type="checkbox" name="agree" id="agree" title="我同意（如果你进行了刷赞行为，你的案例将被立马剔除）" lay-skin="primary">
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                    <span>我同意（如果你进行了刷赞行为，你的案例将被立马剔除）</span>
                    <i class="layui-icon"></i>
				</div>
            </div>
        </li>
        <li class="layui-form-item">
            <div class="layui-input-block">
				<a class="layui-btn" lay-filter="sendcase" lay-submit>提交参赛</a>
			</div>
        </li>
    </ul>
</form>
</div>
<script>
layui.use('form', function(){
	var form = layui.form();
	form.on('submit(sendcase)', function(data){
		$.post('/showcase.html?c=save',data.field,function(res){
			console.log(res);
			if(res=='ok'){
				layer.msg('发布成功,等待审核！');
				setTimeout(function(){
					window.location.href="/showcase.html";
				},1000)
			}else{
				layer.msg(res);
			}
		});
		return false;
	});
}); 
layui.use('upload', function(){
	layui.upload({
		url: '/?m=admin&a=up'
		,elem: '#thumb' 
		,success: function(res){
			$('#img_thumb').html('<img src="'+res.data.src+'" width="150px"/>');
			$('#chk_thumb').val(res.data.src);
		}
	});
});
function zan(id){
	<?php if(!$_userid){?>
	layer.msg('登陆才能点赞哦！');
	return;
	<?php }?>
	$.ajax({
		type:'post',
		url:'/showcase.html?c=zan',
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
</script>
<?php include T('show','footer');?>