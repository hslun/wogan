<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            
            .box{
                margin:20px 25px;
            }
        </style>
    </head>
    <body>
        <form method="post" action="<?php echo U('add');?>">
        <div class="box">
            所在区域:<?php if($_POST['pname']) :?>
              <input name="pname" readonly="readonly" style="width:200px; border:1px solid #fff;" type="text" value="<?php echo $_POST['pname'];?>"><?php endif; ?>
               <?php if($_POST['city']) :?>
              <input name="city" readonly="readonly" style="width:200px; border:1px solid #fff;" type="text" value="<?php echo $_POST['city']?>"><?php endif; ?>
               <?php if($_POST['District']) :?>
              <input name="District" readonly="readonly" style="width:200px; border:1px solid #fff;" type="text" value="<?php echo $_POST['District']?>"><?php endif; ?>
              <?php if($_POST['county']) :?>
              <input name="county" readonly="readonly" style="width:200px; border:1px solid #fff;" type="text" value="<?php echo $_POST['county']?>"><?php endif; ?>
            授权期限:&nbsp;<input style="width:70px;" name="start_date" type="text" value="<?php echo $_POST['start_date'];?>">&nbsp;到
            <input type="text" style="width:70px;" name="end_date" value="<?php echo $_POST['end_date'];?>"><br/><br/>
            账号:<input style="width:200px; border:1px solid #fff;" type="text" name="account" readonly="readonly" value="<?php echo $name;?>"><br/><br/>
            密码:<input style="width:200px; border:1px solid #fff;" type="text" name="password" readonly="readonly" value="<?php echo $password?>">
            <input type="hidden" value="<?php echo date('y-m-d',time());?>" name="create_date"><br/><br/>
            请保存好初始密码,如丢失密码请联系客服<br/><br/><br/>
			<button type="submit" class="button button-primary" onclick="show()">确认开通</button>
			<button type="button" class="button button-primary" onclick="back()">返回上一页</button>
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
    </form>

    </body>  
	
</html>