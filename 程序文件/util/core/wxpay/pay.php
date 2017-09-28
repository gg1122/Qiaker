<?php
class Packet{
	private $wxapi;
    function _route($fun,$param = ''){
		@require_once "oauth2.php";
		$this->wxapi = new Wxapi();
		switch ($fun)
		{
			case 'userinfo':
				return $this->userinfo($param);
				break;
			case 'wxpacket':
				return $this->wxpacket($param);
				break;			
			default:
				exit("Error_fun");
		}		
    }	
    /**
     * 用户信息
     * 
     */	
	private function userinfo($param){ 
		$get = $param['param'];
		$code = $param['code'];	
		if(!empty($code)){
			$json = $this->wxapi->get_access_token($code);
			if(!empty($json)&&isset($json['access_token'])&&isset($json['openid'])){
				$userinfo = $this->wxapi->get_user_info($json['access_token'],$json['openid']);
				if(isset($userinfo['openid'])){
					return $userinfo;
				}else{
					$this->wxapi->get_authorize_url('http://wxdata.7192.com/mall/hb.html','114197',1);
				}
			}
		}else{
			$this->wxapi->get_authorize_url('http://wxdata.7192.com/mall/hb.html','114197');
		}
	}
    /**
     * 微信红包
     * 
     */		
	private function wxpacket($param){
		return $this->wxapi->pay($param['openid']);
	}
}
?>