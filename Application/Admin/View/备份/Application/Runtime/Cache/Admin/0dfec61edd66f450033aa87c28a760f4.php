<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>用户登录</title>

        <style type="text/css">
#userlogin_body {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_all_bg.gif') #226cc5 repeat-x 50% top; PADDING-BOTTOM: 0px; MARGIN: 110px 0px 0px; FONT: 12px/150% Arial, "����" ,Helvetica,sans-serif; PADDING-TOP: 0px; TEXT-DECORATION: none;
}
#user_login {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_top {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_main {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_bottom {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_login DL {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_login DD {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_top {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_main {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_bottom {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_top UL {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_main UL {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_bottom UL {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_top LI {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_main LI {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_bottom LI {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
FORM {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
#user_login {
    MARGIN: 0px auto; WIDTH: 590px;
}
#user_top {
    CLEAR: both;
}
#user_main {
    CLEAR: both;
}
#user_bottom {
    CLEAR: both;
}
#user_top LI {
    FLOAT: left; LIST-STYLE-TYPE: none;
}
#user_main LI {
    FLOAT: left; LIST-STYLE-TYPE: none;
}
#user_bottom LI {
    FLOAT: left; LIST-STYLE-TYPE: none;
}
.user_top_r {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_top_r.gif') no-repeat 50% top;
}
.user_top_c {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_top_c.gif') no-repeat 50% top;
}
.user_top_l {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_top_l.gif') no-repeat 50% top;
}
.user_main_r {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_main_r.gif') #bec5cc no-repeat 50% top;
}
.user_main_c {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_main_c.gif') #bec5cc no-repeat 50% top; WIDTH: 280px;
}
.user_main_l {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_main_l.gif') #bec5cc no-repeat 50% top;
}
.user_bottom_r {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_bottom_r.gif') no-repeat 50% top;
}
.user_bottom_c {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_bottom_c.gif') no-repeat 50% top; COLOR: #fff; LINE-HEIGHT: 117px; PADDING-TOP: 20px; TEXT-ALIGN: right;
}
.user_bottom_c A {
    COLOR: yellow; TEXT-DECORATION: underline;
}
.user_bottom_c A:hover {
    COLOR: #c00;
}
.user_bottom_l {
    BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_bottom_l.gif') no-repeat 50% top;
}
.user_top_r {
    FLOAT: left; WIDTH: 180px;
}
.user_main_r {
    FLOAT: left; WIDTH: 180px;
}
.user_bottom_r {
    FLOAT: left; WIDTH: 180px;
}
user_main_c {
    FLOAT: left; WIDTH: 280px;
}
.user_top_c {
    FLOAT: left; WIDTH: 280px;
}
.user_bottom_c {
    FLOAT: left; WIDTH: 280px;
}
.user_top_l {
    FLOAT: left; WIDTH: 129px;
}
.user_main_l {
    FLOAT: left; WIDTH: 129px;
}
.user_bottom_l {
    FLOAT: left; WIDTH: 129px;
}
.user_top_r {
    HEIGHT: 116px;
}
.user_top_c {
    HEIGHT: 116px;
}
.user_top_l {
    HEIGHT: 116px;
}
.user_main_r {
    HEIGHT: 139px;
}
.user_main_c {
    HEIGHT: 139px;
}
.user_main_l {
    HEIGHT: 139px;
}
.user_main_r {
    LINE-HEIGHT: 139px;
}
.user_bottom_r {
    HEIGHT: 117px;
}
.user_bottom_c {
    HEIGHT: 117px;
}
.user_bottom_l {
    HEIGHT: 117px;
}
.user_main_box {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
.user_main_box UL {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
.user_main_box LI {
    PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px;
}
.user_main_box UL {
    CLEAR: both;
}
.user_main_box LI {
    FLOAT: left; LIST-STYLE-TYPE: none;
}
.user_main_box .user_main_text {
    LINE-HEIGHT: 34px; HEIGHT: 34px;
}
.user_main_box .user_main_input {
    LINE-HEIGHT: 34px; HEIGHT: 34px;
}
.user_main_box .user_main_text {
    WIDTH: 60px; COLOR: #000;
}
.user_main_box .user_main_input IMG {
    MARGIN-BOTTOM: -2px; MARGIN-LEFT: -25px;
}
.TxtUserNameCssClass {
    BORDER-TOP-WIDTH: 0px; PADDING-LEFT: 25px; BORDER-LEFT-WIDTH: 0px; BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_login_name.gif') no-repeat; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 165px; LINE-HEIGHT: 20px; HEIGHT: 21px; BORDER-RIGHT-WIDTH: 0px;
}
.TxtPasswordCssClass {
    BORDER-TOP-WIDTH: 0px; PADDING-LEFT: 25px; BORDER-LEFT-WIDTH: 0px; BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_login_password.gif') no-repeat; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 165px; LINE-HEIGHT: 20px; HEIGHT: 21px; BORDER-RIGHT-WIDTH: 0px;
}
.TxtValidateCodeCssClass {
    BORDER-TOP-WIDTH: 0px; PADDING-LEFT: 25px; BORDER-LEFT-WIDTH: 0px; BACKGROUND: url('http://58.30.16.58/Public/Admin/img/user_login_validatecode.gif') no-repeat; IME-MODE: disabled; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 91px; LINE-HEIGHT: 20px; HEIGHT: 21px; BORDER-RIGHT-WIDTH: 0px;
}
.IbtnEnterCssClass {
    WIDTH: 111px; HEIGHT: 122px;
}

        </style>
    </head><body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <dl>
                <dd id="user_top">
                    <ul>
                        <li class="user_top_l"></li>
                        <li class="user_top_c"></li>
                        <li class="user_top_r"></li></ul>
                </dd><dd id="user_main">
                    <form action="/abc.php?s=Admin/login/login" method="post">
                        <ul>
                            <li class="user_main_l"></li>
                            <li class="user_main_c">
                                <div class="user_main_box">
                                    <ul>
                                        <li class="user_main_text">用户名： </li>
                                        <li class="user_main_input">
                                            <input class="TxtUserNameCssClass" id="admin_user" maxlength="20" name="account"> </li></ul>
                                    <ul>
                                        <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                                        <li class="user_main_input">
                                            <input class="TxtPasswordCssClass" id="admin_psd" name="password" type="password">
                                        </li>
                                    </ul>
                                    
                                </div>
                            </li>
                            <li class="user_main_r">

                                <input style="border: medium none; background: url('http://58.30.16.58/Public/Admin/img/user_botton.gif') repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                            </li>
                        </ul>
                    </form>
                </dd><dd id="user_bottom">
                    <ul>
                        <li class="user_bottom_l"></li>
                        <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
                        <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
        <div id="ValidationSummary1" style="display: none; color: red;"></div>
    </body>
</html>