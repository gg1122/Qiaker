<?php include T('show','new_header');?> 
	<div class="containers">
		<div class="left_block">
			<h1 style="display: none;"><?=$info['title']?></h1>
			<div class="course_top">
				<div class="course_top_name">
					<div style="background:url('<?=$user['face']?$user['face']:'/static/images/avatar.svg';?>') no-repeat center;background-size: cover"></div>
					<div>
						<p><?=$info['title']?></p>
						<p><?=$info['dsp']?></p>

					</div>
				</div>
				<div class="course_top_opt">
					<div>
						<p>
							<img src="http://qianbei.sxsimg.com/static/new_pc/img/time.png?v=fbf7822041320da952f3fc5ff64c5c17" alt="">
							<b><?=formatTime($info['time'])?>发布</b>
						</p>
						<p>
							<img src="http://qianbei.sxsimg.com/static/new_pc/img/people.png?v=611e8415d3ff3e700cfa2589bc21f074" alt="">
							<b><?=$info['view']?>人阅读</b>
						</p>

					</div>
					<a href="/url.html?id=<?=$id?>" target="_blank" >
						<div class="swiggleBox"><i class="iconfont icon-lianjie"></i> 直达链接
							<svg width="130" height="65" viewBox="0 0 130 65" xmlns="http://www.w3.org/2000/svg">
								<path d="M0.6,0.5c0,5.4,0,61.5,0,61.5s4.5,5.4,9.9,0c5.4-5.4,9.9,0,9.9,0s4.5,5.4,9.9,0c5.4-5.4,9.9,0,9.9,0
								s4.5,5.4,9.9,0c5.4-5.4,9.9,0,9.9,0s4.5,5.4,9.9,0c5.4-5.4,9.9,0,9.9,0s4.5,5.4,9.9,0c5.4-5.4,9.9,0,9.9,0s4.5,5.4,9.9,0
								c5.4-5.4,9.9,0,9.9,0s4.5,5.4,9.9,0c0,0,0-56.1,0-61.5H0.6z"/>
							</svg>
						</div>
					</a>
				</div>
			</div>
			<div class="course_details">
				<header>
					<span class="name">详情</span>
				</header>
				<div>
					<?=$info['content']?>
				</div>
				<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				<p style="font-size:12px;color:#ccc;margin-bottom:0">赞助商提供的广告信息</p>
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
			<div class="tutor_info">
				<h4 class="tutor_info_tag">推荐人</h4>
				<div>
					<span class="tutor_name"><?=$user['username']?></span>
					<a href="/user/<?=$info['userid']?>.html"><span class="listen_num">共推荐过 <?=$tj?> 次产品</span></a>
				</div>
			</div>
		</div>
		<?php include T('show','right');?> 
	</div>
<?php include T('show','new_footer');?> 