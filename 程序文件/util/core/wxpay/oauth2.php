<?php
class Wxapi {
    private $app_id = 'wx54eb2d3121bf3c9b';
    private $app_secret = 'ed3574f0cf088f12857dabb47e77f76c';
    private $app_mchid = '1231822102';
    function __construct(){
    //do sth here....
    }
    /**
     * 微信支付
     * 
     * @param string $openid 用户openid
     */
    public function pay($re_openid,$db=null)
    {
        include_once('WxHongBaoHelper.php');
        $commonUtil = new CommonUtil();
        $wxHongBaoHelper = new WxHongBaoHelper();
        $wxHongBaoHelper->setParameter("nonce_str", $this->great_rand());//随机字符串，丌长于 32 位
        $wxHongBaoHelper->setParameter("mch_billno", $this->app_mchid.date('YmdHis').rand(1000, 9999));//订单号
        $wxHongBaoHelper->setParameter("mch_id", $this->app_mchid);//商户号
        $wxHongBaoHelper->setParameter("wxappid", $this->app_id);
        $wxHongBaoHelper->setParameter("send_name", '提现红包');//红包发送者名称
        $wxHongBaoHelper->setParameter("re_openid", $re_openid);//相对于医脉互通的openid
        $wxHongBaoHelper->setParameter("total_amount", 300);//付款金额，单位分
        $wxHongBaoHelper->setParameter("total_num", 3);//红包収放总人数
        $wxHongBaoHelper->setParameter("wishing", '八月份的尾巴你是狮子桌');//红包祝福诧
        $wxHongBaoHelper->setParameter("amt_type", 'ALL_RAND');//红包祝福诧
        $wxHongBaoHelper->setParameter("act_name", '八月纪');//活劢名称
        $wxHongBaoHelper->setParameter("remark", '快来抢！');//备注信息
        $postXml = $wxHongBaoHelper->create_hongbao_xml();
		$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendgroupredpack';
        $responseXml = $wxHongBaoHelper->curl_post_ssl($url, $postXml);
		$responseObj = simplexml_load_string($responseXml, 'SimpleXMLElement', LIBXML_NOCDATA);
		return $responseObj->return_code;
    }
    /**
     * 微信提现红包
     * 
     * @param string $openid 用户openid
     */
    public function hb($re_openid,$arr=array(),$res=0)
    {
        include_once('WxHongBaoHelper.php');
        $commonUtil = new CommonUtil();
        $wxHongBaoHelper = new WxHongBaoHelper();
        $wxHongBaoHelper->setParameter("nonce_str", $this->great_rand());//随机字符串，丌长于 32 位
        $wxHongBaoHelper->setParameter("mch_billno", $this->app_mchid.date('YmdHis').rand(1000, 9999));//订单号
        $wxHongBaoHelper->setParameter("mch_id", $this->app_mchid);//商户号
        $wxHongBaoHelper->setParameter("wxappid", $this->app_id);
        $wxHongBaoHelper->setParameter("nick_name", $arr['nick_name']);//提供方名称
        $wxHongBaoHelper->setParameter("send_name", $arr['send_name']);//红包发送者名称
        $wxHongBaoHelper->setParameter("re_openid", $re_openid);//相对于医脉互通的openid
        $wxHongBaoHelper->setParameter("total_amount", $arr['total_amount']);//付款金额，单位分
        $wxHongBaoHelper->setParameter("min_value", 100);//最小红包金额，单位分
        $wxHongBaoHelper->setParameter("max_value", 20000);//最大红包金额，单位分
        $wxHongBaoHelper->setParameter("total_num", 1);//红包収放总人数
        $wxHongBaoHelper->setParameter("wishing", $arr['wishing']);//红包祝福诧
        $wxHongBaoHelper->setParameter("client_ip", '119.177.63.197');//调用接口的机器 Ip 地址
        $wxHongBaoHelper->setParameter("act_name", $arr['act_name']);//活劢名称
        $wxHongBaoHelper->setParameter("remark", $arr['remark']);//备注信息
        $wxHongBaoHelper->setParameter("logo_imgurl", 'http://static.7192.com/img/share_thumb_001.jpg');//备注信息
        $postXml = $wxHongBaoHelper->create_hongbao_xml();
        $url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';
        $responseXml = $wxHongBaoHelper->curl_post_ssl($url, $postXml);
		$responseObj = simplexml_load_string($responseXml, 'SimpleXMLElement', LIBXML_NOCDATA);
		if($res==1){
			return $responseObj;
		}else{
			return $responseObj->return_code;
		}
    }



