<?php

//检查必选参数是否存在，不存在直接退出
function checkMandatoryParameterOrDie($parameter, $type) {
    if(strtolower($type) == "get") {
        if(!isset($_GET["$parameter"])) {
            echo "Mandatory parameter $parameter missing!";
            die();
        }
    }
    elseif(strtolower($type) == "post") {
        if(!isset($_POST["$parameter"])) {
            echo "Mandatory parameter $parameter missed!";
            die();
        }
    }
}

function getMandatoryParameter($parameter, $type) {
    checkMandatoryParameterOrDie($parameter, $type);

    if(strtolower($type) == "get") {
        return $_GET["$parameter"];
    }

    return $_POST["$parameter"];
}

/*
 * 检查upload是否成功
 */
function isUploadSuccess($fileKey) {
    //var_dump($_FILES);
    $error = $_FILES["$fileKey"]['error'];
    if($error != UPLOAD_ERR_OK) {
        switch($error) {
            case UPLOAD_ERR_INI_SIZE:
                echo 'File exceeded upload_max_filesize.';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "File exceeded max_file_size.";
                break;
            case UPLOAD_ERR_PARTIAL;
                echo 'File only partially uploaded.';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'No file uploaded.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo 'Cannot upload file: No temp directory specified.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo 'Upload failed: Cannot write to disk.';
                break;
        }
        return false;
    }

    return true;
}


?>