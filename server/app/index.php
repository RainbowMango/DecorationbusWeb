<?php
/* 所有接口的入口 */
define("APP_PATH", realpath(dirname(__FILE__))."/");
define("MODEL_PATH", realpath(dirname(__FILE__))."/../model/");

@require_once(MODEL_PATH."seclib/SecurityLibrary.class.php");
$sec = new SecurityLibrary();

@require $sec->SecurityPathValidate(APP_PATH."AppConfig.class.php");
@require $sec->SecurityPathValidate(MODEL_PATH."Common.class.php");
@require $sec->SecurityPathValidate(MODEL_PATH."View.class.php");


$tm_start	= Common::microtime_float();
$action		= Common::get_data('action');
$email		= Common::get_data('email');
$passwd		= Common::get_data('passwd');
$passwd_confirm		= Common::get_data('pwd_confirm');
$callback		= Common::get_data('callback');

switch($action) {
case "0":
	include $sec->SecurityPathValidate(APP_PATH."regist.php");
	break;
case "1":
	include $sec->SecurityPathValidate(APP_PATH."login.php");
	break;
default:
	Log::instance()->error("interface action [$action] error,refer:".getenv("HTTP_REFERER"));
	break;
}

exit();
?>
