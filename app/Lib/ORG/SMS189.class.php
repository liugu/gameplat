<?php
//@TODO 处理access_token过期的情况

class SMS189 {


	//const APP_ID = '212173170000036141'; 中视秀场
	const APP_ID = '193810010000034331';

	//const APP_SECRET = '9b55dbb589236d134e46d46b648c1575';中视秀场
	const APP_SECRET = '56b76635c4b8391c64b0812e44d0de78';
	const TOKEN_API = "https://oauth.api.189.cn/emp/oauth2/v3/access_token";
	const AUTHORIZE_API = "https://oauth.api.189.cn/emp/oauth2/v3/authorize";
	const GET_RAND_TOKEN_API = 'http://api.189.cn/v2/dm/randcode/token';
	const CODE_SEND_API = 'http://api.189.cn/v2/dm/randcode/sendSms';

	const SEND_SUB_CONTENT_URL = 'http://api.189.cn/v2/emp/templateSms/sendSms';

	const REFRESH_TOKEN = 'cea67d3e8ff6ffce7299fd89503c84581406541777164';
	const EXPIRE_TIME = 60;

//获取后的access_token
//	static $access_token = "80d0ee647770ab82b2375e28f3a34c271419837824904";
	static $access_token = "db707be66177c95c98e17d37e4b2b00c1465740861482";

        //订阅主播开播通知模版id
	CONST NOTIFY_LIVING_TEMPLATE_ID = '91003873';
        //警报系统模版id
        CONST NOTIFY_WARNING_TEMPLATE_ID = '91549666';
        //发送回执编码模板id
        CONST SEND_RETURNCODE_TEMPLATE_ID= '91550258';
        //账号申诉处理结果提醒模板id
        CONST COMPLAINT_DEAL_NOTICE_TEMPLATE_ID= '91550259';
        
	private static function fetch_access_token() {
		$send = 'app_id=' . self::APP_ID . '&app_secret=' . self::APP_SECRET . '&grant_type=authorization_code' . '&code=' . self::get_auth_code() . '&state=' . '&redirect_uri=http://livev.0058.com/api/surfling/token_callback.php';
		$access_token = self::curl_post(self::TOKEN_API, $send);
		//print_r($access_token);

		$access_token = json_decode($access_token, true);

		return $access_token;

	}

	private static function refresh_access_token() {
// 		echo "refresh_access_token";
		$send = 'app_id=' . self::APP_ID . '&app_secret=' . self::APP_SECRET . '&grant_type=refresh_token' . '&refresh_token=' . self::REFRESH_TOKEN;
		$ret = self::curl_post(self::TOKEN_API, $send);
		$ret_json = json_decode($ret, true);

		if ($ret_json && $ret_json['res_code'] == 0) {
			$access_token = $ret_json['access_token'];
		} else {
			$access_token = 0;
		}
		self::$access_token = $access_token;

		self::set_access_token($access_token);

		return $access_token;
	}

	private static function get_access_token() {
		//@TODO REDIS GET;
		if (self::$access_token) {
			return self::$access_token;
		}

		$redis = XTRedis::getInstance();
		$token = $redis -> get ('open189:access_token');
		return self::$access_token = $token;
	}

	private  static function set_access_token($__access_token = '') {
		//if (empty($__access_token)) {return;}
		$redis = XTRedis::getInstance();
		$redis -> set ('open189:access_token', $__access_token);
		$redis -> expire('open189:access_token', 10 * 3600);
		return $__access_token;
	}

	/**
	 * 发送短信第一步，获取auth code （只需要获取一次）
	 *
	 * @return int|string
	 */
	private static function fetch_auth_code() {
		$params = 'app_id=' . self::APP_ID . '&app_secret=' . self::APP_SECRET;
		$params .= '&redirect_uri=http://www.0058.com';
		$params .= '&response_type=code';
		$ret = self::curl_post(self::AUTHORIZE_API, $params);
		//print_r($ret);
		$ret_json = json_decode($ret);
		if ($ret_json && $ret_json['res_code'] == 0) {
			$code = $ret_json['code'];
		} else {
			$code = 0;
		}
		return $code;
	}


	private static function get_auth_code() {
		//return self::fetch_auth_code();
		return 'afd031d4d9a82d167927ddb02b0f3df91406569633285';
	}

