<?php
session_start();
include_once( PHPCMS_ROOT.'/util/core/config.php' );
include_once( PHPCMS_ROOT.'/util/core/saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {  
	$keys = array();  
	$keys['code'] = $_REQUEST['code'];  
	$keys['redirect_uri'] = WB_CALLBACK_URL;  
	try {  
		$token = $o->getAccessToken( 'code', $keys ) ;  
	}   
	catch (OAuthException $e) {  
	}  
}  

if ($token) {  
	$_SESSION['token'] = $token;  
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );  
	$c = new saetclientv2(WB_AKEY,WB_SKEY,$token['access_token']);  
	$ms =$c->home_timeline();  
	$uid_get = $c->get_uid();  
	$uid = $uid_get['uid'];  
	$usr_info=$c->show_user_by_id($uid); //微博sdk方法获取用户的信息  
	$nickname=$usr_info['name'];
	$face=$usr_info['profile_image_url'];
	$sex=$usr_info['gender']=='m'?'男':'女';
	$url=$usr_info['url'];
	$weiboid=$usr_info['id'];
	$signature=$usr_info['description'];
	$olduser=$db->get_One("select * from ucenter where weiboid = '$weiboid'"); 
	if(empty($olduser)){ 
		$regtime=TIME;
		$db->query("INSERT INTO ucenter(username,regtime,face,sex,url,signature,weiboid)VALUES('$nickname','$regtime','$face','$sex','$url','$signature','$weiboid')");
		$uid=$db->insert_id();
		$_SESSION['userid']=$uid;
		$_SESSION['username'] = $nickname;
	}else{  
		$_SESSION['userid']=$olduser['userid'];
		$_SESSION['username'] = $olduser['username'];
		$auth = Auth::encode($_SESSION['userid']."\t".$olduser['password']);
		Cookie::set('Uin', $_SESSION['userid']);
		Cookie::set('Uas', $auth);
	}
	header('location:/');
}else {  
	echo '授权失败。';  
} 
