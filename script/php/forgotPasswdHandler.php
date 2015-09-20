<?php
include('userAuthFunctions.php');

// creating short variable name
$username = $_POST['username'];

try {
    $password = reset_password($username);
    notify_password($username, $password);
    echo "<script>alert('新的密码已经发送到您的邮箱！'); setTimeout(\"window.location='../../index.php'\",500);</script>";
    exit;
}
catch (Exception $e) {
    echo "Exception ". $e->getCode(). ": ". $e->getMessage()."<br />".
        " in ". $e->getFile(). " on line ". $e->getLine(). "<br />";
}
?>
