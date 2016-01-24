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

?>