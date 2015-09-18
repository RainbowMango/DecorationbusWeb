<?php

require_once('userAuthFunctions.php');

session_start();

//create short variable names
$username = $_POST['username'];
$passwd = $_POST['passwd'];

if(!$username || !$passwd) {
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    exit;
}

try {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    echo "<script>alert('登录成功！'); setTimeout(\"window.location='../../index.php'\",500);</script>";
}
catch(Exception $e)  {
    // unsuccessful login
    echo "Exception ". $e->getCode(). ": ". $e->getMessage()."<br />".
        " in ". $e->getFile(). " on line ". $e->getLine(). "<br />";
    echo "<script>alert('登录失败！'); history.go(-1);</script>";
    exit;
}

?>