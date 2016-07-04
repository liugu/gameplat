<?php
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', 'root');
define('UC_DBPW', 'root');
define('UC_DBNAME', 'ucenter');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`ucenter`.uc_');
define('UC_DBCONNECT', '0');

//通信相关

define('UC_KEY', '123456789');
define('UC_API', 'http://uc.com');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '1');
define('UC_PPP', '20');



//Ucenter接入必需,否则报通讯失败
$dbhost = 'localhost';                      // 数据库服务器
$dbuser = 'root';                        // 数据库用户名
$dbpw = 'root';                 // 数据库密码
$dbname = 'ucenter';                        // 数据库名
$pconnect = 0;                              // 数据库持久连接 0=关闭, 1=打开
$tablepre = 'uc_';                          // 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8'; 

//Cookies设置
$cookiepre = '0058wan_';
$cookiedomain = '.gameplat.com';
$cookiepath = '/';