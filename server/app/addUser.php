<?php
header("Content-Type: text/html; charset=utf-8");
require_once('../../script/php/databaseFunctions.php');
require_once('commonUtils.php');

/*
 * interface
 * array('status'=>0, 'info'=>'success', 'input'=>array('fileName'=>'xxx.png', 'fileSize'=>'1023', 'fileType'=>'image/gif');
 * */

$requestAck = array('status'=>0, 'info'=>'success', 'input'=>array()); //默认返回结果

$nickName    = getMandatoryParameter("nickName"   , "post");
$sex         = getMandatoryParameter("sex"        , "post");
$phoneNumber = getMandatoryParameter("phoneNumber", "post");

//错误检测
$error = $_FILES['useravatar']['error'];
if($error != UPLOAD_ERR_OK) {
    echo 'Problem:';
    switch($error) {
        case UPLOAD_ERR_INI_SIZE:
            $size = $_FILES['useravatar']['size'];
            if(empty($size)) {
                echo "can not get file size";
            }
            echo $size;
            echo 'File exceeded upload_max_filesize';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $size = $_FILES['useravatar']['size'];
            if(empty($size)) {
                echo "can not get file size";
            }
            echo $size;
            echo "File exceeded max_file_size: $size";
            break;
        case UPLOAD_ERR_PARTIAL;
            echo 'File only partially uploaded';
            break;
        case UPLOAD_ERR_NO_FILE:
            echo 'No file uploaded';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo 'Cannot upload file: No temp directory specified';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo 'Upload failed: Cannot write to disk';
            break;
    }
    exit;
}

//检查文件类型是否匹配
$uploadFileType = $_FILES['useravatar']['type'];
$size = $_FILES['useravatar']['error'];
var_dump($_FILES);
if(empty($uploadFileType)) {
    global $requestAck;

    setRequestAck(1, "Problem: upload file type unkonwn, file:");

    print json_encode($requestAck);
    exit;
}
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

echo "File uploaded successfully!<br>";

?>