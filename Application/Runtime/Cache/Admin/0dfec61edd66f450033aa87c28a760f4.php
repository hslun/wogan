<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	
     登录
</title><meta name="Keywords" content="&lt;%=Getkeywords() %>" /><meta name="Description" content="&lt;%=Getdescription() %>" /><link href="CSS/rwx.css" rel="stylesheet" type="text/css" /><link href="CSS/common.css" rel="stylesheet" type="text/css" /><link href="CSS/online.css" rel="stylesheet" type="text/css" /><link href="CSS/demo.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .head a
        {
            text-decoration: none;
            font-size: 12px;
            color: #666;
        }
        .head .wc
        {
            text-decoration: none;
            font-size: 12px;
            color: #666;
        }
        .foota
        {
            text-decoration: none;
            font-size: 12px;
            color: #666;
        }
        .b
        {
            font-weight: bold;
            color: Red;
        }
        .mainlevel
        {
            float: left;
            width: 110px;
            height: 90px;
            margin: 0px;
            padding: 0px;
            list-style-type: none;
        }
        .menu_hover
        {
            background: url('images/navtop.png') no-repeat top #efefef;
        }
		.h24 {
  height: 24px;
}
.w1000 {
  width: 1000px;
}
#login01 table th {
  height: 40px;
  line-height: 40px;
  width: 60px;
  text-align: center;
  font-weight: normal;
}
.h40 {
  height: 40px;
}
#login01 table td {
  height: 40px;
  line-height: 40px;
  width: 234px;
}
#login01 table tr {
  height: 40px;
  line-height: 40px;
}
.fl {
  float: left;
}
.mr10 {
  margin-right: 10px;
}
.tac {
  text-align: center;
}
.l36 {
  line-height: 36px;
}
.f16, .f16 a {
  font-size: 16px;
}
a {
  color: #383838;
  text-decoration: none;
}
.tban_lv03 {
  width: 152px;
  height: 24px;
  background-Color:rgb(244, 148, 40);
  display: block;
  color: #fff;
}
.fl {
  float: left;
}
.an_lv03 {
  width: 152px;
  height: 37px;
  background-Color:green; 
  display: block;
  color: #fff;
}
#checkbox {
  width: 280px;
  float: left;
  height: 25px;
  line-height: 25px;
  margin-left: 20px;
}
.tar {
  text-align: right;
}
.l24 {
  line-height: 26px;
}
.f12, .f12 a {
  font-size: 12px;
}
.ma {
  margin: 0 auto;
}
        .mainlevel a
        {
            color: #000;
            display: block;
            width: 103px;
            height: 90px;
            text-align: center;
            line-height: 90px;
            margin: 0 auto;
            text-decoration: none;
        }
		.nav {
  width: 770px;
}
	ul, li, form, dl, dd, dt, p {
				list-style-type: none;
				margin: 0px;
				padding: 0px;
}
.login_x a.selected {
  border-bottom: 2px #F27171 solid;
}
.mb30 {
  margin-bottom: 30px;
}
.login_x {
  border-bottom: 1px #ccc solid;
  height: 26px;
}
body {
  margin: 0px;
  font: 12px "宋体","微软雅黑",Arial;
  color: #383838;
  background: #FFFFFF;
}
#login01 table {
  margin-top: 10px;
}
.pt30 {
  padding-top: 30px;
}
.w1000 {
  width: 1000px;
}
.ma {
  margin: 0 auto;
}
.pb115 {
  padding-bottom: 115px;
}
user agent stylesheetdiv {
  display: block;
}
.fl {
  float: left;
}
.logo {
  width: 200px;
  padding-top: 28px;
}
.fyh {
  font-family: "微软雅黑","Microsoft YaHei";
}
.fr {
  float: right;
}
.menu {
  width: 770px;
  height: 90px;
  position: relative;
  z-index: 10;
}
a {
  color: #383838;
  text-decoration: none;
}
.login_sx {
  height: 12px;
  border-right: 1px #ccc solid;
  margin-top: 5px;
  line-height: 12px;
}
#onlinebox {
  width: 129px;
  font-family: "microsoft YaHei", "宋体", Arial, Helvetica;
  font-size: 12px;
  background: #fff;
}
.f18, .f18 a {
  font-size: 18px;
}
.navbox {
  width: 1000px;
  height: 90px;
}
.fyh {
  font-family: "微软雅黑","Microsoft YaHei";
}
.fr {
  float: right;
}
.menu {
  width: 770px;
  height: 90px;
  position: relative;
  z-index: 10;
}
.login_x a {
  float: left;
  width: 95px;
  height: 24px;
  display: block;
  font-size: 12px;
  text-align: center;
  line-height: 22px;
}
ul, li, form, dl, dd, dt, p {
  list-style-type: none;
  margin: 0px;
  padding: 0px;
}
a:hover {
  text-decoration: none;
  border: none;
}
.mb30 {
  margin-bottom: 30px;
}
.login_x {
  border-bottom: 1px #ccc solid;
  height: 26px;
}
ul, li, form, dl, dd, dt, p {
  list-style-type: none;
  margin: 0px;
  padding: 0px;
}	
	.login_sx {
	 height: 12px;
	 border-right: 1px #ccc solid;
	 margin-top: 5px;
	 line-height: 12px;
}
		#login01 table tr {
  height: 40px;
  line-height: 40px;
}
        .mainlevel a:hover
        {
            color: #FF3300;
        }
        .foota:hover
        {
            color: #06c;
        }
        .footspan
        {
            font-size: 12px;
            color: #666;
            float: left;
            margin-right: 10px;
            line-height: 20px;
        }
        .submenucnt
        {
            list-style-type: none;
            margin: 0;
            display: none;
            padding: 0;
            font-size: 12px;
            top: 90px;
            position: absolute;
        }
        .submenucnt a
        {
            font-size: 12px;
            height: 25px;
            line-height: 25px;
            text-align: left;
            background: #fff;
            padding-left: 5px;
        }
        .weibolink
        {
            color: #666;
            text-decoration: none;
        }
        .weibolink:hover
        {
            color: #06c;
        }
    </style>
    
  
