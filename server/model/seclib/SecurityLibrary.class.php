<?php
	if (!class_exists('SecurityLibrary')) {
		class SecurityLibrary {
			function requireComponent($com) {
				//install the config component
				return include_once($com);
			}
			/**
			 * $file：	要检查的文件，可以相对路径的文件也可以绝对路径的文件
			 * $filepath：默认不设置为FALSE，如果要设置则为据对路径String类型，
			 * 				其次以array传入绝对路径(String)的集合。安全路径配置$this->___Security_Path=array("/var/www/");
			 * $return： 如果路径无任何安全问题则返回当前的TRUE ELSE RETURN FALSE
			 */
			function SecurityPathCheck($file, $filepath=FALSE) {
				if ($filepath===FALSE) {
					$filepath = &$this->___Security_Path;
				}
				if (is_array($filepath)) {
					foreach ($filepath as $path) {
						$fp = realpath(dirname($file));
						if ($fp!=FALSE) {
							$path=realpath($path);
							if ($path!=FALSE) {
								$findresult = strpos($fp,$path);
								if ($findresult === 0 ) {
									return TRUE;
								}
							}
						}
					}
					return FALSE;
				} else {
					/* if not String ,throws exception */
					if (!is_string($filepath)) {
						die("parameter setting error");
						exit(1);
					}
					if ($filepath=="") {
						return $file;
					}
					$fp = realpath(dirname($file));
					$filepath = realpath($filepath);
					
					if ($fp==FALSE || $filepath==FALSE || (strpos($fp,$filepath)!==0)) {
						return FALSE;
					} else {
						return TRUE;
					}
				}
			}
			/**
			 * $file：	要检查的文件，可以相对路径的文件也可以绝对路径的文件
			 * $filepath：默认不设置为FALSE，如果要设置则为据对路径String类型，
			 * 				其次以array传入绝对路径(String)的集合。安全路径配置$this->___Security_Path=array("/var/www/");
			 * $return： 如果路径无任何安全问题则返回当前的$file，如果不存在路径集合中，则程序停止运行。
			 */
			function SecurityPathValidate($file, $filepath=FALSE) {
				$ret = $this->SecurityPathCheck($file, $filepath);
				if ($ret===TRUE) {
					return $file;
				} else {
					die("file check error");
					exit(1);
				}
			}
			
			/**
			 *  等同于htmlspecialchars($outputString,ENT_QUOTES);
			 */
			function HtmlEscape($outputString) {
				return htmlspecialchars($outputString, ENT_QUOTES);
			}


			/*
			 * $str：	源字符串
			 * $escapeString：要替换的字符，默认为""则使用配置文件中的选项$this->___Security_StringEscape
			 * $escape：要替换的目标字符串，默认为""则使用配置文件中的选项$this->___Security_StringEscapeTo
			 * $return：转义过后的字符串
			 */
			function StringEscape($str , $escapeString="" , $escape="") {
				if ($escapeString==="") {
					$escapeString =	&$this->___Security_StringEscape;
				}
				if ($escape === "") {
					$escape =	&$this->___Security_StringEscapeTo;
				}
				if (is_numeric($str)) {
					return $str;
				} else {
					return str_replace($escapeString, $escape, $str);
				}
			}
			/*
			 * $outputString：富文本字符串
			 * $return：经过过滤后的安全字符串
			 * 
			 */
			function HtmlRichText($outputString) {
				if (isset($this->___Security_RichTextMethod) && $this->___Security_RichTextMethod !="") {
					$method = &$this->___Security_RichTextMethod;
					return $method($outputString);
				}else{
					return $outputString;
				}
			}

			/**
			 *	#######anti csrf attack component############
			 *
			 */

			function CreatCSRFToken() {
				return substr(md5(microtime()), -16);
			}

			/* 
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：返回CSRF TOKEN 字符串
			 */
			function GetCSRFToken($container = FALSE) {
				if ($container === FALSE) {
					$container = &$this->___Security_TokenContainer;
				}
				if (!isset($container[$this->___Security_TokenName]) || $container[$this->___Security_TokenName]==="") {
					$method = &$this->___Security_TokenContainerMethod;
					$t = &$this->CreatCSRFToken();
					$container[$this->___Security_TokenName] = $t;
					@$method($this->___Security_TokenName,$t);
					return $t;
				} else {
					return $container[$this->___Security_TokenName];
				}
			}

			/* 
			 * 
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：返回隐藏的 input输入框，
			 */
			function GetCSRFTokenHiddenInput($container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				return "<input name=\"".$this->___Security_TokenName."\" type=\"hidden\" value=\"".$this->HtmlEscape($this->GetCSRFToken($container))."\" />";
			}

			/* 
			 * $dataset：默认为FALSE，不设置。系统采用配置文件中的容器获取请求中的TOKEN$this-> ___Security_TokenDataSet=&$_POST; 从POST里面获取。
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：返回	TRUE，表示验证通过，返回FALSE，表示验证失败
			 * 
			 */
			function ValidateCSRFToken($dataset=FALSE,$container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				if($dataset === FALSE){
					$dataset = &$this->___Security_TokenDataSet;
				}
				if($dataset[$this->___Security_TokenName]===$container[$this->___Security_TokenName]){
					return TRUE;
				}else{
					return FALSE;
				}
			}
			

			/**
			 *	############anti Url Redirect attack component##########
			 */
			var $url_token=FALSE;
			function CreateUrlRedirectToken($container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				return md5($this->GetCSRFToken($container));
			}

			/* 
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：返回TOKEN字符串
			 * 
			 */
			function GetUrlRedirectToken($container=FALSE){
				if($this->url_token===FALSE){
					if($container === FALSE){
						$container = &$this->___Security_TokenContainer;
					}
					$this->url_token = &$this->CreateUrlRedirectToken($container);
				}
				return $this->url_token;
			}

			/* 
			 * $url：默认为空，或者需要拼接的URL字符串
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：$url为空的情况下返回tokenname=tokenvalue的方式，$url非空则返回
			 * $url."&".$tokenname ."=". $tokenvalue
			 */
			function GetUrlRedirectLink($url="",$container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				if($url===""){
					return $this->___Security_TokenName."=".$this->GetUrlRedirectToken($container);
				}else{
					return $url."&".$this->___Security_TokenName."=".$this->GetUrlRedirectToken($container);
				}
			}

			/* 
			 * $dataset：默认为FALSE，不设置。系统采用配置文件中的容器获取请求中的TOKEN $this-> ___Security_UrlTokenDataSet=&$_GET; 从GET里面获取。
			 * $container：默认为FALSE，不设置。系统采用配置文件中的容器获取token存储$this->___Security_TokenContainer=&$_COOKIE; 从COOKIE里面获取。
			 * $return：返回	TRUE，表示验证通过，返回FALSE，表示验证失败
			 */
			function ValidateUrlRedirectToken($dataset=FALSE,$container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				if($dataset === FALSE){
					$dataset = &$this->___Security_UrlTokenDataSet;
				}
				if($dataset[$this->___Security_TokenName] === $this->GetUrlRedirectToken($container) ){
					return TRUE;
				}else{
					return FALSE;
				}
			}


			function UrlRedirectWhiteList($url){
				$method = &$this->UrlRedirectWhiteListImpl;
				if($method){
					return $method($url);
				}
			}
			/**
			 *	##############anti sql injection component#################
			 */

		 	/* 
			 * $dmd：元数据字符串，数据库对象(如表名字，字段等)
			 * $return：经过转义的元数据字符串
			 */
			function DataBaseMetaData($dmd){
				$tmp = str_replace($this->___DataBaseMetaDataEscape,$this->___DataBaseMetaDataReplace,$dmd);
				return $this->___DataBaseMetaDataEscape.$tmp.$this->___DataBaseMetaDataEscape;
			}

			/* 
			 * $keyword：数据库关键字参见$this->___DataBaseMetaDataKeyWord进行配置SQL92或更多关键字
			 * $return：如果发现是数据库关键字则返回$keyword,否则程序停止执行
			 */
			function DataBaseKeyWord($keyword) {
				if (in_array(strtolower($keyword), $this->___DataBaseMetaDataKeyWord)) {
					return $keyword;
				} else {
					if ($this->___DataBaseKeyWordReturn === TRUE) {
						return FALSE;
					} else {
						die("DataBaseKeyWord check error");
						exit(1);
					}
				}
			}

			/* 
			 * $str：SQL语句里面的变量
			 * $auto：是否需要进行前后闭合，前后加入单引号，TRUE表示需要，FALSE表示不需要，$this->___DataBaseAutoClose进行配置默认值。
			 * $return：转义后的SQL变量
			 */
			function DataBaseEscapeString($str, $auto = "") {
				if ($auto==="") {
					$auto = $this->___DataBaseAutoClose;
				}
				$temp = "";
				if (is_numeric($str)){
					$temp = $str;
				} else {
					$method = &$this->___DataBaseEscapeStringMethod;
					$temp = $method($str);
				}
				if ($auto == TRUE) {
					return $this->___DataBaseEscapeChar.$temp.$this->___DataBaseEscapeChar;
				} else {
					return $temp;
				}
			}

			/**
			 *	##############	init	#################
			 */
			function __construct($configfile = "") {
				$r = "";
				if ($configfile === "") {
					$r = $this->requireComponent("config.php");
				} else {
					$r = $this->requireComponent($configfile);
				}
				if ($r === FALSE) {
					die("Component init error");
					exit(1);
				}
			}

			function SecurityLibrary($configfile = "") {
				if(version_compare(PHP_VERSION, "5.0.0", "<")){
					$this->__construct();
				}
			}
		}
	}

?>
