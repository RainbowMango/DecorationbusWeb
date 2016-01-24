<?php
header("Content-Type: text/html; charset=utf-8");
require_once('../../script/php/databaseFunctions.php');
require_once('parmCommon.php');

/*
 * interface
 * array('status'=>0, 'info'=>'success', 'input'=>array('fileName'=>'xxx.png', 'fileSize'=>'1023', 'fileType'=>'image/gif');
 * */

$requestAck = array('status'=>0, 'info'=>'success'); //默认返回结果

$nickName    = getMandatoryParameter("nickName"   , "post");
$sex         = getMandatoryParameter("sex"        , "post");
$phoneNumber = getMandatoryParameter("phoneNumber", "post");

if(!isUploadSuccess("useravatar")) {
    echo "File useravatar upload failed";
    exit;
}

//检查文件类型是否匹配
$uploadFileType = $_FILES['useravatar']['type'];
if($uploadFileType != 'image/png') {
    global $requestAck;

    setRequestAck(1, "Problem: file is not image: $uploadFileType");
    print json_encode($requestAck);
    exit;
}

$storedFileName = '/Users/ruby/horen/WebServer/testStorage/xxxxx.png';
if(is_uploaded_file($_FILES['useravatar']['tmp_name'])) {
    if(!defined("SAE_MYSQL_HOST_M")) { // 开发环境
        if(!move_uploaded_file($_FILES['useravatar']['tmp_name'], $storedFileName)) {
            echo 'Problem: Could not move file to destination directory';
            exit;
        }
    }

    //生产环境存储图片
}

function setRequestAck($status, $info) {
    global $requestAck;

    $requestAck['status'] = $status;
    $requestAck['info']   = $info;
}

function generateUserID() {
    date_default_timezone_set('Asia/Shanghai'); //代码中设定时区，防止开发环境和生产环境默认时区不一致
    $currentTime = date("YmdHis");    //取14位当前时间YYYYMMDDHHMMSS
    $microTime   = getMillisecond(3); //取3位毫秒值
    $randomValue = getRandChar(5);    // 取5位随机数
    $userID = "$currentTime$microTime$randomValue";

    return $userID;
}

function getRandChar($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol)-1;

    for($i=0;$i<$length;$i++){
        $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
    }

    return $str;
}

function getMillisecond($length) {
    list($msec, $sec) = explode(' ', microtime());
    $floatStr = strval($msec);
    list($preDot, $afterDot) = explode('.', $floatStr);
    while(strlen($afterDot) < $length) {
        $afterDot = $afterDot."0";
    }
    return substr($afterDot, 0, 3);
}

setRequestAck(0, "success");
print json_encode($requestAck);

?>