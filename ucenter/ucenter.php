<?php session_start();?>
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

<div class="media" style="margin-top: 70px; margin-left: 50px; margin-right: 50px">
    <div class="media-left media-heading">
        <a href="#">
            <img class="media-object" src="../img/defaultMembershipPhoto.png" alt="用户头像" width="100px" height="100px">
        </a>
    </div>
    <div class="media-body">
        <h2 class="media-heading"><?php echo $_SESSION['valid_user'] ?></h2>
        <div class="progress" style="max-width: 200px">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                当前积分：1000
            </div>
        </div>
        <h5>会员等级：士兵</h5>
    </div>
</div>

</body>