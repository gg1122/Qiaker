<?php
$date = date("Y-m-d", TIME);
$nowdate = date("Y-m-d", TIME);
$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$top_post=$db->getAll('select * from `main_info` where status=1 and top=1 order by time desc');
//$today_post=$db->getAll('select * from `main_info` where status=1 and top=0 and time>'.$beginToday.' order by time desc');
//$yesteday=date('Y-m-d',strtotime($date.'-1 day'));
//$start=strtotime($date);
//$end=strtotime($date)+24*3600-1;
$page=isset($_GET['page'])?intval($_GET['page']):1;
$page=max(1,$page);
$offset=12;
$start=($page-1)*$offset;
$nums=$db->get_one('select count(*) as num from `main_info` where status=1 and time<'.$beginToday);
$list=$db->getAll('select * from `main_info` where status=1  order by time desc limit '.$start.','.$offset);
$pagestr=pages_z($nums['num'], $page, $offset);
$str=$page>1?'第'.$page.'页_':'';
$week = get_week($date);
$title=$str.'恰客_极客们的分享交流社区';
$tj_user=$db->getAll('select count(*) as num,userid from `main_info` group by userid order by num desc limit 12');
if($_GET['t']==1){
	include T('show','index');
}else{
	include T('show','new_index');
}