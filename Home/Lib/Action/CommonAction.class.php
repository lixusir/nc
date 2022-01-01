<?php
//前台公共控制器
class CommonAction extends Action {
    private $BASE_URL="https://api.miaodiyun.com/20150822/";
    private $ACCOUNT_SID="ceff306bcc3745e4ae5926351c62a1ec";
    private $AUTH_TOKEN="4f4647c6152b4338a12bdf13aa8ba54f";
    private $CONTENT_TYPE="application/x-www-form-urlencoded";
    private $ACCEPT="application/json";
	//网站状态
	Protected function _initialize () {
		if (!C('WEB_SWITCH')) {
			//redirect('跳转页面');
			halt('网站维护中');
		}

        //自动登录处理
        if (cookie('auto') && !session('uid')) {
            $value = explode('|', encrytion(cookie('auto')));
            if ($value[1] == get_client_ip()) {
                $db = M('User');
                $user = $db->where('id='.$value[0])->field('email,username')->find();
                session('uid', $value[0]);
                session('email', $user[email]);
                session('username', $user[username]);
            }
        }
	}

    /**
     * 短信发送
     * @access. Common
     * @type  $mobile 要发送的手机号  $code 要发送的验证码
     * @return int
     */
    public function Postsms($mobile, $code){
        require_once("apisms/httpUtil.php");
        $funAndOperate = "industrySMS/sendSMS";
        $body = createBasicAuthData();
		$body['smsContent'] = "【黄金家园】您的验证码为".$code."，请于2分钟内正确输入，如非本人操作，请忽略此短信。";

        //$body['smsContent'] = "【职盟科技】您的验证码为".$code."，如非本人操作，请忽略此短信。";
        $body['to'] = $mobile;
        // 提交请求
        $result = post($funAndOperate, $body);
        return $result;
    }

    /**
     * 二维码生成
     * @access. Common
     * @type   $data 内容  $Level（'L','M','Q','H'） 错误级别 $Size(1-10) 大小
     * @return int
     */
    public function Qrcode($data,$Level = "L",$Size = "5"){
        include 'qrcode/phpqrcode.php'; 
        $errorCorrectionLevel = $Level;//容错级别 
        $matrixPointSize = $Size;//生成图片大小 
        $PNG_TEMP_DIR = $_SERVER['CONTEXT_DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Public".DIRECTORY_SEPARATOR."Qrcode".DIRECTORY_SEPARATOR;
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        $codename = 'test'.md5(time().$errorCorrectionLevel.$matrixPointSize).'.png'; 
		$url = DIRECTORY_SEPARATOR."Public".DIRECTORY_SEPARATOR."Qrcode".DIRECTORY_SEPARATOR.$codename;
        $filename = $PNG_TEMP_DIR.$codename;
        //生成二维码图片 
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
       
        return $url;
    }
	
	
    
}
?>