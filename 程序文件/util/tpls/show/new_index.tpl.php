<?php include T('show','new_header');?> 
<div class="containers">
	<div class="left_block">
		<div id="myCarousel" class="carousel slide">
			<!-- 轮播（Carousel）项目 -->
			<div class="carousel-inner">
				<div class="item active">
					<a href="https://home.qiaker.cn/" target="_blank">
						<div style="background: url('https://home.qiaker.cn/wp-content/uploads/2017/11/360截图20171121214409670.png') no-repeat center;background-size: cover"></div>
					</a>
				</div>
				<div class="item">
					<a href="/product/160.html" target="_blank">
						<div style="background: url('/static/uploadfile/2017/1101/20171101001121_899.jpg') no-repeat center;background-size: cover"></div>
					</a>
				</div>
				<div class="item ">
					<a href="http://blog.qiaker.cn/theme" target="_blank">
						<div style="background: url('/static/uploadfile/2017/1031/20171031235811_461.jpg') no-repeat center;background-size: cover"></div>
					</a>
				</div>
			</div>
			<!-- 轮播（Carousel）导航 -->
			<a class="arrow_l" href="#myCarousel" data-slide="prev">
				<img src="/static/images/arrow_l.jpg" alt="">
			</a>
			<a class="arrow_r" href="#myCarousel" data-slide="next">
				<img src="/static/images/arrow_r.jpg" alt="">
			</a>
		</div>
		<div>
			<header>
				<span class="name">专题推荐</span>
				<span class="num">52</span>
				<span class="look_all">查看全部</span></header>
			<ul class="topic">
				<li>
					<a href="https://home.qiaker.cn/" target="_blank">
						<div style="background:url('https://home.qiaker.cn/wp-content/uploads/2017/11/360截图20171121214409670.png') no-repeat center;background-size: cover"></div>
					</a>
				</li>
				<li>
					<a href="/product/160.html" target="_blank">
						<div style="background:url('/static/uploadfile/2017/1101/20171101001121_899.jpg') no-repeat center;background-size: cover"></div>
					</a>
				</li>
				<li>
					<a href="http://blog.qiaker.cn/theme" target="_blank">
						<div style="background:url('https://blog.qiaker.cn/wp-content/uploads/2017/05/01.jpg') no-repeat center;background-size: cover"></div>
					</a>
				</li>
			</ul>
		</div>
		<div style="width: 100%">
			<header>
				<span class="name">推荐产品</span>
				<span class="num"><?=$nums['num']?></span></header>
			<ul class="course">
<?php foreach($list as $k=>$v) {
$user=$db->get_One('select * from `ucenter` where userid='.$v['userid']);
?>
				<li>
					<div>
						<div class="header_img" style="background: url('<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>') no-repeat center;background-size: cover"></div>
						<div class="course_info">
							<p class="course_name"><a href="/product/<?=$v['id']?>.html"><?=$v['title']?></a></p>
							<p><?=$user['username']?$user['username']:'匿名网友';?></p>
							<p><?=formatTime($v['time'])?></p>							
						</div>
						<div class="course_right">
							<p class="type_tag">
								<span>
									<img src="/static/images/rocket.png" alt="" />
									<b><?=$cat_arr[$v['catid']]?></b>
								</span>
							</p>
							<p class="signUp_num">
								<span><?=$v['view']?>人关注</span></p>
						</div>
					</div>
				</li>
<?php }?>
			</ul>
			
			<div style="text-align: center;"> 
				<div class="laypage-main"><?=$pagestr?></div>
			</div>
		</div>
		<img src="/static/images/back_top.png" alt="" class="back_top">
	</div>
	<?php include T('show','right');?> 
</div>
<?php include T('show','new_footer');?> 