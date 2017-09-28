<?php
$acts=array('index'=>true,'add'=>true,'edit'=>true,'del'=>true,'save'=>true);
$c=isset($_REQUEST['c'])?trim($_REQUEST['c']):'index';
if(!isset($acts[$c])){
	$c='index';
}
$title='发布新话题 - 恰客';
switch($c) {
	case 'index':
		$id=$_REQUEST['id']?$_REQUEST['id']:0;
		include T('show','send');
		break;
	case 'save':
		$infos=array();
		$id=intval($_POST['id']);
		$infos['title']=trim($_POST['title']);
		$infos['url']=trim($_POST['url']);
		$infos['dsp']=trim($_POST['dsp']);
		$infos['status']=1;
		$infos['userid']=$_userid;
		$infos['catid']=intval($_POST['catid']);			
		$infos['content']=$_POST['content'];
		if($id>0){
			$db->update('main_info',$infos,'id='.$id);
		}else{
			$infos['time']=TIME;
			$db->insert('main_info',$infos);
		}
		exit('ok');
		break;
	case 'edit':
		$id=$_REQUEST['id'];
		$info=$db->get_One('select * from `main_info` where id='.$id);
		if($info['userid']!=$_userid){
			header('location:/');
		}
		include T('show','send');
		break;
}