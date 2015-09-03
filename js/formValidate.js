/**
 * Created by ruby on 15/7/20.
 */

function registFormValidate() {
    var email = document.getElementById("inputEmail").value;
    var passwd = document.getElementById("inputPassword").value;
    var confirmPasswd = document.getElementById("confirmPassword").value;

    //检查email是否合法
    if(!checkEmail(email)) {
        alert("请填入有效的邮箱地址");
        return false
    }

    // 检查密码是否合法
    if(!checkPassword(passwd)){
        alert("请输入至少6位密码");
        return false;
    }

    // 检查两次输入密码是否一致
    if(passwd != confirmPasswd) {
        alert("密码两次输入不一致");
        return false;
    }

    var targetURL = "../script/php/regist.php";
    var jsonObj = {"email":$('#inputEmail').val(), "passwd":$('#inputPassword').val()};
    ajax_post(targetURL, jsonObj);

    return true;
}

function ajax_post(url, data){
    $.post(url, data,
        function(data){
            if(data.status != "1") {
                alert("Something is wrong: " + data.info);
                return;
            }

            location.href = "../index.html"; //注册成功跳转到首页
            alert("注册成功");
        },
        "json");//这里返回的类型有：json,html,xml,text
}
//
///*输入框失去焦点时检查表单*/
//$(document).ready(function(){
//    //用户名检查
//    $("#inputEmail").blur(function(){
//        var userName=$("#inputEmail").html();
//        if(userName.empty()) {
//            alert("用户名为空，需要输入用户名" + userName);
//        }
//        //alert("jQuery 执行结束");
//    });
//
//    $("#signinSubmitID").click(function(){
//        alert("表单开始提交");
//        $.ajax({
//            url: "../script/php/regist.php",
//            type: "post",
//            data: '{ "email": "qdurenhongcai@163.com", "passwd": "123456" }',
//            dataType:'json',
//            success: function(data) {
//                alert(data.email);
//                //alert("提交成功啦!");
//                //alert(data);
//            },
//            error: function(XMLHttpRequest, textStatus){
//                alert(XMLHttpRequest.status);
//                alert(XMLHttpRequest.readyState);
//                alert(textStatus);
//            },
//            complete: function(msg) {
//                //alert("complete" + msg);
//            }
//        });
//
//    });
//});
