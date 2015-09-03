<?php
	if (!class_exists('SecurityLibrary')) {
		class SecurityLibrary {
			function requireComponent($com) {
				//install the config component
				return include_once($com);
			}
			/**
			 * $file��	Ҫ�����ļ����������·�����ļ�Ҳ���Ծ���·�����ļ�
			 * $filepath��Ĭ�ϲ�����ΪFALSE�����Ҫ������Ϊ�ݶ�·��String���ͣ�
			 * 				�����array�������·��(String)�ļ��ϡ���ȫ·������$this->___Security_Path=array("/var/www/");
			 * $return�� ���·�����κΰ�ȫ�����򷵻ص�ǰ��TRUE ELSE RETURN FALSE
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
			 * $file��	Ҫ�����ļ����������·�����ļ�Ҳ���Ծ���·�����ļ�
			 * $filepath��Ĭ�ϲ�����ΪFALSE�����Ҫ������Ϊ�ݶ�·��String���ͣ�
			 * 				�����array�������·��(String)�ļ��ϡ���ȫ·������$this->___Security_Path=array("/var/www/");
			 * $return�� ���·�����κΰ�ȫ�����򷵻ص�ǰ��$file�����������·�������У������ֹͣ���С�
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
			 *  ��ͬ��htmlspecialchars($outputString,ENT_QUOTES);
			 */
			function HtmlEscape($outputString) {
				return htmlspecialchars($outputString, ENT_QUOTES);
			}


			/*
			 * $str��	Դ�ַ���
			 * $escapeString��Ҫ�滻���ַ���Ĭ��Ϊ""��ʹ�������ļ��е�ѡ��$this->___Security_StringEscape
			 * $escape��Ҫ�滻��Ŀ���ַ�����Ĭ��Ϊ""��ʹ�������ļ��е�ѡ��$this->___Security_StringEscapeTo
			 * $return��ת�������ַ���
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
			 * $outputString�����ı��ַ���
			 * $return���������˺�İ�ȫ�ַ���
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
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return������CSRF TOKEN �ַ���
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
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return���������ص� input�����
			 */
			function GetCSRFTokenHiddenInput($container=FALSE){
				if($container === FALSE){
					$container = &$this->___Security_TokenContainer;
				}
				return "<input name=\"".$this->___Security_TokenName."\" type=\"hidden\" value=\"".$this->HtmlEscape($this->GetCSRFToken($container))."\" />";
			}

			/* 
			 * $dataset��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡ�����е�TOKEN$this-> ___Security_TokenDataSet=&$_POST; ��POST�����ȡ��
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return������	TRUE����ʾ��֤ͨ��������FALSE����ʾ��֤ʧ��
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
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return������TOKEN�ַ���
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
			 * $url��Ĭ��Ϊ�գ�������Ҫƴ�ӵ�URL�ַ���
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return��$urlΪ�յ�����·���tokenname=tokenvalue�ķ�ʽ��$url�ǿ��򷵻�
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
			 * $dataset��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡ�����е�TOKEN $this-> ___Security_UrlTokenDataSet=&$_GET; ��GET�����ȡ��
			 * $container��Ĭ��ΪFALSE�������á�ϵͳ���������ļ��е�������ȡtoken�洢$this->___Security_TokenContainer=&$_COOKIE; ��COOKIE�����ȡ��
			 * $return������	TRUE����ʾ��֤ͨ��������FALSE����ʾ��֤ʧ��
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
			 * $dmd��Ԫ�����ַ��������ݿ����(������֣��ֶε�)
			 * $return������ת���Ԫ�����ַ���
			 */
			function DataBaseMetaData($dmd){
				$tmp = str_replace($this->___DataBaseMetaDataEscape,$this->___DataBaseMetaDataReplace,$dmd);
				return $this->___DataBaseMetaDataEscape.$tmp.$this->___DataBaseMetaDataEscape;
			}

			/* 
			 * $keyword�����ݿ�ؼ��ֲμ�$this->___DataBaseMetaDataKeyWord��������SQL92�����ؼ���
			 * $return��������������ݿ�ؼ����򷵻�$keyword,�������ִֹͣ��
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
			 * $str��SQL�������ı���
			 * $auto���Ƿ���Ҫ����ǰ��պϣ�ǰ����뵥���ţ�TRUE��ʾ��Ҫ��FALSE��ʾ����Ҫ��$this->___DataBaseAutoClose��������Ĭ��ֵ��
			 * $return��ת����SQL����
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
