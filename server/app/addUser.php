<?php
header("Content-Type: text/html; charset=utf-8");
require_once('../../script/php/databaseFunctions.php');

//错误检测
$error = $_FILES['useravatar']['error'];
if($error != UPLOAD_ERR_OK) {
    echo 'Problem:';
    switch($error) {
        case UPLOAD_ERR_INI_SIZE:
            echo 'File exceeded upload_max_filesize';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo 'File exceeded max_file_size';
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
if($uploadFileType != 'image/jpeg') {
    echo "Problem: file is not image: $uploadFileType";
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


echo "File uploaded successfully!<br>";

?>