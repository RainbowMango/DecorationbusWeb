<?php
	#security file operation
	$this->___Security_Path = array("/home/a/search/htdocs/");
	# xss
	$this->___Security_StringEscape = array('\\',"'",'"','/',"\n","\r");
	$this->___Security_StringEscapeTo = array('\\\\',"\'","\\\"","\\/","\\n","\\r");
	
	# XSS RICH TEXT
	$this->___Security_RichTextMethod = "RichTextFilterMethod";
	
	function RichTextFilterMethod($dirty_html) {
		require_once 'htmlpurifier/HTMLPurifier.auto.php';
		#configure HTMLPurifier
		$config = HTMLPurifier_Config::createDefault();
		
		#@$config->set('Core', 'DefinitionCache', null); //�Ƿ�����cache
		#@$config->set('Core.Encoding', 'ISO-8859-1');   //���ñ��룬Ĭ�ϱ�����UTF-8
		#@$config->set('HTML.Doctype', 'HTML 4.01 Transitional'); // �����ĵ�����
		#init  HTMLPurifier
		$purifier = new HTMLPurifier($config);          
		return $purifier->purify($dirty_html);   //���˶������
	}
	
	# csrf  /  urlredirect
	$this->___Security_TokenName="sec_token";
	$this->___Security_TokenContainer = &$_COOKIE;
	$this->___Security_TokenDataSet = &$_POST;
	$this->___Security_UrlTokenDataSet = &$_GET;
	$this->___Security_TokenContainerMethod = "setcookie";
	

	# urlredirect whiltelist 
	function UrlRedirectWhiteListImplTemp($url) {
		$whitelist = '/^http(s)?:\/\/[a-zA-Z0-9\.]*(taobao|alipay|alibaba|alisoft|alimama|koubei|aliimg|atpanel)\.(com|net|cn|org|com\.cn)($|\?|:\d|\/)(.*)*$/';
		$check = preg_match($whitelist,$url);
		if (!$check) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	$this->UrlRedirectWhiteListImpl = "UrlRedirectWhiteListImplTemp";
	

	#database security
	######## MYSQL ########## 
	$this->___DataBaseMetaDataEscape = "`";
	$this->___DataBaseMetaDataReplace = "``";
	$this->___DataBaseMetaDataKeyWord = array("<>","<",">","=","!=","like","between","group","order","by","*","where","in","asc","desc","limit");
	$this->___DataBaseEscapeStringMethod = "mysql_real_escape_string";
	$this->___DataBaseEscapeChar = '\'';
	$this->___DataBaseAutoClose = TRUE;
	$this->___DataBaseKeyWordReturn = TRUE;

?>
