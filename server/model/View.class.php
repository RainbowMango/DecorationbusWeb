<?php
class View {
	private $arr=array();

	public function __construct() {/*{{{*/
		header('HTTP/1.x 200 OK');
	}/*}}}*/
	
	public function assign($name, $value) {/*{{{*/
		global $$name;
		$this->arr[$name] = $value;
		$$name = $value;
	}/*}}}*/

	public function header($str) {/*{{{*/
		header($str);
	}/*}}}*/

	public function show($file) {/*{{{*/
		foreach($this->arr as $a=>$b) {	
			global $$a;
		}	

		$content = file_get_contents($file);
		eval('?>'.$content);	
	}/*}}}*/
}
?>
