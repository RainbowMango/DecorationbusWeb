<?php session_start();?>
<?php require_once("../script/php/ucenterFunctions.php") ?>
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

            <form class="navbar-form navbar-right" role="search">
                <input type="text" class="form-control" placeholder="搜点评...">
            </form>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!--侧边栏：参考页面http://v3.bootcss.com/examples/dashboard/# -->
<div class="container-fluid">
    <div class="row">
        <link href="../css/dashboard.css" rel="stylesheet">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">用户中心</a></li>
                <li><a href="#">用户信息</a></li>
                <li><a href="#">实名认证</a></li>
                <li><a href="#">通知设置</a></li>
                <li><a href="#">账户等级</a></li>
                <li><a href="#">消息中心</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="media">
                <div class="media-left media-heading">
                    <a href="#">
                        <img class="media-object" src="../img/defaultMembershipPhoto.png" alt="用户头像" width="100px" height="100px">
                    </a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><?php echo $_SESSION['valid_user'] ?></h2>
                    <div class="progress" style="max-width: 200px">
                        <div class="progress-bar" role="progressbar" style="width: 100%;">
                            当前积分：<?php echo getUserScore($_SESSION['valid_user']) ?>
                        </div>
                    </div>
                    <h5>会员等级：士兵</h5>
                </div>
            </div>
        </div>
    </div>
</div>

</body>