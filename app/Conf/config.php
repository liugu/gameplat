<?php
    $global = require_once './res/config/config.inc.php';
    $basic = @include_once 'basic.php';
    $app =  array(
      'URL_CASE_INSENSITIVE' =>true,//URL不区分大小写
      '__TPL__'   =>__ROOT__.'/Web/Tpl',
      'URL_ROUTER_ON' => true,
      'COOKIE_PREFIX' => '0058wan_',
      'URL_ROUTE_RULES' => array(
          'lists/:id' => 'Lists/index',
      	//  'hall' => array('Lists/index','id=1'),
       	//  'service' => array('Lists/index','id=5'),
      ),
    		'SESSION_AUTO_START'=>true,
    		'URL_CASE_INSENSITIVE' =>true,
    		'USER_AUTH_ON'              =>true,
    		'USER_AUTH_TYPE'			=>2,		// 默认认证类型 1 登录认证 2 实时认证
    		'USER_AUTH_KEY'             =>'authId',	// 用户认证SESSION标记
    		'ADMIN_AUTH_KEY'			=>'administrator',
    		'USER_AUTH_MODEL'           =>'Admin',	// 默认验证数据表模型
    		'AUTH_PWD_ENCODER'          =>'md5',	// 用户认证密码加密方式
    		'NOT_AUTH_MODULE'           =>'Public,Index,Article,Accounts,Open',	// 默认无需认证模块
    		'REQUIRE_AUTH_MODULE'       =>'Members,Card,Game',		// 默认需要认证模块
    		'NOT_AUTH_ACTION'           =>'register,usercheck',		// 默认无需认证操作
    		'USER_AUTH_GATEWAY'         =>  '/accounts/login',// 默认认证网关
    		
    		'REQUIRE_AUTH_ACTION'       =>'',		// 默认需要认证操作
    		'GUEST_AUTH_ON'             =>false,    // 是否开启游客授权访问
    		'GUEST_AUTH_ID'             =>0,        // 游客的用户ID

            /* 数据缓存设置 */
            'DATA_CACHE_TIME'       => 0,      // 数据缓存有效期 0表示永久缓存
            'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
            'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
            'DATA_CACHE_PREFIX'     => '',     // 缓存前缀
            'DATA_CACHE_TYPE'       => 'Redis',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
            'REDIS_HOST'            =>'192.168.1.11',
            'REDIS_PORT'            =>'6379',

        /* 默认设定 */
        // 'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
        // 'DEFAULT_C_LAYER'       =>  'Action', // 默认的控制器层名称
        // 'DEFAULT_APP'           => '@',     // 默认项目名称，@表示当前项目
        // 'DEFAULT_LANG'          => 'zh-cn', // 默认语言
        // 'DEFAULT_THEME'         => '',  // 默认模板主题名称
        // 'DEFAULT_GROUP'         => 'Home',  // 默认分组
        // 'DEFAULT_MODULE'        => 'Index', // 默认模块名称
        // 'DEFAULT_ACTION'        => 'index', // 默认操作名称
        // 'DEFAULT_CHARSET'       => 'utf-8', // 默认输出编码
        // 'DEFAULT_TIMEZONE'      => 'PRC', // 默认时区
        // 'DEFAULT_AJAX_RETURN'   => 'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
        // 'DEFAULT_JSONP_HANDLER' => 'jsonpReturn', // 默认JSONP格式返回的处理方法
        // 'DEFAULT_FILTER'        => 'htmlspecialchars', // 默认参数过滤方法 用于 $this->_get('变量名');$this->_post('变量名')...
    );
    
    $newglobal = array_merge($global,$app);
    if($basic!="")
    {
    $newglobal_re = array_merge($newglobal,$basic); 
    return $newglobal_re; 
    }
    else
    {
    	return $newglobal;
    }
?>