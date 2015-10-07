<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>装修巴士-权威公正的装修点评</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="index.php">装修巴士</a>
        </div>

<!--        <div class="navbar-collapse collapse">-->
<!--            <ul class="nav navbar-nav">-->
<!--                <li><a href="page/decoration_company.html">装修公司</a></li>-->
<!--                <li><a href="page/designer.html">设计师</a></li>-->
<!--                <li><a href="page/manager.html">项目经理</a></li>-->
<!--                <li><a href="page/worker.html">装修师傅</a></li>-->
<!--                <li><a href="page/shop.html">建材</a></li>-->
<!--                <li><a href="#">论坛</a></li>-->
<!--            </ul>-->
<!--            --><?php
//                if(isset($_SESSION['valid_user'])) {
//                    $userName=$_SESSION['valid_user'];
//print <<<EOT
//                    <ul class="nav navbar-nav navbar-right">
//                    <li class="dropdown">
//                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
//                            $userName
//                            <span class="caret"></span>
//                        </a>
//                        <ul class="dropdown-menu">
//                            <li><a href="ucenter/ucenter.php">个人中心</a></li>
//                            <li><a href="auth/logout.php">退出登录</a></li>
//                        </ul>
//                    </li>
//                    </ul>
//EOT;
//                }
//                else {
//                    echo '<ul class="nav navbar-nav navbar-right">';
//                    echo '<li><a href="auth/login.php">登录<span class="glyphicon glyphicon-log-in"></span> </a></li>';
//                    echo '<li><a href="auth/register.php">注册<span class="glyphicon glyphicon-registration-mark"></span></a></li>';
//                    echo '</ul>';
//                }
//            ?>
<!--            <form class="navbar-form navbar-right" role="search">-->
<!--                <input type="text" class="form-control" placeholder="搜点评...">-->
<!--            </form>-->
<!--        </div>-->
    </div>
</nav>

<link href="css/carousel.css" rel="stylesheet">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- 定义banner个数 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <!-- 定义每个banner -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="image/banner01.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修巴士</h1>
                    <p>这里汇集装修公司最真实地用户评价</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="image/banner01.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修巴士</h1>
                    <p>帮您了解最真实的商家</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="image/banner01.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修巴士</h1>
                    <p>帮您传播最真实的体验</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="image/banner01.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修巴士</h1>
                    <p>言而有信</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 定义左右控制箭头 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!--参考http://v3.bootcss.com/examples/carousel/ -->
<div class="container marketing">
    <!-- 装修公司点评动态更新 -->
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">装修公司</h2>
            <p class="lead">装修公司是集设计、预算、施工、材料于一体的专业化公司。适合没时间处理繁琐家装的家庭。</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" src="image/category01.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- 设计师点评动态更新 -->
    <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
            <h2 class="featurette-heading">设计师</h2>
            <p class="lead">装修效果最关键的角色，直接决定了装修预算与风格</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
            <img class="featurette-image img-responsive center-block" src="image/category02.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- 项目经理评动态更新 -->
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">项目经理</h2>
            <p class="lead">项目经理直接决定了家装质量</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" src="image/category03.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- 装修工人点评动态更新 -->
    <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
            <h2 class="featurette-heading">装修工人</span></h2>
            <p class="lead">装修工人决定了装修细节</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
            <img class="featurette-image img-responsive center-block" src="image/category04.jpg" alt="Generic placeholder image">
        </div>
    </div>

    <!-- 建材商家点评动态更新 -->
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">建材商家</h2>
            <p class="lead">建材选购绝对是门学问</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" src="image/category05.jpg" alt="Generic placeholder image">
        </div>
    </div>



</div>

<hr>
<footer>
    <div class="container text-center">
        <p>装修行业水深似海--我们只是尽自己微薄之力试图净化这个市场，让装修更简单一些</p>
        <p>本网站所有开发者无一不体验过装修的艰辛，利用业余时间参与开发</p>
        <p>不管您从事任何行业，都可以参与到本网站开发中，有意请<a href="mailto:qdurenhongcai@163.com">联系我们</a></p>
    </div>
</footer>
</body>
</html>