	/**
	*微信企业付款
	* @param string $openid 用户openid
	* @param Array $log 付款相关信息
	*/
	public function compay($openid,$log,$res=0){
        include_once('WxHongBaoHelper.php');
        $commonUtil = new CommonUtil();
        $wxHongBaoHelper = new WxHongBaoHelper();
		$total_amount=intval($log['account']);
		if($total_amount<100){
			return '低于下限';//低于下限
		}
		$check_name=!isset($log['re_user_name'])||empty($log['re_user_name'])?'NO_CHECK':'OPTION_CHECK';
		$max_line=$check_name=='NO_CHECK'?200000:2000000;
		if($total_amount>$max_line){
			return '超过上限';//超过上限
		}
        $wxHongBaoHelper->setParameter("mch_appid", $this->app_id);//微信分配的公众账号ID（企业号corpid即为此appId）
        $wxHongBaoHelper->setParameter("mchid", $this->app_mchid);//微信支付分配的商户号
        $wxHongBaoHelper->setParameter("nonce_str", $this->great_rand());//随机字符串，不长于32位
        $wxHongBaoHelper->setParameter("partner_trade_no", 'QYHK_'.str_pad($log['id'],9,"0",STR_PAD_LEFT));//商户订单号，需保持唯一性
        $wxHongBaoHelper->setParameter("openid", $openid);//用户openid
        $wxHongBaoHelper->setParameter("check_name", $check_name);//校验用户姓名选项
		if($check_name!='NO_CHECK'){
			$wxHongBaoHelper->setParameter("re_user_name", $log['re_user_name']);//收款用户真实姓名。 如果check_name设置为FORCE_CHECK或OPTION_CHECK，则必填用户真实姓名
		}
        $wxHongBaoHelper->setParameter("amount", $total_amount);//企业付款金额，单位为分
        $wxHongBaoHelper->setParameter("desc", empty($log['desc'])?'提现':$log['desc']);//企业付款操作说明信息。必填。
        $wxHongBaoHelper->setParameter("spbill_create_ip", '119.177.63.198');//调用接口的机器 Ip 地址
        $postXml = $wxHongBaoHelper->create_hongbao_xml();
        $url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
        $responseXml = $wxHongBaoHelper->curl_post_ssl($url, $postXml);
		var_dump($responseXml);
		exit;
		$responseObj = simplexml_load_string($responseXml, 'SimpleXMLElement', LIBXML_NOCDATA);
		if($res==1){
			return $responseObj;
		}else{
			return $responseObj->return_code;
		}

	}



    /**
     * 微信支付
     * 
     * @param string $openid 用户openid
     */
    public function grouppay($re_openid,$db=null)
    {
        include_once('WxHongBaoHelper.php');
        $commonUtil = new CommonUtil();
        $wxHongBaoHelper = new WxHongBaoHelper();

        $wxHongBaoHelper->setParameter("nonce_str", $this->great_rand());//随机字符串，丌长于 32 位
        $wxHongBaoHelper->setParameter("mch_billno", $this->app_mchid.date('YmdHis').rand(1000, 9999));//订单号
        $wxHongBaoHelper->setParameter("mch_id", $this->app_mchid);//商户号
        $wxHongBaoHelper->setParameter("wxappid", $this->app_id);
        $wxHongBaoHelper->setParameter("nick_name", '全影');//提供方名称
        $wxHongBaoHelper->setParameter("send_name", '技术部');//红包发送者名称
        $wxHongBaoHelper->setParameter("re_openid", $re_openid);//相对于医脉互通的openid
        $wxHongBaoHelper->setParameter("total_amount", 100);//付款金额，单位分
        $wxHongBaoHelper->setParameter("min_value", 100);//最小红包金额，单位分
        $wxHongBaoHelper->setParameter("max_value", 2000);//最大红包金额，单位分
        $wxHongBaoHelper->setParameter("total_num", 1);//红包収放总人数
        $wxHongBaoHelper->setParameter("wishing", '八月份的尾巴你是狮子桌');//红包祝福诧
        $wxHongBaoHelper->setParameter("client_ip", '119.177.63.197');//调用接口的机器 Ip 地址
        $wxHongBaoHelper->setParameter("act_name", '八月纪');//活劢名称
        $wxHongBaoHelper->setParameter("remark", '快来抢！');//备注信息
        $wxHongBaoHelper->setParameter("logo_imgurl", 'http://static.7192.com/img/share_thumb_001.jpg');//备注信息
        $postXml = $wxHongBaoHelper->create_hongbao_xml();
        $url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';
        $responseXml = $wxHongBaoHelper->curl_post_ssl($url, $postXml);
		$responseObj = simplexml_load_string($responseXml, 'SimpleXMLElement', LIBXML_NOCDATA);
		return $responseObj->return_code;
    }

	





    /**
     * 获取微信授权链接
     * 
     * @param string $redirect_uri 跳转地址
     * @param mixed $state 参数
     */
    public function get_authorize_url($redirect_uri = '', $state = '',$sq=0)
    {
        //$redirect_uri = urlencode($redirect_uri);
		$snsapi=$sq?'snsapi_userinfo':'snsapi_base';
		$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->app_id.'&redirect_uri='.$redirect_uri.'&response_type=code&scope='.$snsapi.'&state='.$state.'#wechat_redirect';
		//echo $url;
        header('Location:'.$url);   
		exit;
    }       
    
    /**
     * 获取授权token
     * 
     * @param string $code 通过get_authorize_url获取到的code
     */
    public function get_access_token($code = '')
    {
		$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->app_id.'&secret='.$this->app_secret.'&code='.$_GET['code'].'&grant_type=authorization_code';
        $token_data = $this->http($token_url);
        if(!empty($token_data[0]))
        {
            return json_decode($token_data[0], TRUE);
        }
        
        return FALSE;
    }   

    /**
     * 获取授权后的微信用户信息
     * 
     * @param string $access_token
     * @param string $open_id
     */
    public function get_user_info($access_token = '', $open_id = '')
    {
        if($access_token && $open_id)
        {
            $info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
            $info_data = $this->http($info_url);
            if(!empty($info_data[0]))
            {
                return json_decode($info_data[0], TRUE);
            }
        }
        
        return FALSE;
    }
    /**
     * Http方法
     * 
     */ 
    public function http($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $output = curl_exec($ch);//输出内容
        curl_close($ch);
        return array($output);
    }   

    /**
     * 生成随机数
     * 
     */     
    public function great_rand(){
        $str = '1234567890abcdefghijklmnopqrstuvwxyz';
        for($i=0;$i<30;$i++){
            $j=rand(0,35);
            $t1 .= $str[$j];
        }
        return $t1;    
    }
}
?>