</head>
<body style="margin: 0px; padding: 0px;">
    <form method="post" action="/index.php/Admin/Login/login.html" id="form1">


<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>



    <div class="productdemobox" id="demo" style="display: none;">
        <div class="header">
            <div class="demologo">
            
      
        <div class="footer">
            <div class="leftbox">
                <img src="images/demo_01.gif" />
            </div>
            <div class="rightbox">
                <span>服务热线：</span><span id="CustomerTel5" class="wr b">028-84458900</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager1', 'form1', [], [], [], 90, 'ctl00');
//]]>
</script>

    

    
    <input type="hidden" id="yqValue" value="hide" />
    <div id="BgDiv" style="display: none; position: absolute; background-color: #dddbe0;
        width: 100%; height: 100%; z-index: 98; top: 0; left: 0; opacity: 0.5; filter: alpha(opacity=50);">
    </div>
    <div class="demobox" id="regbox">
        <div class="header">
            <div class="logo" style="padding-top: 0px;">
                <img src="images/demo_log.gif" /></div>
            <div class="colse">
                <a href="javascript:;" onclick="closeDiv('regbox');">
                    <img src="images/demo_close.gif" /></a></div>
        </div>
        <div class="content">
            <div class="title">
                <img src="images/reg_title.jpg" />
            </div>
            <div class="box">
                
                    </div>
                    
                </div>
            </div>
            <div class="btnbox">
                <img id="btnreg" src="images/reg_btn1.jpg" onmouseover="btnon();" onmouseout="btnout();"
                    onclick="GoToUrl();" />
            </div>
            <div class="bgbox">
            </div>
        </div>
        <div class="footer">
            <div class="leftbox">
                <img src="images/demo_01.gif" />
            </div>
            <div class="rightbox">
                <span>服务热线：</span><span id="CustomerTel2" class="wr b">028-84458900</span>
            </div>
        </div>
    </div>
    <div class="hb100">
        <!--外层盒子，勿删，不纳入统一调用头部 -->
        <!--顶部导航开始 -->
        <div class="topnavbox">
            <div class="w1000 h24 l24 ma f12 tar">
                <a href="Login.aspx" target="_blank">产品登录</a>&nbsp;&nbsp;<span class="wc">|</span>&nbsp;&nbsp;<a
                    href="ChargeList.aspx" target="_blank">充值续费</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="wc">|</span>&nbsp;&nbsp;客服热线：<span id="lbServiceTell1" class="wr b">028-84458900</span></div>
        </div>
        <!--顶部导航结束 -->
        <!--导航菜单开始 -->
		<div class="navbox ma">

       <div class="menu fr fyh f18">
                    <ul class="nav">
                        <li class="mainlevel"><a href="Default.aspx">首页</a></li>
                        <li class="mainlevel"><a href="/Product.aspx">产品</a>
                           
                        </li>
                        <li class="mainlevel"><a href="/Service.aspx">服务</a>
                           
                        </li>
                        <li class="mainlevel"><a href="/Case.aspx">案例</a></li>
                        <li class="mainlevel"><a href="/News.aspx">关于我们</a>
                           
                        </li>
                    </ul>
                    <div class="cl">
                    </div>
                </div>
