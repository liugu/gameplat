<?php
    /**
     * @name 自定义URL函数 
     * @example {$vo.typeid|url=user,###}
     * @param str $model
     * @param int $id
     * @return string
     */
	function url($model,$id)
	{
		return U($model.'/'.$id);
	}
	/**
	 * @name SQL注入检测
	 */
	//防止sql注入
	function inject_check($str)
	{
		$tmp=eregi('select|insert|update|and|or|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str);
		if($tmp)
		{
			die('SQL_inject warning!!!');
			
		}
		else
		{
			return $str;
		}
	}
	/**
	 * @name 中文检测
	 */
	function isChineseName($Argv){  
	          $RegExp = "/^[\x{4E00}-\x{9FA5}]+$/u";  
	          if(preg_match($RegExp,$Argv))
		      {
			     return true;
			  }
			  else
		      {
				 return false;
			  }
	}
	/**
	 * @name 身份证检测
	 */
	function idcard_checksum18($idcard) {
		if (strlen ( $idcard ) != 18) {
			return false;
		}
		$idcard_base = substr ( $idcard, 0, 17 );
		$firstnum = substr($idcard_base, 0,1);
		if(!is_numeric($firstnum))
			return false;
		if (idcard_verify_number ( $idcard_base ) != strtoupper ( substr ( $idcard, 17, 1 ) )) {
			return false;
		} else {
			return true;
		}
	}
	function idcard_verify_number($idcard_base) {
		if (strlen ( $idcard_base ) != 17) {
			return false;
		}
		//加权因子
		$factor = array (7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 );
		//校验码对应值
		$verify_number_list = array ('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2' );
		$checksum = 0;
		for($i = 0; $i < strlen ( $idcard_base ); $i ++) {
			$checksum += substr ( $idcard_base, $i, 1 ) * $factor [$i];
		}
		$mod = $checksum % 11;
		$verify_number = $verify_number_list [$mod];
		return $verify_number;
	}
	function toiconv($num,$charset,$str){
		if($charset == 'utf8'){
			$str = iconv_substr($str,0,$num,"utf-8");
		}else{
			$str = iconv_substr($str,0,$num,"gb2312");
		}
		return $str;
	}

	/**
	 * 密码加密方法
	 * @param string $pw 要加密的字符串
	 * @return string
	 */
	function sp_password($pw,$salt=''){
		// echo "$pw";echo "<br>"; echo $salt;
		$result=md5(md5($pw) . $salt);
		return $result;
	}


	/**
	 * 密码比较方法,所有涉及密码比较的地方都用这个方法
	 * @param string $password 要比较的密码
	 * @param string $password_in_db 数据库保存的已经加密过的密码
	 * @return boolean 密码相同，返回true
	 */
	function sp_compare_password($password,$password_in_db,$salt){
	    return sp_password($password,$salt)==$password_in_db;
	}

	function verify_msg_code($phone,$code)  //核对短信验证码
	{	
		$key = 'game0058:verifcode:' .$phone;
		$redis = CacheRedis::getInstance();
		$res = $redis->get($key) == $code;
		return $res;

	}