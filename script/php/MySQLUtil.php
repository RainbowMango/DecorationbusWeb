<?php
include("MySQLDef.php");

//执行SQL
function executeSQL($sql) {
    echo "执行的SQL：".$sql;
    /*连接数据库*/
    $link=mysql_connect(DECORATION_BUS_MYSQL_HOST.':'.DECORATION_BUS_MYSQL_PORT, DECORATION_BUS_MYSQL_USER, DECORATION_BUS_MYSQL_PASS);
    if(!$link || !mysql_select_db(DECORATION_BUS_MYSQL_DB, $link)) {
        echo "<script>alert('数据库暂时无法连接，请稍候再试！'); history.go(-1);</script>";
        return null;
    }

    /*设置字符集*/
    if(!mysql_query(DECORATION_BUS_MYSQL_CHARSET,$link)) {
        echo "<script>alert('设置数据库字符集出错，请稍候再试！'); history.go(-1);</script>";
        return null;
    }
    $result = mysql_query($sql, $link);
    if(!$result) {
        echo "<script>alert('数据查询失败，请稍候再试！'); history.go(-1);</script>";
        return null;
    }

    return $result;
}

/*查询用户是否存在*/
function userExist($user) {
    $querySQL = "SELECT email FROM user where email = \"".$user."\"";
    $result = executeSQL($querySQL);
    if(!$result) {
        echo "<script>alert('数据查询失败，请稍候再试！'); history.go(-1);</script>";
        return false;
    }
    $num = mysql_num_rows($result);	//统计执行结果影响的行数
    if($num == 0) {
        return false;
    }

    return true;
}

//创建用户
function createUser($user, $pwd){
    $insertSQL = "INSERT INTO user(email, passwd) VALUES(\"$user\", \"$psw\")";
    $result = executeSQL($insertSQL);
    if(!$result) {
        echo "<script>alert('创建用户失败，请稍候再试！'); history.go(-1);</script>";
        return false;
    }

    return true;
}

//echo userExist("qdurenhongcai@165.com");
?>