</div>
        <!--导航菜单结束 -->
        
<input type="hidden" id="mypretime" value="0"/>
    <!--导航菜单结束 -->
    <input name="ctl00$ContentPlaceHolder1$hf_time" type="hidden" id="ContentPlaceHolder1_hf_time" />
    <input id="hf_url" type="hidden" />
    <input id="hf_devicetype" type="hidden" />
    <input id="hfmsg" type="hidden" />
    <input id="hfiscontinue" type="hidden" />
    <input type="hidden" name="ctl00$ContentPlaceHolder1$hf_LoginType" id="ContentPlaceHolder1_hf_LoginType" value="0" />
    <input name="ctl00$ContentPlaceHolder1$hide_productid" type="hidden" id="ContentPlaceHolder1_hide_productid" value="14" />
    <input type="hidden" name="ctl00$ContentPlaceHolder1$hfpass" id="ContentPlaceHolder1_hfpass" />
    <!--公告弹出-->
    <div class="newsBg" id="mainbox">
        <input type="hidden" id="type" />
        <input type="hidden" id="serviceid" />
        <input type="hidden" id="companyname" />
        <input type="hidden" id="productid" />
        <input type="hidden" id="invalidate" />
        <input type="hidden" id="loginurl" />
        <div class="newsbox">
            <div class="title">
                <span id="servicetitle"></span>
            </div>
            <div class="content" id="servicesummary">
            </div>
            
        </div>
    </div>
    <!--公告弹出结束-->
    <div class="w1000 ma pt30 pb115">
        <div class="login_l fl pb40">
            <!--banner切换开始 -->
    <div id="full-screen-slider"  style="height:350px;">
        <ul id="b_slides"  style="height:350px;">
            
                    <li style="width:473px; height:344px; background: url('/Public/Admin/img/logo.png') center no-repeat;"><a href=''
                        target="_blank">
                       </a></li>
                
        </ul>
    </div>
    <!--banner切换结束 -->
        </div>
        <div class="login_r fr">
         
            <div id="login01" class="bb1d pb20">
                <table border="0" cellpadding="0" cellspacing="0">
                  
                    <tr id="t_username">
                        <th>
                            用户名：
                        </th>
                        <td>
                            <div class="text">
                                <div style="float: left; padding-left: 2px;">
                                    <input name="account" type="text" id="ContentPlaceHolder1_txt_UserNames" class="inputbox" onblur="CheckUserNames($(this).val())" /></div>
                            </div>
                        </td>
                        <th>
                            <span id="s_username" class="btts fl f12 wl l24 pl10 pr10" style="display: none;">&nbsp;</span>
                        </th>
                    </tr>
                    
                    <tr id="tr_pass">
                        <th>
                            密&nbsp;&nbsp;码：
                        </th>
                        <td>
                            <div class="text">
                                <div style="float: left; padding-left: 2px;">
                                    <input name="password" type="password" id="ContentPlaceHolder1_txt_PassWords" class="inputbox" onblur="CheckPass($(this).val());" /></div>
                            </div>
                        </td>
                        <th>
                            <span id="s_pass" class="btts fl f12 wl l24 pl10 pr10" style="display: none;">&nbsp;</span>
                        </th>
                    </tr>
                    <tr id="ContentPlaceHolder1_tr_yzm" style="display: none;">
	<th>
                            验证码：
                        </th>
	<td colspan="2" style="width: 314px;">
                            <div style="width: 214px; height: 31px; padding: 0px; line-height: 30px; margin-left: 20px;">
                                <div style="float: left;">
                                    <input name="ctl00$ContentPlaceHolder1$txt_ValidateNumber" type="text" id="ContentPlaceHolder1_txt_ValidateNumber" class="code" /></div>
                                <div style="float: left; margin-top: 5px; margin-left: 20px;">
                                    <img alt="" id="yzmimg" onclick="this.src='ValidateNumber.aspx?v='+Math.random()"
                                        title="看不清？点击更换" style="line-height: 15px;" />
                                </div>
                            </div>
                        </td>
