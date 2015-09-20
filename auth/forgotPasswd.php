<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>装修巴士-重置密码</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
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
                <li><a href="#">装修公司</a></li>
                <li><a href="#">设计师</a></li>
                <li><a href="#">项目经理</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">装修师傅
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">水电师傅</a></li>
                        <li><a href="#">泥工师傅</a></li>
                        <li><a href="#">油漆师傅</a></li>
                        <li><a href="#">保洁师傅</a></li>
                        <li class="divider"></li>
                        <li><a href="#">所有</a></li>
                    </ul>
                </li>
                <li><a href="#">建材</a></li>
                <li><a href="#">论坛</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html">登录<span class="glyphicon glyphicon-log-in"></span> </a></li>
                <li><a href="signin.html">注册<span class="glyphicon glyphicon-registration-mark"></span></a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <input type="text" class="form-control" placeholder="搜点评...">
            </form>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="padding: 50px">
    <h2>重置密码</h2>
    <hr>
    <div class="row">
        <div class="col-md-4"></div> <!--栅格占位-->
        <div class="col-md-4">
            <form action="../script/php/forgotPasswdHandler.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail" >邮箱</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input type="email" id="inputEmail" name="username" class="form-control" placeholder="邮箱地址" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">重置密码</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div><!--栅格占位-->
    </div>
</div>
</body>
</html>