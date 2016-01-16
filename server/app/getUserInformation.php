<?php
require_once('../../script/php/databaseFunctions.php');
header("Content-Type: text/html; charset=utf-8");

/*
 * interface
 * array('total'=>2, 'row'=>array(
            array('userid'=>1, 'nickname'=>'胡如珊', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/1.jpg', 'email'=>'qdurenhongcai@163.com', 'phone'=>'18605811857', 'realName'=>'任洪彩', 'sex'=>'男', 'job'=>‘软件工程师’, 'address'=>'浙江杭州'),
            array('userid'=>2, 'nickname'=>'胡如珊', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/2.jpg', 'email'=>'qdurenhongcai@163.com', 'phone'=>'18605811857', 'realName'=>'任洪彩', 'sex'=>'男', 'job'=>'软件工程师', 'address'=>'浙江杭州'),
        )
        );
 * */

/*
 * Parameters
 * filter: 查询条件（filter=id: 根据用户ID获取, filter=phone: 根据用户手机号获取）
 * userid: 用户ID
 * phone : 用户手机号码
 * */
checkMandatoryParameter("filter");
$filterType = $_GET["filter"];

switch ($filterType) {
    case "id":
        checkMandatoryParameter("userid");
        $userID = $_GET["userid"];
        break;
    case "phone":
        checkMandatoryParameter("phonenumber");
        $phoneNumber = $_GET["phonenumber"];
        break;
}

//$filterType    = "id"; //默认过滤条件（filter=id: 根据用户ID获取, filter=phone: 根据用户手机号获取）
$resultJsonStr = array('total'=>0, 'row'=>array()); //默认返回结果
$baseSQL       = "select userid, nickname, avatar, email, phone, realName, sex, job, address from user ";

function checkMandatoryParameter($parameter) {
    if(!isset($_GET["$parameter"])) {
        echo "Mandatory parameter $parameter missed!";
        die();
    }
}

//将数据库单条记录转化成array; //数据库查询出来的字段全部是字符串，另外json定义跟数据库定义可能不一致，所以需要做相应地转换
function convertDBRowToArray($dbRow) {
    $converted_row = array(); //保存转换后的单条记录
    $converted_row['userid']       = stripslashes($dbRow['userid']);
    $converted_row['nickname']     = stripslashes($dbRow['nickname']);
    $converted_row['avatar']   = stripslashes($dbRow['avatar']);
    $converted_row['email']   = stripslashes($dbRow['email']);
    $converted_row['phone']   = stripslashes($dbRow['phone']);
    $converted_row['realName']   = stripslashes($dbRow['realName']);
    $converted_row['sex']   = intval(stripslashes($dbRow['sex'])) == 0 ? '女' : '男';
    $converted_row['job']   = stripslashes($dbRow['job']);
    $converted_row['address']   = stripslashes($dbRow['address']);

    return $converted_row;
}

//根据用户ID查询
function getUserByID($ID) {
    global $baseSQL;
    $userArray = array('total'=>0, 'row'=>array());

    $conn = db_connect();

    $conn->set_charset("utf8"); // 指定数据库字符编码
    $querySQL = $baseSQL."where userid = \"$ID\"";

    $result = $conn->query($querySQL);
    if (!$result) {
        throw new Exception('Search user failed.');
    }

    $num_result = $result->num_rows;
    if(0 >= $num_result) {
        echo "查询数据失败， SQL：".$querySQL;
        return $userArray;
    }
    elseif(1 < $num_result) {
        throw new Exception('Get more than one user with same user identifier!');
    }

    $row_db = $result->fetch_assoc();
    $userArray['total'] = 1;
    $userArray["row"][0] = convertDBRowToArray($row_db);

    $result->free();
    $conn->close();

    return json_encode($userArray);

}

//根据用户手机号查询
function getUserByPhone($phoneNumber) {
    global $baseSQL;
    $userArray = array('total'=>0, 'row'=>array());

    $conn = db_connect();

    $conn->set_charset("utf8"); // 指定数据库字符编码
    $querySQL = $baseSQL."where phone = \"$phoneNumber\"";

    $result = $conn->query($querySQL);
    if (!$result) {
        throw new Exception('Search user failed.');
    }

    $num_result = $result->num_rows;
    if(0 >= $num_result) {
        echo "查询数据失败， SQL：".$querySQL;
        return $userArray;
    }
    elseif(1 < $num_result) {
        throw new Exception('Get more than one user with same user phone number!');
    }

    $row_db = $result->fetch_assoc();
    $userArray['total'] = 1;
    $userArray["row"][0] = convertDBRowToArray($row_db);

    $result->free();
    $conn->close();

    return json_encode($userArray);

}

switch ($filterType) {
    case "id":
        $resultJsonStr = getUserByID($userID);
        break;
    case "phone":
        $resultJsonStr = getUserByPhone($phoneNumber);
        break;
}

print("$resultJsonStr");

?>
