<?php
class utilityResult {
	protected $_sessionId = "";
  protected $_code = "0";
  protected $_msg = "";

	public function __construct() {
		$this->_sessionId = utilityResult::getSessionId();
	}

	// 生成SessionId
	static public function getSessionId() {/*{{{*/
		$hostname = getenv("SERVER_NAME");
		return md5(uniqid($hostname.time().mt_rand(),true));
  }/*}}}*/

  public function setCode($code) {
    $this->_code = $code;
  }

  public function getCode() {
    return $this->_code;
  }

  public function setMsg($msg) {
    $this->_msg = $msg;
  }

  public function getMsg() {
    return $this->_msg;
  }

}

class Result extends utilityResult {

	//构造函数
	public function __construct($obj = "") {/*{{{*/
		$this->_sessionId = utilityResult::getSessionId();
	}/*}}}*/

	public function pvLog($name = "") {/*{{{*/
		global $email, $passwd, $passwd_confirm, $action, $response_code;
		$time = mktime();
		$sessionid = $this->_sessionId;

		$log = "1.0\001$time\001$sessionid\001$email\001$passwd\001$passwd_confirm\001$action\001$response_code";
		$log .= "\n";

		$log_path = AppConfig::$log_path;
		$filename = date("Ymd-H", mktime());
		error_log($log, 3, $log_path."/".$name."_pv_".$filename);
	}/*}}}*/
}
?>
