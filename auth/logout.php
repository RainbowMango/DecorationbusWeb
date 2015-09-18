<?php
session_start();

unset($_SESSION['valid_user']);
$result = session_destroy();
if(!$result) {
    echo "<script>alert('注销失败！'); history.go(-1);</script>";
    exit;
}

echo "<script>setTimeout(\"window.location='../index.php'\",0);</script>";

?>
