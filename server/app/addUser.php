<?php
header("Content-Type: text/html; charset=utf-8");
require_once('../../script/php/databaseFunctions.php');
require_once('parmCommon.php');
include_once('saeStorage.php'); //云端特有操作

/*
 * interface: 以JSON格式返回
 * array('status'=>0, 'info'=>'success', 'userID'=>'20160124233815097TX6C6');
 * */

//参数定义
define("REGISTER_PARM_NICKNAME"    , "nickName");
define("REGISTER_PARM_SEX"         , "sex");
define("REGISTER_PARM_PHONE_NUMBER", "phoneNumber");
define("REGISTER_PARM_AVATAR"      , "useravatar");

//其他宏定义
define("REGISTER_SUCCESS"          , 0);
define("REGISTER_FAILED"           , 1);

$requestAck = array('status'=>1, 'info'=>'', 'userID'=>''); //默认返回结果

$nickName    = getMandatoryParameter(REGISTER_PARM_NICKNAME    , "post");
$sex         = getMandatoryParameter(REGISTER_PARM_SEX         , "post");
$phoneNumber = getMandatoryParameter(REGISTER_PARM_PHONE_NUMBER, "post");

if(!isUploadSuccess(REGISTER_PARM_AVATAR)) {
    $errorMsg = getUploadFailure(REGISTER_PARM_AVATAR);
    setRequestAck(REGISTER_FAILED, $errorMsg, "");
    print json_encode($requestAck);
    exit;
}

//检查文件类型是否匹配
$uploadFileType = $_FILES[REGISTER_PARM_AVATAR]['type'];
if($uploadFileType != 'image/png') {
    global $requestAck;

    setRequestAck(REGISTER_FAILED, "Problem: file is not image: $uploadFileType", "");
    print json_encode($requestAck);
    exit;
}

$sexInt = ($sex == "男")? 1:0;
$userID = generateUserID();
$storedFileName = getFileURLForStore($userID);

saveUploadFile($storedFileName);
addUserToDatabase($userID, $nickName, $storedFileName, $phoneNumber, $sexInt);

//写入数据库
function addUserToDatabase($id, $nickName, $avatar, $phone, $sex) {
    global $userID, $requestAck;

    $conn = db_connect();
    $conn->set_charset("utf8"); // 指定数据库字符编码

    $result = $conn->query(" insert into user(userid, nickname, avatar, sex, phone) values(\"$id\", \"$nickName\", \"$avatar\", $sex, \"$phone\");");
    if (!$result) {
        //$result->free(); // 插入语句不用free?
        $conn->close();

        setRequestAck(REGISTER_FAILED, "Insert user info to database failed.", $userID);
        print json_encode($requestAck);
        exit;
    }

    //$result->free();
    $conn->close();
}

function setRequestAck($status, $info, $userID) {
    global $requestAck;

    $requestAck['status'] = $status;
    $requestAck['info']   = $info;
    $requestAck['userID'] = $userID;
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

function getFileURLForStore($userID) {
    if(!defined("SAE_MYSQL_HOST_M")) { // 开发环境
        return "/Users/ruby/horen/WebServer/testStorage/$userID.png";
    }
    else { //云端环境
        return "http://decorationbus-avatar.stor.sinaapp.com/user/$userID.png";
    }
}

function saveUploadFile($file) {
    global $userID;
    global $requestAck;

    $tmpFile = $_FILES[REGISTER_PARM_AVATAR]['tmp_name'];

    if(!is_uploaded_file($tmpFile)) {
        setRequestAck(REGISTER_FAILED, "非上传的文件：$tmpFile", "");
        print json_encode($requestAck);
        exit;
    }

    if(!defined("SAE_MYSQL_HOST_M")) { // 开发环境
        if(!move_uploaded_file($tmpFile, $file)) {
            setRequestAck(REGISTER_FAILED, "Problem: Could not move file to destination directory", "");
            print json_encode($requestAck);
            exit;
        }
    }
    else { //云端环境
        saePutObjectFile($tmpFile, "avatar", "user/$userID.png");
    }
}
setRequestAck(REGISTER_SUCCESS, "", $userID);
print json_encode($requestAck);

?>