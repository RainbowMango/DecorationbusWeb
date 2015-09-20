<?php
session_start();
require_once("userAuthFunctions.php");

if(!isset($_POST["Submit"]) || $_POST["Submit"] != "注册") {
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    die();
}

$user = $_POST["username"];
$email = $_POST["email"];
$psw = $_POST["password"];
$psw_confirm = $_POST["confirm"];

if(empty($user) || empty($email) || empty($psw) || empty($psw_confirm))
{
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    exit;
}

if($psw != $psw_confirm) {
    echo "<script>alert('两次输入的密码不一致！'); history.go(-1);</script>";
    die();
}

try {
    register($user, $email, $psw);
}
catch (Exception $e) {
    echo "Exception ". $e->getCode(). ": ". $e->getMessage()."<br />".
        " in ". $e->getFile(). " on line ". $e->getLine(). "<br />";
    echo "<script>alert('登录失败！'); history.go(-1);</script>";
    exit;
}

$_SESSION["valid_user"] = $user;
echo "<script>alert('注册成功！'); setTimeout(\"window.location='../../index.php'\",500);</script>";

?>