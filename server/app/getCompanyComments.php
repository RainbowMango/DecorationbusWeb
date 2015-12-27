<?php
require_once('../../script/php/databaseFunctions.php');
header("Content-Type: text/html; charset=utf-8");

/*
 * interface
 * array('total'=>2, 'row'=>array(
            array('nickname'=>'qdurenhongcai@163.com', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/1.jpg', 'date'=>'2015-12-13', 'comment'=>'是个好公司', 'score'=>87, 'thumbnail01'=>'', 'thumbnail02'=>'', 'thumbnail03'=>'', 'thumbnail04'=>'', 'image01'=>'', 'image02'=>'', 'image03'=>'', 'image04'=>''),
            array('nickname'=>'qdurenhongcai@163.com', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/1.jpg', 'date'=>'2015-12-13', 'comment'=>'是个好公司', 'score'=>87, 'thumbnail01'=>'', 'thumbnail02'=>'', 'thumbnail03'=>'', 'thumbnail04'=>'', 'image01'=>'', 'image02'=>'', 'image03'=>'', 'image04'=>''),
        )
        );
 * */


$param_counter = 0; //默认获取起始行数
$target_company_id = 0; //所要查询的公司
$companyCommentList = array('total'=>0, 'row'=>array()); //默认返回结果

if(isset($_GET["counter"])) {
    global $param_counter;
    $param_counter = $_GET["counter"];
}

if(!isset($_GET["company"])) {
    return json_encode($companyCommentList);
}
$target_company_id = $_GET["company"];
//echo $target_company_id; echo "</br>";

//查询
function getCompanyComments($counter) {
    global $companyCommentList;
    global $target_company_id;

    $limit_start = $counter;
    $limit_stop  = $counter + 20;
    $conn = db_connect();

    $conn->set_charset("utf8"); // 指定数据库字符编码
    $result = $conn->query("select usernickname, useravatar, commentdate, comment, score, thumbnail01, thumbnail02, thumbnail03, thumbnail04, image01, image02, image03, image04 from decoration_company_comments where companyid=$target_company_id LIMIT $limit_start, $limit_stop ");
    if (!$result) {
        throw new Exception('Search user score failed.');
    }

    $num_result = $result->num_rows;
    $companyCommentList['total'] = $num_result;

    //数据库查询出来的字段全部是字符串，另外json定义跟数据库定义可能不一致，所以需要做相应地转换
    for($i = 0; $i < $num_result; $i++) {
        $row_db = $result->fetch_assoc();

        $converted_row = array(); //保存转换后的单条记录
        $converted_row['nickname'] = stripslashes($row_db['usernickname']);
        $converted_row['avatar'] = stripslashes($row_db['useravatar']);
        $converted_row['date'] = stripslashes($row_db['commentdate']);
        $converted_row['comment'] = stripslashes($row_db['comment']);
        $converted_row['score'] = intval(stripslashes($row_db['score']));
        $converted_row['thumbnail01'] = stripslashes($row_db['thumbnail01']);
        $converted_row['thumbnail02'] = stripslashes($row_db['thumbnail02']);
        $converted_row['thumbnail03'] = stripslashes($row_db['thumbnail03']);
        $converted_row['thumbnail04'] = stripslashes($row_db['thumbnail04']);
        $converted_row['image01'] = stripslashes($row_db['image01']);
        $converted_row['image02'] = stripslashes($row_db['image02']);
        $converted_row['image03'] = stripslashes($row_db['image03']);
        $converted_row['image04'] = stripslashes($row_db['image04']);
        
        $companyCommentList["row"][$i] = $converted_row;
    }

    $result->free();
    $conn->close();

    return json_encode($companyCommentList);
}

$jsonStr = getCompanyComments($param_counter);
print("$jsonStr");

?>