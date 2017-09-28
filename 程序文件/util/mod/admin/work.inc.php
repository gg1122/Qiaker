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
		$nums=$db->get_one('select count(*) as num from `web_works`');
		$list=$db->getAll('select * from `web_works` order by time desc limit '.$start.','.$offset);
		$pagestr=pages_z($nums['num'], $page, $offset);
		include T('admin','work_list');
		break;
	case 'add':
		include T('admin','work_add');	
		break;
	case 'edit':
		$id=intval($_REQUEST['id']);
		$info=$db->get_One('select * from `web_works` where id='.$id);
		include T('admin','work_add');
		break;
	case 'del':
		$id=intval($_REQUEST['id']);
		$db->query('delete from `web_works` where id='.$id);
		showmessage('删除成功','/?m=admin&a=work');
		break;
	case 'save':
		$id=isset($_REQUEST['id'])?intval($_REQUEST['id']):0;
		$infos['title']=trim($_POST['title']);
		$infos['links']=trim($_POST['links']);
		if(empty($_POST['thumb'])){
            showmessage('缩略图不能为空！');
        }
		$real_file=PHPCMS_ROOT.$_POST['thumb'];
		if(strpos($real_file,'temp')){
			$d =PHPCMS_ROOT.'vr/static/uploadfile/'.date('Y/md/');
			if(createDir($d)){
				$file_name_arr=explode('_real',$real_file,2);
				$new_base=$d.substr($file_name_arr[0],-9);
				$new_real=$new_base.'_real'.$file_name_arr[1];
				rename($real_file,$new_real);
				$infos['thumb']=str_replace(PHPCMS_ROOT.'vr/static','vr/static',$new_real);
			}
		}else{
			$infos['thumb']=$_POST['thumb'];
		}
		$infos['time']=time();
		if($id>0){
			$db->update('web_works',$infos,'id='.$id);
			$msg='更新成功';
		}else{
			$db->insert('web_works',$infos);
			$msg='发布成功';
		}
		showmessage($msg,'/?m=admin&a=work');
		break;
}