<?php
$acts=array('index'=>true,'add'=>true,'edit'=>true,'del'=>true,'save'=>true);
$c=isset($_REQUEST['c'])?trim($_REQUEST['c']):'index';
if(!isset($acts[$c])){
	$c='index';
}
switch($c) {
	case 'index':
		$page=isset($_GET['page'])?intval($_GET['page']):1;
		$page=max(1,$page);
		$offset=10;
		$start=($page-1)*$offset;
		$nums=$db->get_one('select count(*) as num from `web_friend`');
		$list=$db->getAll('select * from `web_friend` order by id asc limit '.$start.','.$offset);
		$pagestr=pages_z($nums['num'], $page, $offset);
		include T('admin','links');
		break;
	case 'add':
		include T('admin','link_add');	
		break;
	case 'edit':
		$id=intval($_REQUEST['id']);
		$info=$db->get_One('select * from `web_friend` where id='.$id);
		include T('admin','link_add');
		break;
	case 'del':
		$id=intval($_REQUEST['id']);
		$db->query('delete from `web_friend` where id='.$id);
		showmessage('删除成功','/?m=admin&a=friend');
		break;
	case 'save':
		$id=isset($_REQUEST['id'])?intval($_REQUEST['id']):0;
		$infos['title']=trim($_POST['title']);
		$infos['link']=trim($_POST['link']);
		if($id>0){
			$db->update('web_friend',$infos,'id='.$id);
			$msg='更新成功';
		}else{
			$db->insert('web_friend',$infos);
			$msg='发布成功';
		}
		showmessage($msg,'/?m=admin&a=friend');
		break;
}

