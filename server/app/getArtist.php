<?php
require_once('../../script/php/databaseFunctions.php');
header("Content-Type: text/html; charset=utf-8");

/*
 * interface
 * array('total'=>2, 'row'=>array(
            array('id'=>1, 'name'=>'胡如珊', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/1.jpg', 'company'=>'亚东装饰', 'comments'=>129, 'score'=>87),
            array('id'=>2, 'name'=>'胡如珊', 'avatar'=>'http://decorationbus-companylogo.stor.sinaapp.com/2.jpg', 'company'=>'亚东装饰', 'comments'=>120, 'score'=>60),
        )
        );
 * */


$param_counter = 0; //默认获取起始行数
$artistList = array('total'=>0, 'row'=>array()); //默认返回结果

if(isset($_GET["counter"])) {
    global $param_counter;
    $param_counter = $_GET["counter"];
}

//查询
function getArtist($counter) {
    global $artistList;

    $limit_start = $counter;
    $limit_stop  = $counter + 20;
    $conn = db_connect();

    $conn->set_charset("utf8"); // 指定数据库字符编码
    $result = $conn->query("select artist.id, artist.name, artist.avatar, company.name as company, artist.comments_number, artist.score from decoration_artist as artist, decoration_company as company WHERE artist.company = company.id LIMIT $limit_start, $limit_stop ");
    if (!$result) {
        throw new Exception('Search user score failed.');
    }

    $num_result = $result->num_rows;
    $artistList['total'] = $num_result;

    //数据库查询出来的字段全部是字符串，另外json定义跟数据库定义可能不一致，所以需要做相应地转换
    for($i = 0; $i < $num_result; $i++) {
        $row_db = $result->fetch_assoc();

        $converted_row = array(); //保存转换后的单条记录
        $converted_row['id'] = intval(stripslashes($row_db['id']));
        $converted_row['name'] = stripslashes($row_db['name']);
        $converted_row['avatar'] = stripslashes($row_db['avatar']);
        $converted_row['company'] = stripslashes($row_db['company']);
        $converted_row['comments'] = intval(stripslashes($row_db['comments_number']));
        $converted_row['score'] = intval(stripslashes($row_db['score']));

        $artistList["row"][$i] = $converted_row;
    }

    $result->free();
    $conn->close();

    return json_encode($artistList);
}

$jsonStr = getArtist($param_counter);
print("$jsonStr");

?>
