<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .box{
            margin:40px 30px;
        }
    </style>
    </head>
    <body>
    <div class="box">
        <?php foreach($data as $k=>$v ):?>
        <div>账号:<input type="text" value="<?php echo $v['account']; ?>"><br/><br/></div>
        <div>密码:<input type="text" value="<?php echo $v['password']; ?>"><br/><br/><br/></div>
        <?php endforeach; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="button button-primary" onclick="back()">返回上一页</button>
    </div>
        <script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
    function back(){
      
history.back();
  }
  </script>
    </body>
</html>