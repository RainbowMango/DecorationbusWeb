<?php

/*定义数据库信息以适配本地环境和云端环境*/
if(!defined("SAE_MYSQL_HOST_M")) {
    define("SAE_MYSQL_HOST_M", "localhost");
}
if(!defined("SAE_MYSQL_PORT")) {
    define("SAE_MYSQL_PORT", "3306");
}
if(!defined("SAE_MYSQL_USER")) {
    define("SAE_MYSQL_USER", "root");
}
if(!defined("SAE_MYSQL_PASS")) {
    define("SAE_MYSQL_PASS", "");
}
if(!defined("SAE_MYSQL_DB")) {
    define("SAE_MYSQL_DB", "test");
}

//定义动作
define("USER_ACCESS_ACTION_REGIST", "1");
define("USER_ACCESS_ACTION_LOGIN", "2");

//定义状态
define("USER_ACCESS_STATUS_SUCCESS", "1");
define("USER_ACCESS_STATUS_FAIL", "2");

//定义错误信息
define("USER_ACCESS_INFO_SUCCESS", "success");
define("USER_ACCESS_INFO_MISS_EMAIL", "Invalid URL: email missed");
define("USER_ACCESS_INFO_MISS_PASSWD", "Invalid URL: passwd missed");
define("USER_ACCESS_INFO_INVALID_EMAIL", "Invalid input: not valid email");
define("USER_ACCESS_INFO_INVALID_PASSWD", "Invalid input: not valid passwd");
define("USER_ACCESS_INFO_DB_NOT_AVAILABLE", "Database error");
define("USER_ACCESS_INFO_USER_EXIST", "User already exist");

function registRet($action, $status, $info) {
	$arr = array("action"=> "$action", "status"=>"$status", "info"=>"$info");
	$json = json_encode($arr);
	return $json;
}

/*连接数据库*/
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if(!$link || !mysql_select_db(SAE_MYSQL_DB, $link)) {
  //echo "连接数据库失败";
	echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_DB_NOT_AVAILABLE);
	die();
}

//echo "连接数据库成功</br>";

// 解析email
$email = "";
if (!isset($_POST["email"])) {
	//echo "输入不合法: 缺少用户名</br>";
	echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_MISS_EMAIL);
	die();
}
if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
  //echo "非法的邮箱地址</br>";
  echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_INVALID_EMAIL);
  die();
}
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
//echo "email = $email </br>";

// 解析密码
$passwd = "";
if(!isset($_POST["passwd"])) {
	//echo "输入不合法: 缺少密码</br>";
	echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_MISS_PASSWD);
	die();
}
if (!filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_STRING)) {
  //echo "非法的密码</br>";
  echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_INVALID_PASSWD);
  die();
}
$passwd = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_STRING);
//echo "passwd = $passwd </br>";

//查询用户名是否已存在
$setCharsetSQL = "set names utf8";
if(!mysql_query($setCharsetSQL,$link)) {
  //echo "设置数据库字符集出错</br>";
  echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_DB_NOT_AVAILABLE);
  die();
}
$querySQL = "SELECT count(*) FROM user where email = \"".$email."\"";
//echo $querySQL;
$result = mysql_query($querySQL, $link);
if(!$result) {
  //echo "数据查询失败</br>";
  echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_DB_NOT_AVAILABLE);
  die();
}

while($row = mysql_fetch_row($result)) {
  $count = $row[0];
  if (0 != strcmp($count, "0")) {
  	//echo "用户已存在</br>";
  	echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_USER_EXIST);
  	die();
  }
  break;
}

// 插入新用户
//echo "开始插入新用户</br>";
$insertSQL = "INSERT INTO user(email, passwd) VALUES(\"$email\", \"$passwd\")";
//echo $insertSQL;
if(!mysql_query($insertSQL, $link)) {
  //echo "数据插入失败</br>";
  echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_FAIL, USER_ACCESS_INFO_DB_NOT_AVAILABLE);
  die();
}

//echo "数据插入成功</br>";
//echo getSuccessJson();
echo registRet(USER_ACCESS_ACTION_REGIST, USER_ACCESS_STATUS_SUCCESS, USER_ACCESS_INFO_SUCCESS);

mysql_close($link);

/*
$info=array("a"=>"b");
$str=json_encode($info);
echo $str;
*/

?>
