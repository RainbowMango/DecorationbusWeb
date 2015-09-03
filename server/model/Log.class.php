<?php
class Log {
	private $_file=null;
	private $_level=null;

	private function __construct() {/*{{{*/
		$file=BaseConfig::getConf("log_file");
		$file=str_replace("%DATE", date("Ymd"), $file);
		$this->_file = fopen($file, "a");
		$this->_level = strtolower(BaseConfig::getConf("log_level"));
	}/*}}}*/

	public static function instance() {/*{{{*/
		static $ins = null;
		if(!$ins) {
			$ins = new Log();
    }
		return $ins;	
	}/*}}}*/

	private function write($level, $msg) {
		$line=date("Y-m-d H:i:s")."[$level] $msg\n";
		fwrite($this->_file, $line);
	}

	public function error($msg) {
		$this->write("Error", $msg);
	}

	public function warn($msg) {
		if($this->_level == "info" || $this->_level == "warn") {
			$this->write("Warn", $msg);
    }
	}

	public function info($msg) {
		if($this->_level =="info") {
      $this->write("Info", $msg);
    }
	}
}
?>
