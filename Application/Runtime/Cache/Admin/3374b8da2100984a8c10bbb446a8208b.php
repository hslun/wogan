<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="http://58.30.16.58/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>

  <div class="container">
    <div class="row">
        <form id="J_Form" class="form-horizontal span24" method="post" action="<?php echo U('randstr');?>">

          <div style="margin:30px 40px;">
              <?php if($_GET['pname']) :?>
              <input name="pname" readonly="readonly" style="width:200px; border:1px solid #fff;font-weight:bold;font-size:17px;" type="text" value="<?php echo $_GET['pname'].'代理商';?>"><?php endif; ?>
               <?php if($_GET['city']) :?>
              <input name="city" readonly="readonly" style="width:200px; border:1px solid #fff;font-weight:bold;font-size:17px;" type="text" value="<?php echo $_GET['city'].'代理商';?>"><?php endif; ?>
               <?php if($_GET['District']) :?>
              <input name="District" readonly="readonly" style="width:200px; border:1px solid #fff;font-weight:bold;font-size:17px;" type="text" value="<?php echo $_GET['District'].'代理商';?>"><?php endif; ?>
              <?php if($_GET['county']) :?>
              <input name="county" readonly="readonly" style="width:200px; border:1px solid #fff;font-weight:bold;font-size:17px;" type="text" value="<?php echo $_GET['county'].'代理商';?>"><?php endif; ?>
		  
			
		  <br/><br/>
			<div  style="margin:10px 80px;"></div>
			<div></div>
			</div>
           
			
			
		<div class="row">
          <div class="control-group span15 ">
            <label  class="control-label">授权期限：</label>
            <div id="range" class="controls bui-form-group"  data-rules="{dateRange:true}">
              <input style="width:100px;" name="start_date" class="calendar"   data-rules="{required:true}"  type="text"><label>&nbsp;-&nbsp;</label>
              <input style="width:100px;" name="end_date" class="calendar"   data-rules="{required:true}"  type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">最新通知：</label>
            <div class="controls control-row4">
              <textarea name="memo" class="input-large" data-tip="{text:'请填写备注信息！'}" type="text"></textarea>
            </div>
          </div>
        </div>
        <div class="row form-actions actions-bar">
            <div class="span13 offset3 ">
              <button type="submit" class="button button-primary" onclick="show()">生成账号及密码</button>
			  <button type="button" class="button button-primary" onclick="back()">返回上一页</button>
            </div>
        </div>
      </form>
    </div>
    

  </div>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="http://58.30.16.58/assets/js/prettify.js"></script>
  <script type="text/javascript">
  function back(){
	  
history.back();
  }
    $(function () {
      prettyPrint();
	
    }
	);
	function show(){
		$('#none').toggle();
		}	
  </script> 
<script type="text/javascript">
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  }
  
  );
</script>

<body>
</html>