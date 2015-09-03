<?php
require $sec->SecurityPathValidate(MODEL_PATH."BaseConfig.class.php");

class AppConfig extends BaseConfig
{
	public static $mysql_host = "10.97.184.72";
	public static $mysql_user = "root";
	public static $mysql_passwd = "root";
	public static $mysql_database = "test";
	public static $log_path = "/home/a/search/htdocs/logs/";
	public static $log_level = "Error";
}
?>