	/*
	 * 发送自定义短信时获取的随机token
	 *
	 */
	public static function get_rand_token() {
		$params['app_id'] = 'app_id=' . self::APP_ID;
		$params['access_token'] = "access_token=" . self::get_access_token();
		$params['timestamp'] = 'timestamp=' . date("Y-m-d H:i:s");
		ksort($params);
		$plaintext = implode("&", $params);
		$params['sign'] = "sign=" . rawurlencode(base64_encode(hash_hmac("sha1", $plaintext, self::APP_SECRET, $raw_output = True)));
		ksort($params);
		$url = self::GET_RAND_TOKEN_API . '?' . implode("&", $params);
		$ret = self::curl_get($url);

		$ret_json = json_decode($ret, true);

		// print_r($ret_json);die;
		if ($ret_json['res_code'] == 111 || $ret_json['res_code'] == 110 ) {
			return self::refresh_access_token();
		}else {
			return $ret_json['token'];
		}


	}


	private static function curl_get($url = '', $options = array()) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		if (!empty($options)) {
			curl_setopt_array($ch, $options);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	private static function curl_post($url = '', $postdata = '', $options = array()) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		if (!empty($options)) {
			curl_setopt_array($ch, $options);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	/**
	 * 发送短信验证码
	 *
	 * @param $mobile 手机号
	 * @param $code   验证码
	 * @return int|mixed 0 或 成功信息
	 */
	public static function send_code($mobile, $code) {
		$token = self::get_rand_token();
		$exp_time = 5;

		$params['app_id'] = "app_id=" . self::APP_ID;
		$params['access_token'] = "access_token=" . self::get_access_token();
		$params['token'] = "token=" . $token;
		$params['phone'] = "phone=" . $mobile;
		$params['randcode'] = 'randcode=' . $code;
		$params['exp_time'] = "exp_time=" . $exp_time;
		$params['timestamp'] = 'timestamp=' . date("Y-m-d H:i:s");
		ksort($params);
		$plaintext = implode("&", $params);
// 		echo $plaintext;
		$params['sign'] = "sign=" . rawurlencode(base64_encode(hash_hmac("sha1", $plaintext, self::APP_SECRET, $raw_output = True)));
		ksort($params);
		$str = implode("&", $params);

		$result = self::curl_post(self::CODE_SEND_API, $str);

//		print_r($result);
		//{"res_code":0,"identifier":"dp7037","create_at":"1406574654"}
		$ret_json = json_decode($result, true);

		if ($ret_json && $ret_json['res_code'] == 0) {
			return $ret_json;
		} else {
			return 0;
		}
	}

	private static function send_template_sms() {
		$token = self::get_rand_token();
		$exp_time = 60;
	}





	public static function send_forgot_pwd($mobile, $code) {
		//$msg = "您正在使用中视网短信找回密码功能。您的新密码为：{$code}。【请勿向他人提供您收到的短信校验码】【" . SEO::SITE_DESC . "】";
		//return self::send($mobile, $msg);
	}
        
        /**
	 * 发送回执编码
	 * @param $mobile 手机号
	 * @param $returncode   回执编码
	 * @return int|mixed 0 或 成功信息
	 */
	public static function send_returncode($mobile, $returncode) {
		$token = self::get_rand_token();

		$exp_time = 10080;
		$params['app_id'] = "app_id=" . self::APP_ID;
		$params['access_token'] = "access_token=" . self::get_access_token();
		$params['token'] = "token=" . $token;
		$params['acceptor_tel'] = 'acceptor_tel=' . $mobile;
                $params['template_id'] =  'template_id='.self::SEND_RETURNCODE_TEMPLATE_ID;
		$params['template_param'] = 'template_param=' . json_encode(array('param1' => '中视', 'param2' => $returncode));
                //$params['returncode'] = 'returncode=' . $returncode;
		$params['exp_time'] = "exp_time=" . $exp_time;
		$params['timestamp'] = 'timestamp=' . XTUtil::getTime(time());
		ksort($params);
		$plaintext = implode("&", $params);
		$params['sign'] = "sign=" . rawurlencode(base64_encode(hash_hmac("sha1", $plaintext, self::APP_SECRET, $raw_output = True)));
		ksort($params);
		$str = implode("&", $params);

		$result = self::curl_post(self::SEND_SUB_CONTENT_URL, $str);
		$ret_json = json_decode($result, true);

		if ($ret_json && $ret_json['res_code'] == 0) {
			return $ret_json;
		} else {
			return 0;
		}
	}

}
