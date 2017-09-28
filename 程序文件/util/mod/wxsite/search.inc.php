<?php
$key=trim($_REQUEST['key']);
$page=isset($_GET['page'])?intval($_GET['page']):1;
$page=max(1,$page);
$offset=15;
$start=($page-1)*$offset;
$nums=$db->get_one('select count(*) as num from `main_info` where status=1 and title like "%'.$key.'%"');
$list=$db->getAll('select * from `main_info` where status=1 and title like "%'.$key.'%" order by time desc limit '.$start.','.$offset);
$pagestr=pages_z($nums['num'], $page, $offset);
$str=$page>1?'第'.$page.'页_':'';
$week = get_week($date);
$title=$key.'_'.$str.'恰客_极客们的分享交流社区';
include T('show','search');