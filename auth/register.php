<?php require("../header.php"); ?>

<div class="container" style="padding: 50px">
    <h2>创建账号</h2>
    <hr>
    <div class="row">
        <div class="col-md-4"></div> <!--栅格占位-->
        <div class="col-md-4">
            <form method="post" class="form-horizontal" action="../script/php/regcheck.php">
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
                        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword">重复密码</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input type="password" id="confirmPassword" class="form-control" placeholder="密码" name="confirm" required>
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
                    <button class="btn btn-lg btn-primary btn-block" id="signinSubmitID" type="submit" name="Submit" value="注册">提交注册</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div><!--栅格占位-->
    </div>
</div>

<?php require("../footer.php"); ?>
