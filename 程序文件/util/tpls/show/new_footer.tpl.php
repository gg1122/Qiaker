
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/static/js/base.js?t=122"></script>

<script type="text/javascript">
 $(window).scroll(function () {
	//获取滚动条的滑动距离
	var scroH = $(this).scrollTop();
	//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
	if (scroH >= 600) {
		$(".right_block").css({ "position": "fixed", "top": "10px" });
	} else if (scroH < 600) {
		$(".right_block").css({ "position": "absolute", "top": "90px" });
	}
});
</script>
<div class="footer">
    <p>2017 &copy;<a href="http://qiaker.cn/">恰客</a></p>
	<p class="copy">本站部分资源来源于网络或会员分享，如有侵权请联系管理员进行删除。QQ：290805404 鲁ICP备16031483号</p>
</div>

<script type="text/javascript">
layui.use(['layer', 'jquery'],function() {
	var layer = layui.layer,
	jq = layui.jquery;
})
layui.use('element',function() {
	var element = layui.element();
});
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?f9ff0e9456febfac352e5c530446a554";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3138559351412474",
    enable_page_level_ads: true
  });
</script>
</body>
</html>