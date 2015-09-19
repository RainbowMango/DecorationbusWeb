<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>装修巴士-权威公正的装修点评</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/carousel.css" rel="stylesheet">
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

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="page/decoration_company.html">装修公司</a></li>
                <li><a href="page/designer.html">设计师</a></li>
                <li><a href="page/manager.html">项目经理</a></li>
                <li><a href="page/worker.html">装修师傅</a></li>
                <li><a href="page/shop.html">建材</a></li>
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
                    echo '<li><a href="auth/login.php">登录<span class="glyphicon glyphicon-log-in"></span> </a></li>';
                    echo '<li><a href="auth/register.php">注册<span class="glyphicon glyphicon-registration-mark"></span></a></li>';
                    echo '</ul>';
                }
            ?>
            <form class="navbar-form navbar-right" role="search">
                <input type="text" class="form-control" placeholder="搜点评...">
            </form>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修问题上装修巴士</h1>
                    <p>这里汇集装修公司最真实地用户评价</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修问题上装修巴士</h1>
                    <p>帮您了解最真实的商家</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修问题上装修巴士</h1>
                    <p>帮您传播最真实的体验</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>装修巴士</h1>
                    <p>言而有信</p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
<!--
<div class="container">
    <div class="page-header"></div>
    <div class="text-center">
        <h1>装修巴士--装修难题从点评开始</h1>
        <p class="lead">
            团队招募中...<br>
            联系方式: <a href="mailto:#">qdurenhongcai@163.com.</a>
        </p>
    </div>
</div>
-->

<div class="container text-center">
    <h1>装修公司优选</h1>
    <h4>这里是板块介绍</h4>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/decoration_company/zhongbozhuangshi.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修公司名字</h3>
                <p>这里是装修公司介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/decoration_company/zhongbozhuangshi.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修公司名字</h3>
                <p>这里是装修公司介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/decoration_company/zhongbozhuangshi.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修公司名字</h3>
                <p>这里是装修公司介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/decoration_company/zhongbozhuangshi.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修公司名字</h3>
                <p>这里是装修公司介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
</div>

<!-- 设计师板块 -->
<div class="container text-center">
    <h1>设计师优选</h1>
    <h4>这里是板块介绍</h4>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/designer/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>设计师名字</h3>
                <p>设计师简介</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/designer/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>设计师名字</h3>
                <p>设计师简介</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/designer/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>设计师名字</h3>
                <p>设计师简介</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/designer/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>设计师名字</h3>
                <p>设计师简介</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
</div>

<div class="container text-center">
    <h1>项目经理优选板块</h1>
    <h4>这里是板块介绍</h4>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/manager/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>项目经理名字</h3>
                <p>项目经理介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/manager/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>项目经理名字</h3>
                <p>项目经理介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/manager/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>项目经理名字</h3>
                <p>项目经理介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/manager/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>项目经理名字</h3>
                <p>项目经理介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
</div>

<!--工人板块-->
<div class="container text-center">
    <h1>装修工人优选</h1>
    <h4>这里是板块介绍</h4>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/worker/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修师傅姓名</h3>
                <p>这里是装修工人介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/worker/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修师傅姓名</h3>
                <p>这里是装修工人介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/worker/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修师傅姓名</h3>
                <p>这里是装修工人介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/worker/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>装修师傅姓名</h3>
                <p>这里是装修工人介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
</div>

<!--建材商家板块-->
<div class="container text-center">
    <h1>建材商家优选</h1>
    <h4>这里是板块介绍</h4>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/shop/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>商家名字</h3>
                <p>这里是商家介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/shop/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>商家名字</h3>
                <p>这里是商家介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/shop/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>商家名字</h3>
                <p>这里是商家介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="img/shop/model.jpg" alt="...">
            <div class="caption text-center">
                <h3>商家名字</h3>
                <p>这里是商家介绍</p>
                <p><a href="#" class="btn btn-primary" role="button">查看</a></p>
            </div>
        </div>
    </div>
</div>
<hr>
<footer>
    <div class="container text-center">

        <p>装修行业水深似海--我们只是尽自己微薄之力试图净化这个市场，让装修更简单一些</p>
        <p>本网站所有开发者无一不体验过装修的艰辛，利用业余时间参与开发</p>
        <p>不管您从事任何行业，都可以参与到本网站开发中，有意请<a href="mailto:qdurenhongcai@163.com">联系我们</a></p>
        <!--<ul class="list-inline">
            <li>当前版本： v3.3.5</li>
            <li>&middot;</li>
            <li><a href="https://github.com/twbs/bootstrap">GitHub 仓库</a></li>
            <li>&middot;</li>
            <li><a href="../getting-started/#examples">实例精选</a></li>
            <li>&middot;</li>
            <li><a href="http://v2.bootcss.com/">v2.3.2 中文文档</a></li>
            <li>&middot;</li>
            <li><a href="../about/">关于</a></li>
            <li>&middot;</li>
            <li><a href="http://expo.bootcss.com">优站精选</a></li>
            <li>&middot;</li>
            <li><a href="http://blog.getbootstrap.com">官方博客</a></li>
            <li>&middot;</li>
            <li><a href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
            <li>&middot;</li>
            <li><a href="https://github.com/twbs/bootstrap/releases">历史版本</a></li>
        </ul>-->
    </div>
</footer>
</body>
</html>