</tr>

                    <tr>
                        <th>
                            &nbsp;
                        </th>
                        <td colspan="2">
                            <div id="checkbox">
                                <input name="ctl00$ContentPlaceHolder1$cb_RemenberMe" type="checkbox" id="ContentPlaceHolder1_cb_RemenberMe" />记住我
                                <input name="ctl00$ContentPlaceHolder1$ck_RemenberPass" type="checkbox" id="ContentPlaceHolder1_ck_RemenberPass" title="为了账户安全，请勿在公用电脑上勾选此项！" onclick="RemenberPassCheck();" />记住密码
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &nbsp;
                        </th>
                        <td colspan="2">
                            <div class="h40 fyh" style="width: 300px;">
                                <p class="login_txt fl tar l24" style="width: 20px;">
                                    &nbsp;</p>
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnlogin" value="立即登录" onclick="if(!checkInfo())return false; this.value=&#39;正在提交&#39;;this.disabled=true;__doPostBack(&#39;ctl00$ContentPlaceHolder1$btnlogin&#39;,&#39;&#39;);" id="ContentPlaceHolder1_btnlogin" class="an_lv03 f16 l36 tac fl mr10" style="border: 0px; cursor: pointer;" />
                                <a href="javascript:;" id="alogin2" style="display: none; cursor: pointer; text-decoration: none;
                                    width: 80px; height: 31px; background: #ccc; line-height: 31px; text-align: center;
                                    float: left; margin-right: 20px; color: #ffffff; font-size: 14px;">登录(60)</a>
                                <a href="http://login.wsgjp.com.cn/ForgetPassword.aspx" target="_blank"><span class="fl f12 wblue" style="padding-top: 0px;">忘记密码？</span></a></div>
                        </td>
                    </tr>
                    <tr id="taobaologin">
                        <th >
                            &nbsp;
                        </th>
                        <td colspan="2">
                            <div class="fyh" style="width: 300px;">
                                <p class="login_txt fl tar l24" style="width: 20px;">
                                    &nbsp;</p>
                                <a href="javascript:;" onclick="TaoBaoLogin();" class="tban_lv03  tac fl mr10" style="height: 24px; line-height: 24px;">
                                    使用淘宝账号登录</a>
                                <input type="submit" name="ctl00$ContentPlaceHolder1$BtnTaobaoLogin" value="使用淘宝账号登录" id="ContentPlaceHolder1_BtnTaobaoLogin" class="tban_lv03  tac fl mr10" style="border: 0px; height: 24px;
                                    line-height: 24px; cursor: pointer;display: none;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &nbsp;
                        </th>
                        <td colspan="2" style="width: 314px;">
                            <div id="divmsg" style="margin-left: 20px; height: 77px; margin-top: 0px; float: left;
                                width: 215px; background: url(images/qipao.png) no-repeat; display: none;">
                                <div style="margin-top: 20px; height: 20px; color: #333; padding-left: 20px; line-height: 20px;
                                    font-size: 12px; width: 195px;">
                                    请在手机客户端点击以确认登录！</div>
                                <div style="height: 20px; color: #FF0000; line-height: 20px; font-size: 12px; width: 195px;
                                    padding-left: 20px;">
                                    您的验证码为：<span id="code" style="font-weight: bold; font-size: 16px;"> </span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
             <div class="h30 mt10">
             
            <div style="width: 200px; float: left;">
                <p class="h30 pt15" style="padding:0px;">
                <a href="javascript:;" onclick="charge(0);" class="an_or01 wl f12 tac l28 fr">充值续费</a><a
                    href="javascript:;" onclick="Register();" class="an_or01 wl f12 tac l28 fr mr15">免费注册</a></p>
            </div>
        </div>
            
        </div>
        <div class="cl">
        </div>
    </div>

    </div>
    <div style="height: 140px; border-top: 1px #DBDBDB solid; min-width: 1000px; background: #F9F9F9;
        overflow: hidden;">
        <div style="padding-top: 5px; width: 1000px; margin: 0 auto; display: block; height: 140px;">
            <div style="width: 115px; height: 100px; float: left;">
                <a href="../Admin/UploadFile\3274979526489586407\weixinLogo\14671058258842999793.jpg">
                    <img src="/Public/Admin/img/01.jpg" style="width: 100px; height: 100px;" /></a>
            </div>
            <div style="width: 690px; height: 100px; float: left; color: #999; font-size: 12px;">
                <p>
                    <a class="foota" href="AboutUs.aspx" target="_blank">关于我们</a> | <a class="foota"
                        href="ServiceAgreement.aspx" target="_blank">法律条款</a> | <a class="foota" href="http://baidu.com "  target="_blank">安全联盟</a></p>
                <div style="height: 25px; line-height: 25px;">
                    <span class="footspan">COPYRIGHT <span style="font-family: Arial">&copy;</span> 2009-<span id="lbCurrentYear">2015</span></span> <span class="footspan">
                            <span id="lbCompanyName">成都伽蓝科技有限公司</span></span> <span class="footspan">
                                <span id="lbLicenseCode">增值电信业务经营许可证：510105000379079</span></span> <a class="footspan"
                                    href="http://www.miitbeian.gov.cn/" target="_blank">
                                    <span id="lbRecordNumber">备案号：蜀ICP备14009304号</span></a>
                </div>
                <div style="">
                    <span class="footspan">
                        
                    </span>
                </div>
               <div>
                    <div style="background: url('images/foot01.jpg') no-repeat 0px 0px; width: 60px;
                        float: left; padding-left: 22px; height: 18px; line-height: 18px;">
                        <a class="foota" href="http://www.cyberpolice.cn/wfjb/" target="_blank">网络警察</a></div>
                    <div style="background: url('images/foot02.jpg') no-repeat 0px 0px; width: 40px;
                        float: left; padding-left: 22px; height: 18px; line-height: 18px;">
                        <a class="foota" href="http://www.cyberpolice.cn/wfjb/"
                            target="_blank">安网</a></div>
                    <div style="background: url('images/foot03.jpg') no-repeat 0px 0px; width: 60px;
                        float: left; padding-left: 22px; height: 18px; line-height: 18px;">
                        <a class="foota" href="http://www.cyberpolice.cn/wfjb/frame/impeach/chooseImpeachAnonymous.jsp" target="_blank">有奖举报</a></div>
                    <div style="width: 350px; float: left; padding-left: 22px; height: 18px; line-height: 18px;
                        color: #666;">
                        <span id="lbServiceTell2">客服热线：028-84458900</span>
                        <span id="lbChargeTell"> | 充值热线：028-84458900</span></div>
                </div>
            </div>
            <div style="width: 125px; padding-top: 45px; padding-left: 20px; font-size: 12px; color: #666; float: left;"><img src="/Public/Admin/img/sina.png" width="15" height="14" align="absmiddle"/>&nbsp; <a href="http://weibo.com/gjponline" target="_blank" class="weibolink">新浪微博</a>&nbsp;&nbsp;<img src="/Public/Admin/img/qq.png" width="15" height="17" align="absmiddle"/>&nbsp; <a href="http://weibo.com/gjponline" target="_blank" class="weibolink">腾讯微博</a></div>
        </div>
    </div>
    </form>
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a339f50adec6ee8af5a88824b4b6cab4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
    <!--ie6 判断弹窗 -->
    <script type="text/javascript">
        if (window.ActiveXObject) {
            var ua = navigator.userAgent.toLowerCase();
            var ie = ua.match(/msie ([\d.]+)/)[1]
            if (ie == 6.0) {
                alert("您的浏览器版本过低，在本系统中不能达到良好的视觉效果，建议你升级到ie8以上，以及安装微软雅黑字体！");
                //window.close();
            }
        }
    </script>
</body>
</html>