<?php require("../header.php"); ?>

<div class="container" style="padding: 50px">
    <h2>登录</h2>
    <hr>
    <div class="row">
        <div class="col-md-4"></div> <!--栅格占位-->
        <div class="col-md-4">
            <form action="../script/php/loginHandler.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail" >邮箱</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input type="email" id="inputEmail" class="form-control" placeholder="邮箱地址" name="username" required autofocus>
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
            <a href="resetpswd.html">忘记密码?</a>
        </div>
        <div class="col-md-4"></div><!--栅格占位-->
    </div>
</div>

<?php require("../footer.php"); ?>