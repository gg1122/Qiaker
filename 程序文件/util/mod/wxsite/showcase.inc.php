<?php
$acts=array('index'=>true,'save'=>true,'zan'=>true);
$c=isset($_REQUEST['c'])?trim($_REQUEST['c']):'index';
if(!isset($acts[$c])){
	$c='index';
}
$title='站秀频道_让世界看到';
switch($c) {
	case 'index':
		$page=isset($_GET['page'])?intval($_GET['page']):1;
		$page=max(1,$page);
		$offset=15;
		$start=($page-1)*$offset;
		$nums=$db->get_one('select count(*) as num from `main_case` where status=1');
		$org=trim($_REQUEST['org']);
		if($org=='zan'){
			$order='vote desc';
		}else{
			$order='addtime desc';
		}
		$list=$db->getAll('select * from `main_case` where status=1  order by '.$order.' limit '.$start.','.$offset);
		$pagestr=pages_z($nums['num'], $page, $offset);
		include T('show','showcase');
		break;
	case 'save':
		$infos=array();
		$id=intval($_POST['id']);
		$infos['title']=trim($_POST['title']);
		if(empty($infos['title'])){
			exit('请填写网站标题');
		}
		$infos['link']=trim($_POST['link']);
		if(empty($infos['title'])){
			exit('请填写网站链接');
		}
		$infos['dsp']=trim($_POST['dsp']);
		$infos['thumb']=trim($_POST['thumb']);
		if(empty($infos['title'])){
			exit('请上传封面图片');
		}
		$infos['status']=0;
		$infos['userid']=$_userid;		
		if($id>0){
			$db->update('main_case',$infos,'id='.$id);
		}else{
			$infos['addtime']=TIME;
			$db->insert('main_case',$infos);
		}
		exit('ok');
		break;
	case 'zan':
		if(empty($_userid)){
			exit('请先登录！');
		}
		$infos=array();
		$infos['infoid']=intval($_POST['infoid']);
		$infos['userid']=$_userid;
		$infos['time']=TIME;
		$infos['tp']=2;
		$db->insert('`zan_log`',$infos);
		$db->query('update `main_case` set vote=vote+1 where id='.$infos['infoid']);
		exit('ok');
		break;
}