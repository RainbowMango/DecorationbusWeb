<?php
class Common {
	static public function get_data($name) {/*{{{*/
    if (isset($_GET[$name])) {
      return filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
    }
		return NULL;
	}/*}}}*/

	static public function checkEmail(&$email) {/*{{{*/
    if ($email == "") {
      return false;
    }
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
	}/*}}}*/

	static public function checkPasswd(&$passwd) {/*{{{*/
    if (strlen($passwd) < 6) {
      return false;
    }
    return true;
	}/*}}}*/

	//返回精确时间
	static function microtime_float() {/*{{{*/
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}/*}}}*/
}
?>
