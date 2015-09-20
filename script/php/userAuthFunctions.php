<?php

require_once('databaseFunctions.php');
require_once('../../oss/PHPMailer/PHPMailerAutoload.php');
header("Content-Type: text/html; charset=utf-8");

function register($username, $email, $password) {
// register new person with db
// return true or error message

    // connect to db
    $conn = db_connect();

    // check if username is unique
    $result = $conn->query("select * from user where username='".$username."'");
    if (!$result) {
        throw new Exception('Search user name failed.');
    }

    if ($result->num_rows>0) {
        throw new Exception('That username is taken - go back and choose another one.');
    }

    // check if email is unique
    $result = $conn->query("select * from user where email = '".$email."'");
    if(!$result) {
        throw new Exception("Search email failed.");
    }

    if ($result->num_rows>0) {
        throw new Exception('That email is taken - go back and choose another one.');
    }

    // if ok, put in db
    $result = $conn->query("insert into user(username, passwd, email) values
                         ('".$username."', sha1('".$password."'), '".$email."')");
    if (!$result) {
        throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
}

function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception

    // connect to db
    $conn = db_connect();

    // check if username is unique
    $result = $conn->query("select * from user where username='".$username."' and passwd = sha1('".$password."')");
    if (!$result) {
        throw new Exception('Could not log you in.');
    }

    if ($result->num_rows>0) {
        return true;
    } else {
        throw new Exception('Could not log you in.');
    }
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
    if (isset($_SESSION['valid_user']))  {
        echo "Logged in as ".$_SESSION['valid_user'].".<br />";
    } else {
        // they are not logged in
        do_html_heading('Problem:');
        echo 'You are not logged in.<br />';
        do_html_url('login.php', 'Login');
        do_html_footer();
        exit;
    }
}

function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

    // if the old password is right
    // change their password to new_password and return true
    // else throw an exception
    login($username, $old_password);
    $conn = db_connect();
    $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
    if (!$result) {
        throw new Exception('Password could not be changed.');
    } else {
        return true;  // changed successfully
    }
}

//取得指定位数密码，默认6位
function generate_password( $length = 6 ) {
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }

    return $password;
}

function reset_password($username) {
// set password for username to a random value
// return the new password or false on failure
    // get a random dictionary word b/w 6 and 13 chars in length
    $new_password = generate_password(6, 13);
    if(empty($new_password)) {
        throw new Exception('Could not generate new password.');
    }

    // add a number  between 0 and 999 to it
    // to make it a slightly better password
    $rand_number = rand(0, 999);
    $new_password .= $rand_number;

    // set user's password to this in database or return false
    $conn = db_connect();
    $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where email = '".$username."'");
    if (!$result) {
        throw new Exception('Could not change password.');  // not changed
    } else {
        return $new_password;  // changed successfully
    }
}

//function sendmailto($mailto, $mailsub, $mailbd)
//{
//    $smtpserver     = "smtp.163.com"; //SMTP服务器
//    $smtpserverport = 25; //SMTP服务器端口
//    $smtpusermail   = "qdurenhongcai@163.com"; //SMTP服务器的用户邮箱
//    $smtpemailto    = $mailto;
//    $smtpuser       = "qdurenhongcai@163.com"; //SMTP服务器的用户帐号
//    $smtppass       = "Cai_qdu."; //SMTP服务器的用户密码
//    $mailsubject    = $mailsub; //邮件主题
//    $mailsubject    = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
//    $mailbody       = $mailbd; //邮件内容
//    //$mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码
//    $mailtype       = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
//    ##########################################
//    echo $smtpserver;
//    $smtp           = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
//    echo "ok";
//    $smtp->debug    = FALSE; //是否显示发送的调试信息
//
//    return $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
//}

function sendmailto($mailto, $mailsub, $mailbd) {
    try {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'qdurenhongcai@163.com';                 // SMTP username
        $mail->Password = 'Cai_qdu.';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                    // TCP port to connect to

        $mail->From = 'qdurenhongcai@163.com';
        $mail->FromName = "=?UTF-8?B?" . base64_encode("装修巴士") . "?=";
        $mail->addAddress($mailto);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "=?UTF-8?B?" . base64_encode($mailsub) . "?=";
        $mail->Body    = $mailbd;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            echo 'Message has been sent';
        }
    }
    catch(Exception $e) {
        throw new Exception("send mail failed by PHPMailer.");
    }

    return true;
}

function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = db_connect();

    $result = $conn->query("select email from user where email='".$username."'");

    if (!$result) {
        throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
        throw new Exception('Could not find email address.');
        // username not in db
    } else {
        try {
            $row = $result->fetch_object();
            $mailto = $row->email;
            $mailsubject = "装修巴士账号密码重置";
            $mailbody = "$password";
            $status = sendmailto($mailto, $mailsubject, $mailbody);
            if(!$status) {
                throw new Exception("sendmailto failed.");
            }
        }
        catch(Exception $e)  {
            echo "Exception ". $e->getCode(). ": ". $e->getMessage()."<br />".
                " in ". $e->getFile(). " on line ". $e->getLine(). "<br />";
            exit;
        }

    }
}

?>
