<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> BUI 管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="http://58.30.16.58/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
        <a href="http://sc.chinaz.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
          <span class="dl-title-text">我干APP</span>
        </a>
      </div>

      <div class="dl-log">
          <?php if(empty($_SESSION)): ?>
           <a href="<?php echo U('login/login');?>" title="登录系统" class="dl-log-quit">[登录]</a>
          <?php endif; ?>
          <?php if(!empty($_SESSION)): ?>
           <a href="<?php echo U('login/login');?>" title="登录系统" class="dl-log-quit">[欢迎您:<?php echo $data['name']?>]</a>
          <?php endif; ?>
          
         
          
          <a href="<?php echo U('login/logout');?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-order">用户管理</div></li>
<!--        <li class="nav-item"><div class="nav-item-inner nav-inventory">vip用户申请</div></li>-->
        <li class="nav-item"><div class="nav-item-inner nav-supplier">提现管理</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-marketing">图表</div></li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'code',
          menu:[{
              text:'首页内容',
              items:[
                {id:'code',text:'我的账户',href:'http://58.30.16.58/index.php/admin/Agent/index',closeable : false},
                {id:'main-menu',text:'下级管理',href:'http://58.30.16.58/index.php/admin/Agent/agent.html'},
				{id:'dyna-menu',text:'财务管理',href:'http://58.30.16.58/index.php/admin/Finance/Finance.html'},
                
                {id:'menu',text:'订单管理',href:'http://58.30.16.58/index.php/admin/Order/index.html'},
				{id:'money',text:'广告管理',href:'http://58.30.16.58/index.php/admin/advert/advert.html'},
                
               
                

              ]
            },]
          },{
            id:'form',
            menu:[{
                text:'用户管理',
                items:[
                  {id:'code',text:'普通用户',href:'http://58.30.16.58/index.php/admin/Member/Member.html'},
                  {id:'example',text:'vip用户',href:'http://58.30.16.58/index.php/admin/Member/vipmember.html'},
                   {id:'code',text:'vip申请审核',href:'http://58.30.16.58/index.php/admin/Member/vipapproval.html'},
                 
                ]
              }]
          },{
            id:'detail',
            menu:[{
                text:'',
                items:[
                  {id:'code',text:'用户提现',href:'http://58.30.16.58/index.php/admin/Withdraw/Withdraw.html'},
                   {id:'code',text:'站长提现',href:'http://58.30.16.58/index.php/admin/Withdraw/WithdrawManager.html'},
                ]
              }]
          },{
            id : 'chart',
            menu : [{
              text : '图表',
              items:[
                  {id:'code',text:'引入代码',href:'chart/code.html'},
                  {id:'line',text:'折线图',href:'chart/line.html'},
                  {id:'area',text:'区域图',href:'chart/area.html'},
                  {id:'column',text:'柱状图',href:'chart/column.html'},
                  {id:'pie',text:'饼图',href:'chart/pie.html'}, 
                  {id:'radar',text:'雷达图',href:'chart/radar.html'}
              ]
            }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>