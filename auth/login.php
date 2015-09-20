<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>装修巴士-权威公正的装修点评</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link href="../css/carousel.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">装修巴士</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../page/decoration_company.html">装修公司</a></li>
                <li><a href="../page/designer.html">设计师</a></li>
                <li><a href="../page/manager.html">项目经理</a></li>
                <li><a href="../page/worker.html">装修师傅</a></li>
                <li><a href="../page/shop.html">建材</a></li>
                <li><a href="#">论坛</a></li>
            </ul>
            <?php
            if(isset($_SESSION['valid_user'])) {
                $userName=$_SESSION['valid_user'];
                print <<<EOT
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            $userName
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">我的点评</a></li>
                            <li><a href="#">个人中心</a></li>
                            <li><a href="auth/logout.php">退出登录</a></li>
                        </ul>
                    </li>
                    </ul>
EOT;
            }
            else {
                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<li><a href="register.php">注册<span class="glyphicon glyphicon-registration-mark"></span></a></li>';
                echo '</ul>';
            }
            ?>
            <form class="navbar-form navbar-right" role="search">
                <input type="text" class="form-control" placeholder="搜点评...">
            </form>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="padding: 50px">
    <h2>登录</h2>
    <hr>
    <div class="row">
        <div class="col-md-4"></div> <!--栅格占位-->
        <div class="col-md-4">
            <form action="../script/php/loginHandler.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputUsername" >账号</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" id="inputUsername" class="form-control" placeholder="6~16位用户名" name="username" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword">密码</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="passwd" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> 记住我
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
                </div>
            </form>
            <a href="forgotPasswd.php">忘记密码?</a>
        </div>
        <div class="col-md-4"></div><!--栅格占位-->
    </div>
</div>

<?php require("../footer.php"); ?>