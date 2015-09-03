<?php
require $sec->SecurityPathValidate(MODEL_PATH."Log.class.php");
require $sec->SecurityPathValidate(MODEL_PATH."Result.class.php");

class BaseConfig {
	private static $conf_arr=array();

	// 根据接口名称和变量名称获得变量的值
	public static function getConf($var) {/*{{{*/
		if (empty(self::$conf_arr)) {
			$a = get_class_vars('BaseConfig');
			$b = get_class_vars('AppConfig');
      self::$conf_arr = array_merge($a, $b);

			return self::$conf_arr[$var];
		} else {
			return self::$conf_arr[$var];
		}	
	}/*}}}*/ 
}
?>
