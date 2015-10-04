<?php
require_once('databaseFunctions.php');
header("Content-Type: text/html; charset=utf-8");

//取得用户积分
function getUserScore($username) {
    $conn = db_connect();

    $result = $conn->query("select score from user_score where username='".$username."'");
    if (!$result) {
        throw new Exception('Search user score failed.');
    }

    //积分表如果没有用户数据则新增一条数据, 返回初始积分0
    if ($result->num_rows == 0) {
        $result = $conn->query("insert into user_score(username, score) values('".$username."', 0)");
        if (!$result) {
            throw new Exception('Initialize user_score failed - please try again later.');
        }
        return 0;
    }

    //取得积分
    $row = $result->fetch_array(MYSQLI_NUM);
    return $row[0];
}