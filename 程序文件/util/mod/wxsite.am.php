<?php
//微网展示入口
$mod_arr=array(
	'index'=>true,
	'show'=>true,
	'login'=>true,
	'reg'=>true,
	'send'=>true,
	'logout'=>true,
	'day'=>true,
	'user'=>true,
	'getpwd'=>true,
	'qqlogin'=>true,
	'callback'=>true,
	'url'=>true,
	'search'=>true,
	'showcase'=>true,
	'wblogin'=>true,
	'wbcallback'=>true,
	'ioswallpaper'=>true
);//模块白名单
$this_mod=isset($_REQUEST['mod'])?trim($_REQUEST['mod']):'index';
if(!isset($mod_arr[$this_mod])){
	$this_mod='index';
}
$hot=$db->getAll('select * from `main_info` where status=1 order by view desc,time desc limit 10');
$keywords="智能头条,人工智能,智能硬件,智能机器人,人工智能学习,无人驾驶,无人机,物联网,云计算";
$dsp="恰客网，每天来分享你觉得很赞的产品";

$cat_arr=array(
	0=>'',
	1=>'App推荐',
	2=>'网站推荐',
	3=>'资源分享',
	4=>'话题讨论',
	5=>''
);
include M($m,$this_mod);
