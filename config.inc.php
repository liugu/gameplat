<?php
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', '');
define('UC_DBPW', '');
define('UC_DBNAME', '');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`tuc`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '');
define('UC_API', '');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '1');
define('UC_PPP', '20');




//Ucenter接入必需,否则报通讯失败
$dbhost = 'localhost';                      // 数据库服务器
$dbuser = 'root';                        // 数据库用户名
$dbpw = '';                 // 数据库密码
$dbname = '';                        // 数据库名
$pconnect = 0;                              // 数据库持久连接 0=关闭, 1=打开
$tablepre = 'uc_';                          // 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8'; 

//Cookies设置
$cookiepre = '31wan_';
$cookiedomain = '.31wan.cn';
$cookiepath = '/';