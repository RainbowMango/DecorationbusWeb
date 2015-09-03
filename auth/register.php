<?php

print <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>装修巴士-账号注册</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link href="../css/carousel.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/formValidate.js"></script>
    <script type="text/javascript" src="../js/commonFunction.js"></script>
</head>
EOT;

print <<<EOT
<form action="../script/php/regcheck.php" method="post">
    用户名：<input type="text" name="username"/>
    <br/>
    密　码:<input type="password" name="password"/>
    <br/>
    确认密码：<input type="password" name="confirm"/>
    <br/>
    <input type="Submit" name="Submit" value="注册"/>
</form>
EOT;

print <<<EOT
</html>
EOT;

?>