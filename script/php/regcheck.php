<?php
session_start();
include("MySQLUtil.php");

if(!isset($_POST["Submit"]) || $_POST["Submit"] != "注册") {
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    die();
}

$user = $_POST["username"];
$psw = $_POST["password"];
$psw_confirm = $_POST["confirm"];

if($user == "" || $psw == "" || $psw_confirm == "")
{
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    die();
}

if($psw != $psw_confirm) {
    echo "<script>alert('两次输入的密码不一致！'); history.go(-1);</script>";
    die();
}

if(userExist($user)) {
    echo "<script>alert('用户名已存在'); history.go(-1);</script>";
    die();
}

// 插入新用户
if(!createUser($user, $psw)) {
    echo "<script>alert('注册失败，请稍候再试！'); history.go(-1);</script>";
    die();
}

$_SESSION["valid_user"] = $user;
echo "<script>alert('注册成功！'); setTimeout(\"window.location='../../index.php'\",500);</script>";

?>